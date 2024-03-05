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
    
        <form method="post" action="{{route('admin.ajax-categories.store')}}"id="send-data">
                <div class="card-body">
                  <div class="form-group">
                    @csrf

                    <div class="alert alert-danger d-none"id="show-message"></div>
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
 @section('script')
<script>
let formElement= document.getElementById("send-data");
let showMessage= document.getElementById("show-message");
formElement.addEventListener("submit",function(e) {
  e.preventDefault();
  let inputName=formElement.querySelector("#name");
  let token=formElement.querySelector("input[name='_token']");

  fetch(formElement.action,{

    method: "POST",
    headers: {
      "Accept":"application/json",
      "Content-Type":"application/json",
      "X-CSRF-TOKEN":token.value
    },
    body:JSON.stringify({name:inputName.value})
  }).then(res=>{return res.json();
  
  }).then(data=>{
    showMessage.classList.remove('d-none');

    if(data['success']){
      showMessage.textContent=data.success
      showMessage.classList.remove('alert-danger');
      showMessage.classList.add('alert-success');
      inputName.value="";



    }else{
  
    showMessage.classList.remove('alert-success');
    showMessage.classList.add('alert-danger');
    showMessage.textContent=data.message

    }
    
   // console.log();
  })

})
</script>

 @endsection