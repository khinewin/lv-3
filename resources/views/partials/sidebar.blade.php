<div class="offcanvas offcanvas-start bg-secondary" tabindex="-1" id="mySidebar" aria-labelledby="offcanvasLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasLabel">Simple Blog</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <ul class="list-group active">
        <li class="list-group-item d-grid list-group-item-action">
            <a href="{{ route("new_post") }}" class="btn">Add post</a>
        </li>
        <li class="list-group-item d-grid list-group-item-action">
            <a href="#" class="btn">Manage posts</a>
        </li>
    </ul>
  </div>
</div>