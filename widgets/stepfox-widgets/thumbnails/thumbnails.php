<?php   

/* 
Plugin Name: Thumbnails
Description: Thumbnails widget 
Version: 1.0 
Author: Stefan Naumovski 
*/    

add_action( 'widgets_init', 'thumbnails_widget' );

function thumbnails_widget() {register_widget( 'thumbnails_widget_bingo' );}

class thumbnails_widget_bingo extends WP_Widget {
	
	/* Register widget with WordPress. */
	
	function __construct() {
		parent::__construct(
			'thumbnails_bingo', // Widget ID
			esc_html__('Thumbnails', 'bingo'), // Name
			array( 'description' => '', 'customize_selective_refresh' => true ) // Args
			);}
		
		/* Front-end display of widget. */
	public function widget( $args, $instance ) {
		
		/* Default widget settings. */
		
		$defaults = array( 'title' => 'Thumbnail widget', 'number' => 3, 'widget_size' => 'one-part', 'categories' => 0, 'offset' => 0, 'date' => 'on', 'cat_show' => 'on', 'thumb' => 'on', 'display_author' => 'on');
		$instance = wp_parse_args( (array) $instance, $defaults );
		
		
		$title = $instance['title'];
		$number = $instance['number'];
		$offset = $instance['offset'];
		$categories = $instance['categories'];
		$widget_size = $instance['widget_size'];

		$thumb = $instance['thumb'];
		$date = $instance['date'];
		$cat_show = $instance['cat_show'];
		$display_author = $instance['display_author'];



						
		$args['before_widget'] = str_replace('class="home-widget', 'class="home-widget '. esc_attr($widget_size) , $args['before_widget']);							
		echo $args['before_widget'];
		if ( ! empty( $title ) ){
			echo $args['before_title'];		
				if($categories != 0){echo '<a class="category-widget-title-'.strtolower(esc_attr($categories)).'" href='.esc_url(get_category_link( $categories )).'>';}		
			echo esc_html($title); 			
				if($categories != 0){echo '</a>';}
			echo $args['after_title'];}
			?>

<ul class="featured-thumbnails <?php if($thumb){echo esc_attr('normal-thumb');}else{echo esc_attr('without-thumb');}?>">
	<?php $bingo_posts = new WP_Query(array( 'cat' => $categories, 'posts_per_page' => $number, 'offset' => $offset )); while ( $bingo_posts->have_posts()) : $bingo_posts->the_post(); ?>
	<li <?php post_class((is_sticky()?'sticky':'')); ?>>
		<?php if($thumb){?>
		<div class="featured-posts-image">
			<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<?php the_post_thumbnail('bingosmallthumb'); ?>
			</a>
			<?php } ?>
		</div>
		<!---featured-posts-image-->
		<?php } ?>
		<div class="featured-posts-text">
			<?php if($cat_show) { ?>
			<span class="category-icon">
			<?php $category = get_the_category(); if($category[0]){echo '<a href="'.esc_url(get_category_link($category[0]->term_id )).'" title="'.esc_attr($category[0]->cat_name).'">'.esc_html($category[0]->cat_name).'</a>';} ?>
			</span>
			<?php } ?>
			<div class="featured-posts-title">
				<a href="<?php the_permalink(); ?>">
				<?php echo wp_trim_words( esc_html(get_the_title()), 10 ); ?>
				</a>
			</div>
			<?php if($date) { ?>
			<span class="post-date">
			<?php echo esc_html(get_the_date()); ?>
			</span>
			<?php } ?>
			<?php if($display_author) { ?>
				<div class="thumbnails-author">
					<?php echo esc_html(get_option('bingo_word_before_author', 'by')); ?>
					<?php the_author_posts_link(); ?>
				</div>		
				<!--thumbnails-author-->	
			<?php } ?>
			<!--featured-posts-title-->
		</div>
		<!--featured-posts-text-->
	</li>
	<?php endwhile;wp_reset_postdata(); ?>
</ul>
<?php
		/* After widget. */
		
