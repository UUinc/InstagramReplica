@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="/img/pic.jpg" alt="profile image" class="rounded-circle" style="height: 125px;"/>
        </div>
        <div class="col-9 pt-5">
            <div class="ps-4">
                <h1 style="font-weight: lighter;">{{$user->username}}</h1>
            </div>
            <div class="d-flex">
                <div class="px-4"><strong>999</strong> posts</div>
                <div class="px-4"><strong>999</strong> followers</div>
                <div class="px-4"><strong>999</strong> following</div>
            </div>
            <div class="ps-4">Yahya Lazrek</div>
            <div class="ps-4">description blabla...</div>
            <div class="ps-4"><a href="#">www.yahyalazrek.com</a></div>
        </div>
    </div>
    <div class="row pt-5">
        <div class="col-4">
            <img src="/img/post1.jpg" alt="post image" class="w-100"/>
        </div>
        <div class="col-4">
            <img src="/img/post1.jpg" alt="post image" class="w-100"/>
        </div>
        <div class="col-4">
            <img src="/img/post1.jpg" alt="post image" class="w-100"/>
        </div>
    </div>
</div>
@endsection
