@extends('postsFB.layout.app')

@section('title', 'Create Post')

@section('content')
<div class="form-wrapper" style="display: grid; grid-template-columns: 1fr; gap: 15px; max-width:600px; margin: auto; padding:20px;">
    <h2><i class="icon-create"></i> Create Post</h2>
    <form action="{{ route('PostsFB.store') }}" method="POST" enctype="multipart/form-data" id="createPostForm">
        @csrf
        <!-- Title Input -->
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title" required>
        </div>

        <!-- Comment Input -->
        <div class="form-group">
            <label for="comment">Comment</label>
            <input type="text" name="comment" id="comment" class="form-control" placeholder="Enter a short comment">
        </div>
        <div class="form-group">
            <label for="user_id">user_id</label>
            <input type="text" name="user_id" id="user_id" class="form-control"  required>
            @foreach ($errors->all() as $message) {
                <p>{{ $message }}</p>
                
            }
        </div>
        <div class="form-group">
            <label for="post_image">Post Image</label>
            <input type="file" name="post_image" id="post_image" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="status">status</label>
            <select name="status" id="status">
                <option value="published">Published</option>
                <option value="draft">Draft</option>
            </select>
        </div>
        
        


        <!-- Description Input (Textarea) -->
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="4" class="form-control" placeholder="Enter Description"></textarea>
        </div>

        

        <!-- Author Input -->
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" name="author" id="author" class="form-control" placeholder="Enter Author Name" required>
        </div>

        <!-- Slug Input -->
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" placeholder="Enter Slug (auto-generated if left empty)">
        </div>
        
        <!-- Extra field "Xil3iba" for fun -->
        <div class="form-group">
            <label for="fun_fact">Fun Fact</label>
            <input type="text" name="fun_fact" id="fun_fact" class="form-control" placeholder="Add a fun fact">
        </div>

        <button type="submit" class="btn btn-primary submit-btn" style="transition: transform 0.3s ease;">Create Post</button>
    </form>
</div>

<script>
// Simple JS to animate submit button on click
document.getElementById('createPostForm').addEventListener('submit', function(e) {
    const btn = document.querySelector('.submit-btn');
    btn.style.transform = 'scale(0.95)';
});
</script>
@endsection
