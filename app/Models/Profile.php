<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['profile_image','birthday'];

    public function user(){
        $this->belongsTo(User::class,'user_id','id');
    }
}
