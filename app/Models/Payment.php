<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'user_id',
    	'bank_code',
    	'bank_trans_no',
        'trade_code',
    	'amount',
    	'datetime',
    ];
}
