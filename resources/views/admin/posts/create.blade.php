@extends('layouts.app')

@section('content')

    <div class="panel">
        <div class="panel-heading">
            <h2>
               {{isset($post) ? "Update your post here": "Create a new post"}}

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
                    <input type="text"  name="title" class="form-control" value="{{isset($post) ?$post->title : ""}}">
                </div>



                <div class="form-group">
                    <label for="featured">Featured Image</label>
                    <input type="file"  name="featured" class="form-control">
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea  name="content" id="content" class="form-control">{{isset($post) ?$post->content : ""}} </textarea>
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

                @if($tags->count() > 0)
                    <div class="form-group">
                        <label for="tags">Tags</label>

                        <select name="tags[]" id="tags" class="form-control tags-selector" multiple>
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}"
                                        @if(isset($post))
                                        @if($post->hasTag($tag->id))
                                        selected
                                    @endif
                                    @endif
                                >
                                    {{ $tag->tag }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif

                <div class="form-group">
                     <button type="submit" class="btn btn-success">
                       {{isset($post) ? "Update A Post":"Create A New Post"}}
                     </button>
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




@section("scripts")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js" defer></script>
    <script>
        $(document).ready(function() {

            $('.tags-selector').select2();
            $('#content').summernote();
        });



    </script>
@endsection
@section("css")
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">

@endsection
