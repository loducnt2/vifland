<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorited extends Model
{
    protected $table = 'favorited';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'user_id',
    	'product_extend_id',
    	'status',
    	'type',
    ];
}
