<?php

namespace App\Http\Controllers;

use App\Models\MachineInfo;
use App\Models\MasterVendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class MachineInfoController extends Controller
{
    public function getData() {

        $machineInfoData = MachineInfo::join('tb_master_vendor', 'tb_master_vendor.id', '=', 'tb_machine_info.tb_master_vendor_id')
                                    ->where('tb_machine_info.is_deleted',0)->get();

        return datatables::of($machineInfoData)->toJson();

    }

    public function index() {

        return view('machine_info.index');

    }

    public function create() {

        return view('machine_info.create');

    }

    public function post(Request $request) {

        $validatedData = $request->validate([

                'brand' => 'required',
                'vendor_name' => 'required',
                'sn_machine' => 'required',
                'type' => 'required',
                'no_spk' => 'required',
                'project_name' => 'required',
                'year' => 'required',
                'effective_date' => 'required',

            ],
            [
                'brand.required' => 'Brand harus diisi',
                'vendor_name.required' => 'Nama vendor harus diisi',
                'sn_machine.required' => 'SN mesin harus diisi',
                'type.required' => 'Tipe harus diisi',
                'no_spk.required' => 'No spk harus diisi',
                'project_name.required' => 'Nama projek harus diisi',
                'year.required' => 'Tahun harus diisi',
                'effective_date.required' => 'Effective date harus diisi',
            ],
    
        );

        MachineInfo::insert([

            'brand' => $request->brand,
            'tb_master_vendor_id' => explode('|', $request->vendor_name)[0],
            'sn_machine' => $request->sn_machine,
            'type' => $request->type,
            'no_spk' => $request->no_spk,
            'project_name' => $request->project_name,
            'year' => $request->year,
            'effective_date' => $request->effective_date,

        ]);

        return redirect()->route('machineInfo.index')->with('success', 'Machine info berhasil dibuat.');

    }

    public function edit($id) {

        $machineInfo_edit = MachineInfo::join('tb_master_vendor', 'tb_master_vendor.id', '=', 'tb_machine_info.tb_master_vendor_id')
                                    ->where('tb_machine_info.id',$id)->first();

        return view('machine_info.edit', compact('machineInfo_edit'));

    }

    public function update(Request $request, $id) {

        $validatedData = $request->validate(
            [

                'brand' => 'required',
                'vendor_name' => 'required',
                'sn_machine' => 'required',
                'type' => 'required',
                'no_spk' => 'required',
                'project_name' => 'required',
                'year' => 'required',
                'effective_date' => 'required',
                'remarks' => 'required',

            ],
            [
                'brand.required' => 'Brand harus diisi',
                'vendor_name.required' => 'Nama vendor harus diisi',
                'sn_machine.required' => 'SN mesin harus diisi',
                'type.required' => 'Tipe harus diisi',
                'no_spk.required' => 'No spk harus diisi',
                'project_name.required' => 'Nama projek harus diisi',
                'year.required' => 'Tahun harus diisi',
                'effective_date.required' => 'Effective date harus diisi',
                'remarks.required' => 'Remarks harus diisi',
            ],

        );

        $expire_date = date("Y-m-d");
        MachineInfo::where('id',$id)
                        ->update([
                            'is_deleted' => 1,
                            'expire_date' => $expire_date,
                            'remarks' => $request->remarks
                        ]);

        MachineInfo::insert([
            'brand' => $request->brand,
            'tb_master_vendor_id' => explode('|', $request->vendor_name)[0],
            'sn_machine' => $request->sn_machine,
            'type' => $request->type,
            'no_spk' => $request->no_spk,
            'project_name' => $request->project_name,
            'year' => $request->year,
            'effective_date' => $request->effective_date,
            'remarks' => $request->remarks,
            'updated_at' => now(),
        ]);

        return redirect()->route('machineInfo.index')->with('success', 'Machine info berhasil diupdate');

    }

    public function delete($id) {

        $expire_date = date("Y-m-d");
        MachineInfo::where('id',$id)
                        ->update([
                            'is_deleted'=>1,
                            'expire_date'=>$expire_date
                        ]);

        return redirect()->route('machineInfo.index')->with('success', 'Machine info berhasil dihapus');

    }

    public function ambilDataVendor(Request $request) {

        $search = $request->search;
        if($search == ''){
            $data = MasterVendor::orderby('vendor_name','asc')
                                    ->select('id','vendor_name')
                                    ->limit(5)
                                    ->get();
        } else {
            $data = MasterVendor::orderby('vendor_name','asc')
                                    ->select('id','vendor_name')
                                    ->where('vendor_name','like','%'.$search.'%')
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