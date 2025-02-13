<?php get_header(); ?>

<div id="main">
	<div id="post-404 mb-5 text-center">
		<h1 class="text-center">
			<?php echo __('Error 404'); ?>
		</h1>
		<div class="col-12 text-center mb-5">
		<?php echo __('The page you requested does not exist or has moved.'); ?>
		</div>
	</div>
	<!--post-404-->

		<div class="font-weight-bold col-12 text-center mb-5">
		<?php echo __('Here are some helpful links instead:'); ?>
		</div>

	<?php




      
      if( have_rows("404_error_page_links", 'options' ) ):
         while ( have_rows("404_error_page_links", 'options') ) : the_row();?>
		<div class="font-weight-bold text-center">
			<a href="<?php echo get_sub_field('link_to_the_page'); ?>">
				<?php echo get_sub_field('title_of_the_page'); ?>
			</a>
		</div>

           
<?php
        endwhile;
      endif;
       








?>



</div>
<!--main -->

<?php get_footer(); ?>