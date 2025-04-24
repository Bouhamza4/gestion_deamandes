@extends('vusers1.layouts.toutes')
@section('title',"information User")
@section('contentShowDetails')
<h3> {{$user['name']}} </h3>
<h6> {{$user['email']}} </h6>
<a class="btn btn-primary" href="{{route('Users.edit',$user['id'])}}">Edit</a>
<hr/>
{{-- delete --}}
<form action="{{route("Users.destroy",$user['id'])}}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-warning">DELETE</button>
</form>

@endsection
