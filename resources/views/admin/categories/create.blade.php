@extends('admin.layouts.app')
@section('content')
  
        <!-- Small boxes (Stat box) -->
       <div class="row">
        
        <div class="col-6 mx-auto"><div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start --></h1> 
    
        <form method="post" action="{{route('admin.categories.store')}}">
                <div class="card-body">
                  <div class="form-group">
                    @csrf
                    @include('admin.layouts.message')
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
                  </div>
                  

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
       </div>
    
    </div>
       
       
 @endsection