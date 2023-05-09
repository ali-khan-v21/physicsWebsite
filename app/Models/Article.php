<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Writer;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;
    protected $table ='articles';
    protected $fillable=['text_fa',"title_fa","title_en","text_en","category_id",'image_url'];
    use SoftDeletes;

    public function getUpdatedAtAttribute($value)
    {
        $dt = Carbon::parse($value);
        return $dt->diffForHumans();
    }

    public function writer(){
        return $this->belongsTo(Writer::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function comments(){
        $this->hasMany(Comment::class,'article_id','id');
    }


}
