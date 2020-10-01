<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'user_id',
    	'fullname',
    	'amount',
    	'phone',
    	'trade_code',
    	'datetime',
    	'type',
    	'status',
    ];
}
