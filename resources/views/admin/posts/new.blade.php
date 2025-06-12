@extends("layouts.app")

@section("app_title", "New post")

@section("app_content")
<div class="container">
    <h2>Add post</h2>
    <div class="row justify-content-center">
        <div class="col-sm-6">
            @include("partials.alert")
            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ route('new_post') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="image">Post image</label>
                            <input type="file" class="form-control border-0 border-bottom" name="image" id="image">
                            @error("image")
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                         <div class="form-group mb-3">
                            <label for="title">Title</label>
                            <input type="text" class="form-control border-0 border-bottom" name="title" id="title">
                            @error("title")
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                         <div class="form-group mb-3">
                            <label for="content">Content</label>
                            <textarea  class="form-control border-0 border-bottom" name="content" id="content"></textarea>
                            @error("content")
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-lg" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop