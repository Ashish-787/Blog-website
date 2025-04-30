@extends('layouts.app')

@section('content')
@php
    use Illuminate\Support\Str;
@endphp

<style>
    .hero-section {
        background: linear-gradient(135deg, #6e8efb, #a777e3);
        color: white;
        padding: 5rem 0;
        margin-bottom: 3rem;
        text-align: center;
    }
    
    .blog-container {
        padding: 0 2rem;
    }
    
    .card {
        margin-bottom: 30px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        border: none;
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    
    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }
    
    .card-img-top {
        height: 220px;
        object-fit: cover;
        width: 100%;
    }
    
    .card-body {
        flex: 1;
        display: flex;
        flex-direction: column;
        padding: 1.5rem;
    }
    
    .card-title {
        font-size: 1.4rem;
        font-weight: 600;
        margin-bottom: 0.8rem;
        color: #2c3e50;
    }
    
    .card-text {
        color: #7f8c8d;
        flex-grow: 1;
        margin-bottom: 1.5rem;
    }
    
    .card-footer {
        background: white;
        border-top: 1px solid rgba(0,0,0,0.05);
        padding: 1rem 1.5rem;
    }
    
    .read-more-btn {
        align-self: flex-start;
        background: linear-gradient(135deg, #6e8efb, #a777e3);
        border: none;
        padding: 0.5rem 1.5rem;
        font-weight: 500;
        margin-top: auto;
    }
    
    .read-more-btn:hover {
        background: linear-gradient(135deg, #5a7df4, #9666d8);
        transform: translateY(-2px);
    }
    
    .comments-section {
        padding: 1rem 1.5rem;
        background-color: #f8f9fa;
        border-top: 1px solid rgba(0,0,0,0.05);
    }
    
    .comment-header {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
    }
    
    .comment-header i {
        margin-right: 0.5rem;
    }
    
    .comment-item {
        border-left: 3px solid #a777e3;
        padding: 0.8rem;
        margin-bottom: 0.8rem;
        background-color: white;
        border-radius: 0 4px 4px 0;
    }
    
    .comment-author {
        font-weight: 600;
        color: #6e8efb;
        margin-bottom: 0.3rem;
    }
    
    .add-comment-btn {
        background: #2ecc71;
        border: none;
        width: 100%;
        padding: 0.6rem;
        font-weight: 500;
        transition: all 0.3s;
    }
    
    .add-comment-btn:hover {
        background: #27ae60;
        transform: translateY(-2px);
    }
    
    .post-date {
        color: #95a5a6;
        font-size: 0.9rem;
    }
    
    .no-comments {
        color: #95a5a6;
        font-style: italic;
        padding: 0.5rem 0;
    }
    
    .modal-header {
        background: linear-gradient(135deg, #2ecc71, #27ae60);
    }
    
    .page-title {
        font-weight: 700;
        margin-bottom: 1rem;
        font-size: 3rem;
    }
    
    .page-subtitle {
        font-weight: 300;
        font-size: 1.5rem;
        opacity: 0.9;
        margin-bottom: 2rem;
    }
    
    @media (max-width: 768px) {
        .hero-section {
            padding: 3rem 0;
        }
        
        .page-title {
            font-size: 2rem;
        }
        
        .page-subtitle {
            font-size: 1.2rem;
        }
    }
</style>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <h1 class="page-title">Welcome to Our Blog</h1>
        <p class="page-subtitle">Discover the latest stories, tips, and insights from our community</p>
    </div>
</section>

<!-- Blog Posts -->
<div class="container blog-container">
    <div class="row">
        @foreach($posts as $post)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <!-- Image -->
                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}">
                    @else
                        <img src="https://images.unsplash.com/photo-1499750310107-5fef28a66643?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&h=220&q=80" class="card-img-top" alt="Blog post image">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ Str::limit($post->content, 120) }}</p>
                        <a href="{{ route('admin.ReadMore', $post->id) }}" class="btn read-more-btn">Read More</a>
                    </div>

                    <div class="card-footer">
                        <small class="post-date"><i class="far fa-calendar-alt me-1"></i> {{ $post->date }}</small>
                    </div>

                    <!-- Comments Section -->
                    <div class="comments-section">
                        <div class="comment-header">
                            <i class="far fa-comments"></i> Comments ({{ $post->comments->count() }})
                        </div>

                        <div class="comments-list">
                            @forelse($post->comments->take(2) as $comment)
                                <div class="comment-item">
                                    <div class="comment-author">{{ $comment->author_name ?? 'Guest' }}</div>
                                    <p class="mb-0">{{ Str::limit($comment->content, 60) }}</p>
                                </div>
                            @empty
                                <p class="no-comments">No comments yet. Be the first to comment!</p>
                            @endforelse
                            
                            @if($post->comments->count() > 2)
                                <div class="text-center mt-2">
                                    <small>+ {{ $post->comments->count() - 2 }} more comments</small>
                                </div>
                            @endif
                        </div>

                        <!-- Button to trigger modal -->
                        <button type="button" class="btn add-comment-btn mt-3" data-bs-toggle="modal" data-bs-target="#commentModal-{{ $post->id }}">
                            <i class="far fa-edit me-1"></i> Add a Comment
                        </button>
                    </div>
                </div>
            </div>

            <!-- Comment Modal -->
            <div class="modal fade" id="commentModal-{{ $post->id }}" tabindex="-1" aria-labelledby="commentModalLabel-{{ $post->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header text-white">
                            <h5 class="modal-title" id="commentModalLabel-{{ $post->id }}">Leave a Comment</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.storeComment', $post->id) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="author_name" class="form-label">Your Name</label>
                                    <input type="text" name="author_name" class="form-control" placeholder="Enter your name" required>
                                </div>

                                <div class="mb-3">
                                    <label for="content" class="form-label">Your Comment</label>
                                    <textarea name="content" class="form-control" rows="4" placeholder="Share your thoughts..." required></textarea>
                                </div>

                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-success">
                                        <i class="far fa-paper-plane me-1"></i> Post Comment
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


@endsection