<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CreatePostRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use function GuzzleHttp\Psr7\str;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("admin.posts.index",[
            'posts'=>Post::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        if($categories->count() === 0)
        {
            session()->flash("info","You must have category before attempting to create a post");
            return redirect(route("home"));
        }
        return view("admin.posts.create",[
            'categories'=>$categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        //


        $featured = $request->featured;
       $featured_new_image = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts/',$featured_new_image);


    //    dd($path);
       Post::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'featured'=>'uploads/posts/'.$featured_new_image,
            'category_id'=>$request->category_id,
            'slug'=>Str::slug($request->title)
        ]);

        session()->flash("success","Post Created Successfully");
        return redirect(route("posts.index"));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        return view("admin.posts.create",[
            'post'=>$post,
            'categories'=>Category::all()
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //

        $data = $request->only(['title','slug','content','category']);

        if($request->hasFile('featured')) {
            $post->deleteImage();
            $featured = $request->featured;
            $featured_new_image = time() . $featured->getClientOriginalName();
            $featured->move('uploads/posts/', $featured_new_image);
            $data['featured'] = "uploads/posts/".$featured_new_image;
        }

        $post->update($data);
        session()->flash("success","Post Updated Successfully");
        return redirect(route("posts.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::withTrashed()->where("id",$id)->firstOrFail();
        if(!$post->trashed()){

            $post->delete();
        }else{

           $post->deleteImage();
            $post->forceDelete();
        }

        session()->flash("success","Post Deleted Successfully");
        return redirect(route("posts.index"));

    }




    public function trashed(){
        return view("admin.posts.trashed",[
            'posts'=>Post::onlyTrashed()->get()
        ]);
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where("id",$id)->firstOrFail();
        $post->restore();
        session("success","Post restored successfully");
        return redirect(route("posts.index"));
    }
}
