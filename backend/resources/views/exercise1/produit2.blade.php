@extends('layouts.amin')
@section('title', 'Produit1')
@section('content')
<div class="card" style="width: 18rem;">
    <img src="{{url('images/sumsung25.jpeg')}}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{$title}}</h5>
      <p class="card-text">{{$description}}</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>

@endsection