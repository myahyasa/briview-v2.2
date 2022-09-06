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

    // ambil jml relasi vendor dan machineInfo dimana idnya = id vendor sebelum diupdate
    // ambil id machine info yg berelasi
    // lalu update tb_master_vendor_id dengan maxId yang ada di tb_master_vendor
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
                'referenced_id' => $id,
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

        // update tb_master_vendor_id di machine info
        $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
            
            'form_params' => [
                'comment' => 'update-master-foreign-key',
                'table' => 'tb_machine_info', 
                'referencedId' => $id,
                'field' => 'tb_master_vendor_id',
                'tb_master_vendor_id' => $GetNewIdInReferencedId->id,
            ],
            
        ]); 

        // update tb_master_vendor_id di digital signage
        $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
            
            'form_params' => [
                'comment' => 'update-master-foreign-key',
                'table' => 'tb_digital_signage', 
                'referencedId' => $id,
                'field' => 'tb_master_vendor_id',
                'tb_master_vendor_id' => $GetNewIdInReferencedId->id,
            ],
            
        ]); 

        // update tb_master_vendor_id di cctv
        $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
            
            'form_params' => [
                'comment' => 'update-master-foreign-key',
                'table' => 'tb_cctv', 
                'referencedId' => $id,
                'field' => 'tb_master_vendor_id',
                'tb_master_vendor_id' => $GetNewIdInReferencedId->id,
            ],
            
        ]); 

        // update tb_master_vendor_id di ups
        $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
            
            'form_params' => [
                'comment' => 'update-master-foreign-key',
                'table' => 'tb_ups', 
                'referencedId' => $id,
                'field' => 'tb_master_vendor_id',
                'tb_master_vendor_id' => $GetNewIdInReferencedId->id,
            ],
            
        ]); 

        // update tb_master_vendor_id di nvr
        $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
            
            'form_params' => [
                'comment' => 'update-master-foreign-key',
                'table' => 'tb_nvr', 
                'referencedId' => $id,
                'field' => 'tb_master_vendor_id',
                'tb_master_vendor_id' => $GetNewIdInReferencedId->id,
            ],
            
        ]); 

        // update tb_master_vendor_id di cro allocation
        $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
            
            'form_params' => [
                'comment' => 'update-master-foreign-key',
                'table' => 'tb_cro_allocation', 
                'referencedId' => $id,
                'field' => 'tb_master_vendor_id',
                'tb_master_vendor_id' => $GetNewIdInReferencedId->id,
            ],
            
        ]); 

        // update tb_master_vendor_id di master service point
        $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
            
            'form_params' => [
                'comment' => 'update-master-foreign-key',
                'table' => 'tb_master_service_point', 
                'referencedId' => $id,
                'field' => 'tb_master_vendor_id',
                'tb_master_vendor_id' => $GetNewIdInReferencedId->id,
            ],
            
        ]); 



        return redirect()->route('masterVendor.index')->with('success', 'Master vendor berhasil diupdate');

        // // // cek relasi dengan machine info
        // $cekRelasiMachineInfo = $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
            
        //      'form_params' => [
        //         'comment' => 'check-relation-update',
        //         'table' => 'tb_master_vendor',
        //         'relation' => 'tb_machine_info',
        //         'id' => $id,
        //     ],
            
        // ]); 
        // $FindRelationMasterVendorWithMachineInfo = json_decode($cekRelasiMachineInfo->getBody())->result->data;

        // // cek relasi dengan digital signage
        // $cekRelasiDigitalSignage = $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
            
        //      'form_params' => [
        //         'comment' => 'check-relation-update',
        //         'table' => 'tb_master_vendor',
        //         'relation' => 'tb_digital_signage',
        //         'id' => $id,
        //     ],
            
        // ]); 
        // $FindRelationMasterVendorWithDigitalSignage = json_decode($cekRelasiDigitalSignage->getBody())->result->data;


        
        // // update tb_master_vendor_id di machine info
        // for ($i=0; $i < sizeof($FindRelationMasterVendorWithMachineInfo); $i++){

        //     $IdMachineInfo = $FindRelationMasterVendorWithMachineInfo[$i]->id_b;

        //     $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
            
        //      'form_params' => [
        //         'comment' => 'update-master',
        //         'table' => 'tb_machine_info',
        //         'id' => $IdMachineInfo,
        //         'tb_master_vendor_id' => $GetNewIdInReferencedId->id,
        //     ],

        //     ]); 
        // }
        
        // // update tb_master_vendor_id di digital signage
        // for ($i=0; $i < sizeof($FindRelationMasterVendorWithDigitalSignage); $i++){

        //     $IdDigitalSignage = $FindRelationMasterVendorWithDigitalSignage[$i]->id_b;

        //     $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
            
        //      'form_params' => [
        //         'comment' => 'update-master',
        //         'table' => 'tb_digital_signage',
        //         'id' => $IdDigitalSignage,
        //         'tb_master_vendor_id' => $GetNewIdInReferencedId->id,
        //     ],

        //     ]); 
        // }
        

    }

    public function delete($id) {

        $client = new Client();
         
        $expire_date= date("Y-m-d");

        $cekRelationMachineInfo = $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
            
            'form_params' => [
                'comment' => 'check-relation',
                'table' => 'tb_master_vendor',
                'id' => $id,
                'relation' => 'tb_machine_info',
            ],
            
        ]); 
        $GetCekRelationMachineInfo = json_decode($cekRelationMachineInfo->getBody())->result->data; 

        $cekRelationDigitalSignage = $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
            
            'form_params' => [
                'comment' => 'check-relation',
                'table' => 'tb_master_vendor',
                'id' => $id,
                'relation' => 'tb_digital_signage',
            ],
            
        ]); 
        $GetCekRelationDigitalSignage = json_decode($cekRelationDigitalSignage->getBody())->result->data; 

        $cekRelationCctv = $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
            
            'form_params' => [
                'comment' => 'check-relation',
                'table' => 'tb_master_vendor',
                'id' => $id,
                'relation' => 'tb_cctv',
            ],
            
        ]); 
        $GetCekRelationCctv = json_decode($cekRelationCctv->getBody())->result->data; 

        $cekRelationUps = $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
            
            'form_params' => [
                'comment' => 'check-relation',
                'table' => 'tb_master_vendor',
                'id' => $id,
                'relation' => 'tb_ups',
            ],
            
        ]); 
        $GetCekRelationUps = json_decode($cekRelationUps->getBody())->result->data; 

        $cekRelationNvr = $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
            
            'form_params' => [
                'comment' => 'check-relation',
                'table' => 'tb_master_vendor',
                'id' => $id,
                'relation' => 'tb_nvr',
            ],
            
        ]); 
        $GetCekRelationNvr = json_decode($cekRelationNvr->getBody())->result->data; 

        $cekRelationCroAllocation = $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
            
            'form_params' => [
                'comment' => 'check-relation',
                'table' => 'tb_master_vendor',
                'id' => $id,
                'relation' => 'tb_cro_allocation',
            ],
            
        ]); 
        $GetCekRelationCroAllocation = json_decode($cekRelationCroAllocation->getBody())->result->data; 
        
        $cekRelationMasterServicePoint = $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
            
            'form_params' => [
                'comment' => 'check-relation',
                'table' => 'tb_master_vendor',
                'id' => $id,
                'relation' => 'tb_master_service_point',
            ],
            
        ]); 
        $GetCekRelationMasterServicePoint = json_decode($cekRelationMasterServicePoint->getBody())->result->data; 

        // dd(count($GetCekRelationMasterServicePoint));

        // jika tidak ada relasi maka hapus, jika berelasi jgn
        // if (count($GetCekRelationMachineInfo) === 0 && count($GetCekRelationDigitalSignage) === 0 && count($GetCekRelationCctv) === 0 && count($GetCekRelationUps) === 0 && count($GetCekRelationNvr) === 0 && count($GetCekRelationCroAllocation) === 0 && count($GetCekRelationMasterServicePoint)) {
        //     $response = $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
            
        //      'form_params' => [
        //         'comment' => 'update-master',
        //         'table' => 'tb_master_vendor',
        //         'id' => $id,
        //         'is_deleted' => 1,
        //         'expire_date' => $expire_date

        //     ],
            
        //     ]); 
        
        //     return redirect()->route('masterVendor.index')->with('success', 'Master vendor berhasil dihapus');
        // } else {
        //     return redirect()->route('masterVendor.index')->with('warning', 'Data Master vendor tidak dapat dihapus karena berelasi');
        // }

        if (count($GetCekRelationMachineInfo) === 0) {
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
        } else if (count($GetCekRelationDigitalSignage) === 0) {
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
        } else if (count($GetCekRelationCctv) === 0) {
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
        } else if (count($GetCekRelationUps) === 0) {
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
        } else if (count($GetCekRelationNvr) === 0) {
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
        } else if (count($GetCekRelationCroAllocation) === 0) {
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
        } else if (count($GetCekRelationMasterServicePoint) === 0) {
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
        } else {
            return redirect()->route('masterVendor.index')->with('warning', 'Data Master vendor tidak dapat dihapus karena berelasi');
        }
        

    }
    
}