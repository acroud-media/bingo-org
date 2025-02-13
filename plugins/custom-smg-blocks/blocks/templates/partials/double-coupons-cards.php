<?php

defined( 'ABSPATH' ) || die( "Can't access directly" ); 

$review_id = $row['casino_review']; 
?>

	<div class="element-size vertical-card <?php echo esc_attr($element_size);?>">
	
		<div class="panel panel-danger panel-pricing text-center">

			<div class="panel-heading">

				<div class="media-object img-rounded img-responsive mx-auto d-block">

					<?php $image = !empty($row['image']) ? $row['image'] : get_field('image', $review_id); 

					if( $image ) {?>

					<img src="<?php  echo $image['sizes']['bingo_top_list_logo']; ?>" fetchpriority="high" decoding="async" alt="<?php  echo $image['alt'] ?>">                              
					<?php } ?>

				</div>

				<div class="bonus_title">

					<?php echo !empty($row['title']) ? $row['title'] : get_field('title', $review_id) ; ?>

			   </div>

				<div class="bonus_money">

					<?php echo !empty($row['bonus']) ? $row['bonus'] : get_field('content', $review_id); ?>

				</div>

			</div>

			<div class="panel-footer">

				<a target="_blank" aria-label="<?php echo !empty($row['button_title']) ? $row['button_title'] : get_field('button_title', $review_id); ?>" class="btn btn-lg btn-block top-list-play" href="<?php echo !empty($row['link']) ? get_permalink($row['link'])  : get_permalink(get_field('link', $review_id)) ; ?>"><?php echo !empty($row['button_title']) ? $row['button_title'] : (get_field('button_title', $review_id) ?: __('Play Now')) ?></a>

			</div>

			<small class="text-center font-weight-bold">			

				<?php echo !empty($row['terms_and_conditions_link']) ? '<a href="'.$row['terms_and_conditions_link'].'">' : ''; ?>	

					<?php echo $row['terms_and_conditions'] ?>

				<?php  echo !empty($row['terms_and_conditions_link']) ? '</a>' : ''; ?>  

			</small>

		</div>
	
	</div>
		 
										  
<?php 
