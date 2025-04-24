@extends('posts1.layouts.app')

@section('title', 'Liste des Posts')

@section('content')
    <h1>Liste des Posts</h1>
    <a href="{{ route('Posts1s.create') }}" class="btn btn-primary mb-3">Créer un Post</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Image</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>creat at</th>
            
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="Image du post" width="100">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('Posts1s.show', $post->slug) }}">
                            {{ $post->slug }}
                        </a>
                    </td>
                    <td>{{ $post->author }}</td>
                    <td>{{ $post->created_at->format('Y-m-d') }}</td>
                    
                    <td>
                        <a href="{{ route('Posts1s.show', $post->slug) }}"  class="btn btn-info">Voir</a>
                        <a href="{{ route('Posts1s.edit', $post->slug) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('Posts1s.destroy', $post->slug) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $posts->links() }}
@endsection