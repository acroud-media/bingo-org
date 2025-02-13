<?php get_header(); 


//review_header_title(); ?> 
  <main id="main">
		<section id="content">
				<h1><?php echo get_the_title() ?></h1>
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
		</section>  
	</main>
<?php get_footer(); ?>