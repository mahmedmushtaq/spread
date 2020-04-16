@extends('layouts.app')

@section('content')

    <div class="panel">
        <div class="panel-heading">
            <h2>
                {{isset($category) ? "Update Category ": "Create A New Category"}}
            </h2>
        </div>
        <div class="panel-body">
            @include("partials.error")

            <form action="{{isset($category) ?route('categories.update',$category->id) : route('categories.store')}}" method="POST">
                @csrf
                @if(isset($category))
                    @method("PUT")
                @endif
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text"  name="name" class="form-control" value="{{isset($category)? $category->name : ""}}">
                </div>



                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        {{isset($category) ? "Update Category ": "Create A Category"}}
                    </button>
                </div>


            </form>
        </div>
    </div>


@endsection
