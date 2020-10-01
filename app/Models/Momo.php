<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Momo extends Model
{
    protected $table = 'momo';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'name_momo',
    	'phone',
    	'total_cash',
    	'status',
    ];
}
