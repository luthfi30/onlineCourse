<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyCourse extends Model
{
    protected $fillable = ['course_id','user_id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function users()
    {
        return $this->belongsTo(Users::class);
    }

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    public function review(){
        return $this->hasOne(Review::class,'mycourse_id');
     }
}
