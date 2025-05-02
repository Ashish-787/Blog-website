@extends('user.loyouts.app')

@section('content')
<section class="site-hero overlay page-inside" style="background-image: url('{{ asset('img/bgimage.jpg')}}')">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center">
            <h1 class="heading" data-aos="fade-up">Blog Details</h1>
            <p class="sub-heading mb-5" data-aos="fade-up" data-aos-delay="100">Events, news and activities in the our website.</p>
          </div>
        </div>
        <!-- <a href="#" class="scroll-down">Scroll Down</a> -->
      </div>
</section>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="mb-4">
                <h1 class="mb-2">{{ $post->title }}</h1>
                <span class="text-muted">{{ $post->date }}</span>
            </div>

            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid mb-4 rounded" style="width: 100%; height: auto;">
            @endif

            <div class="post-content">
                {!! $post->content !!}
            </div>
        </div>
    </div>
</div>
@endsection




