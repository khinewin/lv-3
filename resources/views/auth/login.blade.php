@extends("layouts.app")
@section("app_title", "User signin")
@section("app_content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6 col-md-4">
            @include("partials.alert")
            <h3 class="text-center text-primary">Simple Blog</h3>
            <span class="text-lighter small">Signin to continued your session.</span>
            <div class="card shadow">
                <div class="card-body">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                  
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control @error("email") is-invalid @enderror">
                        @error("email") <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control @error("password") is-invalid @enderror">
                        @error("password") <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                  
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-primary">Signin</button>
                    </div>
                </form>
            </div>
        </div>
        <div>Don't  has an account ? <a href="{{ route('register') }}">Signup<a></div>
        </div>
    </div>
</div>

@stop


