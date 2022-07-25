<?php

namespace App\Http\Controllers;

use App\Models\MasterKanwil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class MasterKanwilController extends Controller
{
    public function getData() {

        $kanwilData = MasterKanwil::where('is_deleted',0)->get();

        return datatables::of($kanwilData)->toJson();

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

        MasterKanwil::insert([

            'branchcode_kanwil' => $request->branchcode_kanwil,
            'kanwil' => $request->kanwil,
            'effective_date' => $request->effective_date,

        ]);

        return redirect()->route('masterKanwil.index')->with('success', 'Master kanwil berhasil dibuat.');

    }

    public function edit($id) {

        $masterKanwil_edit = MasterKanwil::where('id',$id)->first();

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

        $expire_date = date("Y-m-d");
        MasterKanwil::where('id',$id)
                        ->update([
                            'is_deleted' => 1,
                            'expire_date' => $expire_date,
                            'remarks' => $request->remarks
                        ]);

        MasterKanwil::insert([
            'branchcode_kanwil' => $request->branchcode_kanwil,
            'kanwil' => $request->kanwil,
            'effective_date' => $request->effective_date,
            'remarks' => $request->remarks,
            'updated_at' => now(),
        ]);

        return redirect()->route('masterKanwil.index')->with('success', 'Master kanwil berhasil diupdate');

    }

    public function delete($id) {

        $expire_date = date("Y-m-d");
        MasterKanwil::where('id',$id)
                        ->update([
                            'is_deleted'=>1,
                            'expire_date'=>$expire_date
                        ]);

        return redirect()->route('masterKanwil.index')->with('success', 'Master kanwil berhasil dihapus');

    }
    
}