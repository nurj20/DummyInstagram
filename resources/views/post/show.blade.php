@extends('layouts.app')
@section('title')
show post
@endsection

@section('content')

<div class="container py-0 my-0 main" >
    <div class="row d-flex align-items-left mx-auto border shadow-lg mt-2 pl-0 py-0 " style="width:80%">
       
        {{-- left column --}}
        <div class="col-md-7 m-0 p-0" style="border-right: solid 1px #D3D3D3;" id="#left-col">
            {{-- pic col --}}
                <img  class="p-0 m-0 w-100" src="{{asset('storage')}}/{{$post->img}}" alt="">    
        </div>
       
        {{-- right column --}}
        <div class="col-md-5 d-flex flex-column p-0 mt-0 w-100 mx-0" id="#right-col">
        
            {{-- porfile owner  --}}
            <div class="p-3 ml-0 w-100" style="border:1px solid #D3D3D3; border-left:none;">
            <img src="{{asset('storage')}}/{{$post->user->profile->profile_img}}" style="width:40px;height:40px;border-radius:50%; margin-right:4%;" alt="">
               <strong>{{$post->user->username}}</strong>         
            </div>
          
            {{-- post owner comment --}}
            <div class="mt-0 p-3 d-flex" style="border-right: solid 1px #D3D3D3;">
                <div>
                    <img src="{{asset('storage')}}/{{$post->user->profile->profile_img}}" style="width:40px;height:40px;border-radius:50%; margin-right:4%;" alt="">
                </div>
               <div class="pl-4 pt-2">
                <strong>{{$post->user->username}}</strong>  {{$post->title}} 
               </div>
            </div>

            {{-- followers comments --}}
            <div class=" d-flex h-50 pl-3 flex-column" style="overflow-y:auto;border-right: solid 1px #D3D3D3;border-bottom: solid 1px #D3D3D3; max-height:400px;">
                @foreach ($post->comments as $comment)
                {{-- <div> --}}
                    <div class="pl-1 pt-3"><img src="{{asset('storage')}}/{{$post->user->profile->profile_img}}" style="width:40px;height:40px;border-radius:50%; margin-right:4%;" alt=""> 
                    <strong>{{auth()->user()->username}}</strong>  {{$comment->comment}} </div>     
               {{-- </div> --}}
                @endforeach
            </div>
           
            {{-- <div class="d-flex flex-column"> --}}
            {{-- liked by --}}
            <div class="pl-3 d-flex"  style="border-right: solid 1px #D3D3D3;border-bottom: solid 1px #D3D3D3; height:15%;">
              
                    <div class="pr-4 pt-2"><span id="likes"><i class="far fa-heart fa-2x"></i></span><br>likes</div>
                <div class="pt-2"><span><i class="far fa-comment fa-2x"></i></span> </div>
                
          <div class="pt-2 pl-4"> {{\Carbon\Carbon::parse($post->created_at)->format('M d, Y')}}        </div> 
        </div>
        
         {{-- add new comment here --}}
         <div class="mb-0 pb-0 pl-3" style="border-right: solid 1px #D3D3D3; height:12%;">
            {{-- text box for new comments to post --}}
            <form action="/comment/{{$post->id}}" method="POST">
                @csrf
                {{-- <label for="comment"></label> --}}
                <input class="w-75 h-100" type="text" name="comment" id="comment" style="border:transparent;background-color:transparent" placeholder="Add Comment here">
                <input class="text-primary" type="submit" value="Post" style="border:none;background-color:transparent">

            </form>
    </div>
              
        </div>
    </div>

</div>
<script>
    window.addEventListener('click',function(e)
    {
        if ((e.target).classList.contains('main'))
         window.location.replace(location.origin +'/profile/'+ {{$post->user->id}});           
            });
</script>
@endsection