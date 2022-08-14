<?php

namespace App\Http\Controllers;

use App\Models\MasterKodePos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class MasterKodePosController extends Controller
{
    public function getData() {

        $kodePosData = MasterKodePos::where('is_deleted',0)->get();

        return datatables::of($kodePosData)->toJson();

    }

    public function index() {

        return view('master_kode_pos.index');

    }

    public function create() {

        return view('master_kode_pos.create');

    }

    public function post(Request $request) {

        $validatedData = $request->validate([

                'kode_pos' => 'required',
                'provinsi' => 'required',
                'kota' => 'required',
                'kecamatan' => 'required',
                'effective_date' => 'required',

            ],
            [
                'kode_pos.required' => 'Kode pos harus diisi',
                'provinsi.required' => 'Provinsi harus diisi',
                'kota.required' => 'Kota harus diisi',
                'kecamatan.required' => 'Kecamatan harus diisi',
                'effective_date.required' => 'Effective date harus diisi',
            ],
    
        );

        MasterKodePos::insert([

            'kode_pos' => $request->kode_pos,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'effective_date' => $request->effective_date,

        ]);

        return redirect()->route('masterKodePos.index')->with('success', 'Master kode pos berhasil dibuat.');

    }

    public function edit($id) {

        $masterKodePos_edit = MasterKodePos::where('id',$id)->first();

        return view('master_kode_pos.edit', compact('masterKodePos_edit'));

    }

    public function update(Request $request, $id) {

        $validatedData = $request->validate(
            [

                'kode_pos' => 'required',
                'provinsi' => 'required',
                'kota' => 'required',
                'kecamatan' => 'required',
                'effective_date' => 'required',
                'remarks' => 'required',

            ],
            [
                'kode_pos.required' => 'Kode pos harus diisi',
                'provinsi.required' => 'Provinsi harus diisi',
                'kota.required' => 'Kota harus diisi',
                'kecamatan.required' => 'Kecamatan harus diisi',
                'effective_date.required' => 'Effective date harus diisi',
                'remarks.required' => 'Remarks harus diisi',
            ],

        );

        $expire_date = date("Y-m-d");
        MasterKodePos::where('id',$id)
                        ->update([
                            'is_deleted' => 1,
                            'expire_date' => $expire_date,
                            'remarks' => $request->remarks
                        ]);

        MasterKodePos::insert([
            'kode_pos' => $request->kode_pos,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'effective_date' => $request->effective_date,
            'remarks' => $request->remarks,
            'updated_at' => now(),
        ]);

        return redirect()->route('masterKodePos.index')->with('success', 'Master kode pos berhasil diupdate');

    }

    public function delete($id) {

        $expire_date = date("Y-m-d");
        MasterKodePos::where('id',$id)
                        ->update([
                            'is_deleted'=>1,
                            'expire_date'=>$expire_date
                        ]);

        return redirect()->route('masterKodePos.index')->with('success', 'Master kode pos berhasil dihapus');

    }
    
}