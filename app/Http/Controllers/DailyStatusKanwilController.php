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

    public function dskIndexDetail($branchcodeKanwil, $problem, $tiketType) {

        $client = new  Client();

        
        $response = $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
            
            'form_params' => [
                'comment' => 'get-dsk-index-detail',
                'branchcode_kanwil' => $branchcodeKanwil,
                
            ],
            
        ]);

        $detailTiketIndex = json_decode($response->getBody())->result->data;
        
        // edit data aging  
        for ($i=0; $i < sizeof($detailTiketIndex) ; $i++) { 
            $sla = $detailTiketIndex[$i]->aging;
            $hours = floor($sla / 60).' jam'.' : '.($sla - floor($sla / 60) * 60).' menit';
            $detailTiketIndex[$i]->aging = $hours;
        }
        

        return view('daily_status_kanwil.detail_tiket_dsk', compact('detailTiketIndex','problem', 'tiketType'));

    }

    public function dskByKc($branchcodeKanwil) {

        $client = new  Client();

        
        $response = $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
            
            'form_params' => [
                'comment' => 'get-dsk-by-kc',
                'branchcode_kanwil' => $branchcodeKanwil,
                
            ],
            
        ]);

        $dskByKc = json_decode($response->getBody())->result->data;
            
        return view('daily_status_kanwil.dsk_by_kc', compact('dskByKc'));

    }

    public function dskIndexDetailSum($problem, $tiketType) {

        $client = new  Client();

        
        $response = $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
            
            'form_params' => [
                'comment' => 'get-dsk-index-detail-sum',
                
            ],
            
        ]);

        $dskIndexDetailSum = json_decode($response->getBody())->result->data;

         // edit data aging  
        for ($i=0; $i < sizeof($dskIndexDetailSum) ; $i++) { 
            $sla = $dskIndexDetailSum[$i]->aging;
            $hours = floor($sla / 60).' jam'.' : '.($sla - floor($sla / 60) * 60).' menit';
            $dskIndexDetailSum[$i]->aging = $hours;
        }
            
        return view('daily_status_kanwil.dsk_index_detail_sum', compact('dskIndexDetailSum', 'problem', 'tiketType'));

    }

    public function dskByTid($branchcodeKc) {

        $client = new  Client();

        
        $response = $client->request('POST', 'http://localhost:3232/api/briview-endpoint', [
            
            'form_params' => [
                'comment' => 'get-dsk-by-tid',
                'branchcode_kc' => $branchcodeKc,
                
            ],
            
        ]);

        $dskByTid = json_decode($response->getBody())->result->data;

        return view('daily_status_kanwil.dsk_by_tid', compact('dskByTid'));

    }
    

    
    
}