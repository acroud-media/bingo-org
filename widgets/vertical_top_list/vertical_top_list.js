jQuery(document).ready(function($) {

    $(window).load(function() {

  $('.vertical-top-list-buttons').on('click', '.top-list-play', function(e){
    e.preventDefault();
    $('.top-list-play').removeClass('active-top-list');
    $(this).addClass('active-top-list');

    var tab_id = $(this).attr('bingo_tab');

    $(this).parents('.home-widget').find('.tab-pane').removeClass('active');
    $(this).parents('.home-widget').find(tab_id).addClass('active');
    if ($.fn.masonry) { 
	setTimeout(function() {
	    $('#full-area').masonry().masonry('reloadItems');
	}, 10);
  	}
  });

});


});