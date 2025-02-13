<?php

$country = getenv('HTTP_GEOIP_COUNTRY_CODE');
 if ( $country == "CH" ) {
    wp_redirect(home_url());
    exit();
  }

 get_header(); 



//review_header_title(); ?>
	
<main id="main">
	
	<article class="casino-review">
		
		<h1><?php echo get_the_title() ?></h1>

		<section class="review-section">

			<div class="vertical-review-card">     

				<?php vertical_review_card(); ?>

			</div>

			<div class="slider-stats">

				<div class="review-slider"><?php review_slider(); ?></div>

				<div class="review-stats"><?php review_stats(); ?></div>

			</div>

			<!--<div class="col-lg-12 col-md-12 widget pl-4 pr-4">

				<?php //review_stats(); ?> 

			</div>-->

		</section>

		<section class="casino-info">

			<?php review_pros_cons(); ?>

			<?php review_specifications(); ?>

			<?php review_payment_methods(); ?>

		</section>

		<section id="content"><?php the_content();?></section>		
	
	</article>	
	
	<?php
	
	if ( get_field('link') ) { ?>

		<div class="home-widget ">			

			<div class="toplist-container row flex-wrap col-lg-12 col-12">	

				<div class="toplist-widget widget_double_coupons_id_name flex-wrap d-md-flex"> 

					<div class="element-size vertical-card col-12">

						<div class="panel panel-danger panel-pricing text-center">

							<div class="panel-heading">

								<div class="media-object img-rounded img-responsive mx-auto d-block">

									<?php $image =  get_field('image');   

										if( $image ) { ?>

										<img src="<?php  echo $image['sizes']['bingo_top_list_logo']; ?>" fetchpriority="high" decoding="async" alt="<?php  echo $image['alt'] ?>">  

										<?php } ?>                            

								</div>

								<div class="bonus_title"><?php echo get_field('title') ; ?></div>

								<div class="bonus_money"><?php echo get_field('content') ; ?></div>

							</div>

							<div class="panel-footer">

								<?php if(get_field('link')) { ?>

								<a target="_blank" aria-label="<?php echo get_field('button_title') ; ?>" class="btn btn-lg btn-block top-list-play" href="<?php echo get_field('link') ? get_permalink(get_field('link'))  : '#'; ?>"><?php echo get_field('button_title') ?: __('Play Now') ?></a>

								<?php } ?>

							</div>

							<small class="text-center font-weight-bold"></small>

						</div>

					</div>		

				</div>

			</div>

		</div>

<?php } ?>
		
</main>


<?php get_footer(); ?>