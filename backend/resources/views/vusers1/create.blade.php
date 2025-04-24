@extends('vusers1.layouts.toutes');
@section('title','Create user')
@section('form')
<form action="{{route('Users.store')}}" method="POST">
    @csrf
    <div class="form-row ">
      <div class="col-md-4 mb-3">
        <label for="validationServer01">First name</label>
        <input type="text" class="form-control "  name="name" placeholder="First name" value="Mark" required>
        @error('name')
            <p>{{ $message }}</p>
        @enderror
      </div>
      
      
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationServer03">password</label>
        <input type="password" class="form-control!" name="password" placeholder="City" required>
        @error('password')
            <p>{{ $message }}</p>
        @enderror
    </div>
      </div>
      <div class="col-md-3 mb-3">
        <label for="validationServer04">Email</label>
        <input type="email" class="form-control "  name="email" value="{{old('email')}}" placeholder="email" required>
        @error('email')
            <p>{{ $message }}</p>
        @enderror
      </div>

      <div class="col-md-3 mb-3">
        <label for="validationServer04">PHONE</label>
        <input type="tel" class="form-control" name="phone" value="{{old('phone')}}"  placeholder="telphone" required>
        @error('phone')
            <p>{{ $message }}</p>
        @enderror
      </div>
      
   
    <button class="btn btn-primary" type="submit">Submit form</button>
  </form>
@endsection