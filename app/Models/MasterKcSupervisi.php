<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterKcSupervisi extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
	protected $table = 'tb_master_kc_supervisi';
	protected $fillable = [
		'branchcode_kc_supervisi',
        'kc_supervisi',
        'created_at',
        'updated_at',
        'effective_date',
        'expire_date',
        'is_deleted',	
        'remarks'
	];
    // public $timestamps = false;

}