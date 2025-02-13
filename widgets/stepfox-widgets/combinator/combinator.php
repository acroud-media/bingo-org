<?php   
/* 
Plugin Name: Combinator
Description: Combinator Widget
Version: 1.0 
Author: Stefan Naumovski 
*/    

add_action( 'widgets_init', 'combinator_posts' );

function combinator_posts() {register_widget( 'combinator_widget_bingo' );}

class combinator_widget_bingo extends WP_Widget {
	
	/* Register widget with WordPress. */
	
	function __construct() {
		parent::__construct(
			'combinator_widget_bingo', // Widget ID
			esc_html__('Presets Widget', 'bingo'), // Name
			array( 'description' => '', 'customize_selective_refresh' => true) // Args
			);}
		
		/* Front-end display of widget. */
		
	public function widget( $args, $instance ) {
		
		/* Default widget settings. */
		
		$defaults = array( 'title' => 'Combinator widget', 'widget_size' => 'one-part', 'categories' => 0, 'presets' => 'preset1', 'author_huge' => 'on', 'date_huge' => 'on', 'cat_show_huge' => 'on', 'author_big' => 'on', 'date_big' => 'on', 'cat_show_big' => 'on', 'author_small' => 'on', 'excerptnumber_blogroll' => 30, 'author_blogroll' => 'on', 'date_blogroll' => 'on', 'date_thumb' => '0', 'cat_show_thumb' => 'on', 'image_thumb_thumb' => 'on', 'display_author' => 'on', 'offset' => '0' );
		$instance = wp_parse_args( (array) $instance, $defaults );
		
		
		$title = $instance['title'];
		$offset = $instance['offset'];

		$categories = $instance['categories'];
		$widget_size = $instance['widget_size'];
		$presets = $instance['presets'];
		$author_huge = $instance['author_huge'];
		$date_huge = $instance['date_huge'];
		$cat_show_huge = $instance['cat_show_huge'];
		$author_big = $instance['author_big'];
		$date_big = $instance['date_big'];
		$cat_show_big = $instance['cat_show_big'];
		$author_small = $instance['author_small'];
		$excerptnumber_blogroll = $instance['excerptnumber_blogroll'];
		$author_blogroll = $instance['author_blogroll'];
		$date_blogroll = $instance['date_blogroll'];
		$date_thumb = $instance['date_thumb'];
		$image_thumb_thumb = $instance['image_thumb_thumb'];	
		$cat_show_thumb = $instance['cat_show_thumb'];
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



 <?php 



$huge_img_feat_cat_bingo_options = array(
	'title' => '',
	'number' => 1, 
	'review' => 0, 
	'widget_size' => 'one-part', 
	'offset' => $offset, 
	'categories' => $categories, 
	'author' => $author_huge, 
	'date' => $date_huge, 
	'cat_show' => $cat_show_huge, 
	'display_text'=>'on', 
	'navigation'=> '0', 
	'auto_load' => '0'
    );

$img_feat_cat_bingo_options = array(
	'title' => '',
	'number' => 1, 
	'review' => 0, 
	'widget_size' => 'one-part', 
	'offset' => $offset,  
	'categories' => $categories, 
	'author' => $author_big, 
	'date' => $date_big, 
	'cat_show' => $cat_show_big, 
	'display_text'=>'on', 
	'navigation'=> '0', 
	'auto_load' => '0'
    );

$small_img_feat_cat_bingo_options = array(
	'title' => '',
	'number' => 1, 
	'review' => 0, 
	'widget_size' => 'one-part', 
	'offset' => $offset,  
	'categories' => $categories, 
	'author' => $author_small, 
	'navigation'=> '0', 
	'auto_load' => '0'
 );
if ($image_thumb_thumb == 'on'){
$thumbs_number = 3;
}else{
$thumbs_number = 4;
}


$thumbnails_widget_bingo_options = array(
	'title' => '', 
	'number' => $thumbs_number, 
	'date' => $date_thumb, 
	'cat_show' => $cat_show_thumb,
	'thumb' => $image_thumb_thumb,
	'offset' => $offset,  
	'widget_size' => 'one-part', 
	'categories' => $categories, 
	'display_author' => $display_author
);


$blog_category_bingo_options = array(
	'title' => '', 
	'number' => 1, 
	'offset' => $offset, 
	'author' => $author_blogroll, 
	'date' => $date_blogroll, 
	'widget_size' => 'one-part', 
	'categories' => $categories, 
	'excerptnumber'=> $excerptnumber_blogroll, 
	'cat_show' => 'on', 
	'navigation'=>'0', 
	'auto_load' => '0'
);

if ($widget_size == 'one-part'){
				if ($presets == 'preset1'){
					$small_img_feat_cat_bingo_options['number'] = '1';
					$thumbnails_widget_bingo_options['offset'] = '1' + $offset;
					$presets_arrange = array(
						array('small_img_cat_bingo', $small_img_feat_cat_bingo_options),
						array('thumbnails_widget_bingo', $thumbnails_widget_bingo_options),
					);
					}elseif ($presets == 'preset2'){
						$thumbnails_widget_bingo_options['offset'] = '1' + $offset;
					$presets_arrange = array(
						array('blog_category_bingo', $blog_category_bingo_options),
						array('thumbnails_widget_bingo', $thumbnails_widget_bingo_options),
					);

					}if ($presets == 'preset3'){
						$thumbnails_widget_bingo_options['offset'] = '1' + $offset;
					$presets_arrange = array(
						array('img_feat_cat_bingo', $img_feat_cat_bingo_options),
						array('thumbnails_widget_bingo', $thumbnails_widget_bingo_options),
					);

					}





}elseif ($widget_size == 'two-parts'){

					if ($presets == 'preset1'){

					$small_img_feat_cat_bingo_options['number'] = '2';
					$thumbnails_widget_bingo_options['offset'] = '2' + $offset;
					$presets_arrange = array(
						array('small_img_cat_bingo', $small_img_feat_cat_bingo_options),
						array('thumbnails_widget_bingo', $thumbnails_widget_bingo_options),
								);

					}elseif ($presets == 'preset2'){
						$thumbnails_widget_bingo_options['offset'] = '1' + $offset;
						$presets_arrange = array(
						array('blog_category_bingo', $blog_category_bingo_options),
						array('thumbnails_widget_bingo', $thumbnails_widget_bingo_options),
						);
					}if ($presets == 'preset3'){
						$thumbnails_widget_bingo_options['offset'] = '1' + $offset;
						$presets_arrange = array(
						array('img_feat_cat_bingo', $img_feat_cat_bingo_options),
						array('thumbnails_widget_bingo', $thumbnails_widget_bingo_options),
						);
					}
}elseif($widget_size == 'three-parts'){
					if ($presets == 'preset1'){
						$thumbnails_widget_bingo_options['offset'] = '1' + $offset;
						
						$presets_arrange = array(
						array('huge_img_feat_cat_bingo', $huge_img_feat_cat_bingo_options),
						array('thumbnails_widget_bingo', $thumbnails_widget_bingo_options),
						);	
					}elseif ($presets == 'preset2'){
						$thumbnails_widget_bingo_options1 = $thumbnails_widget_bingo_options;
						$thumbnails_widget_bingo_options['offset'] = '1' + $offset;
						$thumbnails_widget_bingo_options1['offset'] = '5' + $offset;
						$presets_arrange = array(
						array('blog_category_bingo', $blog_category_bingo_options),
						array('thumbnails_widget_bingo', $thumbnails_widget_bingo_options),
						array('thumbnails_widget_bingo', $thumbnails_widget_bingo_options1),
						);
					}if ($presets == 'preset3'){
						$thumbnails_widget_bingo_options1 = $thumbnails_widget_bingo_options;
						$thumbnails_widget_bingo_options['offset'] = '1' + $offset;
						$thumbnails_widget_bingo_options1['offset'] = '5' + $offset;
						$presets_arrange = array(
						array('img_feat_cat_bingo', $img_feat_cat_bingo_options),
						array('thumbnails_widget_bingo', $thumbnails_widget_bingo_options),
						array('thumbnails_widget_bingo', $thumbnails_widget_bingo_options1),
						);
					}if ($presets == 'preset4'){


						$small_img_feat_cat_bingo_options['number'] = '2';
						$small_img_feat_cat_bingo_options1 = $small_img_feat_cat_bingo_options;
						$small_img_feat_cat_bingo_options1['offset'] = '3' + $offset;
						$img_feat_cat_bingo_options['offset'] = '2' + $offset;


						$presets_arrange = array(					
						array('small_img_cat_bingo', $small_img_feat_cat_bingo_options),
						array('img_feat_cat_bingo', $img_feat_cat_bingo_options),
						array('small_img_cat_bingo', $small_img_feat_cat_bingo_options1),
						);
					}



}elseif($widget_size == 'four-parts'){

					if ($presets == 'preset1'){
						$thumbnails_widget_bingo_options1 = $thumbnails_widget_bingo_options;
						$thumbnails_widget_bingo_options['offset'] = '1' + $offset;
						$thumbnails_widget_bingo_options1['offset'] = '5' + $offset;
						$presets_arrange = array(
						array('huge_img_feat_cat_bingo', $huge_img_feat_cat_bingo_options),
						array('thumbnails_widget_bingo', $thumbnails_widget_bingo_options),
						array('thumbnails_widget_bingo', $thumbnails_widget_bingo_options1),
						);	
					}elseif ($presets == 'preset2'){
						$blog_category_bingo_options['offset'] = '1' + $offset;
						$thumbnails_widget_bingo_options['offset'] = '2' + $offset;
						$presets_arrange = array(
						array('huge_img_feat_cat_bingo', $huge_img_feat_cat_bingo_options),
						array('blog_category_bingo', $blog_category_bingo_options),
						array('thumbnails_widget_bingo', $thumbnails_widget_bingo_options),
				
						);
					}if ($presets == 'preset3'){
						$small_img_feat_cat_bingo_options['number'] = '2';
						$small_img_feat_cat_bingo_options1 = $small_img_feat_cat_bingo_options;
						$small_img_feat_cat_bingo_options['offset'] = '1' + $offset;
						$small_img_feat_cat_bingo_options1['offset'] = '3' + $offset;
						$presets_arrange = array(
						array('huge_img_feat_cat_bingo', $huge_img_feat_cat_bingo_options),
						array('small_img_cat_bingo', $small_img_feat_cat_bingo_options),
						array('small_img_cat_bingo', $small_img_feat_cat_bingo_options1),

						);
					}if ($presets == 'preset4'){


						$thumbnails_widget_bingo_options1 = $thumbnails_widget_bingo_options;
						$blog_category_bingo_options['offset'] = '1' + $offset;
						$thumbnails_widget_bingo_options['offset'] = '2' + $offset;
						$thumbnails_widget_bingo_options1['offset'] = '5' + $offset;
						$presets_arrange = array(
						array('img_feat_cat_bingo', $img_feat_cat_bingo_options),
						array('blog_category_bingo', $blog_category_bingo_options),
						array('thumbnails_widget_bingo', $thumbnails_widget_bingo_options),
						array('thumbnails_widget_bingo', $thumbnails_widget_bingo_options1),

						);
					}if ($presets == 'preset5'){


						$small_img_feat_cat_bingo_options['number'] = '2';
						$small_img_feat_cat_bingo_options1 = $small_img_feat_cat_bingo_options;
						$small_img_feat_cat_bingo_options1['offset'] = '3' + $offset + $offset;
						$huge_img_feat_cat_bingo_options['offset'] = '2' + $offset + $offset;
						$presets_arrange = array(
						
						array('small_img_cat_bingo', $small_img_feat_cat_bingo_options),
						array('huge_img_feat_cat_bingo', $huge_img_feat_cat_bingo_options),
						array('small_img_cat_bingo', $small_img_feat_cat_bingo_options1),

						);
					}

	}




foreach($presets_arrange as $preset){?>
<div class="combinator-part <?php if ($preset[0] == 'huge_img_feat_cat_bingo'){ echo esc_html('double');}?>">
	<?php the_widget( $preset[0], $preset[1] ); ?>
</div>
<?php 
}
 ?> 








<?php
		/* After widget. */
		
		echo $args['after_widget'];
	}
	
