<?php

namespace App\Http\Controllers;

use App\Models\MasterKanwil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use GuzzleHttp\Client;

class MasterKanwilController extends Controller
{
    public function getData(Request $request) {

        $client = new Client();

         $columns = array(
            1 => 'branchcode_kanwil',
            2 => 'kanwil',

            
        );

        $response = $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
            
            'form_params' => [
                'comment' => 'getall-master',
                'table' => 'tb_master_kanwil',
                'limit' => $request->input('length'),
                'start' =>  $request->input('start'),
                'order' => $columns[$request->input('order.0.column')],
                'dir' => $request->input('order.0.dir'),
                'draw' => $request->input('draw'),
                'search' => $request->input('search.value'),
            ],
            
        ]);

        $master_kanwil_data = json_decode($response->getBody())->result;

        return $master_kanwil_data;


    }

    public function index() {

        return view('master_kanwil.index');

    }

    public function create() {

        return view('master_kanwil.create');

    }

    public function post(Request $request) {

        $validatedData = $request->validate([

                'branchcode_kanwil' => 'required',
                'kanwil' => 'required',
                'effective_date' => 'required',

            ],
            [
                'branchcode_kanwil.required' => 'Branchcode kanwil harus diisi',
                'kanwil.required' => 'Nama kanwil harus diisi',
                'effective_date.required' => 'Effective date harus diisi',
            ],
    
        );

         $client = new Client();

        $response = $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
            
             'form_params' => [
                'comment' => 'create-master',
                'table' => 'tb_master_kanwil',
                'branchcode_kanwil' => $request->branchcode_kanwil,
                'kanwil' => $request->kanwil,
                'effective_date' => $request->effective_date,
            ],
            
        ]);   

        return redirect()->route('masterKanwil.index')->with('success', 'Master kanwil berhasil dibuat.');

    }

    public function edit($id) {

        $client = new Client();

            $response = $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
                
                'form_params' => [
                    'comment' => 'get-master',
                    'table' => 'tb_master_kanwil',
                    'id' => $id,
                ],
                
            ]); 
            
            $masterKanwil_edit = json_decode($response->getBody())->result->data;

        return view('master_kanwil.edit', compact('masterKanwil_edit'));

    }

    public function update(Request $request, $id) {

        $validatedData = $request->validate(
            [

                'branchcode_kanwil' => 'required',
                'kanwil' => 'required',
                'effective_date' => 'required',
                'remarks' => 'required',

            ],
            [
                'branchcode_kanwil.required' => 'Branchcode kanwil harus diisi',
                'kanwil.required' => 'Nama kanwil harus diisi',
                'effective_date.required' => 'Effective date harus diisi',
                'remarks.required' => 'Remarks harus diisi',
            ],

        );

        $client = new Client();
        $expire_date= date("Y-m-d");

        $response1 = $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
            
             'form_params' => [
                'comment' => 'update-master',
                'table' => 'tb_master_kanwil',
                'id' => $id,
                'is_deleted' => 1,
                'expire_date' => $expire_date,
                'remarks' => $request->remarks,
            ],
            
        ]); 
        
        $response2 = $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
            
             'form_params' => [
                'comment' => 'create-master',
                'table' => 'tb_master_kanwil',
                'branchcode_kanwil' => $request->branchcode_kanwil,
                'kanwil' => $request->kanwil,
                'effective_date' => $request->effective_date,
                'remarks' => $request->remarks,
            ],
            
        ]);

        // cek id berdasarkan referenced id
        $cekNewIdBerdasarkanReferencedId = $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
            
             'form_params' => [
                'comment' => 'get-new-id-in-referenced-id',
                'table' => 'tb_master_vendor',
                'referencedId' => $id,
            ],
            
        ]); 
        $GetNewIdInReferencedId = json_decode($cekNewIdBerdasarkanReferencedId->getBody())->result->data;

        // update tb_master_kanwil_id di master lokasi crm
        $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
            
            'form_params' => [
                'comment' => 'update-master-foreign-key',
                'table' => 'tb_master_lokasi_crm', 
                'referencedId' => $id,
                'field' => 'tb_master_kanwil_id',
                'tb_master_kanwil_id' => $GetNewIdInReferencedId->id,
            ],
            
        ]); 

        return redirect()->route('masterKanwil.index')->with('success', 'Master kanwil berhasil diupdate');

    }

    public function delete($id) {

        $client = new Client();
         
        $expire_date= date("Y-m-d");

        $cekRelationMasterLokasiCrm = $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
            
            'form_params' => [
                'comment' => 'check-relation',
                'table' => 'tb_master_kanwil',
                'id' => $id,
                'relation' => 'tb_master_lokasi_crm',
            ],
            
        ]); 
        $GetCekRelationMasterLokasiCrm = json_decode($cekRelationMasterLokasiCrm->getBody())->result->data;

        // dd(count($GetCekRelationMasterLokasiCrm));

        if (count($GetCekRelationMasterLokasiCrm) === 0) {
            $response = $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
            
             'form_params' => [
                'comment' => 'update-master',
                'table' => 'tb_master_kanwil',
                'id' => $id,
                'is_deleted' => 1,
                'expire_date' => $expire_date

            ],
            
        ]);

        return redirect()->route('masterKanwil.index')->with('success', 'Master kanwil berhasil dihapus');
        } else {
            return redirect()->route('masterKanwil.index')->with('warning', 'Data master kanwil tidak dapat dihapus karena berelasi');
        }
        
        

    }
    
}