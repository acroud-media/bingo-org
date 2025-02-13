<?php

defined( 'ABSPATH' ) || die( "Can't access directly" ); 



$review_id = get_sub_field('casino_review', "option") ?: ( is_page_template('page-templates/review-archive.php') ? get_the_ID() : '' ); ?>   

<div class="horizontal-list-card">

	<div class="horizontal-wrap">

		<div class="info-card">

			<div class="logo-wrap">

				<?php $image = get_sub_field('image', "option") ?: get_field('image', $review_id);  

				if( $image ) { 

					echo $review_id ? '<a href="'.get_permalink($review_id).'">' : ''; ?>								

				<img  src="<?php  echo $image['sizes']['bingo_top_list_logo']; ?>" fetchpriority="high" decoding="async" alt="<?php  echo $image['alt'] ?>" width="140" height="65" style="object-fit: contain;">
				<?php  echo $review_id ? '</a>' : ''; ?>  

				<?php } ?>

			</div>

			<div class="rating-wrap">

				<?php if( get_sub_field('review_star_rating', "option") || get_field('review_star_rating', $review_id) ) { ?>

				<div class="star-rating">   

					<?php get_sub_field('review_star_rating', "option") ? bingo_get_star_rating(get_sub_field('review_star_rating', "option")) : bingo_get_star_rating(get_field('review_star_rating', $review_id));?>

				</div>

				<?php }  ?>

				<div class="review_link">

					<?php if($review_id) {  ?>

					<a href="<?php echo get_permalink($review_id) ?>">

						<?php pll_e('Read Review'); ?>

					</a>

					<?php } ?>

				</div>
				
			</div>

			<div class="pros-cons-wrap">
				<?php if( have_rows("pros_and_cons",$review_id ) ) { 
				$counter = 1; ?>
				<ul>
					<?php while ( have_rows("pros_and_cons",$review_id ) ) : the_row(); 
					$icon = get_sub_field('icon'); 
					if ($counter>3) continue; ?>
					<li>
						<i class="fa fa-arrow-up <?php if($icon == 'pro'){echo 'text-success';}else{echo 'text-danger';}  ?>" aria-hidden="true"></i>   
						<?php echo get_sub_field('text'); ?>
					</li>					
					<?php $counter++; 
						endwhile;  ?>
				</ul>
				<?php } ?>

			</div>

			<div class="bonus-wrap">
				<div class="bonus_title"><?php echo get_sub_field('title', "option") ?: get_field('title', $review_id) ; ?>      
				</div>
				<div class="bonus_money">
					<?php echo get_sub_field('bonus', "option") ?: get_field('content', $review_id); ?>
				</div>
			</div>
			<div class="button-wrap">

				<?php if(get_sub_field('link', "option") || get_field('link', $review_id)) { ?>

				<a target="_blank" class="play-button" href="<?php echo get_sub_field('link', "option") ? get_permalink(get_sub_field('link', "option"))  : get_permalink(get_field('link', $review_id)) ; ?>"><?php echo get_sub_field('button_title', "option") ?: (get_field('button_title', $review_id) ?: pll__('Play Now')) ?>
				</a>

				<?php }								

				$tc_link = get_sub_field('terms_and_conditions_link', "option") ?: get_field('terms_and_conditions_link', $review_id);
						
				$tc_text =  get_sub_field('terms_and_conditions', "option") ?: get_field('terms_and_conditions', $review_id);												
				if($tc_text) {

					echo $tc_link ? '<a href="'.$tc_link.'">' : '' ?>	

					<small class="text-center"><?php echo $tc_text; ?></small>

				<?php  echo $tc_link ? '</a>' : ''; 

				} ?>   							

			</div>

		</div>

		<div class="tac-wrap">

			<?php echo get_sub_field('new_customers_only', "option") ?: get_field('new_customers_only', $review_id); ?>

		</div>

	</div>

</div>