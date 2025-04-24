@extends('vusers1.layouts.toutes')
@section('title',"Users Guide")
@section('card')
@foreach ($users as $u)
<div class="card-header">
    <h4>
        <span class="icon"></span>
        <a href="{{route('Users.show',$u['id'])}}">{{$u['name']}}</a>
    </h4>
    <p>phone: {{$u->phone}}<br></p>
    <p>email: {{$u->email}}<br></p>
</div>


    
@endforeach



@endsection