		/* Widget settings. */
		
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		/* Strip tags. */
		
		$instance['title'] = $new_instance['title'];
		$instance['offset'] = $new_instance['offset'];
		$instance['categories'] = $new_instance['categories'];	
		$instance['widget_size'] = $new_instance['widget_size'];
		$instance['presets'] = $new_instance['presets'];	
		$instance['author_huge'] = $new_instance['author_huge'];
		$instance['date_huge'] = $new_instance['date_huge'];
		$instance['cat_show_huge'] = $new_instance['cat_show_huge'];
		$instance['author_big'] = $new_instance['author_big'];
		$instance['date_big'] = $new_instance['date_big'];
		$instance['cat_show_big'] = $new_instance['cat_show_big'];
		$instance['author_small'] = $new_instance['author_small'];
		$instance['excerptnumber_blogroll'] = $new_instance['excerptnumber_blogroll'];
		$instance['author_blogroll'] = $new_instance['author_blogroll'];
		$instance['date_blogroll'] = $new_instance['date_blogroll'];
		$instance['date_thumb'] = $new_instance['date_thumb'];
		$instance['image_thumb_thumb'] = $new_instance['image_thumb_thumb'];
		$instance['cat_show_thumb'] = $new_instance['cat_show_thumb'];
		$instance['display_author'] = $new_instance['display_author'];
		

