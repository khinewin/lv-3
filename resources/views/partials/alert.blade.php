@session("success_msg")
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success_msg') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endsession

@session("error_msg")
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error_msg') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endsession
