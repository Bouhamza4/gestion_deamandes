@extends('posts1.layouts.app')

@section('content')
<div class="container">
    

    <p><strong>Tatile:</strong> {{ $post->title }}</p>
    <p><strong>Author:</strong> {{ $post->author }}</p>
    <p><strong>Body:</strong> {{ $post->body }}</p>
    <p><strong>user:</strong> {{ $post->user->name }}</p>
    <p><strong>La Date De Creation:</strong> {{ $post->user->created_at }}</p>

    @if ($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" alt="Image du post" width="400">
    @endif

    <br>
    <a href="{{ route('Posts1s.index') }}" class="btn btn-primary">Retour</a>
    <a href="{{ route('Posts1s.edit', $post->slug) }}" class="btn btn-warning">Modifier</a>
    <form action="{{ route('Posts1s.destroy', $post->slug) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Supprimer</button>
    </form>
</div>
@endsection