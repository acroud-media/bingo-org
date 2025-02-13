jQuery(document).ready(function($) {
	        //search
	"use strict";


$(window).load(function() {
	

	 $('body').on('click', '.vh-item', function(e) {
		//prevent default action (hyperlink)
		e.preventDefault();
		$('<div>hello</div>').appendTo('.business-header');
		//Get clicked link href
		var image_href = $(this).find('a').attr("href");
		
			
			//place href as img src value
			//$('#content').html('<img src="' + image_href + '" />');
			
			
			$('.main_title').load(image_href + " .text-editor-widget-content").css('max-width', '726px').css('margin','50px auto').css('display', 'block');
		   	
			//show lightbox window - you could use .show('fast') for a transition
			$('#lightbox').show();
			$("html, body").animate({ scrollTop: 0 }, "slow");

		
	});
	
});








	$('a span.caret').on('click', function(e){
		e.preventDefault();
		$(this).parent().addClass('deez').next('.dropdown-menu').toggleClass('show-dropdown-menu');
	});

	$('.search-menu-icon').not( '.submit-button .search-menu-icon' ).on('click', function(e){
		e.preventDefault();
		$('.search-box').toggleClass('active');
		$( ".search-box #s" ).focus();
		$('.search-menu-icon').not( '.search-box .search-menu-icon').hide();
		$('.close-search-box').show();
	});

	$('.close-search-box').on('click', function(e){
		e.preventDefault();
		$('.search-box').removeClass('active');
		$('.search-menu-icon').not( '.search-box .search-menu-icon').show();
		$('.close-search-box').hide();
	});


	$(document).on( 'click', function(e){
	if($(e.target).hasClass('search-box')){
	    if (e.pageX + 100 - $('.search-box #s').offset().left < 0 || e.pageX - 100 - $('.search-box #s').offset().left > 590) {
	      $('.search-box').removeClass('active');
	      $('.search-menu-icon').not( '.search-box .search-menu-icon').show();
	      $('.close-search-box').hide();
	    }  
	}      
	});

	$(document).on( 'click', function(e){
	if($(e.target).hasClass('search-box')){
	    if (e.pageX + 100 - $('.search-box #s').offset().left < 0 || e.pageX - 100 - $('.search-box #s').offset().left > 590) {
	      $('.search-box').removeClass('active');
	      $('.search-menu-icon').not( '.search-box .search-menu-icon').show();
	      $('.close-search-box').hide();
	    }  
	}      
	});

    $(document).on( 'click', function(e){
        var clickover = $(e.target);
        var _opened = $(".navbar-collapse").hasClass("show");
        if (_opened === true && !clickover.parents('.navbar').length) {
            $("button.navbar-toggler").click();
        }
    });


	$("#s").on("input", function(e){
		$('.search-box .featured-thumbnails li').remove();
		e.preventDefault();	
		 event.preventDefault();
		var search_word = $(this).val();
		
			jQuery.ajax({						
				type : "POST",
				url: stepfoxcomplete.stepfoxcompleteurl,
				data: {"action": "stepfox_search", search_this: search_word},
				success : function(response) {				
				
					$('.search-box').find('.featured-thumbnails').html(response);
					return false;											
				}
			});
								
	});	
});