		return $instance;
	}
	

	function form( $instance ) {
		
		/* Default widget settings. */
		
		$defaults = array( 'title' => 'Combinator widget', 'widget_size' => 'one-part', 'categories' => 0, 'presets' => 'preset1', 'author_huge' => 'on', 'date_huge' => 'on', 'cat_show_huge' => 'on', 'author_big' => 'on', 'date_big' => 'on', 'cat_show_big' => 'on', 'author_small' => 'on', 'excerptnumber_blogroll' => 30, 'author_blogroll' => 'on', 'date_blogroll' => 'on', 'date_thumb' => '0', 'cat_show_thumb' => 'on', 'image_thumb_thumb' => 'on', 'display_author' => 'on', 'offset' => '0' );
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

<!-- Offset posts -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'offset' )); ?>">
		<?php esc_html_e('Forward Posts(offset):', 'bingo'); ?>
	</label>
	<input type="number" min="0" id="<?php echo esc_attr($this->get_field_id( 'offset' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'offset' )); ?>" value="<?php echo esc_attr($instance['offset']); ?>" size="3" />
</p>

<!-- Presets -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id('presets')); ?>"><?php _e('Presets:', 'bingo');?></label>
	<select name="<?php echo esc_attr($this->get_field_name('presets')); ?>" id="<?php echo esc_attr($this->get_field_id('presets')); ?>" class="widefat" >
		<?php 
		$widsize = $instance['widget_size'];
