@extends('layouts.app')

@section('content')

    <div class="card  ">
        <div class="card-header d-flex justify-content-between">
            <h4>All Users</h4>
            <a href="{{route("users.create")}}" class="btn btn-success">Add A New user</a>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <th>Image</th>
                    <th>Name</th>
                    @if(auth()->user()->admin)
                    <th>Edit</th>
                    <th>Permission</th>

                       <th>Delete</th>
                    @endif
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td><img src="{{asset($user->profile->avatar)}}" width="60px" height="60px" alt="Profile image"></td>
                        <td>{{$user->name}}</td>

                        @if(auth()->user()->admin)
                        <td><a href="{{route('users.edit',$user->id)}}" class="btn btn-small btn-info" style="color:white;">Edit</a></td>


                        <td><a href="{{route('users.permissions',$user->id)}}" class="btn btn-small btn-secondary" style="color:white;">Permissions</a></td>

                        @if(auth()->user()->id !== $user->id)
                            <td>
                                <form method="POST" action="{{route('users.destroy',$user->id)}}">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-small btn-danger">Delete</button>

                                </form>
                            </td>
                        @endif

                         @endif
                    </tr>
                @endforeach

                </tbody>

            </table>
        </div>
    </div>


@endsection
