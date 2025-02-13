<?php

$fields = get_fields();

$list_type = $fields['list_type'] ?? 'custom';

$list_style = $fields['list_style'] ?? 'Horizontal';

if ($list_style == 'Horizontal' && $list_type == 'global_toplist' && isset($fields['global_horizontal_list'])) {
    $global_list = $fields['global_horizontal_list'];
} elseif ($list_style == 'Vertical' && $list_type == 'global_toplist' && isset($fields['global_vertical_list'])) {
    $global_list = $fields['global_vertical_list'];
} elseif ($list_style == 'Double Coupons' && $list_type == 'global_toplist' && isset($fields['global_double_coupons_list'])) {
    $global_list = $fields['global_double_coupons_list'];
} else {
    $global_list = '';
}


$vertical_list = isset($fields['vertical_top_list']) && $list_type == 'custom' && $list_style == 'Vertical' ? $fields['vertical_top_list'] : ($list_type == 'global_toplist' && $global_list ? get_field($global_list,'option') : []);

$horizontal_list = isset($fields['horizontal_top_list']) && $list_type == 'custom' ? $fields['horizontal_top_list'] : ($list_type == 'global_toplist' && $global_list && $list_style == 'Horizontal' ? get_field($global_list,'option') : ($list_type == 'global_toplist' && $global_list && $list_style == 'Vertical' ? get_field('hmr_'.$global_list,'option') : []));

$double_coupons_list = isset($fields['double_coupons_list']) && $list_type == 'custom' && $list_style == 'Double Coupons' ? $fields['double_coupons_list'] : ($list_type == 'global_toplist' && $global_list ? get_field($global_list,'option') : []);

if($vertical_list || $horizontal_list || $double_coupons_list) { ?>

	<div class="home-widget <?php echo $vertical_list && $list_style == 'Vertical' ? 'vertical-widget' : '' ?>">	

	<?php

	if($vertical_list && $list_style == 'Vertical') { ?>	

		<div class="widget_vertical_top_list_id_name">			

				<?php include('partials/vertical-reviews-cards.php') ; ?>		

		</div>

	<?php }

	if($horizontal_list && $list_style != 'Double Coupons') { ?>	

		<div class="widget widget_hotizontal_top_list_id_name">			

				<?php

				foreach($horizontal_list  as $row) {	

						include('partials/horizontal-reviews-cards.php') ;

				} ?>		

		</div>

	<?php }

	if($double_coupons_list && $list_style == 'Double Coupons') { 
		
		$element_size =  $list_type == 'global_toplist' && $global_list && get_field('size_'.$global_list, "option") ? get_field('size_'.$global_list, "option") : $fields['element_size_double_coupons'] ?>	

		<div class="toplist-container row flex-wrap col-lg-12 col-12">	
			
			<div class="toplist-widget widget_double_coupons_id_name flex-wrap d-md-flex"> 

				<?php

				foreach($double_coupons_list  as $row) {	

						include('partials/double-coupons-cards.php') ;

				} ?>	
				
			</div>
			
		</div>

	<?php }

	$bottom_button_title = $list_type == 'global_toplist' && $global_list && get_field('bbt_'.$global_list, "option") ? get_field('bbt_'.$global_list, "option") :  get_field('bottom_button_title');

	$bottom_button_title_link = $list_type == 'global_toplist' && $global_list && get_field('bbtlink_'.$global_list, "option") ? get_field('bbtlink_'.$global_list, "option") :  get_field('bottom_button_title_link');

	 if( $bottom_button_title && $bottom_button_title_link )  {  ?>

					<div class="horizontal-top-list-buttons">

						<a href="<?php echo $bottom_button_title_link; ?>" class="top-list-play active-top-list">

						<?php echo $bottom_button_title;?>

						</a>

					</div>

	 <?php  }  ?>

	</div>

 <?php  }  ?>