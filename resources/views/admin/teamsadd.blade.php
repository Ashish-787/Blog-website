@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
     <div id="flashMessage" style="display:none" class="alert alert-success"></div>

      <h1 class="text-center">Teams Members Add</h1>

        <form id="createPostForm" enctype="multipart/form-data">
           @csrf

           <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>


            <div class="form-group">
                <label for="">image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

          

            <div class="form-group">
                <label for="">Description</label>
                <input type="text" name="image_text" id="image_text" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Designation</label>
                <input type="text" name="designation" id="designation" class="form-control">
            </div>

            <button type="submit" id="submitPost" class="btn btn-success mt-3">Save Teams</button>


        </form>     

         <div id="responseMessage" class="mt-4"></div>
         
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $('#createPostForm').on('submit',function(e){

        e.preventDefault();

        let formData = new FormData(this);
          
        $.ajax({
             url:"{{ route('user.saveContact')}}"  ,
             method:'post',
             data:formData,
             processData:false,
             contentType:false,
             headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
             success:function(response){
                   if(response.status == 'success') {
                       $('#flashMessage').text(response.message).addClass('alert-success').removeClass('alert-danger').fadeIn();
                        $('#createPostForm')[0].reset();
                    }  
             },
             error:function(xhr){
                 let errorMessage ="something went to wrong";
                
                 if(xhr.responseJSON && xhr.responseJSON.message){
                     errorMessage = xhr.responseJSON.message;
                 }

                 $('#flashMessage').text(errorMessage).addClass('alert-danger').removeClass('alert-success').fadeIn();

             }

        });



    })
</script>


@endsection