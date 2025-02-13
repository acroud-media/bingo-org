<?php

defined( 'ABSPATH' ) || die( "Can't access directly" ); 

?>

<div class="widget widget_double_coupons_id_name"> 

<?php 
	
	$element_size = get_field('size_'.$list_id,'option');
	
	if( have_rows($list_id, "option" ) ) { 
	
		while ( have_rows($list_id, "option" ) ) { the_row();		

			include( locate_template( "template-parts/double-coupon-card-html.php", false, false ) );

			
		}	

	}
	
?>	 

</div>
										  
<?php 