<?php

defined( 'ABSPATH' ) || die( "Can't access directly" ); 

?>

<div class="widget_vertical_top_list_id_name"> 

<?php 

	if( have_rows($list_id, "option" ) ) { 
	
	while ( have_rows($list_id, "option" ) ) { the_row();

		$multiple_tabs = get_sub_field("multiple_tabs", "option" ); 

		$element_size = get_sub_field("element_size", "option");

		if($multiple_tabs != 'single') { ?>

			 <div class="vertical-top-list-buttons col-12 btn-group-justified" data-toggle="buttons">
				<a bingo_tab="#tab_1" class="col-md-3 col-sm-12 mr-2 btn btn-default top-list-play active-top-list" data-toggle="tab">
				  <?php echo get_sub_field("button_title_tab1", "option");?>
				</a>
				<a bingo_tab="#tab_2" class="col-md-3 col-sm-12 mr-2 btn btn-default top-list-play" data-toggle="tab">
				  <?php echo get_sub_field("button_title_tab2", "option");?>
				</a>
				<a bingo_tab="#tab_3" class="col-md-3 col-sm-12 mr-2 btn btn-default top-list-play" data-toggle="tab">
				  <?php echo get_sub_field("button_title_tab3", "option");?>
				</a>
				<a bingo_tab="#tab_4" class="col-md-3 col-sm-12 btn btn-default top-list-play" data-toggle="tab">
				  <?php echo get_sub_field("button_title_tab4", "option");?>
				</a>
			  </div>

			  <div class="tab-content">
				  
				<div class="tab-pane active" id="tab_1">
					
				 <?php 
			  if( have_rows("vertical_top_list", "option" ) ):

				 while ( have_rows("vertical_top_list", "option" ) ) : the_row();

					include( locate_template( "template-parts/vertical-review-card-html.php", false, false ) );

				endwhile;
										
			  endif;
										
				if( have_rows("hmr_vertical_top_list_id_name-1", "option" ) ):
										
					while ( have_rows("hmr_vertical_top_list_id_name-1", "option" ) ) : the_row();

						include( locate_template( "template-parts/horizontal-review-card-html.php", false, false ) );

					endwhile;
										
      			endif;
										
				  ?>
				</div>
				<div class="tab-pane" id="tab_2">
					
				   <?php 
				if( have_rows("vertical_top_list_tab2", "option" ) ):
										
				   while ( have_rows("vertical_top_list_tab2", "option" ) ) : the_row();
										
					  include( locate_template( "template-parts/vertical-review-card-html.php", false, false ) );

				  endwhile;
										
				endif;
										
				if( have_rows("hmr_vertical_top_list_id_name-2", "option" ) ):
										
					while ( have_rows("hmr_vertical_top_list_id_name-2", "option" ) ) : the_row();

						include( locate_template( "template-parts/horizontal-review-card-html.php", false, false ) );

					endwhile;
										
      			endif;
										
					?>
				</div>
				<div class="tab-pane" id="tab_3">
					
				 <?php 
			  if( have_rows("vertical_top_list_tab3", "option" ) ):
										
				 while ( have_rows("vertical_top_list_tab3", "option" ) ) : the_row();										

					include( locate_template( "template-parts/vertical-review-card-html.php", false, false ) );										

				endwhile;
										
			  endif;
										
			  if( have_rows("hmr_vertical_top_list_id_name-3", "option" ) ):
										
         		while ( have_rows("hmr_vertical_top_list_id_name-3", "option" ) ) : the_row();
										
            		include( locate_template( "template-parts/horizontal-review-card-html.php", false, false ) );
										
        		endwhile;
										
      		endif;
										
				  ?>
				</div>
				  
				<div class="tab-pane" id="tab_4">
					
				 <?php 
			  if( have_rows("vertical_top_list_tab4", "option" ) ):
										
				 while ( have_rows("vertical_top_list_tab4", "option" ) ) : the_row();

					include( locate_template( "template-parts/vertical-review-card-html.php", false, false ) );

				endwhile;
										
			  endif;
										
			if( have_rows("hmr_vertical_top_list_id_name-4", "option" ) ):
										
         		while ( have_rows("hmr_vertical_top_list_id_name-4", "option" ) ) : the_row();
										
            		include( locate_template( "template-parts/horizontal-review-card-html.php", false, false ) );
										
        		endwhile;
										
      		endif;
										
				  ?>
				</div>
			  </div>

		<?php }

		else {

				if( have_rows("vertical_top_list", "option" ) ):

				   while ( have_rows("vertical_top_list", "option" ) ) : the_row();

					  include( locate_template( "template-parts/vertical-review-card-html.php", false, false ) );

				  endwhile;

				endif;

				if( have_rows("hmr_".$list_id, "option" ) ):

				   while ( have_rows("hmr_".$list_id, "option" ) ) : the_row();

					 include( locate_template( "template-parts/horizontal-review-card-html.php", false, false ) );

					endwhile;

				endif;

			} 

	}	

}
	
	 if(get_field('bbt_'.$list_id, "option") && get_field('bbtlink_'.$list_id, "option"))  {  ?>

		<div class="horizontal-top-list-buttons col-12">

			<a href="<?php echo get_field('bbtlink_'.$list_id, "option"); ?>" class="col-12 btn btn-default top-list-play active-top-list">

				<?php echo get_field('bbt_'.$list_id, "option");?>

			</a>

		</div>

	 <?php  }  ?>
		
	<style>
		.home-widget .tab-content {
			width: 100%;
		}
		
	</style>

	<script>jQuery(document).ready(function($) {  

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

	});</script>

</div>
										  
<?php 