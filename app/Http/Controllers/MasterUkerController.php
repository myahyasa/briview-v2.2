<?php

namespace App\Http\Controllers;

use App\Models\MasterUker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class MasterUkerController extends Controller
{
    public function getData() {

        $ukerData = MasterUker::where('is_deleted',0)->get();

        return datatables::of($ukerData)->toJson();

    }

    public function index() {

        return view('master_uker.index');

    }

    public function create() {

        return view('master_uker.create');

    }

    public function post(Request $request) {

        $validatedData = $request->validate([

                'branchcode_uker' => 'required',
                'uker' => 'required',
                'jenis_uker' => 'required',
                'effective_date' => 'required',

            ],
            [
                'branchcode_uker.required' => 'Branchcode uker harus diisi',
                'uker.required' => 'Uker harus diisi',
                'jenis_uker.required' => 'Jenis uker harus diisi',
                'effective_date.required' => 'Effective date harus diisi',
            ],
    
        );

        MasterUker::insert([

            'branchcode_uker' => $request->branchcode_uker,
            'uker' => $request->uker,
            'effective_date' => $request->effective_date,

        ]);

        return redirect()->route('masterUker.index')->with('success', 'Master uker berhasil dibuat.');

    }

    public function edit($id) {

        $masterUker_edit = MasterUker::where('id',$id)->first();

        return view('master_uker.edit', compact('masterUker_edit'));

    }

    public function update(Request $request, $id) {

        $validatedData = $request->validate(
            [

                'branchcode_uker' => 'required',
                'uker' => 'required',
                'jenis_uker' => 'required',
                'effective_date' => 'required',
                'remarks' => 'required',

            ],
            [
                'branchcode_uker.required' => 'Branchcode uker harus diisi',
                'uker.required' => 'Uker harus diisi',
                'jenis_uker.required' => 'Jenis uker harus diisi',
                'effective_date.required' => 'Effective date harus diisi',
                'remarks.required' => 'Remarks harus diisi',
            ],

        );

        $expire_date = date("Y-m-d");
        MasterUker::where('id',$id)
                        ->update([
                            'is_deleted' => 1,
                            'expire_date' => $expire_date,
                            'remarks' => $request->remarks
                        ]);

        MasterUker::insert([
            'branchcode_uker' => $request->branchcode_uker,
            'uekr' => $request->uekr,
            'effective_date' => $request->effective_date,
            'remarks' => $request->remarks,
            'updated_at' => now(),
        ]);

        return redirect()->route('masterUker.index')->with('success', 'Master uker berhasil diupdate');

    }

    public function delete($id) {

        $expire_date = date("Y-m-d");
        MasterUker::where('id',$id)
                        ->update([
                            'is_deleted'=>1,
                            'expire_date'=>$expire_date
                        ]);

        return redirect()->route('masterUker.index')->with('success', 'Master uker berhasil dihapus');

    }
    
}