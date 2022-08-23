@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4 p-5">
            <img src="/img/pic.jpg" alt="profile image" class="rounded-circle" style="height: 150px;"/>
        </div>
        <div class="col-8 pt-5">
            <div class="ps-4 pb-3 d-flex ">
                <h2 style="font-weight: lighter;">{{$user->username}}</h2>
                <a 
                href="/profile/{{ $user->id }}/edit" 
                class="ms-4 mb-2 pt-1 ps-2 px-2" 
                style=" color:black; 
                        font-weight: bold; 
                        border: 1px darkgray solid; 
                        border-radius: 5px; 
                        font-style:none;
                        text-decoration: none;">
                Edit profile</a>
                <a href="/p/create" class="ps-4 pt-1">
                        <div><img src="/img/add.png" alt="add icon" style="height: 25px;"/></div>
                </a>
            </div>
            <div class="d-flex pb-3">
                <div class="px-4"><strong>{{$user->posts->count()}}</strong> posts</div>
                <div class="px-4"><strong>1B</strong> followers</div>
                <div class="px-4"><strong>0</strong> following</div>
            </div>
            <div class="ps-4"><strong>{{ $user->profile->title }}</strong></div>
            <div class="ps-4">{{ $user->profile->description }}</div>
            <div class="ps-4"><a href="{{ $user->profile->url }}">{{ $user->profile->url }}</a></div>
        </div>
    </div>
    <div class="row pt-5">
        @foreach($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/p/{{ $post->id}}">
                <img src="/storage/{{ $post->image }} " alt="post image" class="w-100"/>
            </a>    
        </div>
        @endforeach
    </div>
</div>
@endsection
