@extends("layouts.app")

@section("app_title", "Welcome Sample Blog")

@section("app_content")

<div class="container">
    <div class="row mb-2">
        <div class="col-sm-4"><h3>Posts</h3></div>
        <div class="col-sm-8">
            <form action="{{ route("posts_search") }}" method="get">
                <div class="d-flex">
                    <input type="search" name="q" class="form-control" placeholder="Search post">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        @foreach($posts as $p)
        <div class="col-sm-6 col-md-4">
            <div class="card shadow">
                <img src="{{ asset($p->image) }}" class="card-img-top" alt="Image not found">
                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $p->title }}</h5>
                    <div>{{ Str::limit($p->content, 100, '...') }}</div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <div class="text-lighter small">Post by : <a href="{{ route('post-by-user', ['user_id'=>$p->user->id]) }}">{{ $p->user->name }}</a></div>
                        <div class="text-lighter small">{{ $p->created_at->diffForHumans() }}</div>
                    </div>
                    <hr>
                    <div class="d-grid">
                        <a href="{{ route("post_details", ["id"=>$p->id]) }}" class="btn btn-secondary">Continued >></a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{ $posts->links() }}
</div>

@stop