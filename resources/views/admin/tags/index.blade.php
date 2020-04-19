@extends('layouts.app')

@section('content')

    <div class="card  ">
        <div class="card-header">
            <h4>All Tags</h4>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <th>Tag Name</th>
                <th>Edit</th>
{{--                @if(auth()->user()->admin)--}}
                <th>Delete</th>
{{--                @endif--}}
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>{{$tag->tag}}</td>
                        <td><a href="{{route('tags.edit',$tag->id)}}" class="btn btn-small btn-info" style="color:white;">Edit</a></td>
{{--                        @if(auth()->user()->admin)--}}
                        <td>
                            <form method="POST" action="{{route('tags.destroy',$tag->id)}}">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-small btn-danger">Delete</button>

                            </form>
                        </td>
{{--                        @endif--}}
                    </tr>
                @endforeach

                </tbody>

            </table>
        </div>
    </div>


@endsection
