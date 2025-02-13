<?php

defined( 'ABSPATH' ) || die( "Can't access directly" ); 



$review_id = $row['casino_review']; ?> 

<div class="horizontal-list-card">

	<div class="horizontal-wrap">

		<div class="info-card">

			<div class="logo-wrap">

				<?php $image = !empty($row['image'])  ? $row['image'] : get_field('image', $review_id);  

				if( $image ) { 

					echo $review_id ? '<a href="'.get_permalink($review_id).'">' : ''; ?>								

				<img  src="<?php  echo $image['sizes']['bingo_top_list_logo']; ?>" fetchpriority="high" decoding="async" alt="<?php  echo $image['alt'] ?>" width="140" height="65" style="object-fit: contain;">
				<?php  echo $review_id ? '</a>' : ''; ?>  

				<?php } ?>

			</div>
			
			<div class="rating-wrap">

				<?php if( ( !empty($row['review_star_rating'])  ) || get_field('review_star_rating', $review_id) ) { ?>

				<div class="star-rating">   

					<?php !empty($row['review_star_rating'])  ? bingo_get_star_rating($row['review_star_rating']) : bingo_get_star_rating(get_field('review_star_rating', $review_id));?>

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
				
				<?php $pros = !empty($row['pros_and_cons'])  ? $row['pros_and_cons'] : get_field('pros_and_cons', $review_id);
			
				if( $pros ) {
					
				$counter = 1; ?>
				
				<ul>
					<?php foreach($pros as $pro) {
					
						$icon = !empty($pro['icon']) ? $pro['icon'] : '' ; 
					
						if ($counter>3) continue; ?>
					
						<li>
							<i class="fa fa-arrow-up <?php if($icon == 'pro'){echo 'text-success';}else{echo 'text-danger';}  ?>" aria-hidden="true"></i>   
							<?php echo $pro['text']; ?>
						</li>		
					
						<?php $counter++; 
					
					}  ?>
				</ul>
				<?php } ?>

			</div>
			
			<div class="bonus-wrap">
				
				<div class="bonus_title"><?php echo !empty($row['title'])  ? $row['title'] : get_field('title', $review_id) ; ?>      
					
				</div>
				
				<div class="bonus_money">
					
					<?php echo !empty($row['bonus'])  ? $row['bonus'] : get_field('content', $review_id); ?>
					
				</div>
				
			</div>
			
			<div class="button-wrap">

				<?php if( ( !empty($row['link'])  ) || get_field('link', $review_id)) { ?>

					<a target="_blank" class="play-button" href="<?php echo !empty($row['link']) ? get_permalink($row['link'])  : get_permalink(get_field('link', $review_id)) ; ?>"><?php echo !empty($row['button_title']) ? $row['button_title'] : (get_field('button_title', $review_id) ?: pll__('Play Now')) ?>
					</a>

				<?php }			
						
				$tc_link = !empty($row['terms_and_conditions_link'])  ? $row['terms_and_conditions_link'] : get_field('terms_and_conditions_link', $review_id);
						
				$tc_text =  !empty($row['terms_and_conditions'])  ?  $row['terms_and_conditions'] : get_field('terms_and_conditions', $review_id);						
						
				if($tc_text) {

					echo $tc_link ? '<a class="tclink" href="'.$tc_link.'">' : '' ?>	

					<small class="text-center"><?php echo $tc_text; ?></small>

				<?php  echo $tc_link ? '</a>' : ''; 
						
				} ?>  							

			</div>
				

		</div>
		
		<div class="tac-wrap">

			<?php echo !empty($row['new_customers_only'])  ? $row['new_customers_only'] : get_field('new_customers_only', $review_id); ?>

		</div>		

	</div>
	
</div>