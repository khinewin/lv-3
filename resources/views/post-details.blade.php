@extends("layouts.app")

@section("app_title", "$p->title")

@section("app_content")

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <img src="{{ asset($p->image) }}" class="card-img-top" alt="Image not found">
                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $p->title }}</h5>
                    <div>{{ $p->content }}</div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <div class="text-lighter small">Post by : <a href="{{ route('post-by-user', ['user_id'=>$p->user->id]) }}">{{ $p->user->name }}</a></div>
                        <div class="text-lighter small">{{ $p->created_at->diffForHumans() }}</div>
                    </div>
                    <hr>
                    <div class="">
                        <a href="{{ route('home') }}" class="btn btn-primary">Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop