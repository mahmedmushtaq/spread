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

    public function tags(){
        return $this->belongsToMany("App\Tag");
    }

    public function hasTag($tag_id){
        return in_array($tag_id,$this->tags->pluck("id")->toArray());
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
