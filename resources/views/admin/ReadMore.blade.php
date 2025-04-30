@extends('layouts.app')

@section('content')
@php
    use Illuminate\Support\Str;
@endphp

<style>
    .blog-detail-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 2rem;
    }
    
    .blog-header {
        text-align: center;
        margin-bottom: 3rem;
    }
    
    .blog-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 1rem;
    }
    
    .blog-meta {
        color: #7f8c8d;
        margin-bottom: 1.5rem;
        font-size: 0.95rem;
    }
    
    .blog-image {
        width: 100%;
        height: 400px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 2rem;
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    .blog-content {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #34495e;
        margin-bottom: 3rem;
    }
    
    .comments-section {
        background-color: #f8f9fa;
        padding: 2rem;
        border-radius: 8px;
        margin-top: 3rem;
    }
    
    .comments-title {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        color: #2c3e50;
        display: flex;
        align-items: center;
    }
    
    .comments-title i {
        margin-right: 10px;
    }
    
    .comment-item {
        background-color: white;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        border-radius: 6px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }
    
    .comment-author {
        font-weight: 600;
        color: #6e8efb;
        margin-bottom: 0.5rem;
    }
    
    .comment-date {
        color: #95a5a6;
        font-size: 0.8rem;
        margin-bottom: 0.5rem;
    }
    
    .comment-content {
        color: #34495e;
    }
    
    .no-comments {
        color: #95a5a6;
        font-style: italic;
        padding: 1rem 0;
    }
    
    .add-comment-btn {
        background: linear-gradient(135deg, #6e8efb, #a777e3);
        border: none;
        padding: 0.7rem 1.5rem;
        font-weight: 500;
        color: white;
        border-radius: 6px;
        transition: all 0.3s;
        display: inline-flex;
        align-items: center;
    }
    
    .add-comment-btn:hover {
        background: linear-gradient(135deg, #5a7df4, #9666d8);
        transform: translateY(-2px);
        color: white;
    }
    
    .back-to-blog {
        display: inline-flex;
        align-items: center;
        color: #7f8c8d;
        margin-bottom: 2rem;
        transition: all 0.3s;
    }
    
    .back-to-blog:hover {
        color: #6e8efb;
        transform: translateX(-5px);
    }
    
    @media (max-width: 768px) {
        .blog-detail-container {
            padding: 1rem;
        }
        
        .blog-title {
            font-size: 1.8rem;
        }
        
        .blog-image {
            height: 250px;
        }
    }
</style>

<div class="blog-detail-container">
    <!-- Back button -->
    <a href="#" class="back-to-blog">
        <i class="fas fa-arrow-left me-2"></i> Back to Blog
    </a>

    <!-- Blog Header -->
    <div class="blog-header">
        <h1 class="blog-title">{{ $post->title }}</h1>
        <div class="blog-meta">
            <span><i class="far fa-calendar-alt me-1"></i> {{ $post->date }}</span>
        </div>
    </div>

    <!-- Blog Image -->
    @if($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" class="blog-image" alt="{{ $post->title }}">
    @else
        <img src="https://images.unsplash.com/photo-1499750310107-5fef28a66643?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&h=400&q=80" class="blog-image" alt="Blog post image">
    @endif

    <!-- Blog Content -->
    <div class="blog-content">
        {!! nl2br(e($post->content)) !!}
    </div>

    <!-- Comments Section -->
    <div class="comments-section">
        <h3 class="comments-title">
            <i class="far fa-comments"></i> 
            Comments ({{ $post->comments->count() }})
        </h3>

        @forelse($post->comments as $comment)
            <div class="comment-item">
                <div class="comment-author">{{ $comment->author_name ?? 'Guest' }}</div>
                <div class="comment-date">{{ $comment->created_at->format('F j, Y \a\t g:i a') }}</div>
                <div class="comment-content">{{ $comment->content }}</div>
            </div>
        @empty
            <p class="no-comments">No comments yet. Be the first to comment!</p>
        @endforelse


      
       
        <!-- Comment Form -->
        <div class="mt-4">
            <h4 class="mb-3">Add a Comment</h4>
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

                <button type="submit" class="btn add-comment-btn">
                    <i class="far fa-paper-plane me-1"></i> Post Comment
                </button>
            </form>
        </div>
    </div>
</div>



<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

@endsection