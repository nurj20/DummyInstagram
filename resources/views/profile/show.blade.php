@extends('layouts.app')
@section('title')
{{-- {{$profile->user->name}} --}}
{{$user->name}}
@endsection

@section('content')
<div class="container justify-content-center mt-0 pt-0" style="width:65%">
    <div class="row">
        {{-- profile image --}}
        <div class="col-md-3 pr-5 pt-2 pl-4 mt-2"> 
        <img class="rounded-circle" src="/storage/{{$user->profile->profile_img}}" style="height:150px;width:150px;">
        </div>
        {{-- right of profile image --}}
        <div class="col-9 pt-2 pl-4 pb-1" class="style:margin-bottom:0px;">
           
            {{-- first row of right --}}
            <div class="d-flex align-items-baseline mb-3"> 
                <div class="profile-title pr-5"><h3>{{$user->name}} </h3></div>
                @if (Auth::id() === $user->id)
            <div class="border border-gray rounded p-1"> <a href="/profile/{{$user->id}}/edit" style="text-decoration:none; color:black;">Edit Profile</a> </div>
            </div>
                <div class="d-flex align-items-baseline mb-3">
                    <div class="mr-5"><a href="/post/create">Add Post </a></div>               
                </div>
                @else
            <div class="btn btn-primary rounded p-1" id="follow-btn" user_id ="{{$user->id}}" style="text-decoration:none; color:white;">Follow </div>
            </div>
                @endif
            
         {{-- end of first row of right --}}

            <div class="profile-statistics d-flex py-2">
            <div class="pr-3"> <strong>{{$user->posts->count()}}</strong> posts</div>
            <div class="pr-3"> <strong>{{$user->profile->followers->count()}}</strong> followers</div>
            <div class="pr-3"> <strong>{{$user->following->count()}}</strong> following</div>
            </div>
            {{-- profile link --}}
            <div class="instra-address pb-1"> <strong><a class="text-dark" href="#">noorrajper.com</a></strong></div>
        {{-- profile description --}}
            <div class="profile-description pb-1">{{$user->profile->description}}</div>
            {{-- profile website --}}
            <div class="website-link"><a href="#">www.noorrajper.com</a></div>
        </div>
        {{-- end of very first row which is divided into two colums on right is the profile pic and on left is resof the profile info --}}
        
    </div>
        <hr class="mb-0 mt-2 p-0" >
    <div class="row justify-content-center w-75 mb-1 mx-auto">
        <div class="col-md-5 ml-5 mt-0 pt-0 pl-5">
            <a href="#"><i class="fas fa-th"></i> Posts</a>
        </div>
        <div class="col-md-5 ml-2 mt-0 pt-0">
            <a href="#"><i class="fas fa-portrait"></i> Tagged</a>
        </div>
    </div>
    <div class="row d-flex ">
        @forelse($user->posts as $post)
        {{-- <div>{{$post->title}}</div> --}}

    <div class="col-4 py-1 pr-1"> <a href="/post/{{$post->id}}"> <img  class="w-100" src="/storage/{{$post->img}}"> </a> </div>
       @empty
           <div>No posts</div>
       @endempty
       
    </div>
</div>
<script src="{{asset('js/script.js')}}" defer></script>
@endsection

