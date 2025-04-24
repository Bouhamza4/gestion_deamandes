@extends('layouts.amin')
@section('title', 'Produit1')
@section('content')

  @section('image')
    <img src="{{url('images/iphone16.jpeg')}}" class="card-img-top" alt="...">
  @endsection
  @section('title')
  <h5 class="card-title">{{$title}}</h5>
  @endsection
 @section('prix')
 <p class="card-text">Prix : {{$price}} DH</p>
 @endsection
  @section('description')
  <p class="card-text">{{$description}}</p>
  @endsection
 

@endsection