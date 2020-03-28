@extends('layouts.app')
@section('title')
Create Post
@endsection

@section('content')
<div class="container w-50">
<form action="/post" method="POST" enctype="multipart/form-data">
@csrf
<div class="form-group">
    <label for="postTitle">Post Title</label>
    <input type="text" class="form-control" name ="title" id="postTitle"> 
    @error('title')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    <label for="file">Image</label>
<input type="file" id="file" name ="file_name" class="form-control">
@error('file_name')
<span class="text-danger">{{$message}}</span>
@enderror
</div>
<div class="form-group w-25">
    <input type="submit" value="submit" class="form-control bg bg-primary text-white">
</div>
</form>
</div>
@endsection
