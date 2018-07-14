$('.product-thumb').on( 'click mouseover', function() {
	$('.product-thumb').removeClass('current');
	$(this).addClass('current');
});

$('.thumb-1').on( 'click mouseover', function() {
	$('.single-preview').removeClass('current');
	$('.prev-1').addClass('current');
});

$('.thumb-2').on( 'click mouseover', function() {
	$('.single-preview').removeClass('current');
	$('.prev-2').addClass('current');
});

$('.thumb-3').on( 'click mouseover', function() {
	$('.single-preview').removeClass('current');
	$('.prev-3').addClass('current');
});