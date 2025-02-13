<?php


function bingo_stepfox_search_scripts() {
	wp_enqueue_script( 'bingo_sf-autocomplete', get_template_directory_uri() . '/js/sf-autocomplete.js', array( 'jquery'));
	wp_localize_script( 'bingo_sf-autocomplete', 'stepfoxcomplete', array( 'stepfoxcompleteurl' => admin_url( 'admin-ajax.php' ) ) );

}
add_action( 'wp_enqueue_scripts', 'bingo_stepfox_search_scripts' );


add_action( 'wp_ajax_stepfox_search', 'bingo_stepfox_search' );
add_action( 'wp_ajax_nopriv_stepfox_search', 'bingo_stepfox_search' );


function bingo_stepfox_search_function() {
		$search_this = esc_textarea($_POST['search_this']);
		if(!empty($search_this)){
         global $wpdb;         
		 $bingo_search_query = $wpdb->prepare("SELECT * FROM {$wpdb->posts}") ;
		 $bingo_search_part_one = $wpdb->prepare("WHERE post_title LIKE %s", '%'.$search_this.'%');
		 $bingo_search_part_two = $wpdb->prepare("ORDER BY (post_title LIKE %s) DESC", $search_this.'%');
		  
         $bingo_posts = $wpdb->get_results(
                "
                $bingo_search_query
                $bingo_search_part_one
                AND post_title IS NOT NULL
                AND post_status = 'publish'
                AND (post_type = 'post')
                $bingo_search_part_two,
         		post_title ASC
                LIMIT 4; 
                "
         ); 
     if ( $bingo_posts ){global $post; foreach ( $bingo_posts as $post ){setup_postdata ( $post );?>
	<li <?php post_class('widgetfx-7');?>>
		<div class="featured-posts-image col-3 pull-left">
			<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail('bingo_icon'); ?>
			</a>
			<?php } ?>
		</div>
		<!---featured-posts-image-->		
		<div class="featured-posts-text text-left col-9 pull-left">
			<div class="h4 featured-posts-title pull-left col-12">
				<a class="text-dark" href="<?php the_permalink(); ?>">
				<?php echo wp_trim_words( esc_html(get_the_title()), 20 ); ?>
				</a>
			</div>
			<!--featured-posts-title-->
			<small class="pull-left col-12 post-date">
			<?php echo esc_html(get_the_date()); ?>
			</small>	
		</div>
		<!--featured-posts-text-->
	</li>
	<?php }}}}
	
function bingo_stepfox_search(){
	ob_start ();
	bingo_stepfox_search_function();
	$response = ob_get_contents();
	ob_end_clean();
	echo wp_kses_post($response);
	die();
}
	?>