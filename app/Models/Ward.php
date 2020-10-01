<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $table = 'ward';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'name',
    	'type',
    	'orders',
    ];
}
