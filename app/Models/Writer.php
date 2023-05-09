<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Writer extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['firstname_fa','lastname_fa','firstname_en','lastname_en'];

    public function articles(){
        return $this->hasMany(Article::class);
    }
}
