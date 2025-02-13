<?php
defined( 'ABSPATH' ) || die( "Can't access directly" ); 


$review_id = get_sub_field('casino_review', "option"); ?>   


<div class="element-size vertical-card <?php echo esc_attr($element_size);?>">
	
    <div class="panel panel-danger panel-pricing text-center">
		
    	<div class="panel-heading">
							
			<div class="media-object img-rounded img-responsive mx-auto d-block">

				<?php $image =  get_sub_field('image', "option") ?: get_field('image', $review_id);   
				
				if( $image ) {?>
				
				<img src="<?php  echo $image['sizes']['bingo_top_list_logo']; ?>" fetchpriority="high" decoding="async" alt="<?php  echo $image['alt'] ?>">                              
				<?php } ?>
				
			</div>
                            
			<div class="bonus_title">
				
            	<?php echo get_sub_field('title', "option") ?: get_field('title', $review_id) ; ?>
                                
           </div>
                            
			<div class="bonus_money">
                                
				<?php echo get_sub_field('bonus', "option") ?: get_field('content', $review_id); ?>
                               
			</div>
                        
		</div>
                        
		<div class="panel-footer">
			
			<a target="_blank" aria-label="<?php echo get_sub_field('button_title', "option") ?: get_field('button_title', $review_id); ?>" class="btn btn-lg btn-block top-list-play" href="<?php echo get_sub_field('link', "option") ? get_permalink(get_sub_field('link', "option"))  : get_permalink(get_field('link', $review_id)) ; ?>"><?php echo get_sub_field('button_title', "option") ?: (get_field('button_title', $review_id) ?: pll__('Play Now')) ?></a>
			                        
		</div>
                            
		<small class="text-center font-weight-bold">			
			
			<?php echo get_sub_field('terms_and_conditions_link', "option") ? '<a href="'.get_sub_field('terms_and_conditions_link', "option").'" aria-label="terms and conditions">' : ''; ?>	
			
				<?php echo get_sub_field('terms_and_conditions', "option"); ?>
				
			<?php  echo get_sub_field('terms_and_conditions_link', "option") ? '</a>' : ''; ?>  
			
		</small>
                    
	</div>
	
</div>