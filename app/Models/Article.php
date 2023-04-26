<?php

namespace App\Models;

use Carbon\Carbon;
use Morilog\Jalali\Jalalian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;
    protected $table ='articles';
    protected $fillable=['text_fa',"title_fa","title_en","text_en","category_id",'image_url'];
    use SoftDeletes;

    public function getUpdatedAtAttribute($value)
    {
        // $now=time();
        // $last_update=strtotime($value);
        // $ago=$now-$last_update;
        // dd();
        // time_elapsed_string()
        $dt = Carbon::parse($value);
        return $dt->diffForHumans();
        // return Jalalian::forge($last_update)->ago();

    }

}
