<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class PriceTypePost extends Model

{
    protected $table = 'price_type_post';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'price',
        'status',
    ];
}
