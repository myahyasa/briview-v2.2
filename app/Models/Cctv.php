<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cctv extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
	protected $table = 'tb_cctv';
	protected $fillable = [
        'tb_master_vendor_id',
        'brand',
        'sn_cctv',
        'type',
        'no_spk',
        'project_name',
        'year',
        'created_at',
        'updated_at',
        'effective_date',
        'expire_date',
        'is_deleted',	
        'remarks'
	];
    // public $timestamps = false;

}