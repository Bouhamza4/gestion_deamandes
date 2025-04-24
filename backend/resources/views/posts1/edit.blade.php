@extends('posts1.layouts.app')

@section('title', 'update  un Post')

@section('content')
    <h1>Créer un Post</h1>
    <form action="{{ route('Posts1s.update',$post->slug) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Titre:</label>
            <input type="text" value="{{$post->title}}" name="title" class="form-control">
        </div>
        <div class="mb-3">
            <label>Auteur:</label>
            <input type="text" value="{{$post->author}}" name="author" class="form-control">
        </div>
        <div class="mb-3">
            <label>Image:</label>
            <input type="file" value="{{$post->image}}" name="image" class="form-control">
        </div>
        <div class="mb-3">
            <label>Contenu:</label>
            <textarea name="body"  class="form-control">{{$post->body}}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Ajouter</button>
    </form>
@endsection