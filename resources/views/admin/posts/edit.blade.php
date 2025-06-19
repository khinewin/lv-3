@extends("layouts.app")

@section("app_title", "Edit post")

@section("app_content")
<div class="container">
    <h2>Edit post</h2>
    <div class="row justify-content-center">
        <div class="col-sm-6">
            @include("partials.alert")
            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ route('update_post') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$p->id}}" name="id">
                        <div class="form-group mb-3">
                            <label for="image">Post image</label>
                            <input type="file" class="form-control border-0 border-bottom" name="image" id="image">
                            @error("image")
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                         <div class="form-group mb-3">
                            <label for="title">Title</label>
                            <input value="{{$p->title}}" type="text" class="form-control border-0 border-bottom" name="title" id="title">
                            @error("title")
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                         <div class="form-group mb-3">
                            <label for="content">Content</label>
                            <textarea  class="form-control border-0 border-bottom" name="content" id="content">{{$p->content}}</textarea>
                            @error("content")
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-lg" type="submit">Save</button>
                            <a href="{{route('show_posts')}}" class="btn btn-secondary btn-lg float-end">Close</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop