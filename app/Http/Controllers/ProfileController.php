<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\User;
use App\Profile;

class ProfileController extends Controller
{
    public function show(User $user){
        
        return view('profile.show', compact('user'));
    }
    public function edit(User $user){
        $this->authorize('update',$user->profile);
     return view ('profile.edit', compact('user')); 
    }
    public function update(User $user){
       $this->authorize('update',$user->profile);
        $data=request()->validate([
            'description' => ['required', 'string'],
            'profile_img' => ['sometimes', 'image']
        ]);
        
        if(count($data)==2){
            $imgPath = $data['profile_img']->store('postImgs', 'public');
            $img = Image::make(public_path("/storage/{$imgPath}"))->fit(515,600)->save();
            $data['profile_img'] = $imgPath;
              if (strpos($user->profile->profile_img , 'profile.png') === false )
                unlink(public_path().'/storage/'.$user->profile->profile_img);
              
        }
        $user->profile->update($data);
        return redirect("profile/".$user->id);

    }
}
