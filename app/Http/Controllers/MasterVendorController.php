<?php

namespace App\Http\Controllers;

use App\Models\MasterVendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use GuzzleHttp\Client;

class MasterVendorController extends Controller
{
    
    public function getData(Request $request) {

        $token = session('token-auth');
        $client = new Client();

         $columns = array(
            1 => 'vendor_id',
            2 => 'vendor_name',
            3 => 'service',

            
        );

        $response = $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
            
            'form_params' => [
                'comment' => 'getall-master',
                'table' => 'tb_master_vendor',
                'limit' => $request->input('length'),
                'start' =>  $request->input('start'),
                'order' => $columns[$request->input('order.0.column')],
                'dir' => $request->input('order.0.dir'),
                'draw' => $request->input('draw'),
                'search' => $request->input('search.value'),
            ],
            
        ]);

        $master_vendor_data = json_decode($response->getBody())->result;

        return $master_vendor_data;

    }

    public function index() {

        return view('master_vendor.index');

    }


    public function create() {

         $client = new Client();

        $response = $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
            
             'form_params' => [
                'comment' => 'get-max-vendor',
            ],
            
        ]);

        $max_id_vendor = json_decode($response->getBody())->result;

        // dd($max_id_vendor);
        
        return view('master_vendor.create', compact('max_id_vendor'));

    }

    public function post(Request $request) {

        $request->validate([

                'vendor_id' => 'required',
                'vendor_name' => 'required',
                'service' => 'required',
                'effective_date' => 'required',

            ],
            [
                'vendor_id.required' => 'Vendor id harus diisi',
                'vendor_name.required' => 'Nama vendor harus diisi',
                'service.required' => 'Service harus diisi',
                'effective_date.required' => 'Effective date harus diisi',
            ],
    
        );

         $client = new Client();

        $response = $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
            
             'form_params' => [
                'comment' => 'create-master',
                'table' => 'tb_master_vendor',
                'vendor_id' => $request->vendor_id,
                'vendor_name' => $request->vendor_name,
                'service' => $request->service,
                'effective_date' => $request->effective_date,
            ],
            
        ]);   
        
        return redirect()->route('masterVendor.index')->with('success', 'Master vendor berhasil dibuat.');

    }

    public function edit($id) {

         $client = new Client();

            $response = $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
                
                'form_params' => [
                    'comment' => 'get-master',
                    'table' => 'tb_master_vendor',
                    'id' => $id,
                ],
                
            ]); 
            
            $masterVendor_edit = json_decode($response->getBody())->result->data;

            // dd($masterVendor_edit);

        return view('master_vendor.edit', compact('masterVendor_edit'));

    }

    public function update(Request $request, $id) {

        $request->validate(
            [

                'vendor_id' => 'required',
                'vendor_name' => 'required',
                'service' => 'required',
                'effective_date' => 'required',
                'remarks' => 'required',

            ],
            [
                'vendor_id.required' => 'Vendor id harus diisi',
                'vendor_name.required' => 'Nama vendor harus diisi',
                'service.required' => 'Service harus diisi',
                'effective_date.required' => 'Effective date harus diisi',
                'remarks.required' => 'Remarks date harus diisi',
            ],

        );

        $client = new Client();
        $expire_date= date("Y-m-d");

        $response1 = $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
            
             'form_params' => [
                'comment' => 'update-master',
                'table' => 'tb_master_vendor',
                'id' => $id,
                'is_deleted' => 1,
                'expire_date' => $expire_date,
                'remarks' => $request->remarks,
            ],
            
        ]); 
        
        $response2 = $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
            
             'form_params' => [
                'comment' => 'create-master',
                'table' => 'tb_master_vendor',
                'vendor_id' => $request->vendor_id,
                'vendor_name' => $request->vendor_name,
                'service' => $request->service,
                'effective_date' => $request->effective_date,
                'remarks' => $request->remarks,
            ],
            
        ]); 
        
        return redirect()->route('masterVendor.index')->with('success', 'Master vendor berhasil diupdate');

    }

    public function delete($id) {

        $client = new Client();
         
         $expire_date= date("Y-m-d");

        $response = $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
            
             'form_params' => [
                'comment' => 'update-master',
                'table' => 'tb_master_vendor',
                'id' => $id,
                'is_deleted' => 1,
                'expire_date' => $expire_date

            ],
            
        ]); 
        
        return redirect()->route('masterVendor.index')->with('success', 'Master vendor berhasil dihapus');

    }
    
}