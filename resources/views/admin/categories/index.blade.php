@extends('layouts.app')

@section('content')

    <div class="card  ">
        <div class="card-header">
            <h4>All Categories</h4>
        </div>
        <div class="card-body">
          <table class="table table-hover">
              <thead>
              <th>Category Name</th>
              <th>Edit</th>
{{--              @if(auth()->user()->admin)--}}
              <th>Delet</th>
{{--              @endif--}}
              </thead>
              <tbody>
              @foreach($categories as $category)
                  <tr>
                      <td>{{$category->name}}</td>
{{--                      @if(auth()->user()->posts->category->id)--}}
                      <td><a href="{{route('categories.edit',$category->id)}}" class="btn btn-small btn-info" style="color:white;">Edit</a></td>
{{--                   @if(auth()->user()->admin)--}}
                     <td>
                         <form method="POST" action="{{route('categories.destroy',$category->id)}}">
                             @csrf
                             @method("DELETE")
                             <button class="btn btn-small btn-danger">Delete</button>

                         </form>
                     </td>
{{--                   @endif--}}

                  </tr>
              @endforeach

              </tbody>

          </table>
        </div>
    </div>


@endsection
