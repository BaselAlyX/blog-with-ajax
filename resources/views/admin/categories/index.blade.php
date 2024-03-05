@extends('admin.layouts.app')
@section('content')
  
        <!-- Small boxes (Stat box) -->
       <div class="row">
        
        <div class="col-8 mx-auto"><div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">All categories</h3>
              </div>
              @include('admin.layouts.message')

                <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$category->name}}</td>
                            <td>
                            <a href="{{route('admin.categories.edit',$category->id)}}" class="btn btn-info">Edit</a>
                            </td>
                            <td>
                                <form action="{{route('admin.categories.destroy',$category->id)}}" method="post">
                            
                        
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                            </td>


                        </tr>
                        @endforeach
                    </tbody>
                </table>

                </div>
              </div>
            
    
       
       
       
 @endsection