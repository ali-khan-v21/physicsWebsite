<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable=[
        'name','email','body'
    ];

    public function article(){
        return $this->belongsTo(Article::class,'article_id','id');
    }
}
