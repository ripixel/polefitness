function squarify() {
	$('.square').each(function() {
		$(this).height($(this).width());
		console.log("squaring");
		console.log($(this));
	})
}

function newsSquarify() {
	$('.news-image').each(function() {
		$(this).css("min-height", $(this).width());
	});
}

$(function() {
	if ($(document).width() > 768) {
		squarify();
		newsSquarify();
	}
});