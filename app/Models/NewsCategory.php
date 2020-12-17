<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class NewsCategory extends Model
{
    protected $table = 'news_category';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'title',
    	'slug',
        'status',
        'category_name',
    ];
    public function News()
    {
        return $this->hasMany(News::class);
    }
}
?>