if ($widsize == 'one-part'){
		$options = array('preset1', 'preset2', 'preset3', );
}else if($widsize == 'two-parts'){
		$options = array('preset1', 'preset2', 'preset3', );
}else if($widsize == 'three-parts'){
		$options = array('preset1', 'preset2', 'preset3', 'preset4', );
}else if($widsize == 'four-parts'){
		$options = array('preset1', 'preset2', 'preset3', 'preset4', 'preset5' );
}


		foreach ($options as $option) {?>
		<option value='<?php echo esc_attr($option); ?>' <?php if ($option == $instance['presets']) echo 'selected="selected"'; ?>><?php echo esc_html($option); ?></option>
		<?php } ?>
	</select>
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


<p>
	<h3>
		<?php _e('Widget Options', 'bingo'); ?>
	</h3>


	<h4>
		<?php _e('Huge Featured Images Widget', 'bingo'); ?>
	</h4>
		<!-- Author -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'author_huge' )); ?>">
					<?php _e('Show Author:', 'bingo'); ?>
				</label>
				<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'author_huge' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'author_huge' )); ?>" <?php checked( (bool) $instance['author_huge'], true ); ?> />
			</p>
			<!-- Date -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'date_huge' )); ?>">
					<?php _e('Show Date:', 'bingo'); ?>
				</label>
				<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'date_huge' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'date_huge' )); ?>" <?php checked( (bool) $instance['date_huge'], true ); ?> />
			</p>

			<!-- category show -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'cat_show_huge' )); ?>">
					<?php _e('Show category:', 'bingo'); ?>
				</label>
				<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'cat_show_huge' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'cat_show_huge' )); ?>" <?php checked( (bool) $instance['cat_show_huge'], true ); ?> />
			</p>


	<h4>
		<?php _e('Big Featured Images Widget', 'bingo'); ?>
	</h4>

			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'author_big' )); ?>">
					<?php _e('Show Author:', 'bingo'); ?>
				</label>
				<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'author_big' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'author_big' )); ?>" <?php checked( (bool) $instance['author_big'], true ); ?> />
			</p>
			<!-- Date -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'date_big' )); ?>">
					<?php _e('Show Date:', 'bingo'); ?>
				</label>
				<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'date_big' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'date_big' )); ?>" <?php checked( (bool) $instance['date_big'], true ); ?> />
			</p>

			<!-- category show -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'cat_show_big' )); ?>">
					<?php _e('Show category:', 'bingo'); ?>
				</label>
				<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'cat_show_big' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'cat_show_big' )); ?>" <?php checked( (bool) $instance['cat_show_big'], true ); ?> />
			</p>


	<h4>
		<?php _e('Small Featured Images Widget', 'bingo'); ?>
	</h4>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'author_small' )); ?>">
					<?php _e('Show Author:', 'bingo'); ?>
				</label>
				<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'author_small' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'author_small' )); ?>" <?php checked( (bool) $instance['author_small'], true ); ?> />
			</p>


	<h4>
		<?php _e('Blogroll Widget', 'bingo'); ?>
	</h4>
		<!-- Number of words -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'excerptnumber_blogroll' )); ?>">
				<?php _e('Number of words(max: 120):', 'bingo'); ?>
			</label>
			<input type="number" min="0" id="<?php echo esc_attr($this->get_field_id( 'excerptnumber_blogroll' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'excerptnumber_blogroll' )); ?>" value="<?php echo esc_attr($instance['excerptnumber_blogroll']); ?>" size="3" />
		</p>

		<!-- Author -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'author_blogroll' )); ?>">
				<?php _e('Show Author:', 'bingo'); ?>
			</label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'author_blogroll' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'author_blogroll' )); ?>" <?php checked( (bool) $instance['author_blogroll'], true ); ?> />
		</p>

		<!-- Date -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'date_blogroll' )); ?>">
				<?php _e('Show Date:', 'bingo'); ?>
			</label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'date_blogroll' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'date_blogroll' )); ?>" <?php checked( (bool) $instance['date_blogroll'], true ); ?> />
		</p>

	<h4>
		<?php _e('Thumbnails Widget', 'bingo'); ?>
	</h4>
	
				<!-- image_thumb_thumb -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'image_thumb_thumb' )); ?>">
					<?php _e('Show Thumbnail:', 'bingo'); ?>
				</label>
				<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'image_thumb_thumb' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'image_thumb_thumb' )); ?>" <?php checked( (bool) $instance['image_thumb_thumb'], true ); ?> />
			</p>
			<!-- Date -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'date_thumb' )); ?>">
					<?php _e('Show Date:', 'bingo'); ?>
				</label>
				<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'date_thumb' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'date_thumb' )); ?>" <?php checked( (bool) $instance['date_thumb'], true ); ?> />
			</p>

			<!-- category show -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'cat_show_thumb' )); ?>">
					<?php _e('Show category:', 'bingo'); ?>
				</label>
				<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'cat_show_thumb' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'cat_show_thumb' )); ?>" <?php checked( (bool) $instance['cat_show_thumb'], true ); ?> />
			</p>

			<!-- display_author -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'display_author' )); ?>">
					<?php _e('Show Author:', 'bingo'); ?>
				</label>
				<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'display_author' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'display_author' )); ?>" <?php checked( (bool) $instance['display_author'], true ); ?> />
			</p>


</p>

<?php }} ?>