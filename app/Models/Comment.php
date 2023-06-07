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
        'name','email','body','article_id','status','writer_status',
        'parent_id','replied_to',"article_writer_id"
    ];
    protected static function boot(){
        parent::boot();

        static::addGlobalScope('status',function($query){
            // dd($query);
            $query->where('status',1);
        });

    }

    public function article(){
        return $this->belongsTo(Article::class,'article_id','id')->withTrashed()->withoutGlobalScope('order');
    }
    public function article_writer(){
        return $this->belongsTo(User::class,'article_writer_id','id');
    }
    public function getCreatedAtAttribute($value)
    {
        $dt=Carbon::parse($value);
        return $dt->diffForHumans();
    }
    public function replies(){
        return $this->hasMany(Comment::class,'parent_id');
    }
    public function role(){
        return $this->belongsTo(Role::class,"writer_status","role_value");
    }
}
