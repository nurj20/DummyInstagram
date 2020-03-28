@extends('layouts.app')
@section('title')
{{-- {{$profile->user->name}} --}}
Edit Profile
@endsection

@section('content')
<div class="container justify-content-center mt-0 pt-0" style="width:65%">
    <div class="row">
    <form action="/profile/{{$user->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="description">Profile Description</label>
                <input type="text" class="form-control" name="description" value="{{$user->profile->description}}" id="description">
                @error('description')
            <div><span>{{$message}}</span></div>
                @enderror

    
            </div>
            {{-- <div class="form-froup">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" value="{{$user->username}}" id="username">
            </div>
            <div class="form-froup">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" value="{{$user->email}}" id="email">
            </div> --}}
            <div class="form-group">
                <label for="file_name">Profile Pic</label>
                <input type="file" class="form-control-file" name="profile_img"  id="file_name">
            </div>
            <div class="form-group">
                <input type="submit" value="save" class="form-control">
            </div>

        </form>
      
</div>
@endsection
