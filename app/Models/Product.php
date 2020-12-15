<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $fillable = [
        'price_post',
    	'cate_id',
    	'title',
        'thumbnail',
    	'slug',
    	'view',
    	'tags',
    	'price_id',
    	'datetime_start',
    	'datetime_end',
        'datetime_delete',
        'content',
        'name_contact',
        'phone_contact',
        'address_contact',
        'company_name',
        'website',
        'facebook',
        'email',
    	'status',
        'type',
    	'province_id',
    	'district_id',
    	'ward_id',
        'soft_delete',
    ];
 
}
