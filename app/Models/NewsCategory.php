<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class NewsCategory extends Model
{
    protected $table = 'news_category';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'title',
    	'slug',
        'status',

    ];
    public function News()
    {
        return $this->hasMany(News::class);
    }
}
?>
