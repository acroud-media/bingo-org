<?php


function bingo_editor_widget_register() {register_widget( 'bingo_editor_widget' );}
add_action( 'widgets_init', 'bingo_editor_widget_register' );


class bingo_editor_widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {

		add_action( 'widgets_admin_page', array( $this, 'output_wp_editor_widget_html' ), 100 );
		add_action( 'customize_controls_print_footer_scripts', array( $this, 'output_wp_editor_widget_html' ), 1 );
		add_filter( 'wp_editor_widget_content', 'wptexturize' );
		add_filter( 'wp_editor_widget_content', 'convert_smilies' );
		add_filter( 'wp_editor_widget_content', 'convert_chars' );
		add_filter( 'wp_editor_widget_content', 'wpautop' );
		add_filter( 'wp_editor_widget_content', 'shortcode_unautop' );
		add_filter( 'wp_editor_widget_content', 'do_shortcode', 11 );


		$widget_ops = apply_filters(
			'bingo_editor_widget_ops',
			array(
				'classname' 	=> 'bingo_editor_widget',
				'description' 	=> __( 'Arbitrary text, HTML or rich text through the standard WordPress visual editor.', 'bingo' ),
			)
		);

		parent::__construct(
			'text_editor_bingo',
			__( 'Text Editor Widget', 'bingo' ),
			$widget_ops
		);

		add_action('admin_enqueue_scripts', array( $this, 'services_widget_scripts' ));

	}


		public function services_widget_scripts($hook) {
			if( $hook != 'widgets.php' ){
				return;
			}else{
				wp_enqueue_style('text-editor-widget-style', get_template_directory_uri() . '/widgets/text-editor-widget/text-editor-widget.css');
				wp_enqueue_script('text-editor-widget-script', get_template_directory_uri().'/widgets/text-editor-widget/text-editor-widget.js', null, null, true);
			} 	
		}







	public function widget( $args, $instance ) {
		$defaults = array( 'title' => '', 'content' => '', 'connect' => 'dont-connect');
		$instance = wp_parse_args( (array) $instance, $defaults );

        $title = $instance['title'];
        $content = $instance['content'];
        $connect = $instance['connect'];
        
       
          

        

		$args['before_widget'] = preg_replace('/class="/', 'class="'. $connect . ' ',  $args['before_widget'], 1 );



        echo $args['before_widget'];


        if ( ! empty( $title ) ){
            echo $args['before_title'] . esc_html($title) . $args['after_title'];
        }
        echo '<div class="text-editor-widget-content">';
        echo apply_filters('the_content', $content);
        echo '</div>';
        echo $args['after_widget'];
	}



    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance["title"] = $new_instance["title"];
        $instance["content"] = $new_instance["content"];
        $instance["connect"] = $new_instance["connect"];
        return $instance;
    }
 

	public function form( $instance ) {
        $defaults = array( 'title' => '', 'content' => '', 'connect' => 'dont-connect');
        $instance = wp_parse_args( (array) $instance, $defaults );
        $title = $instance["title"];
		$content = $instance["content"];
		$connect = $instance["connect"];
        

		?>
        <!-- Widget Title-->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>">
                <?php _e('Title:', 'bingo'); ?>
            </label>
            <input id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_textarea($instance['title']); ?>" style="width:90%;" />
        </p>


		<input type="hidden" id="<?php echo $this->get_field_id('content'); ?>" name="<?php echo $this->get_field_name( 'content' ); ?>" value="<?php echo esc_attr($content); ?>">
		<p>
			<a href="javascript:WPEditorWidget.showEditor('<?php echo $this->get_field_id( 'content' ); ?>');" class="button"><?php _e( 'Edit content', 'bingo' ) ?></a>
		</p>

	<!-- connect -->
	<p>
		<label for="<?php echo $this->get_field_id('connect'); ?>">Connect To next or previous widget</label>
		<select name="<?php echo $this->get_field_name('connect'); ?>" id="<?php echo $this->get_field_id('connect'); ?>" class="widefat" >
			<?php $options = array('dont-connect', 'connect-top', 'connect-bottom', 'connect-both');
			foreach ($options as $option) {?>
			<option value='<?php echo $option; ?>' <?php if ($option == $instance['connect']) echo 'selected="selected"'; ?>><?php echo $option; ?></option>
					<?php } ?>
		</select>
	</p>

		<?php

	}

	public function output_wp_editor_widget_html() {
		
		?>
		<div id="wp-editor-widget-container" style="display: none;">
			<a class="close" href="javascript:WPEditorWidget.hideEditor();" title="<?php esc_attr_e( 'Close', 'bingo' ); ?>"><span class="icon"></span></a>
			<div class="editor">
				<?php
				$settings = array(
					'textarea_rows' => 20,
				);
				wp_editor( '', 'wpeditorwidget', $settings );
				?>
				<p>
					<a href="javascript:WPEditorWidget.updateWidgetAndCloseEditor(true);" class="button button-primary"><?php _e( 'Save and close', 'bingo' ); ?></a>
				</p>
			</div>
		</div>
		<div id="wp-editor-widget-backdrop" style="display: none;"></div>
		<?php
		
	} 


}

//Font sizes needed for text editor

function wp_editor_fontsize_filter( $buttons ) {
        array_shift( $buttons );
        array_unshift( $buttons, 'fontsizeselect');
        return $buttons;
}    
add_filter('mce_buttons_2', 'wp_editor_fontsize_filter');


function customize_text_sizes($initArray){
$initArray['fontsize_formats'] = "6px 8px 10px 11px 12px 13px 14px 15px 16px 17px 18px 19px 20px 21px 22px 23px 24px 25px 26px 27px 28px 29px 30px 32px 34px 36px 38px 40px 42px 44px 46px 48px 50px";
return $initArray;
}
add_filter('tiny_mce_before_init', 'customize_text_sizes');