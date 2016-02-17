$(document).ready(function() {

	// Initialize Masonry
	$('#content').masonry({
		columnWidth: 348,
		itemSelector: '.item',
		isFitWidth: true
	}).imagesLoaded(function() {
		$(this).masonry('reload');
	});

});
$('#content').masonry({
  // other masonry options
  isFitWidth: true
});