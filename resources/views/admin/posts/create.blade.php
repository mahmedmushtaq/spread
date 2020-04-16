@extends('layouts.app')

@section('content')

    <div class="panel">
        <div class="panel-heading">
            <h2>
               {{isset($post) ? "Update post ": "Create a new post"}}

            </h2>
        </div>
        <div class="panel-body">
            @include("partials.error")

            <form action="{{ isset($post) ? route('posts.update',$post->id) : route('posts.store' )}}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($post))
                    @method("PUT")
                @endif

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text"  name="title" class="form-control" value="   {{isset($post) ?$post->title : ""}}  ">
                </div>



                <div class="form-group">
                    <label for="featured">Featured Image</label>
                    <input type="file"  name="featured" class="form-control">
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea  name="content" class="form-control">{{isset($post) ?$post->content : ""}} </textarea>
                </div>

                <div class="form-group">
                    <label for="category">Select Category</label>
                    <select name="category_id" class="form-control"

                    >
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                                    @if(isset($post))
                                    @if($category->id === $post->category_id)
                                    selected
                                @endif
                                @endif

                            >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                     <button type="submit" class="btn btn-success">Create A New Post</button>
                </div>

                @isset($post)
                   <br/>
                   <h5>Featured Image</h5>
                    <img src="{{asset($post->featured)}}" width="200px" height="200px">
                    <br/>
                    <br/>
                    <br/>
                @endisset


            </form>
        </div>
    </div>


@endsection
