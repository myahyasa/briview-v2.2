<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterKanwil extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
	protected $table = 'tb_master_kanwil';
	protected $fillable = [
		'branchcode_kanwil',
        'kanwil',
        'created_at',
        'updated_at',
        'effective_date',
        'expire_date',
        'is_deleted',	
        'remarks'
	];
    // public $timestamps = false;

}