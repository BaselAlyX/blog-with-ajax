@extends('admin.layouts.app')
@section('content')
  
        <!-- Small boxes (Stat box) -->
       <div class="row">
        
        <div class="col-6 mx-auto"><div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Post</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start --></h1> 
    
        <form method="post" action="{{route('admin.posts.store')}}"enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    @csrf
                    @include('admin.layouts.message')
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Enter title">
                  </div>
                  <div class="form-group">
                    
                    <label for="title">Category</label>
                    <select name="category_id" class="form-control" >
                      @foreach($categories as $category)
                      <option value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  
                  <div class="form-group">
                    
                    <label >Body</label>
                    <textarea name="body"  placeholder="Enter Body" class="form-control"  cols="10" rows="10"></textarea>
                  </div>
                  <div class="form-group">
                    
                    <label >Image</label>
                    <input type="file" class="form-control" name="image">
                  </div>
                  

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
       </div>
    
    </div>
       
       
 @endsection