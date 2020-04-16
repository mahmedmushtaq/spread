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
              <th>Editing</th>
              <th>Deleting</th>
              </thead>
              <tbody>
              @foreach($categories as $category)
                  <tr>
                      <td>{{$category->name}}</td>
                      <td><a href="{{route('categories.edit',$category->id)}}" class="btn btn-small btn-info" style="color:white;">Edit</a></td>
                     <td>
                         <form method="POST" action="{{route('categories.destroy',$category->id)}}">
                             @csrf
                             @method("DELETE")
                             <button class="btn btn-small btn-danger">Delete</button>

                         </form>
                     </td>
                  </tr>
              @endforeach

              </tbody>

          </table>
        </div>
    </div>


@endsection
