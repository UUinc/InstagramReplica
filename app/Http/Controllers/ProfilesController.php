<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\User;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        return view('profiles/index', compact('user'));
    }
    
    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles/edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'Title' => 'required',
            'Description' => 'required',
            'Url' => 'url',
            'image' => '',
        ]);
        
        $imagepath = $user->profile->image;
        if(request('image'))
        {
            $imagepath = request('image')->store('profile', 'public');
            
            $image = Image::make(public_path("storage/{$imagepath}"))->fit(1000, 1000);
            $image->save();
        }

        auth()->user()->profile->update(array_merge(
            $data,
            ['image' => $imagepath]
        ));
        
        return redirect("/profile/{$user->id}");
    }
}
