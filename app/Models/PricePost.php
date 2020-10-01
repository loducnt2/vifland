<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PricePost extends Model
{
    protected $table = 'price_post';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'name',
    	'price',
    ];
}
