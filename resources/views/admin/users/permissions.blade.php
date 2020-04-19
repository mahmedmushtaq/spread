@extends('layouts.app')

@section('content')

    <div class="panel">
        <div class="panel-heading">
            <h2>
               Permissions
            </h2>
        </div>
        <div class="panel-body">
            @include("partials.error")


            @if(auth()->user()->admin)

            @if($user->admin)
                Admin account
            @else
                <a href="{{route("users.make-admin",$user->id)}}" class="btn btn-success">Make A Admin</a>
                @if($user->account === 'pending')
                    <a href="{{route("users.approve-account",$user->id)}}" class="btn btn-success">Approved account</a>
                @endif
            @endif
            @endif
            <hr>
            <br>



        </div>
    </div>


@endsection
