<?php

defined( 'ABSPATH' ) || die( "Can't access directly" ); 

?>

<div class="widget widget_hotizontal_top_list_id_name"> 

	<?php if( have_rows($list_id, "option" ) ) { 

	while ( have_rows($list_id, "option" ) ) { the_row();  

		include( locate_template( "template-parts/horizontal-review-card-html.php", false, false ) );

		} 

	} 

	if(get_field('bbt_'.$list_id, "option") && get_field('bbtlink_'.$list_id, "option"))  {  ?>

	<div class="horizontal-top-list-buttons col-12">

		<a href="<?php echo get_field('bbtlink_'.$list_id, "option"); ?>" class="col-12 btn btn-default top-list-play active-top-list">

			<?php echo get_field('bbt_'.$list_id, "option");?>

		</a>

	</div>

	<?php  }  ?>

</div> 

