$(document).ready(function () {
	$(".nav-link-post").addClass("active");
	var uId = getUrlVars()["id"];
getPosts();
	function getPosts() {
	$.ajax({
		url: "api/get_post.php",
		type: "GET",
		dataType: "json",
		data: {id: uId, action: "getPost" },
		success: function (post) {
			var Post_element = "";
			Post_element = get_post_element(post);
			$("article").html(Post_element);
		},
		error: () => {
			console.error("Oops! something went wrong!");
		},
	});
}

function get_post_element(Post) {
	var Post_element = "";
	if (Post) {
		Post_element = `
		<article>
          <header class="mb-4">
            <h1 class="fw-bolder mb-1">${Post.title}</h1>
            <div class="text-muted fst-italic mb-2">Posted on ${Post.date_time}</div>
          </header>
          <figure class="mb-4"><img class="img-fluid rounded" width="100%" src="Image/uploads/${Post.photo}" /></figure>
          <section class="mb-5">
					  <h4 class="fw-bold mb-1">${Post.title}</h4>
            <p class="fs-5 mb-4">${Post.content}</p>
          </section>
        </article>
		`;
	}
	return Post_element;
}

function getUrlVars() {
	var vars = [],
		hash;
	var hashes = window.location.href
		.slice(window.location.href.indexOf("?") + 1)
		.split("&");
	for (var i = 0; i < hashes.length; i++) {
		hash = hashes[i].split("=");
		vars.push(hash[0]);
		vars[hash[0]] = hash[1];
	}
	return vars;
}
});

