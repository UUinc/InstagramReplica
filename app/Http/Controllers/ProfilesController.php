<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
use App\Models\User;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        
        //Cache
        //Post count
        $postCount = Cache::remember
        ('count.posts.' . $user->id ,
         now()->addSeconds(30),
         function() use ($user){
            return $user->posts->count();
        });
        //Followers count
        $followersCount = Cache::remember(
            'count.followers.' . $user->id,
            now()->addSeconds(30),
            function() use ($user)
            {
                return $user->profile->followers->count();
            }
        );
        //Following count
        $followingCount = Cache::remember(
            'count.following.' . $user->id,
            now()->addSeconds(30),
            function() use ($user)
            {
                return $user->following->count();
            }
        );
        
        return view('profiles/index', compact('user', 'follows', 'postCount', 'followersCount', 'followingCount'));
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
