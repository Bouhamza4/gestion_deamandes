@extends("postsFB.layout.app")
@section('title',"Posts Guide")
@section('content')

<h1>Posts Guide</h1>

@if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
<div class="post-grid">
    @foreach($posts as $post)
        <div class="post-card">
            {{-- Post Image --}}
            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="Image du post" class="post-image">
            @endif
            {{-- Post Info --}}
            <div class="post-info">
                <h2>
                    <a href="{{ route('PostsFB.show', $post->slug) }}">
                        {{ $post->slug }}
                    </a>
                </h2>
                <p class="post-author">By {{ $post->author }} on {{ $post->created_at->format('Y-m-d') }}</p>
            </div>
            {{-- Post Actions --}}
            <div class="post-actions">
                <a href="{{ route('PostsFB.show', $post->slug) }}"  class="btn btn-info">
                    <i class="icon-eye"></i>
                </a>
                <a href="{{ route('PostsFB.edit', $post->slug) }}" class="btn btn-warning">
                    <i class="icon-edit"></i>
                </a>
                <a href="#" class="btn btn-secondary icon-comment" title="Comment">
                    <i class="icon-comment"></i>
                </a>
                <form action="{{ route('PostsFB.destroy', $post->slug) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="icon-delete"></i>
                    </button>
                </form>
            </div>
        </div>
    @endforeach
</div>
{{ $posts->links() }}
@endsection