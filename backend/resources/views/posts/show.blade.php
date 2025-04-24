
@extends('layouts.app')
@section('title','show')
@section('content')

   
<div>

<div class="card">
  <div class="card-header">
    Post Info 
  </div>
  <div class="card-body">
    <h5 class="card-title">Title: {{ $post['title' ]}}</h5>
    <p class="card-text">Body: {{ $post['description'] }}</p>
    <p class="card-text">Posted By: {{ $post["posted_by"] }}</p>
    <p class="card-text">Created At: {{ $post["created_at"] }}</p>
  </div>
</div>
</div>

@endsection
   
