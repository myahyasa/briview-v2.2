<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterLokasiCrm extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
	protected $table = 'tb_master_lokasi_crm';
	protected $fillable = [
        'location_id',
        'tb_master_kanwil_id',
        'tb_master_kc_supervisi_id',
        'tb_master_uker_id',
        'alamat',
        'longitude',
        'latitude',
        'location_category',
        'tb_master_kode_pos_id',
        'status_kepemilikan',
        'location_category_group',
        'detail_lokasi',
        'detail_location_group',
        'jenis_detail_lokasi',
        'detail_lokasi_longitude',
        'detail_lokasi_latitude',
        'jam_operasional',
        'namepic_nohp',
        'created_at',
        'updated_at',
        'effective_date',
        'expire_date',
        'is_deleted',	
        'remarks',
	];
    // public $timestamps = false;

}