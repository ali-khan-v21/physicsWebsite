<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable=[
        'name','email','body','article_id','status','writer_status','parent_id'
    ];

    public function article(){
        return $this->belongsTo(Article::class,'article_id','id');
    }
    public function getCreatedAtAttribute($value)
    {
        $dt=Carbon::parse($value);
        return $dt->diffForHumans();
    }
}
