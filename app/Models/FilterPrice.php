<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilterPrice extends Model
{
    protected $table = 'filter_price';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'name',
    	'min',
    	'max',
    ];
}
