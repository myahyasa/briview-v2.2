<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TidAllocation extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
	protected $table = 'tb_tid_allocation';
	protected $fillable = [
        'tb_machine_info_id',
        'tid',
        'tb_master_lokasi_crm_id',
        'tb_cctv_id',
        'tb_nvr_id',
        'tb_ups_id',
        'tb_digital_signage_id',
        'created_at',
        'updated_at',
        'effective_date',
        'expire_date',
        'is_deleted',	
        'remarks',
        'proses_relokasi'
	];
    // public $timestamps = false;

}