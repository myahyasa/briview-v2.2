<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CroAllocation extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
	protected $table = 'tb_cro_allocation';
	protected $fillable = [
        'tb_tid_allocation_id',
        'tb_master_vendor_id',
        'no_spk',
        'year',
        'project_name',
        'created_at',
        'updated_at',
        'effective_date',
        'expire_date',
        'is_deleted',	
        'remarks'
	];
    // public $timestamps = false;

}