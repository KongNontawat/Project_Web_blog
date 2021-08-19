$(document).ready(function () {
	getPosts();
	gettop_Posts();
	$(".nav-link-home").addClass("active");
});

function getPosts() {
	$.ajax({
		url: "api/get_post.php",
		type: "GET",
		dataType: "json",
		data: { action: "getPosts" },
		success: function (posts) {
			let Posts_elements = "";
			$.each(posts, function (index, posts) {
				Posts_elements += get_post_element(posts);
			});
			$("#post_blog").html(Posts_elements);
		},
		error: () => {
			console.error("Oops! something went wrong!");
		},
	});
}

function gettop_Posts() {
	$.ajax({
		url: "api/get_post.php",
		type: "GET",
		dataType: "json",
		data: { action: "get_top_Post" },
		success: function (post) {
			let Post_element = "";
			Post_element = get_top_post_element(post);
			$("#top_post").html(Post_element);
		},
		error: () => {
			console.error("Oops! something went wrong!");
		},
	});
}
function get_post_element(Posts) {
	let Posts_element = "";
	if (Posts) {
		Posts_element = `
		<div class="col-md-6">
            <div class="card mb-4 mb-md-5 shadow-sm blog">
              <a href="post_detail.php?id=${Posts.id_post}"><img class="card-img-top" src="Image/uploads/${Posts.photo}"
                  /></a>
              <div class="card-body">
                <div class="small text-muted">${Posts.date_time}</div>
                <h2 class="card-title h4">${Posts.title}</h2>
                <p class="card-text">${Posts.content}</p>
                <div class="d-flex justify-content-between align-items-center"> 
									<a class="btn btn-primary" href="post_detail.php?id=${Posts.id_post}">Read more →</a>
									<a href="#!" onclick="like_post(${Posts.id_post})" class="icon text-dark d-flex justify-content-center align-items-center text-decoration-none">
										<i class="far fa-heart fs-4 me-2"></i>
										<b class="fs-5">${Posts.like_post}</b>
									</a>
								</div>
              </div>
            </div>
          </div>
		`;
	}
	return Posts_element;
}

function get_top_post_element(Post) {
	let Post_element = "";
	if (Post) {
		Post_element = `
          <a href="post_detail.php?id=${Post.id_post}"><img class="card-img-top" src="Image/uploads/${Post.photo}" alt="..." /></a>
          <div class="card-body">
            <div class="small text-muted">${Post.date_time}</div>
            <h2 class="card-title">${Post.title}</h2>
            <p class="card-text">${Post.content}</p>
						<div class="d-flex justify-content-between align-items-center"> 
            	<a class="btn btn-primary" href="post_detail.php?id=${Post.id_post}">Read more →</a>
							<a href="#!" onclick="like_post(${Post.id_post})" class="icon text-dark d-flex justify-content-center align-items-center text-decoration-none">
								<i class="far fa-heart fs-4 me-2"></i>
								<b class="fs-5">${Post.like_post}</b>
							</a>
						</div>
          </div>
		`;
	}
	return Post_element;
}

function like_post(id_post) {
		$.ajax({
		type: "GET",
		url: "api/like_post.php",
		data: { id_post: id_post},
		success: function (response) {
			console.log("successful!", response);
      getPosts();
			gettop_Posts();
		},
		error: function (err) {
			console.log("error", err);
		},
	});
}
