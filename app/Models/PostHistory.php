<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostHistory extends Model
{
    protected $table = 'post_history';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'price_id',
    	'user_id',
    	'product_extend_id',
    	'datetime',
    	'status',
    ];
}
