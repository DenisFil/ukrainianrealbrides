$(document).ready(function() {

	// Initialize Masonry
	$('#content').masonry({
		columnWidth: 348,
		itemSelector: '.item',
		isFitWidth: true,
		isAnimated: !Modernizr.csstransitions
	}).imagesLoaded(function() {
		$(this).masonry('reload');
	});

});
$('#content').masonry({
  // other masonry options
  isFitWidth: true
});