		echo $args['after_widget'];
	}
	
		/* Widget settings. */
		
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		/* Strip tags. */
		
		$instance['title'] = $new_instance['title'];
		$instance['number'] = $new_instance['number'];
		$instance['offset'] = $new_instance['offset'];
		$instance['categories'] = $new_instance['categories'];	
		$instance['widget_size'] = $new_instance['widget_size'];
		$instance['date'] = $new_instance['date'];
		$instance['cat_show'] = $new_instance['cat_show'];
		$instance['thumb'] = $new_instance['thumb'];
		$instance['display_author'] = $new_instance['display_author'];
		

		return $instance;
	}
	

	function form( $instance ) {
		
		/* Default widget settings. */
		
		$defaults = array( 'title' => 'Thumbnail widget', 'number' => 3, 'widget_size' => 'one-part', 'categories' => 0, 'offset' => 0, 'date' => 'on', 'cat_show' => 'on', 'thumb' => 'on', 'display_author' => 'on');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

<!-- Widget Title-->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>">
		<?php _e('Title:', 'bingo'); ?>
	</label>
	<input id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_textarea($instance['title']); ?>" style="width:90%;" />
</p>

<!-- widget_size -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'widget_size' )); ?>">
		<?php _e('Widget size:', 'bingo'); ?>
	</label>
	<br>
	<input type="radio" name="<?php echo esc_attr($this->get_field_name( 'widget_size' )); ?>" value="one-part" <?php checked('one-part', $instance['widget_size']); ?> class="one-part"/>
	<input type="radio" name="<?php echo esc_attr($this->get_field_name( 'widget_size' )); ?>" value="two-parts" <?php checked('two-parts', $instance['widget_size']); ?> class="two-parts" />
	<input type="radio" name="<?php echo esc_attr($this->get_field_name( 'widget_size' )); ?>" value="three-parts" <?php checked('three-parts', $instance['widget_size']); ?> class="three-parts"/>
	<input type="radio" name="<?php echo esc_attr($this->get_field_name( 'widget_size' )); ?>" value="four-parts" <?php checked('four-parts', $instance['widget_size']); ?> class="four-parts"/>
</p>

<!-- Number of posts -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>">
		<?php _e('Number of posts to show:', 'bingo'); ?>
	</label>
	<input type="number" min="1" id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" value="<?php echo esc_attr($instance['number']); ?>" size="3" />
</p>

<!-- Offset posts -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'offset' )); ?>">
		<?php _e('Forward Posts(offset):', 'bingo'); ?>
	</label>
	<input type="number" min="0" id="<?php echo esc_attr($this->get_field_id( 'offset' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'offset' )); ?>" value="<?php echo esc_attr($instance['offset']); ?>" size="3" />
</p>
<!-- Date -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'date' )); ?>">
		<?php _e('Show Date:', 'bingo'); ?>
	</label>
	<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'date' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'date' )); ?>" <?php checked( (bool) $instance['date'], true ); ?> />
</p>

<!-- category show -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'cat_show' )); ?>">
		<?php _e('Show category:', 'bingo'); ?>
	</label>
	<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'cat_show' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'cat_show' )); ?>" <?php checked( (bool) $instance['cat_show'], true ); ?> />
</p>

<!-- thumb show -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'thumb' )); ?>">
		<?php _e('Show Thumbnail:', 'bingo'); ?>
	</label>
	<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'thumb' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'thumb' )); ?>" <?php checked( (bool) $instance['thumb'], true ); ?> />
</p>

<!-- display_author -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'display_author' )); ?>">
		<?php _e('Show Author:', 'bingo'); ?>
	</label>
	<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'display_author' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'display_author' )); ?>" <?php checked( (bool) $instance['display_author'], true ); ?> />
</p>

<!-- Category -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id('categories')); ?>">
		<?php _e('(Optional)Select Category:', 'bingo'); ?>
	</label>
	<select id="<?php echo esc_attr($this->get_field_id('categories')); ?>" name="<?php echo esc_attr($this->get_field_name('categories')); ?>" style="width:100%;">
		<option value='all' <?php if ('all' == (isset($instance['categories']))) echo 'selected="selected"'; ?>>
		<?php _e('All Categories', 'bingo'); ?>
		</option>
		<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
		<?php foreach($categories as $category) { ?>
		<option value='<?php echo esc_attr($category->term_id); ?>' <?php if(isset($instance['categories'])){ if ($category->term_id == $instance['categories']) echo 'selected="selected"';}?>>
		<?php echo esc_html($category->cat_name); ?>
		</option>
		<?php } ?>
	</select>
</p>
<?php }} ?>