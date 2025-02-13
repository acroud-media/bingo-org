<?php get_header(); ?>  
<main id="main">
	<h1 class="text-white main_title"><?php echo get_the_archive_title();?></h1>
	<div class="widget blog-archive-category">
		<?php
		if ( have_posts() ) :
		while ( have_posts() ) : the_post();?>
		<div class="col-lg-4 col-12 p-2">   
			<div class="blog-post-image">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail('bingosmallimagefeatured'); ?>
				</a>
			</div>
			<!--blog-post-image-->
			<div class="blog-post-title-box">
				<div class="blog-post-title">
					<h2>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php the_title(); ?>
						</a>
					</h2>
				</div>
				<!--blog-post-title-->
			</div>
			<!--blog-post-title-box-->

			<div class="blog-post-date-author">

				<div class="blog-post-author">
					<?php the_author_posts_link(); ?>
				</div>
				<!--blog-post-author-->


				<div class="blog-post-date">
					<?php echo esc_html(get_the_date()); ?>
				</div>
				<!--blog-post-date-->

			</div>
			<!--blog-post-date-author-->

			<div class="blog-post-content mt-3">
				<?php echo bingo_excerpt(50); ?>
			</div>
			<!--blog-post-content-->
		</div>
		<?php 
		endwhile;
		bingo_the_posts_pagination();
		else :
		?><p><?php _e( 'Sorry, no posts matched your criteria.', 'bingo' ); ?></p><?php
		endif;
		?>
	</div>  
	<div class="right-sidebar">
		<?php dynamic_sidebar( 'Right Sidebar' ); ?>
	</div>
</main>
<?php get_footer(); ?>