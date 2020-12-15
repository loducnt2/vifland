<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'province';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'name',
    	'type',
    	'orders',
    ];
    public function newsletters()
{
    return $this->hasMany('App\Models\Newsletters2');
}
protected $searchable = [
    // 'email',
    'name'
];
 
public function product()
{
    return $this->belongsTo('App\Models\province');
}
}
