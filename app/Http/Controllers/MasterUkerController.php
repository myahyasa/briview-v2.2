<?php

namespace App\Http\Controllers;

use App\Models\MasterKcSupervisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class MasterKcSupervisiController extends Controller
{
    public function getData() {

        $kcData = MasterKcSupervisi::where('is_deleted',0)->get();

        return datatables::of($kcData)->toJson();

    }

    public function index() {

        return view('master_kc_supervisi.index');

    }

    public function create() {

        return view('master_kc_supervisi.create');

    }

    public function post(Request $request) {

        $validatedData = $request->validate([

                'branchcode_kc_supervisi' => 'required',
                'kc_supervisi' => 'required',
                'effective_date' => 'required',

            ],
            [
                'branchcode_kc_supervisi.required' => 'Branchcode kc supervisi harus diisi',
                'kc_supervisi.required' => 'kc supervisi harus diisi',
                'effective_date.required' => 'Effective date harus diisi',
            ],
    
        );

        MasterKcSupervisi::insert([

            'branchcode_kc_supervisi' => $request->branchcode_kc_supervisi,
            'kc_supervisi' => $request->kc_supervisi,
            'effective_date' => $request->effective_date,

        ]);

        return redirect()->route('masterKcSupervisi.index')->with('success', 'Master kc supervisi berhasil dibuat.');

    }

    public function edit($id) {

        $masterKanwil_edit = MasterKcSupervisi::where('id',$id)->first();

        return view('master_kc_supervisi.edit', compact('masterKcSupervisi_edit'));

    }

    public function update(Request $request, $id) {

        $validatedData = $request->validate(
            [

                'branchcode_kc_supervisi' => 'required',
                'kc_supervisi' => 'required',
                'effective_date' => 'required',
                'remarks' => 'required',

            ],
            [
                'branchcode_kc_supervisi.required' => 'Branchcode kc supervisi harus diisi',
                'kc_supervisi.required' => 'Kc supervisi harus diisi',
                'effective_date.required' => 'Effective date harus diisi',
                'remarks.required' => 'Remarks harus diisi',
            ],

        );

        $expire_date = date("Y-m-d");
        MasterKcSupervisi::where('id',$id)
                        ->update([
                            'is_deleted' => 1,
                            'expire_date' => $expire_date,
                            'remarks' => $request->remarks
                        ]);

        MasterKcSupervisi::insert([
            'branchcode_kc_supervisi' => $request->branchcode_kc_supervisi,
            'kc_supervisi' => $request->kc_supervisi,
            'effective_date' => $request->effective_date,
            'remarks' => $request->remarks,
            'updated_at' => now(),
        ]);

        return redirect()->route('masterKcSupervisi.index')->with('success', 'Master kc supervisi berhasil diupdate');

    }

    public function delete($id) {

        $expire_date = date("Y-m-d");
        MasterKcSupervisi::where('id',$id)
                        ->update([
                            'is_deleted'=>1,
                            'expire_date'=>$expire_date
                        ]);

        return redirect()->route('masterKcSupervisi.index')->with('success', 'Master kc supervisi berhasil dihapus');

    }
    
}