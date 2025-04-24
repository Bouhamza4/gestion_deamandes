@extends('postsFB.layout.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Professional Page</title>
    <style>
        body {
            background: #f4f4f9;
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 30px auto;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        header {
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
        }
        header h1 {
            font-size: 2em;
            margin: 0;
            padding-bottom: 10px;
        }
        /* CSS for dynamic content section */
        .dynamic-content {
            margin-top: 20px;
            padding: 15px;
            background: #fafafa;
            border-top: 2px solid #ddd;
        }
        .dynamic-content .post {
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }
        .icon-comment {
            font-size: 1.5em;
            color: #007bff; /* adjusted icon color */
            vertical-align: middle;
        }
        .btn-secondary:hover .icon-comment {
            color: #0056b3;
        }
        /* New comment styling */
        .comment {
            background: #f9f9f9;
            padding: 10px;
            border-left: 4px solid #007bff;
            margin-bottom: 10px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
<div class="container">
    <header>
        <h1>Post Page</h1>
    </header>
    <section class="dynamic-content">
        @if(isset($post) && $post->count() > 0)
            {{-- <h2>Posts</h2> --}}
            
                <div class="post">
                    <h2>{{ $post->title }}</h2>
                    <p>{{ $post->description }}</p>
                    <p>Author: {{ $post->author }}</p>
                    <p>status: {{$post->status}}</p>
                    <p>user_id: {{$post->user_id}}</p>
                    <p>Created at: {{ $post->created_at->format('Y-m-d') }}</p>
                    @foreach ($comment as $c )
                    <div class="comment">{{ $c }}</div>
                    @endforeach
                     
                </div>
            
        @else
            <p>No data available.</p>
        @endif
    </section>
    <div class="post-actions">
        <a href="{{ route('PostsFB.edit', $post->slug) }}" class="btn btn-warning">
            <i class="icon-edit"></i>
        </a>
        <a href="#" id="commentButton" class="btn btn-secondary" title="Comment">
            <i class="icon-comment"></i>
        </a>
        <form action="{{ route('PostsFB.destroy', $post->slug) }}" method="POST" style="display:inline;">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-danger">
                <i class="icon-delete"></i>
            </button>
        </form>
    </div>
    <div id="commentForm" style="display:none; margin-top:10px;">
        <form action="{{ route('PostsFB.comment', $post->slug) }}" method="POST">
            @csrf
            <textarea name="comment" rows="3" placeholder="Write your comment here..." style="width:100%; padding:5px;"></textarea>
            <button type="submit" class="btn btn-primary">Post Comment</button>
        </form>
    </div>
</div>
<script>
    document.getElementById('commentButton').addEventListener('click', function(e) {
        e.preventDefault();
        var commentForm = document.getElementById('commentForm');
        commentForm.style.display = (commentForm.style.display === 'none') ? 'block' : 'none';
    });
</script>
</body>
</html>

@endsection
