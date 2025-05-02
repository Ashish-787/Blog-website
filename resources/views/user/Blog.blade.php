@extends('user.loyouts.app')


@section('content')

<section class="site-hero overlay page-inside" style="background-image: url(img/image.jpg)">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center">
            <h1 class="heading" data-aos="fade-up">Blog</h1>
            <p class="sub-heading mb-5" data-aos="fade-up" data-aos-delay="100">Events, news and activities in the our website.</p>
          </div>
        </div>
        <!-- <a href="#" class="scroll-down">Scroll Down</a> -->
      </div>
    </section>
    <!-- END section -->

    
    <section class="section bg-light post">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="row mb-5">
                @foreach ($posts as $post)
                    <div class="col-md-6">
                        <div class="media media-custom d-block mb-4">
                            <a href="#" class="mb-4 d-block">
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid">
                            </a>
                            <div class="media-body">
                                <span class="meta-post">{{ $post->created_at->format('F d, Y') }}</span>
                                <h2 class="mt-0 mb-3">
                                    <a href="#">{{ $post->title }}</a>
                                </h2>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-md-12">
                    {{ $posts->links('pagination::bootstrap-4') }}
                </div>
            </div>

          </div>
          <!-- END content -->
          <div class="col-md-4">
            <div class="row">

              <div class="col-md-11 ml-auto">


                <form action="#" class="sidebar-search">
                  <div class="form-group">
                    <span class="fa fa-search icon-search"></span>
                    <input type="text" class="form-control search-input"  placeholder="Search...">
                  </div>
                </form>    

                <div class="side-box">
                  <h2 class="heading">Popular Post</h2>
                  <ul class="post-list list-unstyled">

                  @foreach ($posts as $post)
                    <li>
                      <a href="{{route('user.Blogs',$post->id)}}" class="d-flex">
                        <span class="mr-3 image"><img src="{{ asset('storage/'.$post->image) }}" alt="Image placeholder" class="img-fluid"></span>
                        <div>
                          <span class="meta">{{ $post->created_at->format('F d, Y') }}</span>
                          <h3>{{ $post->title }}</h3>
                        </div>
                      </a>
                    </li>
                     @endforeach  
                  </ul>
                </div>
          
                <div class="side-box">
                  <h2 class="heading">Categories</h2>
                  <ul class="post-categories list-unstyled">
                    <li><a href="#">Events <span class="count">(12)</span></a></li>
                    <li><a href="#">Resto bar <span class="count">(4)</span></a></li>
                    <li><a href="#">Celebration <span class="count">(23)</span></a></li>
                    <li><a href="#">Promos <span class="count">(8)</span></a></li>
                  </ul>
                </div>

              </div>
              

             

            </div>
            
          </div>
        </div>
      </div>
    </section>

@endsection