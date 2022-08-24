@extends('layouts.app')

@section('content')
<div class="container">
<form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-8 offset-2">
                <div class="row text-center">
                    <h2>Edit Profile</h2>
                </div>

                <div class="form-group row">
                    <label for="Title" class="col-md-4 col-form-label">Title</label>

                    <input id="Title" 
                        type="text" 
                        class="form-control @error('Title') is-invalid @enderror" 
                        name="Title" 
                        value="{{ old('Title') ?? $user->profile->title }}" 
                        autocomplete="Title" autofocus>

                    @error('Title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="Description" class="col-md-4 col-form-label">Description</label>

                    <textarea id="Description" 
                        type="text" 
                        class="form-control @error('Description') is-invalid @enderror" 
                        name="Description" 
                        value="{{ old('Description') ?? $user->profile->description }}" 
                        autocomplete="Description" autofocus>
                    </textarea>
                    @error('Description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="Url" class="col-md-4 col-form-label">Url</label>

                    <input id="Url" 
                        type="text" 
                        class="form-control @error('Url') is-invalid @enderror" 
                        name="Url" 
                        value="{{ old('Url') ?? $user->profile->url }}"
                        autocomplete="Url" autofocus>

                    @error('Url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="row">
                    <label for="file" class="col-md-4 col-form-label">Profile Image</label>
                    <input type="file" class="form-control-file" id="image" name="image"/>

                    @error('image')
                        <strong style="color: red;">{{ $message }}</strong>
                    @enderror
                </div>
                
                <div class="row pt-4">
                    <button class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
