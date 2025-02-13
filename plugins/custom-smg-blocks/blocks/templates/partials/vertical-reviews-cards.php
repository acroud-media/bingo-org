<?php

defined( 'ABSPATH' ) || die( "Can't access directly" ); 

?>

<div class="toplist-widget toplist-widget-vertical"> 

<?php 		

	$multiple_tabs = $vertical_list["multiple_tabs"]; 

	$element_size = $vertical_list["element_size"];

	if($multiple_tabs != 'single') { ?>

		 <div class="vertical-top-list-buttons col-12 btn-group-justified" data-toggle="buttons">
			<a bingo_tab="#tab_1" class="col-md-3 col-sm-12 mr-2 btn btn-default top-list-play active-top-list" data-toggle="tab">
			  <?php echo $vertical_list["button_title_tab1"];?>
			</a>
			<a bingo_tab="#tab_2" class="col-md-3 col-sm-12 mr-2 btn btn-default top-list-play" data-toggle="tab">
			  <?php echo $vertical_list["button_title_tab2"];?>
			</a>
			<a bingo_tab="#tab_3" class="col-md-3 col-sm-12 mr-2 btn btn-default top-list-play" data-toggle="tab">
			  <?php echo $vertical_list["button_title_tab3"];?>
			</a>
			<a bingo_tab="#tab_4" class="col-md-3 col-sm-12 btn btn-default top-list-play" data-toggle="tab">
			  <?php echo $vertical_list["button_title_tab4"];?>
			</a>
		  </div>

		  <div class="tab-content">

			<div class="tab-pane active" id="tab_1">

			  <?php 

			  if( !empty($vertical_list["vertical_top_list"]) ) {

				 foreach ( $vertical_list["vertical_top_list"] as $subrow ) { 

					include('vertical-review-card-html.php') ;

				 }

			  }  ?>

			</div>

			<div class="tab-pane" id="tab_2">

			  <?php 

			  if( !empty($vertical_list["vertical_top_list_tab2"]) ) {

				 foreach ( $vertical_list["vertical_top_list_tab2"] as $subrow ) { 

					include('vertical-review-card-html.php') ;

				 }

			  }  ?>
				
			</div>

			<div class="tab-pane" id="tab_3">

			<?php 

			  if( !empty($vertical_list["vertical_top_list_tab3"]) ) {

				 foreach ( $vertical_list["vertical_top_list_tab3"] as $subrow ) { 

					include('vertical-review-card-html.php') ;

				 }

			  }  ?> 

			</div>

			<div class="tab-pane" id="tab_4">

			 <?php 

			  if( !empty($vertical_list["vertical_top_list_tab4"]) ) {

				 foreach ( $vertical_list["vertical_top_list_tab4"] as $subrow ) { 

					include('vertical-review-card-html.php') ;

				 }

			  }  ?> 

			</div>

		  </div>

	<?php }

	else {			

		  if( !empty($vertical_list["vertical_top_list"]) ) {

			 foreach ( $vertical_list["vertical_top_list"] as $subrow ) { 

				include('vertical-review-card-html.php') ;

			 }

		  }  

		}  ?>		
	

	<script>jQuery(document).ready(function($) {  

	  $('.vertical-top-list-buttons').on('click', '.top-list-play', function(e){
		e.preventDefault();
		$('.top-list-play').removeClass('active-top-list');
		$(this).addClass('active-top-list');

		var tab_id = $(this).attr('bingo_tab');

		$(this).parents('.home-widget').find('.tab-pane').removeClass('active');
		$(this).parents('.home-widget').find(tab_id).addClass('active');	
	  });

	});</script>

</div>
										  
<?php 