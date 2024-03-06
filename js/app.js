$(document).ready(function($) {
  
 	$('.popup__btn').click(function(e) {
		$('.popup').toggleClass('open'),
		$('body').toggleClass('popup__hidden');
	});
	$('.popup__close').click(function() {
		$('.popup').removeClass('open'),
		$('body').removeClass('popup__hidden');
	});
  
});