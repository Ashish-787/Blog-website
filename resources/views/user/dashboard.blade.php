@extends('user.loyouts.app')

@section('content')
@php
    use Illuminate\Support\Str;
@endphp

<section class="site-hero overlay" style="background-image: url('{{ asset('img/bgimage.jpg') }}'); background-size: cover; background-position: center;">
  <div class="container">
    <div class="row site-hero-inner justify-content-center align-items-center">
      <div class="col-md-10 text-center">
        <h1 class="heading" data-aos="fade-up">Welcome to <em>Our Blog</em></h1>
        <p class="sub-heading mb-5" data-aos="fade-up" data-aos-delay="100">Insights, stories, and updates from our passionate writers.</p>
        <p data-aos="fade-up" data-aos-delay="200">
          <a href="#latest-posts" class="btn uppercase btn-primary mr-md-2 mr-0 mb-3 d-sm-inline d-block">Read Latest Posts</a>
          <a href="#" class="btn uppercase btn-outline-light d-sm-inline d-block">Contact Us</a>
        </p>
      </div>
    </div>
    <!-- <a href="#" class="scroll-down">Scroll Down</a> -->
  </div>
</section>

    <!-- END section -->

    <section class="section visit-section">
        <div class="container">
            <div class="row mb-4">
            <div class="col-md-12">
                <h2 class="heading" data-aos="fade-right">Latest Blog Posts</h2>
            </div>
            </div>
            <div class="row">
            @foreach($posts as $blog)
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="card h-100 shadow-sm border-0">
                <a href="">
                    <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top img-fluid" alt="{{ $blog->title }}">
                </a>
                <div class="card-body">
                    <h5 class="card-title">
                    <a href="">{{ $blog->title }}</a>
                    </h5>
                    <p class="card-text text-muted">{{ Str::limit($blog->content, 100) }}</p>
                </div>
                <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center">
                    <small class="text-muted">{{ $blog->created_at->format('M d, Y') }}</small>
                    <span class="badge bg-primary">
                    
                    {{ optional($blog->comments->first())->author_name ?? 'No Comments' }}

                    </span>
                </div>
                </div>
            </div>
            @endforeach
            </div>
        </div>
    </section>


    <!-- END section -->
    <section class="section slider-section">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
            <div class="col-md-8">
                <h2 class="heading" data-aos="fade-up">Explore Featured Stories & Inspirations</h2>
                <p class="lead" data-aos="fade-up" data-aos-delay="100">
                Dive into a collection of thought-provoking articles, inspirational journeys, and captivating visuals from our blog.
                </p>
            </div>
            </div>
            <div class="row">
            <div class="col-md-12">
                <div class="home-slider major-caousel owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
                <div class="slider-item">
                    <img src="img/slider-1.jpg" alt="Featured article image" class="img-fluid">
                </div>
                <div class="slider-item">
                    <img src="img/slider-2.jpg" alt="Featured article image" class="img-fluid">
                </div>
                <div class="slider-item">
                    <img src="img/slider-3.jpg" alt="Featured article image" class="img-fluid">
                </div>
                <div class="slider-item">
                    <img src="img/slider-4.jpg" alt="Featured article image" class="img-fluid">
                </div>
                <div class="slider-item">
                    <img src="img/slider-5.jpg" alt="Featured article image" class="img-fluid">
                </div>
                <div class="slider-item">
                    <img src="img/slider-6.jpg" alt="Featured article image" class="img-fluid">
                </div>
                </div>
                
            </div>

            <div class="col-md-12 text-center">
                <a href="#" class="btn btn-outline-dark">Browse All Blog Posts</a>
            </div>
            </div>
        </div>
    </section>

    <!-- END section -->
    <section class="section blog-post-entry bg-pattern">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-md-8">
                <h2 class="heading" data-aos="fade-up">Recent Blog Posts</h2>
                <p class="lead" data-aos="fade-up">Discover our latest articles, news, and insights. Stay updated with fresh content regularly posted by our team.</p>
            </div>
        </div>
        <div class="row">
            @foreach($posts as $post)
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 post mb-4" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">

                <div class="media media-custom d-block h-100">
                    <a href="{{ route('admin.ReadMore', $post->id) }}" class="mb-4 d-block overflow-hidden rounded">
                        @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid w-100" style="height: 220px; object-fit: cover;">
                        @else
                            <img src="https://images.unsplash.com/photo-1499750310107-5fef28a66643?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&h=300&q=80" alt="Blog post image" class="img-fluid w-100" style="height: 220px; object-fit: cover;">
                        @endif
                    </a>

                    <div class="media-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="meta-post text-muted small">{{ $post->date }}</span>
                            <!-- Optional: Add category/tag here -->
                        </div>
                        <h3 class="mt-0 mb-2"><a href="{{ route('admin.ReadMore', $post->id) }}" class="text-decoration-none">{{ $post->title }}</a></h3>
                        <p class="mb-3">{{ Str::limit(strip_tags($post->content), 120) }}</p>
                        <a href="{{ route('user.ReadMore', $post->id) }}" class="btn btn-sm btn-outline-primary read-more-link">Read More</a>
                    </div>
                </div>

            </div>
            @endforeach
        </div>
        
        <!-- Optional: Add pagination if needed -->
        @if($posts->hasPages())
        <div class="row mt-5">
            <div class="col-12 text-center">
                {{ $posts->links() }}
            </div>
        </div>
        @endif
    </div>
