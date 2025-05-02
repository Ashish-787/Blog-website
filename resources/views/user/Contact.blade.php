@extends('user.loyouts.app')

@section('content')

    <section class="site-hero overlay page-inside" style="background-image: url(img/hero_2.jpg)">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center">
            <h1 class="heading" data-aos="fade-up">Contact</h1>
            <p class="sub-heading mb-5" data-aos="fade-up" data-aos-delay="100">Get in touch with us.</p>
          </div>
        </div>
        <!-- <a href="#" class="scroll-down">Scroll Down</a> -->
      </div>
    </section>
    <!-- END section -->


    <section class="section bg-primary contact-section">
        <div class="container">
          <div class="row">
            <div class="col-md-7">

         

              <form id="contactForm" method="post" class="bg-white p-md-5 p-4 mb-5" style="margin-top: -150px;">
                @csrf 
              <!-- Flash message placed inside the form column -->
              <div id="flashMessage" class="alert" style="display:none;"></div>
                <div class="row">
                  <div class="col-md-12 form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                  </div>
                </div>
                
                <div class="row">  
                  <div class="col-md-12 form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control">
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12 form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 form-group">
                    <label for="message">Write Message</label>
                    <textarea name="message" id="message" class="form-control" cols="30" rows="8"></textarea>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 form-group">
                    <input type="submit" value="Send Message" class="btn btn-primary">
                  </div>
                </div>
              </form>
            </div>

            <div class="col-md-5">
              <div class="row">
                <div class="col-md-10 ml-auto contact-info">
                  <p><span class="d-block">Address:</span> <span>Paliya Indore Madhya Pradesh</span></p>
                  <p><span class="d-block">Phone:</span> <span>(+91) 91909010442</span></p>
                  <p><span class="d-block">Email:</span> <span>ashish.vidyagxp@gmail.com</span></p>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $('#contactForm').on('submit',function(e){
           e.preventDefault();
            
             
           let formdata = new FormData(this)


          
            $.ajax({
                      url:"{{route('user.saveContact')}}",
                      method:'post',
                      data:formdata,
                      contentType:false,
                      processData:false,
                      
                      success:function(response){
                         if(response.status == 'success'){
                            
                            $('#flashMessage').text(response.message).addClass('alert-success').removeClass('alert-danger').fadeIn();
                          
                            $('#contactForm')[0].reset();

                         }
                    },
                    error: function(xhr){
                             let errorMessage=" something is Wrong pls try again";

                        if(xhr.responseJSON &&  xhr.responseJSON.message){

                        errorMessage = xhr.responseJSON.message;
                        } 
                    $('#flashMessage').text(errorMessage).addClass('alert-danger').removeClass('alert-success').fadeIn();
                  }

            });

        });
    </script>


 
@endsection


