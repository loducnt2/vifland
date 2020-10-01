<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'product_cate',
    	'address',
    	'facades',
    	'depth',
    	'width',
    	'length',
    	'width',
    	'length',
    	'floors',
    	'bedroom',
    	'price',
    	'unit_id',
    	'legal',
    	'description',
    ];
}
