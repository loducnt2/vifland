<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeProduct extends Model
{
    protected $table = 'type_of_product';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'product_extend_id',
    	'product_cate_id',
    ];
}
