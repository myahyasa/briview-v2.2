<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterUker extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
	protected $table = 'tb_master_uker';
	protected $fillable = [
		'branchcode_uker',
        'uker',
        'jenis_uker',
        'created_at',
        'updated_at',
        'effective_date',
        'expire_date',
        'is_deleted',	
        'remarks'
	];
    // public $timestamps = false;

}