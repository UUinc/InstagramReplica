@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" alt="post caption : {{ $post->caption }}" class="w-100"/>
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex ">
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
                    <div class="ps-1">
                        <b>•</b>
                    </div>
                    <div class="ps-1">
                        <a href="#">
                            <b>Follow</b>
                        </a>
                    </div>
                </div>

                <hr style="opacity: 0.1;"/>

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

@endsection