<?php

namespace App\Models;
use App\Models\News;
use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'tag';
    protected $fillable =['slug','created_at','updated_at','tag'];
    public function News()
    {
        return $this->belongsToMany(News::class);
    }


}
?>
