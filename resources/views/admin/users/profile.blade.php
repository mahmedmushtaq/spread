@extends('layouts.app')

@section('content')

    <div class="panel">
        <div class="panel-heading">
            <h2>
                Profile
            </h2>
        </div>
        <div class="panel-body">
            @include("partials.error")

            <form action="{{route("users.update-profile")}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text"   name="name" class="form-control" value="{{isset($user)? $user->name : ""}}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email"  name="email" class="form-control" value="{{isset($user)? $user->email : ""}}">
                </div>

                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password"  name="password" class="form-control" value="">
                </div>

                <div class="form-group">
                    <label for="about">About</label>
                    <textarea cols="5" rows="5"   name="about" class="form-control" >{{isset($user)? $user->profile->about : ""}}</textarea>
                </div>

                <div class="form-group">
                    <label for="name">Facebook</label>
                    <input type="text"   name="facebook" class="form-control" value="{{isset($user)? $user->profile->facebook : ""}}">
                </div>

                <div class="form-group">
                    <label for="name">Youtube</label>
                    <input type="text"   name="youtube" class="form-control" value="{{isset($user)? $user->profile->youtube : ""}}">
                </div>

                <div class="form-group">
                    <label for="name">Linked In</label>
                    <input type="text"   name="linkedIn" class="form-control" value="{{isset($user)? $user->profile->linkedIn : ""}}">
                </div>

                <div class="form-group">
                    <label for="name">Twitter</label>
                    <input type="text"   name="twitter" class="form-control" value="{{isset($user)? $user->profile->twitter : ""}}">
                </div>

                <div class="form-group">
                    <label for="name">Update Profile Pic</label>
                    <input type="file"  name="avatar" class="form-control" >
                </div>


                @isset($user)
                    <br/>
                    <h5>Profile Image</h5>
                    <img src="{{asset($user->profile->avatar)}}" width="200px" height="200px">
                    <br/>
                    <br/>
                    <br/>
                @endisset




                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                      Update Profile
                    </button>
                </div>


            </form>
        </div>
    </div>


@endsection
