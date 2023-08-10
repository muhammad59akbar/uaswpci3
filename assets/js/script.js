let img = document.getElementById("preview");
let changeimage = document.getElementById("image");

changeimage.addEventListener("change", (e) => {
	img.src = URL.createObjectURL(e.target.files[0]);
});

document.addEventListener("DOMContentLoaded", function () {
	// Get the success message element
	var successMessage = document.querySelector(".alert-success");

	// Hide the success message after 10 seconds
	setTimeout(function () {
		successMessage.style.display = "none";
	}, 10000);
});
