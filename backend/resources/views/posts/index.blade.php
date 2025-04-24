@extends('layouts.app')
@section('title', 'Posts') 

@section('content')

<div class="text-center p-4">
<a href="{{ route('posts.create') }}" type="button" class="btn btn-success">Create Post</a>
</div>
    
<div>

<table class="table table-striped mt-4">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Posted By</th>
      <th scope="col">Create At</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <hr>
  <tbody>
    @foreach($posts as $post)
    <tr>
      <th scope="row">{{ $post["id"] }}</th>
      <td>{{ $post["title"] }}</td>
      <td>{{ $post["posted_by"] }}</td>
      <td>{{ $post["created_at"] }}</td>
      <td style="display: flex; gap:10px;"><a class="btn btn-primary" href="{{ route('posts.show',  $post['id']) }} ">view</a><a href="{{route('posts.edit',$post['id'])}}" class="btn btn-warning" >Edit</a><button class="btn btn-danger">Delete</button></td>
    </tr>
    @endforeach
    
    
  </tbody>
</table>
</div>
@endsection
    