</section>

<style>
    /* Fix for the read more button */
    .read-more-link {
        color: #ffc107;
        border-color:rgb(85, 255, 0);
        background-color: transparent;
        transition: all 0.3s ease;
    }
    
    .read-more-link:hover {
        color: #fff;
        background-color: #ffc102;
        text-decoration: none;
    }
    
    .read-more-link:active,
    .read-more-link:focus {
        color: #fff;
        background-color: #ffc107;
        border-color: #ffc103;
        box-shadow: none;
    }
</style>
    <!-- END section -->
    <section class="section testimonial-section">
  <div class="container">
    <div class="row justify-content-center text-center mb-5">
      <div class="col-md-8">
        <h2 class="heading" data-aos="fade-up">What Our Readers Say</h2>
        <p class="lead text-muted" data-aos="fade-up" data-aos-delay="100">
          Hear from some of our readers and contributors about their experience with our blog.
        </p>
      </div>
    </div>
    <div class="row">
      <!-- Testimonial 1 -->
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
        <div class="testimonial text-center">
          <div class="author-image mb-3">
            <img src="{{ asset('img/person_1.jpg') }}" alt="Reader 1" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
          </div>
          <blockquote>
            <p>&ldquo;This blog is my go-to place for practical insights and thought-provoking articles. The content is consistently excellent.&rdquo;</p>
          </blockquote>
          <p><em>&mdash; Ayesha Khan</em></p>
        </div>
      </div>

      <!-- Testimonial 2 -->
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
        <div class="testimonial text-center">
          <div class="author-image mb-3">
            <img src="{{ asset('img/person_2.jpg') }}" alt="Reader 2" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
          </div>
          <blockquote>
            <p>&ldquo;As a guest writer, I love how smooth the publishing process is. The team is supportive and professional.&rdquo;</p>
          </blockquote>
          <p><em>&mdash; Ashish Verma</em></p>
        </div>
      </div>

      <!-- Testimonial 3 -->
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
        <div class="testimonial text-center">
          <div class="author-image mb-3">
            <img src="{{ asset('img/person_3.jpg') }}" alt="Reader 3" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
          </div>
          <blockquote>
            <p>&ldquo;The design is clean, the topics are diverse, and I always find something new to learn. Highly recommended!&rdquo;</p>
          </blockquote>
          <p><em>&mdash; Kuldeep Patel</em></p>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
