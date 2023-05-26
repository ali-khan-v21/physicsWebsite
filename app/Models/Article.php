<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Image;
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
    protected $fillable=['text_fa',"title_fa","title_en","text_en","category_id"];
    use SoftDeletes;

    public function getUpdatedAtAttribute($value)
    {
        $dt = Carbon::parse($value);
        return $dt->diffForHumans();
    }

    public function writer(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class,'article_id','id');
    }
    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }


}
