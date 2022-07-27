<?php

namespace App\Http\Controllers;

use App\Models\Ups;
use App\Models\MasterVendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class UpsController extends Controller
{
    public function getData() {

        $upsData = Ups::leftJoin('tb_master_vendor', 'tb_master_vendor.id', '=', 'tb_ups.tb_master_vendor_id')
                                    ->select('*', 'tb_ups.id as ups_id')
                                    ->where('tb_ups.is_deleted',0)
                                    ->where('tb_master_vendor.is_deleted',0)
                                    ->get();

        return datatables::of($upsData)->toJson();

    }

    public function index() {

        return view('ups.index');

    }

    public function create() {

        return view('ups.create');

    }

    public function post(Request $request) {

        $validatedData = $request->validate([

                'vendor_name' => 'required',
                'brand' => 'required',
                'sn_ups' => 'required',
                'type' => 'required',
                'no_spk' => 'required',
                'project_name' => 'required',
                'year' => 'required',
                'effective_date' => 'required',

            ],
            [
                'vendor_name.required' => 'Nama vendor harus diisi',
                'brand.required' => 'Brand harus diisi',
                'sn_ups.required' => 'Sn ups harus diisi',
                'type.required' => 'Type harus diisi',
                'no_spk.required' => 'No spk harus diisi',
                'project_name.required' => 'Nama projek harus diisi',
                'year.required' => 'Tahun harus diisi',
                'effective_date.required' => 'Effective date harus diisi',
            ],
    
        );

        Ups::insert([

            'tb_master_vendor_id' => explode('|', $request->vendor_name)[0],
            'brand' => $request->brand,
            'sn_ups' => $request->sn_ups,
            'type' => $request->type,
            'no_spk' => $request->no_spk,
            'project_name' => $request->project_name,
            'year' => $request->year,
            'effective_date' => $request->effective_date,

        ]);

        return redirect()->route('ups.index')->with('success', 'Ups berhasil dibuat.');

    }

    public function edit($id) {

        $ups_edit = Ups::join('tb_master_vendor', 'tb_master_vendor.id', '=', 'tb_ups.tb_master_vendor_id')
                                    ->select('*', 'tb_ups.id as ups_id')
                                    ->where('tb_ups.id',$id)
                                    ->where('tb_ups.is_deleted',0)
                                    ->where('tb_master_vendor.is_deleted',0)
                                    ->first();

        return view('ups.edit', compact('ups_edit'));

    }

    public function update(Request $request, $id) {

        $validatedData = $request->validate(
            [

                'vendor_name' => 'required',
                'brand' => 'required',
                'sn_ups' => 'required',
                'type' => 'required',
                'no_spk' => 'required',
                'project_name' => 'required',
                'year' => 'required',
                'effective_date' => 'required',
                'remarks' => 'required',

            ],
            [
                'vendor_name.required' => 'Nama vendor harus diisi',
                'brand.required' => 'Brand harus diisi',
                'sn_ups.required' => 'Sn ups harus diisi',
                'type.required' => 'Type harus diisi',
                'no_spk.required' => 'No spk harus diisi',
                'project_name.required' => 'Nama projek harus diisi',
                'year.required' => 'Tahun harus diisi',
                'effective_date.required' => 'Effective date harus diisi',
                'remarks.required' => 'Remarks harus diisi',
            ],

        );

        $expire_date = date("Y-m-d");
        Ups::where('id',$id)
                        ->update([
                            'is_deleted' => 1,
                            'expire_date' => $expire_date,
                            'remarks' => $request->remarks
                        ]);

        Ups::insert([
            'tb_master_vendor_id' => explode('|', $request->vendor_name)[0],
            'brand' => $request->brand,
            'sn_ups' => $request->sn_ups,
            'type' => $request->type,
            'no_spk' => $request->no_spk,
            'project_name' => $request->project_name,
            'year' => $request->year,
            'effective_date' => $request->effective_date,
            'remarks' => $request->remarks,
            'updated_at' => now(),
        ]);

        return redirect()->route('ups.index')->with('success', 'Ups berhasil diupdate');

    }

    public function delete($id) {

        $expire_date = date("Y-m-d");
        Ups::where('id',$id)
                        ->update([
                            'is_deleted'=>1,
                            'expire_date'=>$expire_date
                        ]);

        return redirect()->route('ups.index')->with('success', 'Ups berhasil dihapus');

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
    
}