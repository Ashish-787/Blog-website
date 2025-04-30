@extends('layouts.app')

@section('content')

<div class="container">
<div id="flashMessage" style="display:none;" class="alert alert-success"></div>
<h1 class="text-center">Blog Create</h1>
        <form id="createPostForm" enctype="multipart/form-data">
           @csrf

            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>


            <div class="form-group">
                <label for="">Content</label>
                <input type="text" name="content" id="content" class="form-control">
            </div>


            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="form-group">
                <label for="">date</label>
                <input type="date" name="date" id="date" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Slug</label>
                <input type="text" name="slug" id="slug" class="form-control">
            </div>

            <button type="submit" id="submitPost" class="btn btn-success mt-3">Save Post</button>


        </form>


 <div id="responseMessage" class="mt-4"></div>
</div>
 
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$('#createPostForm').on('submit',function(e){

    e.preventDefault();

    var formData = new FormData(this);

    $.ajax({
        url:"{{route('admin.saveBlog')}}",
        method:"POST",
        data:formData,
        processData:false,
        contentType:false,

        success: function (response) {
                if(response.status === 'success') {
                    $('#flashMessage')
                        .text(response.message) // Message text set karo
                        .removeClass('alert-danger') // Agar pehle koi error message tha toh hatao
                        .addClass('alert-success') // Success class lagao
                        .fadeIn(); // Message ko show karo
                    $('#createPostForm')[0].reset(); // Form reset karo
                }
            },
            error: function (xhr) {
                let errorMessage = "Something went wrong!";

                if(xhr.responseJSON && xhr.responseJSON.message){
                    errorMessage = xhr.responseJSON.message;
                }

                $('#flashMessage')
                    .text(errorMessage)
                    .removeClass('alert-success')
                    .addClass('alert-danger')
                    .fadeIn();
            }


    });
 


});



</script>



@endsection

