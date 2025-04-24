@extends('vposts.layouts.toutes')
@section('title',"Posts Guide")
@section('card')
@foreach ($posts as $p)
<div class="card-header">
    <h4>
        <span class="icon"></span>
        <a href="{{ route('Posts1.show', $p['id']) }}">{{ $p['title'] }}</a>
    </h4>
    <p>slug: {{ $p->slug }}<br></p>
    <p>autheur: {{ $p->Author }}<br></p>
    <img src="{{ asset('storage/upload/' . ($p->image ? $p->image : 'default1.png')) }}" alt="{{ $p->title }}">
</div>
@endforeach
@endsection
