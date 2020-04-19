@extends('layouts.app')

@section('content')

    <div class="panel">
        <div class="panel-heading">
            <h2>
                Update Setting
            </h2>
        </div>
        <div class="panel-body">
            @include("partials.error")

            @foreach($settings as $setting)

            <form action="{{route("settings.update",$setting->id)}}" method="POST">
                @csrf
                @method("PUT")
                <div class="form-group">
                    <label for="name">Site Name</label>
                    <input type="text"  name="site_name" class="form-control" value="{{isset($setting)? $setting->site_name : ""}}">
                </div>

                <div class="form-group">
                    <label for="name">Contact Number</label>
                    <input type="text"  name="contact_number" class="form-control" value="{{isset($setting)? $setting->contact_number : ""}}">
                </div>

                <div class="form-group">
                    <label for="name">Contact email</label>
                    <input type="email"  name="contact_email" class="form-control" value="{{isset($setting)? $setting->contact_email : ""}}">
                </div>

                <div class="form-group">
                    <label for="name">Address</label>
                    <input type="text"  name="address" class="form-control" value="{{isset($setting)? $setting->address : ""}}">
                </div>



                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        Update Settings
                    </button>
                </div>

                @endforeach

            </form>
        </div>
    </div>


@endsection




