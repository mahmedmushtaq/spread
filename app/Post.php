<?php

namespace App;



use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];

//    public function getFeaturedAttribute($featured){
//        return asset($featured);
//    }

    public function category(){
        return $this->belongsTo(Category::class);
    }



    public function deleteImage(){

       return  File::delete($this->featured);
    }
}
