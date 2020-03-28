<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function store(\App\Post $post){
        \App\Comment::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'comment' => request()['comment'],
            ]);
            return redirect('post/'.$post->id);
    }
}
