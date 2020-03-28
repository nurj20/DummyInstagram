<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function store(\App\User $user){
      return  auth()->user()->following()->toggle($user->id);
    }

    public function show(\App\User $user){
        $following = auth()->user()->following;
    $doesFollow = false;
        for ($i=0; $i<count($following); $i++)
       {if (($following[$i])->id === $user->id)
            { $doesFollow = true;}
       }
return $doesFollow;
    }
}