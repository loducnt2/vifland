<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'district';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'name',
    	'type',
    	'province_id ',
    	'orders',
    ];
}
