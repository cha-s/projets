(function ($) {
  // Caption limit
  $(function () {
    $('#posts .post').each( function () {
      var $post = $(this),
          caption = $post.find('figcaption p'),
          capLength = caption.text().length;
      if (capLength > 100) {
        caption.text(caption.text().substring(0, 100) + '...');
      }
    });
  });
  // Masonry
  $(function () {
		var $grid = $('#posts').imagesLoaded(function () {
			$grid.isotope({
				itemSelector: '.post',
				percentPosition: true,
				transitionDuration: '0.2s',
				masonry: {
					columnWidth: '.post',
					gutter: 25
				}
			});
		});
	});
}(jQuery));
