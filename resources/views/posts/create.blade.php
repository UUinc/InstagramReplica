@extends('layouts.app')

@section('content')

<div class="container">
    <div class="post-frame">
        <form action="/p" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row">
                <div class="d-flex justify-content-between pt-2">
                    <div class="ps-2">
                        <a href="/profile/{{$user->id}}">
                            <img src="/img/back.png" alt="back image" height="25"/>
                        </a>
                    </div>
                    <div class="pt-1">
                        <h6><b>Create new post</b></h6>
                    </div>
                    <div>
                        <button class="btn btn-link btn-sm link">Share</button>
                    </div>
                </div>
                <div class="">
                    <hr/>
                </div>
                <div class="d-flex justify-content-between">
                    <!-- image -->
                    <div class="ps-5">
                        <label for="file" class="col-md-4 col-form-label">Post Image</label>
                        <input type="file" class="form-control-file" id="image" name="image"/>

                        @error('image')
                            <br/>
                            <strong class="error">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="pe-5 pb-4">
                        <div class="d-flex pe-5 pb-2">
                            <div>
                                <a href="/profile/{{ $user->id }}">
                                    <img src="{{ $user->profile->profileImage() }}" alt="profile image" class="rounded-circle w-100" height="30"/>
                                </a>
                            </div>
                            <div class="ps-2">
                                <a href="/profile/{{ $user->id }}" class="username-link">
                                    <b>{{ $user->username }}</b>
                                </a>
                            </div>
                        </div>
                        <!-- caption -->
                        <div class="form-group">
                            <!-- <label for="caption" class="col-md-4 col-form-label">Post Caption</label> -->
                            <textarea id="caption" 
                            type="text" 
                            placeholder="Write a caption..."
                            class="form-control @error('caption') is-invalid @enderror" 
                            name="caption" 
                            value="{{ old('caption') }}" 
                            autocomplete="caption" autofocus>
                            </textarea>
                            @error('caption')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>    
</div>

@endsection