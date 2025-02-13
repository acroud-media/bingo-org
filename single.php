<?php

$country = getenv('HTTP_GEOIP_COUNTRY_CODE');
if ( $country == "CH" ) {
	wp_redirect(home_url());
	exit();
}

get_header(); 



//review_header_title(); ?>

<main id="main">

	<article class="single-news">

		<h1><?php echo get_the_title() ?></h1>
		<?php if ( 'review' == get_post_type() ){?>
		<div class="review-section">
			<div class="col-lg-4 col-12 pb-2 pb-lg-0 pl-0 pr-lg-2 pr-0">                     
				<?php vertical_review_card(); ?>
			</div>
			<div class="col-lg-8 col-md-12 widget pl-2 pr-2 mt-0">
				<?php review_slider(); ?>
			</div>
			<div class="col-lg-12 col-md-12 widget pl-4 pr-4">
				<?php review_stats(); ?> 
			</div>
		</div>
		<div class="col-lg-9 col-md-12 widget pl-4 pr-4 text-editor-widget-content">
			<?php echo get_field('review_content');?>
		</div>

		<div class="col-lg-3 col-md-12 right-sidebar">
			<?php review_pros_cons(); 
												 review_specifications();
												 review_payment_methods();
			?>

		</div>

		<?php  } 



			if ( 'review' == get_post_type() ){review_bottom_content();}else{?>

				<?php
				if ( have_posts() ) :
				while ( have_posts() ) : the_post();
				the_content();
				endwhile;
				bingo_the_posts_pagination();
				else :
				?><p><?php _e( 'Sorry, no posts matched your criteria.', 'bingo' ); ?></p><?php
				endif;
				?>

		<div class="right-sidebar">
			<?php dynamic_sidebar( 'Right Sidebar' ); ?>
		</div>        
		<?php } ?>
	</article>
</main>
<?php get_footer(); ?>