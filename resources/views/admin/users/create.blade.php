@extends('layouts.app')

@section('content')

    <div class="panel">
        <div class="panel-heading">
            <h2>
                {{isset($user) ? "Update User ": "Create A New User"}}
            </h2>
        </div>
        <div class="panel-body">
            @include("partials.error")

            <form action="{{isset($user) ?route('users.update',$user->id) : route('users.store')}}" method="POST">
                @csrf
                @if(isset($user))
                    @method("PUT")
                @endif
                <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text"  name="name" class="form-control" value="{{isset($user)? $user->name : ""}}">
                </div>

                <div class="form-group">
                    <label for="name">User Email</label>
                    <input type="email"  name="email" class="form-control" value="{{isset($user)? $user->email : ""}}">
                </div>



                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        {{isset($user) ? "Update User ": "Create A New User"}}
                    </button>
                </div>


            </form>
        </div>
    </div>


@endsection
