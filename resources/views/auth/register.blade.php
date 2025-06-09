@extends("layouts.app")

@section("app_title", "User account registration")

@section("app_content")

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6 col-md-4">
            @include("partials.alert")
            <h3 class="text-center text-primary">Simple Blog</h3>
            <span class="text-lighter small">Signup new user account</span>
            <div class="card shadow">
                <div class="card-body">
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control @error("name") is-invalid @enderror">
                        @error("name") <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
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
                    <div class="form-group mb-3">
                        <label for="confirm_password">Confirm password</label>
                        <input type="password" name="confirm_password" class="form-control @error("confirm_password") is-invalid @enderror">
                        @error("confirm_password") <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-primary">Signup</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>

@stop