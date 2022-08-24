@extends('layouts.app')

@section('content')

<div class="container">
    @foreach($posts as $post)
        <div class="row">
            <div class="col-6 offset-3 mt-2 mb-2 pt-3 pb-1" 
                 style="border:1px #DDD solid; border-radius:7px; padding:0;">
                <!-- User profile picture and username -->
                <div class="d-flex ps-3 pb-3">
                    <div>
                        <a href="/profile/{{ $post->user_id }}">
                            <img src="{{ $post->user->profile->profileImage() }}" alt="profile image" class="rounded-circle w-100" style="max-width: 30px;"/>
                        </a>
                    </div>
                    <div class="ps-2">
                        <a href="/profile/{{ $post->user_id }}" style="color:black;  text-decoration: none;">
                            <b>{{ $post->user->username }}</b>
                        </a>
                    </div>
                </div>
                <!-- User post image -->
                <div class="">
                    <img src="/storage/{{ $post->image }}" alt="post caption : {{ $post->caption }}" class="w-100"/>
                </div>
                <!-- post caption -->
                <div class="ps-3 pt-3">
                    <div>
                        <p>
                            <a href="/profile/{{ $post->user_id }}" style="color:black; text-decoration: none;">
                                <b>{{ $post->user->username }}</b>
                            </a> 
                            {{ $post->caption }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection