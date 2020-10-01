<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfoWeb extends Model
{
    protected $table = 'info_web';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'phone',
    	'address',
    	'email',
    	'website',
    	'facebook',
    	'zalo',
    	'status',
    ];
}
