<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    protected $fillable=['user_id','birthday','firstname_fa','lastname_fa','firstname_en','lastname_en'];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }
}
