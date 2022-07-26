<?php

namespace App\Http\Controllers;

use App\Models\DigitalSignage;
use App\Models\MasterVendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class DigitalSignageController extends Controller
{
    public function getData() {

        $digitalSignageData = DigitalSignage::leftJoin('tb_master_vendor', 'tb_master_vendor.id', '=', 'tb_digital_signage.tb_master_vendor_id')
                                    ->select('*', 'tb_digital_signage.id as digital_signage_id')
                                    ->where('tb_digital_signage.is_deleted',0)
                                    ->where('tb_master_vendor.is_deleted',0)
                                    ->get();

        return datatables::of($digitalSignageData)->toJson();

    }

    public function index() {

        return view('digital_signage.index');

    }

    public function create() {

        return view('digital_signage.create');

    }

    public function post(Request $request) {

        $validatedData = $request->validate([

                'vendor_name' => 'required',
                'brand' => 'required',
                'sn_digital_signage' => 'required',
                'type' => 'required',
                'no_spk' => 'required',
                'project_name' => 'required',
                'year' => 'required',
                'effective_date' => 'required',

            ],
            [
                'vendor_name.required' => 'Nama vendor harus diisi',
                'brand.required' => 'Brand harus diisi',
                'sn_digital_signage.required' => 'Sn digital signage harus diisi',
                'type.required' => 'Type harus diisi',
                'no_spk.required' => 'No spk harus diisi',
                'project_name.required' => 'Nama projek harus diisi',
                'year.required' => 'Tahun harus diisi',
                'effective_date.required' => 'Effective date harus diisi',
            ],
    
        );

        DigitalSignage::insert([

            'tb_master_vendor_id' => explode('|', $request->vendor_name)[0],
            'brand' => $request->brand,
            'sn_digital_signage' => $request->sn_digital_signage,
            'type' => $request->type,
            'no_spk' => $request->no_spk,
            'project_name' => $request->project_name,
            'year' => $request->year,
            'effective_date' => $request->effective_date,

        ]);

        return redirect()->route('digitalSignage.index')->with('success', 'Digital Signage berhasil dibuat.');

    }

    public function edit($id) {

        $digitalSignage_edit = DigitalSignage::join('tb_master_vendor', 'tb_master_vendor.id', '=', 'tb_digital_signage.tb_master_vendor_id')
                                    ->select('*', 'tb_digital_signage.id as digital_signage_id')
                                    ->where('tb_digital_signage.id',$id)->first();

        return view('digital_signage.edit', compact('digitalSignage_edit'));

    }

    public function update(Request $request, $id) {

        $validatedData = $request->validate(
            [

                'vendor_name' => 'required',
                'brand' => 'required',
                'sn_digital_signage' => 'required',
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
                'sn_digital_signage.required' => 'Sn digital signage harus diisi',
                'type.required' => 'Type harus diisi',
                'no_spk.required' => 'No spk harus diisi',
                'project_name.required' => 'Nama projek harus diisi',
                'year.required' => 'Tahun harus diisi',
                'effective_date.required' => 'Effective date harus diisi',
                'remarks.required' => 'Remarks harus diisi',
            ],

        );

        $expire_date = date("Y-m-d");
        DigitalSignage::where('id',$id)
                        ->update([
                            'is_deleted' => 1,
                            'expire_date' => $expire_date,
                            'remarks' => $request->remarks
                        ]);

        DigitalSignage::insert([
            'tb_master_vendor_id' => explode('|', $request->vendor_name)[0],
            'brand' => $request->brand,
            'sn_digital_signage' => $request->sn_digital_signage,
            'type' => $request->type,
            'no_spk' => $request->no_spk,
            'project_name' => $request->project_name,
            'year' => $request->year,
            'effective_date' => $request->effective_date,
            'remarks' => $request->remarks,
            'updated_at' => now(),
        ]);

        return redirect()->route('digitalSignage.index')->with('success', 'Digital signage berhasil diupdate');

    }

    public function delete($id) {

        $expire_date = date("Y-m-d");
        DigitalSignage::where('id',$id)
                        ->update([
                            'is_deleted'=>1,
                            'expire_date'=>$expire_date
                        ]);

        return redirect()->route('digitalSignage.index')->with('success', 'Digital signage berhasil dihapus');

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