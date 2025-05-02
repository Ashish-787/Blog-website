@extends('user.loyouts.app')

@section('content')


      <section class="site-hero overlay page-inside" style="background-image: url('{{ asset('img/teamwork.jpg') }}');">
        <div class="container">
          <div class="row site-hero-inner justify-content-center align-items-center">
            <div class="col-md-10 text-center">
              <h1 class="heading text-white" data-aos="fade-up">About Us</h1>
              <p class="sub-heading mb-5 text-light" data-aos="fade-up" data-aos-delay="100">
                Discover the team, the mission, and the passion behind our content.
              </p>
            </div>
          </div>
          {{-- Optional scroll indicator --}}
          <!-- <a href="#about-section" class="scroll-down">Scroll Down</a> -->
        </div>
      </section>

    <!-- END section -->

    

    <section class="section slider-section">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-8">
            <h2 class="heading" data-aos="fade-up">Blog Gallery</h2>
            <p class="lead" data-aos="fade-up" data-aos-delay="100">
              Explore our visual stories and featured blog highlights from recent posts.
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="home-slider major-caousel owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
              <div class="slider-item">
                <img src="{{ asset('img/teamwork.jpg') }}" alt="Gallery Image 1" class="img-fluid">
              </div>
              <div class="slider-item">
                <img src="{{ asset('img/bgimage.jpg') }}" alt="Gallery Image 2" class="img-fluid">
              </div>
              <div class="slider-item">
                <img src="{{ asset('img/image.jpg') }}" alt="Gallery Image 3" class="img-fluid">
              </div>
              <div class="slider-item">
                <img src="{{ asset('img/av.jpg') }}" alt="Gallery Image 4" class="img-fluid">
              </div>
              <div class="slider-item">
                <img src="{{ asset('img/bgimage.jpg') }}" alt="Gallery Image 5" class="img-fluid">
              </div>
              <div class="slider-item">
                <img src="{{ asset('img/teamwork.jpg') }}" alt="Gallery Image 6" class="img-fluid">
              </div>
            </div>
          </div>

          <div class="col-md-12 text-center">
            <a href="#" class="btn btn-outline-primary">View More Photos</a>
          </div>
        </div>
      </div>
    </section>

    <!-- END section -->
    
    <section class="section blog-post-entry bg-pattern">
      <div class="container">
          <div class="row justify-content-center text-center mb-5">
              <div class="col-md-8">
                  <h2 class="heading" data-aos="fade-up">Meet Our Leadership</h2>
                  <p class="lead" data-aos="fade-up" data-aos-delay="100">
                      Behind every successful post and project is a team of passionate creators. Our leadership team brings vision, creativity, and years of experience to drive the blog’s success forward.
                  </p>
              </div>
          </div>

        <div class="row">
        @foreach ($teams as $index => $team)   
          <div class="col-lg-4 col-md-6 col-sm-6 col-12 post" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
            <div class="media media-custom d-block mb-4">
              <a href="#" class="mb-4 d-block">
                <img src="{{ asset('storage/'.$team->image)}}" alt="{{$team->designation}}" class="img-fluid">
              </a>
              <div class="media-body">
                <span class="meta-post">{{$team->designation }}</span>
                <h2 class="mt-0 mb-3"><a href="#">{{ $team->name }}</a></h2>
                <p>{{ $team->image_text }}</p>
              </div>
            </div>
          </div>
        @endforeach
        </div>
      </div>
    </section>
@endsection


