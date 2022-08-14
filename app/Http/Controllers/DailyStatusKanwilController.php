<?php

namespace App\Http\Controllers;

use App\Models\MasterKodePos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use GuzzleHttp\Client;

class DailyStatusKanwilController extends Controller
{
    
    public function index() {

        $client = new  Client();

        $response = $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
            
            'form_params' => [
                'comment' => 'get-dsk-index-table',
                
            ],
            
        ]);

        $master_dskIndex_data = json_decode($response->getBody())->result;

        $response1 = $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
            
            'form_params' => [
                'comment' => 'get-dsk-index-sum',
                
            ],
            
        ]);

        $dskIndex_sum = json_decode($response1->getBody())->result->data;

        return view('daily_status_kanwil.index', compact('master_dskIndex_data','dskIndex_sum'));

    }

    public function dskIndexDetail($branchcodeKanwil, $problem) {

        $client = new  Client();

        
        $response = $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
            
            'form_params' => [
                'comment' => 'get-dsk-index-detail',
                'branchcode_kanwil' => $branchcodeKanwil,
                
            ],
            
        ]);

        $detailTiketIndex = json_decode($response->getBody())->result->data;
        // dd($branchcodeKanwil);

        return view('daily_status_kanwil.detail_tiket_dsk', compact('detailTiketIndex','problem'));

    }
    

    
    
}