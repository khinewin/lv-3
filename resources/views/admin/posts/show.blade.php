@extends("layouts.app")

@section("app_title", "Show all posts")

@section("app_content")
<div class="container">
    <h2>Posts</h2>
    <div class="row justify-content-center">
       <div class="col-sm-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="col-0">ID</th>
                        <th class="col-2">Image</th>
                        <th class="col-2">Titlte</th>
                        <th class="col-2">Content</th>
                        <th class="col-2">User</th>
                        <th class="col-2">Date</th>
                        <th class="col-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $p)
                        <tr>
                            <td>{{ $p->id }}</td>
                            <td><img class="img-fluid" src="{{ asset($p->image) }}" alt="Post image not found."></td>
                            <td >{{ Str::limit($p->title, 20) }}</td>
                            <td >{{ Str::limit($p->content, 50) }}</td>
                            <td>{{ $p->user->name }}</td>
                            <td>{{ $p->created_at->diffForHumans() }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route("edit_post", ["id"=>$p->id]) }}" class="btn btn-secondary btn-sm w-50">Edit</a>
                                    <a href="{{ route("delete_post", ["id"=>$p->id]) }}" class="btn btn-danger btn-sm w-50">Delete</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $posts->links() }}
       </div>
    </div>
</div>

@stop