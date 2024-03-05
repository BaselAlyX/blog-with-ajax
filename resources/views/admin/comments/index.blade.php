@extends('admin.layouts.app')
@section('content')
  
        <!-- Small boxes (Stat box) -->
       <div class="row">
        
        <div class="col-8 mx-auto"><div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">All Comments</h3>
              </div>
              @include('admin.layouts.message')

                <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Comment</th>
                            <th>Post</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($comments as $comment)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$comment->content}}</td>
                            <td>{{$comment->post->title}}</td>
                            
                            <td>
                                <form action="{{route('admin.comments.destroy',$comment->id)}}" method="post">
                            
                        
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