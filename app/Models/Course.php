<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['title','thumbnail','level','type','status','price','description','category_id','mentor_id'];
    

    public function getRouteKeyName() {
        return 'title';
     }
 

    public function category() {
       return $this->belongsTo('App\Models\Category');
    }

    public function mentor(){
        return $this->belongsTo('App\user');
    }

    public function lesson(){
        return $this->hasMany('App\Models\Lesson');
     }

     public function chapter(){
        return $this->hasMany('App\Models\Chapter');
     }

     public function mycourse(){
      return $this->hasMany(MyCourse::class, 'course_id');
   }

    
}