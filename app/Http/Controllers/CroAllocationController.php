<?php

namespace App\Http\Controllers;

use App\Models\CroAllocation;
use App\Models\MasterVendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class CroAllocationController extends Controller
{
    public function getData() {

        $croAllocationData = CroAllocation::leftJoin('tb_master_vendor', 'tb_master_vendor.id', '=', 'tb_cro_allocation.tb_master_vendor_id')
                                    ->leftJoin('tb_tid_allocation', 'tb_tid_allocation.id', '=', 'tb_cro_allocation.tb_tid_allocation_id')
                                    ->select('*', 'tb_cro_allocation.id as cro_allocation_id')
                                    ->where('tb_cro_allocation.is_deleted',0)
                                    ->where('tb_master_vendor.is_deleted',0)
                                    ->where('tb_tid_allocation.is_deleted',0)
                                    ->get();

        return datatables::of($croAllocationData)->toJson();

    }

    public function index() {

        return view('cro_allocation.index');

    }

    public function create() {

        return view('cro_allocation.create');

    }

    public function post(Request $request) {

        $validatedData = $request->validate([

                'tid' => 'required',
                'vendor_name' => 'required',
                'no_spk' => 'required',
                'year' => 'required',
                'project_name' => 'required',
                'effective_date' => 'required',

            ],
            [
                'tid.required' => 'Tid harus diisi',
                'vendor_name.required' => 'Vendor harus diisi',
                'no_spk.required' => 'No spk harus diisi',
                'year.required' => 'Tahun harus diisi',
                'project_name.required' => 'Nama projek harus diisi',
                'effective_date.required' => 'Effective date harus diisi',
            ],
    
        );

        CroAllocation::insert([

            'tb_tid_allocation_id' => explode('|', $request->tid)[0],
            'tb_master_vendor_id' => explode('|', $request->vendor_name)[0],
            'no_spk' => $request->no_spk,
            'year' => $request->year,
            'project_name' => $request->project_name,
            'effective_date' => $request->effective_date,

        ]);

        return redirect()->route('croAllocation.index')->with('success', 'Cro allocation berhasil dibuat.');

    }

    public function edit($id) {

        $croAllocation_edit = CroAllocation::leftJoin('tb_master_vendor', 'tb_master_vendor.id', '=', 'tb_cro_allocation.tb_master_vendor_id')
                                    ->leftJoin('tb_tid_allocation', 'tb_tid_allocation.id', '=', 'tb_cro_allocation.tb_tid_allocation_id')
                                    ->select('*', 'tb_cro_allocation.id as cro_allocation_id')
                                    ->where('tb_cro_allocation.is_deleted',0)
                                    ->where('tb_master_vendor.is_deleted',0)
                                    ->where('tb_tid_allocation.is_deleted',0)
                                    ->where('tb_cro_allocation.id',$id)
                                    ->first();

        return view('cro_allocation.edit', compact('croAllocation_edit'));

    }

    public function update(Request $request, $id) {

        $validatedData = $request->validate(
            [

                'tid' => 'required',
                'vendor_name' => 'required',
                'no_spk' => 'required',
                'year' => 'required',
                'project_name' => 'required',
                'effective_date' => 'required',
                'remarks' => 'required',

            ],
            [
                'tid.required' => 'Tid harus diisi',
                'vendor_name.required' => 'Vendor harus diisi',
                'no_spk.required' => 'No spk harus diisi',
                'year.required' => 'Tahun harus diisi',
                'project_name.required' => 'Nama projek harus diisi',
                'effective_date.required' => 'Effective date harus diisi',
                'remarks.required' => 'Remarks harus diisi',
            ],

        );

        $expire_date = date("Y-m-d");
        CroAllocation::where('id',$id)
                        ->update([
                            'is_deleted' => 1,
                            'expire_date' => $expire_date,
                            'remarks' => $request->remarks
                        ]);

        CroAllocation::insert([
            'tb_tid_allocation_id' => explode('|', $request->tid)[0],
            'tb_master_vendor_id' => explode('|', $request->vendor_name)[0],
            'no_spk' => $request->no_spk,
            'year' => $request->year,
            'project_name' => $request->project_name,
            'effective_date' => $request->effective_date,
            'remarks' => $request->remarks,
            'updated_at' => now(),
        ]);

        return redirect()->route('croAllocation.index')->with('success', 'Cro allocation berhasil diupdate');

    }

    public function delete($id) {

        $expire_date = date("Y-m-d");
        CroAllocation::where('id',$id)
                        ->update([
                            'is_deleted'=>1,
                            'expire_date'=>$expire_date
                        ]);

        return redirect()->route('croAllocation.index')->with('success', 'Cro allocation berhasil dihapus');

    }

    public function ambilDataVendor(Request $request) {

        $search = $request->search;
        if($search == ''){
            $data = MasterVendor::orderby('vendor_name','asc')
                                    ->select('id','vendor_name')
                                    ->where('is_deleted',0)
                                    ->limit(5)
                                    ->get();
        } else {
            $data = MasterVendor::orderby('vendor_name','asc')
                                    ->select('id','vendor_name')
                                    ->where('vendor_name','like','%'.$search.'%')
                                    ->where('is_deleted',0)
                                    ->limit(5)
                                    ->get();
        }

        $response = (object)array("results"=>[]);
        foreach($data as $row){
            $response->results[] = array(
                'id' => $row->id.'|'.$row->vendor_name, 
                'text' => $row->vendor_name
            );
        }

        return response()->json($response);

    }

    // public function ambilDataTid(Request $request) {

    //     $search = $request->search;
    //     if($search == ''){
    //         $data = ::orderby('vendor_name','asc')
    //                                 ->select('id','vendor_name')
    //                                 ->where('is_deleted',0)
    //                                 ->limit(5)
    //                                 ->get();
    //     } else {
    //         $data = MasterVendor::orderby('vendor_name','asc')
    //                                 ->select('id','vendor_name')
    //                                 ->where('vendor_name','like','%'.$search.'%')
    //                                 ->where('is_deleted',0)
    //                                 ->limit(5)
    //                                 ->get();
    //     }

    //     $response = (object)array("results"=>[]);
    //     foreach($data as $row){
    //         $response->results[] = array(
    //             'id' => $row->id.'|'.$row->vendor_name, 
    //             'text' => $row->vendor_name
    //         );
    //     }

    //     return response()->json($response);

    // }
    
}