<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable=[
        'category_key','name_fa','desc_fa','name_en','desc_en','navbar'
    ];
    public function articles(){
        return $this->hasMany(Article::class);
    }
    public function tags(){
        return $this->hasMany(Tag::class);
    }
}
