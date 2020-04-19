@extends('layouts.app')

@section('content')

    <div class="panel">
        <div class="panel-heading">
            <h2>
                {{isset($tag) ? "Update Tag ": "Create A New Tag"}}
            </h2>
        </div>
        <div class="panel-body">
            @include("partials.error")

            <form action="{{isset($tag) ?route('tags.update',$tag->id) : route('tags.store')}}" method="POST">
                @csrf
                @if(isset($tag))
                    @method("PUT")
                @endif
                <div class="form-group">
                    <label for="name">Tag Name</label>
                    <input type="text"  name="tag" class="form-control" value="{{isset($tag)? $tag->tag : ""}}">
                </div>



                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        {{isset($tag) ? "Update Tag ": "Create A Tag"}}
                    </button>
                </div>


            </form>
        </div>
    </div>


@endsection
