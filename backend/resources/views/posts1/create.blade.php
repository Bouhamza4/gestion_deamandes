@extends('posts1.layouts.app')

@section('title', 'Créer un Post')

@section('content')
    <h1>Créer un Post</h1>
    <form action="{{ route('Posts1s.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Titre:</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="mb-3">
            <label>user:</label>
            <input type="text" name="user_id" value="{{$user->id}}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Auteur:</label>
            <input type="text" name="author" class="form-control">
        </div>
        <div class="mb-3">
            <label>Image:</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="mb-3">
            <label>Contenu:</label>
            <textarea name="body" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Ajouter</button>
    </form>
@endsection