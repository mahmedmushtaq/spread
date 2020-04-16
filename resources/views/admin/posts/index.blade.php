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
                <th>Tools</th>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td><img src="{{asset($post->featured)}}" alt="Post image" width="40px" height="40px"></td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->category->name}}</td>
                        <td>
                            <div style="display: flex;">
                            <a href="{{route('posts.edit',$post->id)}}"  style="color:white;">
                                <img src="https://img.icons8.com/ios/26/000000/edit.png" width="12px" height="12px"/>
                            </a>


                            <form method="POST" action="{{route('posts.destroy',$post->id)}}">
                                @csrf
                                @method("DELETE")
                                <button type="submit" style="background-color:transparent;border:none;"><img src="https://img.icons8.com/ultraviolet/40/000000/delete-sign.png" width="12px" height="12px"/></button>

                            </form>
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>

            </table>
        </div>
    </div>


@endsection
