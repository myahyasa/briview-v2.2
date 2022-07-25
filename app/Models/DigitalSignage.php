<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DigitalSignage extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
	protected $table = 'tb_digital_signage';
	protected $fillable = [
        'tb_master_vendor_id',
        'brand',
        'sn_digital_signage',
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