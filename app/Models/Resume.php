<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;
    protected $fillable=[
        'title_fa','title_en','desc_fa','desc_en','user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
