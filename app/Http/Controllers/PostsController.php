<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');    
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');
        //add also your posts to the timeline
        $users[] = auth()->user()->id;

        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->get();
        
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $user = auth()->user();
        return view('posts.create', compact('user'));
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image']
        ]);

        $imagepath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("/storage/{$imagepath}"))->fit(1200, 1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagepath
        ]);

        return redirect('/profile/'. auth()->user()->id);
    }

    public function show(\App\Models\Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
