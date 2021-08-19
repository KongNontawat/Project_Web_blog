$(document).ready(function () {
	
	$(document).on("submit", "#form_post", function(e) {
		e.preventDefault();
		let form = $('#form_post');
		let form_Data = new FormData(form[0]);
		$.ajax({
			url: "api/create_post.php",
			type: "POST",
			datatype: "json",
			data: form_Data,
			processData: false,
			contentType: false,
			success: (resp) => {
				if (resp) {
					form[0].reset();
					location.href = 'index.php';
			}},
			error: () => {
				console.error("Oops! something went wrong!");
			},
		});
	})
});


function goBack() {
	window.history.back();
}