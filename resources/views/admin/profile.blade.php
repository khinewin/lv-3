@extends("layouts.app")

@section("app_title", "Profile")

@section("app_content")

<div class="container">
    <h2>Profile</h2>
    <div class="row">
        <div class="col-sm-8">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Name : {{ Auth::user()->name }}</li>
                 <li class="list-group-item">Email : {{ Auth::user()->email }}</li>
                  <li class="list-group-item">Member Since : {{ date("d/m/Y h:i:s A", strtotime(Auth::user()->created_at) ) }}</li>
            </ul>
        </div>
        
        <div class="col-sm-4">
            @include("partials.alert")
             <form action="{{ route("update.password") }}" method="post">
                    @csrf
                   <div class="form-group mb-3">
                        <label for="password">Current Password</label>
                        <input type="password" name="current_password" class="form-control @error("current_password") is-invalid @enderror">
                        @error("current_password") <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">New Password</label>
                        <input type="password" name="new_password" class="form-control @error("new_password") is-invalid @enderror">
                        @error("new_password") <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="confirm_password">Confirm New password</label>
                        <input type="password" name="confirm_new_password" class="form-control @error("confirm_new_password") is-invalid @enderror">
                        @error("confirm_new_password") <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-primary">Update password</button>
                    </div>
                </form>
        </div>
    </div>
</div>

@stop