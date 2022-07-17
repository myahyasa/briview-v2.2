<?php

namespace App\Http\Controllers;

use App\Models\MasterVendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class MasterVendorController extends Controller
{
    public function getData() {

        $vendorData = MasterVendor::where('is_deleted',0)->get();

        return datatables::of($vendorData)->toJson();

    }

    public function index() {

        return view('master_vendor.index');

    }

    public function create() {

        $max_vendor_id = DB::select("select max(vendor_id) as max_vendor_id from tb_master_vendor where is_deleted = 0");

        return view('master_vendor.create', compact('max_vendor_id'));

    }

    public function post(Request $request) {

        $validatedData = $request->validate([

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

        MasterVendor::insert([

            'vendor_id' => $request->vendor_id,
            'vendor_name' => $request->vendor_name,
            'service' => $request->service,
            'effective_date' => $request->effective_date,

        ]);

        return redirect()->route('masterVendor.index')->with('success', 'Master vendor berhasil dibuat.');

    }

    public function edit($id) {

        $masterVendor_edit = MasterVendor::where('id',$id)->first();

        return view('master_vendor.edit', compact('masterVendor_edit'));

    }

    public function update(Request $request, $id) {

        $validatedData = $request->validate(
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

        $expire_date = date("Y-m-d");
        MasterVendor::where('id',$id)
                        ->update([
                            'is_deleted' => 1,
                            'expire_date' => $expire_date,
                            'remarks' => $request->remarks
                        ]);

        MasterVendor::insert([
            'vendor_id' => $request->vendor_id,
            'vendor_name' => $request->vendor_name,
            'service' => $request->service,
            'effective_date' => $request->effective_date,
            'remarks' => $request->remarks,
            'updated_at' => now(),
        ]);

        return redirect()->route('masterVendor.index')->with('success', 'Master vendor berhasil diupdate');

    }

    public function delete($id) {

        $expire_date = date("Y-m-d");
        MasterVendor::where('id',$id)
                        ->update([
                            'is_deleted'=>1,
                            'expire_date'=>$expire_date
                        ]);

        return redirect()->route('masterVendor.index')->with('success', 'Master vendor berhasil dihapus');

    }
    
}