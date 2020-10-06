<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'product_id',
    	'cate_id',
    	'title',
    	'slug',
    	'view',
    	'tags',
    	'price_id',
    	'datetime_start',
    	'datetime_end',
    	'contact_id',
    	'status',
    	'requirement',
    	'province_id',
    	'district_id',
    	'ward_id',
    ];
}
