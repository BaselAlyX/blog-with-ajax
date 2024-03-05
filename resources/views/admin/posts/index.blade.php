@extends('admin.layouts.app')
@section('content')
  
        <!-- Small boxes (Stat box) -->
       <div class="row">
        
        <div class="col-8 mx-auto"><div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">All posts</h3>
              </div>
              @include('admin.layouts.message')

                <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>title</th>
                            <th>category</th>
                            <th>body</th>
                            <th>image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                       <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->category->name}}</td>
                        <td>{{\Str::limit($post->body,200)}}</td>
                        <td><img src="{{$post->image()}}" alt="" width="100" height="100"></td>
                        <td>
                            <a href="{{route('admin.posts.edit',$post->id)}}" class="btn btn-info">Edit</a>
                            </td>
                            <td>
                                <form action="{{route('admin.posts.destroy',$post->id)}}" method="post">
                            
                        
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                            </td>

                    
                    </tr>
                    @endforeach
                    </tbody>
                </table>
<div>{{$posts->links()}}</div>
                </div>
              </div>
            
       
       
       
 @endsection