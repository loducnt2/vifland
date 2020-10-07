<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImg extends Model
{
    protected $table = 'product_image';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'product_extend_id',
    	'name',
    ];
}
