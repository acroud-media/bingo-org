<?php 
/* Template Name: Review Archive
 * Description :Template used for the review archive
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

get_header(); ?>

<main id="main">

	<h1><?php echo get_the_title() ?></h1>

	<?php

	$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : (get_query_var( 'page' ) ? absint( get_query_var( 'page' )) : 1);

	$args = array(
		'post_type' => 'review',
		'post_status'   => 'publish',  
		'paged'		=>  $paged,
	);

	$reviews_query = new WP_Query( $args );       

	if( $reviews_query->have_posts() ) :

	while( $reviews_query->have_posts() ): $reviews_query->the_post(); ?>



	<?php include( locate_template( "template-parts/horizontal-review-card-html.php", false, false ) ); ?>



	<?php 

	endwhile; wp_reset_postdata();

	bingo_the_posts_pagination(); ?>

	<div class="pagination"> 

		<div class="nav-links" style="display:inline-block"> 
			<?php

			echo paginate_links( array(		
				'total' => $reviews_query->max_num_pages,        
				'current' => max( 1, get_query_var('paged') ),
				'next_text' => '»',
				'prev_text' => '«',
			) ); ?>

		</div>

	</div> 
	
	<?php

	else :

	?><p><?php _e( 'Sorry, no posts matched your criteria.', 'bingo' ); ?></p><?php

	endif; ?>

	<!--<div class="archive-content">--><?php the_content() ?> <!--</div>	--> 


	<div class="right-sidebar">

		<?php dynamic_sidebar( 'Right Sidebar' ); ?>

	</div>	

</main>

<?php get_footer(); ?>