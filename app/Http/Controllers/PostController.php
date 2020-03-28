<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function create(\App\User $user){
        return view('post.create', compact('user'));
    }
    public function store(){
            $data = $this->validateReq();
            $imgPath =   $data['file_name']->store('postImgs', 'public');
            $img = Image::make(public_path("storage/{$imgPath}"))->fit(515,600)->save(); 
               $req_data =['title'=> $data['title'], 'img' => $imgPath];
             auth()->user()->posts()->create($req_data);
           
            return redirect('/profile/'.auth()->user()->id);
    
    }

    public function show(\App\Post $post){
            return view('post.show', compact('post'));
    }

    private function validateReq(){
        return request()->validate([
            'title' => 'required',
            'file_name' => ['required', 'image'],
        ]);
    }
}
