<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductExtend extends Model
{
    protected $table = 'product_extend';
    protected $primaryKey = 'id';
    protected $fillable = [
        'product_id',
    	'product_cate',
        'filter_price',
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
