<?php

namespace App\Http\Controllers;

use App\Models\MasterKanwil;
use App\Models\MasterKcSupervisi;
use App\Models\MasterLokasiCrm;
use App\Models\MasterUker;
use App\Models\MasterKodePos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class MasterLokasiCrmController extends Controller
{
    public function getData() {

        $masterLokasiCrmData = MasterLokasiCrm::leftJoin('tb_master_kanwil', 'tb_master_kanwil.id', '=', 'tb_master_lokasi_crm.tb_master_kanwil_id')
                                    ->leftJoin('tb_master_kc_supervisi', 'tb_master_kc_supervisi.id', '=', 'tb_master_lokasi_crm.tb_master_kc_supervisi_id')
                                    ->leftJoin('tb_master_uker', 'tb_master_uker.id', '=', 'tb_master_lokasi_crm.tb_master_uker_id')
                                    ->leftJoin('tb_master_kode_pos', 'tb_master_kode_pos.id', '=', 'tb_master_lokasi_crm.tb_master_kode_pos_id')
                                    ->select('*', 'tb_master_lokasi_crm.id as master_lokasi_crm_id')
                                    ->where('tb_master_lokasi_crm.is_deleted',0)
                                    ->where('tb_master_kanwil.is_deleted',0)
                                    ->where('tb_master_kc_supervisi.is_deleted',0)
                                    ->where('tb_master_uker.is_deleted',0)
                                    // ->where('tb_master_kode_pos.is_deleted',0)
                                    ->get();

        return datatables::of($masterLokasiCrmData)->toJson();

    }

    public function index() {

        return view('master_lokasi_crm.index');

    }

    public function create() {

        return view('master_lokasi_crm.create');

    }

    public function post(Request $request) {

        $validatedData = $request->validate([

                'location_id' => 'required',
                'kanwil' => 'required',
                'kc_supervisi' => 'required',
                'uker' => 'required',
                'alamat' => 'required',
                'longitude' => 'required',
                'latitude' => 'required',
                'effective_date' => 'required',

            ],
            [
                'location_id.required' => 'Location id harus diisi',
                'kanwil.required' => 'Kanwil harus diisi',
                'kc_supervisi.required' => 'Kc supervisi harus diisi',
                'uker.required' => 'Uker harus diisi',
                'alamat.required' => 'Alamat harus diisi',
                'longitude.required' => 'Longitude harus diisi',
                'latitude.required' => 'Latitude harus diisi',
                'effective_date.required' => 'Effective date harus diisi',
            ],
    
        );

        MasterLokasiCrm::insert([

            'location_id' => $request->kanwil.$request->kc_supervisi.$request->uker,
            'tb_master_kanwil_id' => explode('|', $request->kanwil)[0],
            'tb_master_kc_supervisi_id' => explode('|', $request->kc_supervisi)[0],
            'tb_master_uker_id' => explode('|', $request->uker)[0],
            'alamat' => $request->alamat,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'location_category' => $request->location_category,
            'tb_master_kode_pos_id' => explode('|', $request->kode_pos)[0],
            'status_kepemilikan' => $request->status_kepemilikan,
            'location_category_group' => $request->location_category_group,
            'detail_lokasi' => $request->detail_lokasi,
            'detail_location_group' => $request->detail_location_group,
            'jenis_detail_lokasi' => $request->jenis_detail_lokasi,
            'detail_lokasi_longitude' => $request->detail_lokasi_longitude,
            'detail_lokasi_latitude' => $request->detail_lokasi_latitude,
            'jam_operasional' => $request->jam_operasional,
            'namepic_nohp' => $request->namepic_nohp,
            'effective_date' => $request->effective_date,

        ]);

        return redirect()->route('masterLokasiCrm.index')->with('success', 'Master lokasi crm berhasil dibuat.');

    }

    public function edit($id) {

        $masterLokasiCrm_edit = MasterLokasiCrm::leftJoin('tb_master_kanwil', 'tb_master_kanwil.id', '=', 'tb_master_lokasi_crm.tb_master_kanwil_id')
                                    ->leftJoin('tb_master_kc_supervisi', 'tb_master_kc_supervisi.id', '=', 'tb_master_lokasi_crm.tb_master_kc_supervisi_id')
                                    ->leftJoin('tb_master_uker', 'tb_master_uker.id', '=', 'tb_master_lokasi_crm.tb_master_uker_id')
                                    ->leftJoin('tb_master_kode_pos', 'tb_master_kode_pos.id', '=', 'tb_master_lokasi_crm.tb_master_kode_pos_id')
                                    ->select('*', 'tb_master_lokasi_crm.id as master_lokasi_crm_id')
                                    ->where('tb_master_lokasi_crm.is_deleted',0)
                                    ->where('tb_master_kanwil.is_deleted',0)
                                    ->where('tb_master_kc_supervisi.is_deleted',0)
                                    ->where('tb_master_uker.is_deleted',0)
                                    // ->where('tb_master_kode_pos.is_deleted',0)
                                    ->where('tb_master_lokasi_crm.id',$id)
                                    ->first();

        return view('master_lokasi_crm.edit', compact('masterLokasiCrm_edit'));

    }

    public function update(Request $request, $id) {

        $validatedData = $request->validate(
            [

                'location_id' => 'required',
                'kanwil' => 'required',
                'kc_supervisi' => 'required',
                'uker' => 'required',
                'alamat' => 'required',
                'longitude' => 'required',
                'latitude' => 'required',
                'effective_date' => 'required',
                'remarks' => 'required',

            ],
            [
                'location_id.required' => 'Location id harus diisi',
                'kanwil.required' => 'Kanwil harus diisi',
                'kc_supervisi.required' => 'Kc supervisi harus diisi',
                'uker.required' => 'Uker harus diisi',
                'alamat.required' => 'Alamat harus diisi',
                'longitude.required' => 'Longitude harus diisi',
                'latitude.required' => 'Latitude harus diisi',
                'effective_date.required' => 'Effective date harus diisi',
                'remarks.required' => 'Remarks harus diisi',
            ],

        );

        $expire_date = date("Y-m-d");
        MasterLokasiCrm::where('id',$id)
                        ->update([
                            'is_deleted' => 1,
                            'expire_date' => $expire_date,
                            'remarks' => $request->remarks
                        ]);

        MasterLokasiCrm::insert([
            'location_id' => $request->kanwil.$request->kc_supervisi.$request->uker,
            'tb_master_kanwil_id' => explode('|', $request->kanwil)[0],
            'tb_master_kc_supervisi_id' => explode('|', $request->kc_supervisi)[0],
            'tb_master_uker_id' => explode('|', $request->uker)[0],
            'alamat' => $request->alamat,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'location_category' => $request->location_category,
            'tb_master_kode_pos_id' => explode('|', $request->kode_pos)[0],
            'status_kepemilikan' => $request->status_kepemilikan,
            'location_category_group' => $request->location_category_group,
            'detail_lokasi' => $request->detail_lokasi,
            'detail_location_group' => $request->detail_location_group,
            'jenis_detail_lokasi' => $request->jenis_detail_lokasi,
            'detail_lokasi_longitude' => $request->detail_lokasi_longitude,
            'detail_lokasi_latitude' => $request->detail_lokasi_latitude,
            'jam_operasional' => $request->jam_operasional,
            'namepic_nohp' => $request->namepic_nohp,
            'effective_date' => $request->effective_date,
            'remarks' => $request->remarks,
            'updated_at' => now(),
        ]);

        return redirect()->route('masterLokasiCrm.index')->with('success', 'Master lokasi crm berhasil diupdate');

    }

    public function delete($id) {

        $expire_date = date("Y-m-d");
        MasterLokasiCrm::where('id',$id)
                        ->update([
                            'is_deleted'=>1,
                            'expire_date'=>$expire_date
                        ]);

        return redirect()->route('masterLokasiCrm.index')->with('success', 'Master lokasi crm berhasil dihapus');

    }

    public function ambilDataKanwil(Request $request) {

        $search = $request->search;
        if($search == ''){
            $data = MasterKanwil::orderby('kanwil','asc')
                                    ->select('id','kanwil')
                                    ->where('is_deleted',0)
                                    ->limit(5)
                                    ->get();
        } else {
            $data = MasterKanwil::orderby('kanwil','asc')
                                    ->select('id','kanwil')
                                    ->where('kanwil','like','%'.$search.'%')
                                    ->where('is_deleted',0)
                                    ->limit(5)
                                    ->get();
        }

        $response = (object)array("results"=>[]);
        foreach($data as $row){
            $response->results[] = array(
                'id' => $row->id.'|'.$row->kanwil, 
                'text' => $row->kanwil
            );
        }

        return response()->json($response);

    }

    public function ambilDataKcSupervisi(Request $request) {

        $search = $request->search;
        if($search == ''){
            $data = MasterKcSupervisi::orderby('kc_supervisi','asc')
                                    ->select('id','kc_supervisi')
                                    ->where('is_deleted',0)
                                    ->limit(5)
                                    ->get();
        } else {
            $data = MasterKcSupervisi::orderby('kc_supervisi','asc')
                                    ->select('id','kc_supervisi')
                                    ->where('kc_supervisi','like','%'.$search.'%')
                                    ->where('is_deleted',0)
                                    ->limit(5)
                                    ->get();
        }

        $response = (object)array("results"=>[]);
        foreach($data as $row){
            $response->results[] = array(
                'id' => $row->id.'|'.$row->kc_supervisi, 
                'text' => $row->kc_supervisi
            );
        }

        return response()->json($response);

    }

    public function ambilDataUker(Request $request) {

        $search = $request->search;
        if($search == ''){
            $data = MasterUker::orderby('uker','asc')
                                    ->select('id','uker')
                                    ->where('is_deleted',0)
                                    ->limit(5)
                                    ->get();
        } else {
            $data = MasterUker::orderby('uker','asc')
                                    ->select('id','uker')
                                    ->where('uker','like','%'.$search.'%')
                                    ->where('is_deleted',0)
                                    ->limit(5)
                                    ->get();
        }

        $response = (object)array("results"=>[]);
        foreach($data as $row){
            $response->results[] = array(
                'id' => $row->id.'|'.$row->uker, 
                'text' => $row->uker
            );
        }

        return response()->json($response);

    }

    public function ambilDataKodePos(Request $request) {

        $search = $request->search;
        if($search == ''){
            $data = MasterKodePos::orderby('kode_pos','asc')
                                    ->select('id','kode_pos', 'provinsi', 'kota', 'kecamatan')
                                    ->where('is_deleted',0)
                                    ->limit(5)
                                    ->get();
        } else {
            $data = MasterKodePos::orderby('kode_pos','asc')
                                    ->select('id','kode_pos', 'provinsi', 'kota', 'kecamatan')
                                    ->where('kode_pos','like','%'.$search.'%')
                                    ->where('is_deleted',0)
                                    ->limit(5)
                                    ->get();
        }

        $response = (object)array("results"=>[]);
        foreach($data as $row){
            $response->results[] = array(
                'id' => $row->id.'|'.'kode pos: '.$row->kode_pos.', '.'provinsi: '.$row->provinsi.', '.'kota: '.$row->kota.', '.'kecamatan: '.$row->kecamatan, 
                'text' => $row->kode_pos.'|'.$row->provinsi.'|'.$row->kota.'|'.$row->kecamatan
            );
        }

        return response()->json($response);

    }
    
}