<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterKodePos extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
	protected $table = 'tb_master_kode_pos';
	protected $fillable = [
		'kode_pos',
        'provinsi',
        'kota',
        'kecamatan',
        'created_at',
        'updated_at',
        'effective_date',
        'expire_date',
        'is_deleted',	
        'remarks'
	];
    // public $timestamps = false;

}