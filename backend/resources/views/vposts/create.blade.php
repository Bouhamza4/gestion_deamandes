@extends('vposts.layouts.toutes');
@section('title','Create Posts')
@section('form')
<form action="{{route('Posts1.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-row ">
      <div class="col-md-4 mb-3">
        <label for="validationServer01">Title</label>
        <input type="text" class="form-control "  name="title" placeholder="Title" value="{{old('title')}}" required>
        @error('title')
            <p>{{ $message }}</p>
        @enderror
      </div>
      
      
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationServer03">Slug</label>
        <input type="text" class="form-control" value="{{old('slug')}}" name="slug" placeholder="Slug" required />
        @error('slug')
            <p>{{ $message }}</p>
        @enderror
    </div>
      </div>
      <div class="col-md-3 mb-3">
        <label for="validationServer04">Author</label>
        <input type="text" class="form-control "  name="Author" value="{{old('Author')}}" placeholder="email" required>
        @error('Author')
            <p>{{ $message }}</p>
        @enderror
      </div>
      <div class="col-md-3 mb-3">
        <label for="validationServer04">Image</label>
        <input type="file" class="form-control "  name="image" value="{{old('image')}}" placeholder="email" required>
        @error('image')
            <p>{{ $message }}</p>
        @enderror
      </div>

      <div class="col-md-3 mb-3">
        <label for="validationServer04">Body</label>
        <textarea name="body"  value="{{old('body')}}" cols="30" rows="10"></textarea>
        @error('body')
            <p>{{ $message }}</p>
        @enderror
      </div>
      
   
    <button class="btn btn-primary" type="submit">Submit form</button>
  </form>
@endsection