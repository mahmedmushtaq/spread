@extends('layouts.app')

@section('content')

    <div class="card  ">
        <div class="card-header">
            <h4>All Posts</h4>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th>Edit</th>
                <th>Delete</th>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td><img src="{{asset($post->featured)}}" alt="Post image" width="40px" height="40px"></td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->category->name}}</td>

                        <td> <a href="{{route('post.restore',$post->id)}}" class="btn btn-xs btn-primary" style="color:white;"> Restore </a>
                        </td>
                        <td>
                        <form method="POST" action="{{route('posts.destroy',$post->id)}}">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-xs btn-danger">Delete</button>

                        </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>

            </table>
        </div>
    </div>


@endsection
