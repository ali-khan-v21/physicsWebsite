<?php

namespace App\Models;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;
    protected $fillable=[
        'tag_key','category_id','name_fa','desc_fa','name_en','desc_en',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function articles(){
        return $this->belongsToMany(Article::class);
    }
}
