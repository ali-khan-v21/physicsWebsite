<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;
    protected $fillable=['role_value','name_fa','name_en'];

    public function users(){
        return $this->hasMany(User::class,'role_id','role_value');
    }
}
