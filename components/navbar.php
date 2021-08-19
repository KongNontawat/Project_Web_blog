<!-- Responsive navbar-->
  <nav class="navbar navbar-expand-md navbar-dark bg-dark pb-2 pb-md-3 pt-2">
    <div class="container">
      <a class="navbar-brand" href="index.php">Start Blog</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
          class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-lg-0 text-center">
          <li class="nav-item"><a class="nav-link nav-link-home" href="index.php">Home</a></li>
          <!-- <li class="nav-item"><a class="nav-link nav-link-post" href="post_detail.php">Blog_detail</a></li> -->
          <li class="nav-item d-flex align-items-center justify-content-center my-2 my-md-0 ms-md-3">
            <a href="create_post.php" class="btn btn-success btn-sm ">Create Post</a>
          </li>
          <li class="nav-item ms-md-4 mt-3 mt-md-0 d-flex align-items-center">
            <div class="input-group input-group-sm m-0 p-0">
              <input type="text" class="form-control" placeholder="ระบบ Search จะมาเร็วๆนี้" disabled>
              <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i
                  class="fas fa-search text-white"></i></button>
            </div>
          </li>
          <li class="nav-item"><a class="nav-link nav-link-home text-danger mt-2 mt-md-0 ms-0 ms-md-3" href="api/logout.php">Log out</a></li>

        </ul>
      </div>
    </div>
  </nav>