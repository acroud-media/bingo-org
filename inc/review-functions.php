<?php 

function review_header_title(){ 
	
	?>

	<header class="business-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center text-md-left">
					<h1 class="text-white main_title"><?php echo get_the_title();?></h1>
				</div>
			</div>
		</div>
	</header>

	<?php  
							  
} 

function vertical_review_card(){
	
	?>

	<div class="panel-pricing text-center">     
		<div class="panel-heading">
			<?php $image = get_field('image');                                      
									if( $image ) {?>
			<img src="<?php  echo $image['sizes']['bingo_top_list_logo']; ?>" loading="lazy" alt="<?php echo get_the_title().' logo' ?>" width="140" height="65" style="object-fit: contain;">                          
			<?php } ?>
		</div>
		<div class="panel-body text-center">
			<div class="star-rating">                        
				<?php bingo_get_star_rating(get_field('review_star_rating'));?>
			</div>

			<div class="bonus_title">
				<?php echo get_field('title'); ?>
			</div>
			<div class="bonus_money">
				<?php echo get_field('content'); ?>
			</div>

			<?php if(get_field('link')) { ?>
			<a target="_blank" class="play-button" href="<?php echo get_permalink(get_field('link')); ?>"><?php echo get_field('button_title', $review_id) ?: __('Play Now'); ?></a>
			<?php } ?>

		</div>
		<div class="panel-footer">
		</div>
		<small class="text-center font-weight-bold">
			<a href="<?php echo get_field('link_new_customers_only'); ?>" target="_blank" aria-label="customers text">
				<?php echo get_field('new_customers_only'); ?>
			</a>
		</small>
	</div>

	<?php 
}



function review_slider(){

	?>

		<div id="reviewExampleControls" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<?php
			if( have_rows("slider" ) ):
			while ( have_rows("slider" ) ) : the_row();
				?>
				<div class="carousel-item <?php if(empty($active_slide)) {echo 'active'; $active_slide = 1; } ?>">
					<div class="col-12">
						<?php $image = get_sub_field('slider_image');                                   
			if( $image ) {?>
						<img class=" pull-right" src="<?php  echo $image['sizes']['bingo_review_slider']; ?>" loading="lazy" alt="<?php  echo $image['alt'] ?>">                              
						<?php } ?>
					</div>

				</div>


				<?php 
			endwhile;
			endif;
				?>
				<a class="carousel-control-prev" href="#reviewExampleControls" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#reviewExampleControls" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	<?php 
}


function review_stats(){

	?>

		<div class="wrapper-stats">
			<?php
			if( have_rows("review_statistics" ) ):
			while ( have_rows("review_statistics" ) ) : the_row();
			?>
			<div class="review-stats-item">
				<div class="stats-name"><?php echo get_sub_field('stat_name');?></div> 
				<div class="stats-value"><?php echo get_sub_field('stat_value');?></div>                
			</div>		      
			<?php 
			endwhile;
			endif;
			?>
		</div>

		<div class="wrapper-type">
			<div class="review-balls">
				<div class="bingo-types">Bingo Types:</div> 

				<?php
			$bingo_types = get_field('bingo_type');

			$bingo = array('30', '75', '80', '90');

			if($bingo_types){
				foreach ($bingo as $bingo_type){
					if (!in_array($bingo_type, $bingo_types)){$not_active = 'not-active'; }else{$not_active = ' ';}
					echo '<div class="rounded-circle '.$not_active.' ">' . $bingo_type . '</div>';
				}
			}



				?>

			</div>
		</div>

	<?php
}


function review_payment_methods(){


	if( have_rows("payment_options_images" ) ): 

		?>

			<div class="home-widget ">
				<div id="recent-posts-2" class="widget_recent_entries ">   
					<div class="widget-title">
						<?php echo __('Payment Options'); ?>
					</div>    
					<div class="payment-info">
						<?php echo get_field('payment_options_text'); ?>
					</div>              
					<ul class="list-unstyled">

		<?php

				while ( have_rows("payment_options_images" ) ) : the_row();
	
						?>
						
						<li class="col-3 pr-3 border-0">                
							<?php $image = get_sub_field('payment_method');                                      
				if( $image ) {?>
							<img src="<?php  echo $image['sizes']['bingo_top_list_logo']; ?>" loading="lazy" alt="<?php  echo $image['alt'] ?>">                              
							<?php } ?>
						</li>    
						
						<?php 
				endwhile;

						?>
					</ul>
				</div>
			</div>

		<?php endif; ?>
<?php 
}

function review_specifications(){wp_reset_postdata();

	if( have_rows("specifications" ) ): 

		?>

			<div class="home-widget ">
				<div id="specifications" class="widget_recent_entries ">   
					<div class="widget-title">
						<?php echo __('Specifications'); ?>
					</div>    
					<ul class="list-unstyled">
						<?php
								 $score = 0;
								 $count_specs = 0;

								 while ( have_rows("specifications" ) ) : the_row();
								 $count_specs++;
								 $score = $score + get_sub_field('rating');
						?>
						<li> 
							<span class="pull-left"><?php echo get_sub_field('title'); ?></span>
							<span class="pull-right"><?php echo get_sub_field('rating'); ?>/10</span> 
						</li>     
						<?php 
								 endwhile;           
						?>
					</ul>
				</div>
				<div class="specifications-score">
					<?php echo $score / $count_specs ; ?>/10
				</div>
			</div>

<?php endif; ?>


<?php 
								}


function review_pros_cons(){


	if( have_rows("pros_and_cons" ) ): ?>

		<div class="home-widget ">
			<div id="recent-posts-2" class="widget_recent_entries ">   
				<div class="widget-title">
					<?php echo __('Pros and cons'); ?>
				</div>    
				<ul class="list-unstyled">
					<?php

			while ( have_rows("pros_and_cons" ) ) : the_row();
			$icon = get_sub_field('icon');
					?>
					<li> 
						<i class="fa fa-arrow-up <?php if($icon == 'pro'){echo 'text-success';}else{echo 'text-danger';}  ?>" aria-hidden="true"></i>                  
						<span><?php echo get_sub_field('text'); ?></span>
					</li>     
					<?php 
			endwhile;

					?>
				</ul>
			</div>
		</div>

<?php endif; ?>

<?php }

function review_bottom_content(){

	?>

	<?php
		if( have_rows("review_content_bottom_sections" ) ):
			while ( have_rows("review_content_bottom_sections" ) ) : the_row();?>
			<div class="col-lg-12 col-md-12 widget pl-4 pr-4">
				<?php echo get_sub_field('bottom_content'); ?>
			</div>
			<?php 
		endwhile;
		endif;
	?>

<?php }

?>