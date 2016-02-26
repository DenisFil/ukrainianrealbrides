$(document).ready(function() {

	// Initialize Masonry
	$('#content').masonry({
		columnWidth: 390,
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


jQuery.each(jQuery('textarea[data-autoresize]'), function() {
    var offset = this.offsetHeight - this.clientHeight;
 
    var resizeTextarea = function(el) {
        jQuery(el).css('height', 'auto').css('height', el.scrollHeight + offset);
    };
    jQuery(this).on('keyup input', function() { resizeTextarea(this); }).removeAttr('data-autoresize');
});