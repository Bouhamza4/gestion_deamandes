@extends('layouts.app')
@section('title') edit @endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"></div>
            
    </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Post</div>
                <div class="card-body ">
                    <form method="POST" action="{{route('posts.update',1 )}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="PostCreator">Post Creator</label>
                           <select name="PostCreator" class="form-control" id="PostCreator">
                            <option value="ahmed">Ahmed</option>
                            <option value="mohamed">Mohamed</option>
                           </select>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-danger">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




