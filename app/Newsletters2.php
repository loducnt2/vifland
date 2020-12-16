<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletters2 extends Model
{
    protected $table='newsletters';
    protected $primaryKey = 'id';
    protected $fillable = [
        'email','created_at','updated_at','ID_City','IP_Location'];
}
