@extends('admin.layouts.app')
@section('content')
  
<div class="row">   
    <div class="col-6 mx-auto">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit post</h3>
            </div>
            
            <form method="post" action="{{ route('admin.posts.update', ['post' => $post->id]) }}" enctype="multipart/form-data" >
                @csrf
                @method("PUT")
                
                <div class="card-body">
                    <div class="form-group">
                        @include('admin.layouts.message')
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Enter title" value="{{ $post->title }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea name="body" class="form-control" id="body" placeholder="Enter body">{{ $post->body }}</textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select name="category_id" class="form-control" id="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control" id="image">
                    </div>
                </div>
                
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
