<?php

defined( 'ABSPATH' ) || die( "Can't access directly" ); 

$review_id = $subrow['casino_review'];	
?>
<div class="<?php echo $element_size ?> vertical-card">   
	
    <div class="vertical-list-card">

		<div class="vertical-card-logo">
			 
          <?php $image = $subrow['image'] ?: get_field('image', $review_id);  
	 
               if( !empty($image) ) {
				   
                    echo $review_id ? '<a href="'.get_permalink($review_id).'">' : ''; ?>	
			 
                     <img src="<?php  echo $image['sizes']['bingo_top_list_logo']; ?>" loading="lazy" alt="<?php  echo $image['alt'] ?>">  
			 
                    <?php  echo $review_id ? '</a>' : '';    
				   
               } ?>
			 
         </div>


         <div class="vertical-card-rating">

			<?php if( !empty($subrow['review_star_rating']) || get_field('review_star_rating', $review_id) ) { ?>
			
				<div class="star-rating">    
					
					<?php $subrow['review_star_rating'] ? bingo_get_star_rating($subrow['review_star_rating']) : bingo_get_star_rating(get_field('review_star_rating', $review_id));?>
					
				</div>
			
			<?php }  ?>

			<div class="review_link">

				<?php if($review_id) {  ?>

				<a href="<?php echo get_permalink($review_id) ?>">

					<?php echo __('Read Review'); ?>

				</a>

				<?php } ?>

			</div>

		</div>

		<div class="vertical-bonus-wrap">

			<div class="vertical_bonus_title">

				<?php echo !empty($subrow['title']) ? $subrow['title'] : get_field('title', $review_id) ; ?> 

			</div>

			<div class="vertical_bonus_money">

				<?php echo !empty($subrow['bonus']) ? $subrow['bonus'] : get_field('content', $review_id);  ?>

			</div>

		</div>

		<div class="vertical-pros-cons">

			<?php $pros = !empty($subrow['pros']) ? $subrow['pros'] : get_field('pros_and_cons', $review_id);
			
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
						
						} ?>

				</ul>

			<?php } ?>

		</div>
				
		<div class="panel-footer">
						
			<?php if( !empty($subrow['link']) || get_field('link', $review_id)) { ?>
			
				<a target="_blank" class="play-button" href="<?php echo !empty($subrow['link']) ? get_permalink($subrow['link'])  : get_permalink(get_field('link', $review_id)) ; ?>"><?php echo !empty($subrow['button_title']) ? $subrow['button_title'] : (get_field('button_title', $review_id) ?: __('Play Now')) ?>
				</a>
			
			<?php } 

			$tc_link = !empty($subrow['terms_and_conditions_link'])  ? $subrow['terms_and_conditions_link'] : get_field('terms_and_conditions_link', $review_id);
						
			$tc_text =  !empty($subrow['terms_and_conditions'])  ?  $subrow['terms_and_conditions'] : get_field('terms_and_conditions', $review_id);						
						
			if($tc_text) {

				echo $tc_link ? '<a href="'.$tc_link.'">' : '' ?>	

				<small class="text-center"><?php echo $tc_text; ?></small>

			<?php  echo $tc_link ? '</a>' : ''; 
					
			} ?>  
			
		</div>
		
		<small class="text-center text">
			<?php echo !empty($subrow['new_customers_only']) ? $subrow['new_customers_only'] : get_field('new_customers_only', $review_id); ?>
		</small>
		
	</div>
	
</div>