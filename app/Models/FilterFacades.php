<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilterFacades extends Model
{
    protected $table = 'filter_facades';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'name',
    	'min',
    	'max',
    ];
}
