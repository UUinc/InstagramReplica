@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="d-flex post-frame">
            <div class="col-8">
                <img src="/storage/{{ $post->image }}" alt="post caption : {{ $post->caption }}" class="w-100"/>
            </div>
            <div class="col-4">
                <div>
                    <div class="d-flex pt-3 ps-3">
                        <div>
                            <a href="/profile/{{ $post->user_id }}">
                                <img src="{{ $post->user->profile->profileImage() }}" alt="profile image" class="rounded-circle w-100" height="30"/>
                            </a>
                        </div>
                        <div class="ps-2">
                            <a href="/profile/{{ $post->user_id }}" class="username-link">
                                <b>{{ $post->user->username }}</b>
                            </a>
                        </div>
                        @if(auth()->user() == null ? True : auth()->user()->id != $post->user->id)
                        <div class="ps-1">
                            <b>•</b>
                        </div>
                        <div class="ps-1">
                            <a href="#">
                                <b>Follow</b>
                            </a>
                        </div>
                        @endif
                    </div>

                    <hr class="hr"/>

                    <p class="ps-2">
                        <a href="/profile/{{ $post->user_id }}" class="username-link">
                            <b>{{ $post->user->username }}</b>
                        </a> 
                        {{ $post->caption }}
                    </p>
                </div>
            </div>
        </div>    
    </div>
</div>

@endsection