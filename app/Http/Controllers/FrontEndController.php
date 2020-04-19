<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use App\WebSetting;
use Illuminate\Http\Request;


class FrontEndController extends Controller
{
    //
    public function index(){


        return view("index",[
            'title'=>WebSetting::first()->site_name,
            'categories'=>Category::take(4)->get(),
            "first_post"=>Post::orderBy("created_at","DESC")->first(),
            "second_post"=>Post::orderBy("created_at","DESC")->skip(1)->take(1)->get()->first(),
            "third_post"=>Post::orderBy("created_at","DESC")->skip(2)->take(1)->get()->first(),
            "programmingPost"=>Category::find(1)->posts()->orderBy("created_at",'DESC')->take(3)->get(),
            "newsPost"=>Category::find(2)->posts()->orderBy("created_at",'DESC')->take(3)->get(),
            "motivationPost"=>Category::find(3)->posts()->orderBy("created_at",'DESC')->take(3)->get(),
            "selfImprovementPost"=>Category::find(4)->posts()->orderBy("created_at",'DESC')->take(3)->get(),
            "settings"=>WebSetting::first()


        ]);
    }

    public function singlePost($slug){
        $post = Post::where("slug",$slug)->first();
        $next_id = Post::where("id",">",$post->id)->min("id");
        $prev_id = Post::where("id","<",$post->id)->max("id");
       $next_post = Post::find($next_id);
       $prev_post = Post::find($prev_id);

        return view("single",[
            "post"=>$post,
            'title'=>$post->title,
            'categories'=>Category::take(4)->get(),
            "settings"=>WebSetting::first(),
            "tags"=>Tag::all(),
            "next"=>$next_post,
            "prev"=>$prev_post
        ]);
    }

    public function category(Category $category){
        return view("category",[
            "category"=>$category,
            "posts"=>$category->posts()->simplePaginate(10),
            'title'=>$category->name,
            'categories'=>Category::take(4)->get(),
            "settings"=>WebSetting::first(),
        ]);
    }

    public function tag(Tag $tag){
        $tag_posts = $tag->posts ? $tag->posts()->simplePaginate(10) : [];
      //  dd($tag->posts);
      //  return "Not implemented yet";
        return view("tag",[
            "tag"=>$tag,
            "posts"=>$tag_posts,
            'title'=>$tag->tag,
            'categories'=>Category::take(4)->get(),
            "settings"=>WebSetting::first(),
        ]);
    }

    public function categoryAll(){
        return view("allcategories",[
            'all_categories'=>Category::all(),
            'title'=>WebSetting::first()->site_name,
            'categories'=>Category::take(4)->get(),
            "settings"=>WebSetting::first(),
        ]);
    }

    public function search(Request $request){

        $query = $request->query('search');

        $posts = Post::where("title",'LIKE','%'.$query.'%')->get();
      //  dd($posts);
        return view("search",[

            "posts"=>$posts,
            'title'=>"Search Query Result: ".$query,
            'categories'=>Category::take(4)->get(),
            "settings"=>WebSetting::first(),
            "query"=>$query

        ]);


    }

}
