@extends('admin.layouts.app')
@section('content')
  
        <!-- Small boxes (Stat box) -->
       <div class="row">
        
        <div class="col-8 mx-auto"><div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">All categories</h3>
              </div>
              <div class="alert alert-danger d-none"id="show-message"></div>

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
                            <a href="{{route('admin.ajax-categories.edit',$category->id)}}" class="btn btn-info">Edit</a>
                            </td>
                            <td>
                                <form action="{{route('admin.ajax-categories.destroy',$category->id)}}" class="form-delete" method="post">
                            
                        
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
 @section('script')
 <script>
    let formElements=document.querySelectorAll('.form-delete');
    let showMessage= document.getElementById("show-message");

    //console.log(formElements);
    formElements.forEach(function(element){
        element.addEventListener('submit',function(e){
            e.preventDefault();
            //console.log(element);
            
  let token=element.querySelector("input[name='_token']");

  fetch(element.action,{

    method: "DELETE",
    headers: {
      "Accept":"application/json",
      "Content-Type":"application/json",
      "X-CSRF-TOKEN":token.value
    }
  }).then(res=>{return res.json();
  
  }).then(data=>{
    showMessage.classList.remove('d-none');

    if(data['success']){
      showMessage.textContent=data.success
      showMessage.classList.remove('alert-danger');
      showMessage.classList.add('alert-success');
        element.closest("tr").remove()


    }else{
  
    showMessage.classList.remove('alert-success');
    showMessage.classList.add('alert-danger');
    showMessage.textContent=data.message

    }
    
   // console.log();
  })
        });
    });
 </script>

 @endsection