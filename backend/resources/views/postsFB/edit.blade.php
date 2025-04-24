@extends('postsFB.layout.app')

@section('title', 'Edit Post')

@section('content')
<div class="form-wrapper" style="display: grid; grid-template-columns: 1fr; gap: 15px; max-width:600px; margin: auto; padding:20px;">
    <h2>Edit Post</h2>
    @foreach ($errors->all() as $message)
    <p>{{ $message }}</p>
@endforeach
    <form action="{{ route('PostsFB.update', $post->slug) }}" method="POST" enctype="multipart/form-data" id="editPostForm">
        @csrf
        @method('PUT')
        <!-- Title Input -->
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" value="{{$post->title}}" id="title" class="form-control" value="{{ $post->title }}" required>
        </div>

        <!-- Comment Input -->
        <div class="form-group">
            <label for="comment">Comment</label>
            <input type="text" name="comment" value="{{$post->comment}}" id="comment" class="form-control" value="{{ $post->comment ?? '' }}">
        </div>

        <!-- Description Input (Textarea) -->
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" value="{{$post->description}}" id="description" rows="4" class="form-control">{{ $post->description ?? '' }}</textarea>
        </div>
        <div class="form-group">
            <label for="user_id">user_id</label>
            <input type="text" name="user_id" id="user_id" class="form-control" value="{{$post->user_id}}"  required>
           
        </div>
       
        <div class="form-group">
            <label for="status">status</label>
            <select name="status" value="{{$post->status}}" id="status">
                <option value="published">Published</option>
                <option value="draft">Draft</option>
            </select>
        </div>
        
        
        <!-- Photo Input -->
        <div class="form-group">
            <label for="post_image">Post Image</label>
            <input type="file" value="{{$post->image}}" name="post_image" id="post_image" class="form-control" required>
            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="Current Photo" style="max-width:100px; margin-top:10px;">
            @endif
        </div>

        <!-- Author Input -->
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" name="author" value="{{$post->author}}" id="author" class="form-control" value="{{ $post->author }}" required>
        </div>

        <!-- Slug Input -->
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" value="{{$post->slug}}" class="form-control" value="{{ $post->slug }}">
        </div>

        <!-- Extra field "Xil3iba" for fun -->
        <div class="form-group">
            <label for="fun_fact">Fun Fact</label>
            <input type="text" name="fun_fact" value="{{$post->fun_fact}}" id="fun_fact" class="form-control" value="{{ $post->fun_fact ?? '' }}">
        </div>

        <button type="submit" class="btn btn-primary submit-btn" style="transition: transform 0.3s ease;">Update Post</button>
    </form>
</div>


@endsection
