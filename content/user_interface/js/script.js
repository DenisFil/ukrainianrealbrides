$(document).ready(function() {

	// Initialize Masonry
	$('#content').masonry({
		columnWidth: 395,
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