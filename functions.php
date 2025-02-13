<?php

  






/*if(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE){

  function firefox_images(){

	echo "

<style type='text/css'>

body .business-header {
  background: #38003c url('".get_stylesheet_directory_uri()."/widgets/Header_block/top_section_background.jpg') top center no-repeat scroll;
}

body .panel-pricing {
  background: #eaeaea url('".get_stylesheet_directory_uri()."/widgets/vertical_top_list/top_list_background.jpg');
}


</style>";

  }

  add_action( 'wp_head', 'firefox_images');


}*/
  





  function bingo_default_image( $html, $post_id, $post_thumbnail_id, $size, $attr ) {
    if(empty($html)){

            printf('<img src="%s" height="%s" width="%s" loading="lazy" alt="bingo default image" />'
                ,get_template_directory_uri().'/images/fallback/bingo_org_featured_image2.jpg'
                ,get_option( 'thumbnail_size_w' )
                ,get_option( 'thumbnail_size_h' ));
     }else{return $html;}

    
  }

add_filter( 'post_thumbnail_html', 'bingo_default_image', 20, 5 );

//https://developer.wordpress.org/reference/
//github plugin 7eae11c17a1d86a1cfb0b78b4e76089fe80a8704
include( get_template_directory().'/inc/ajax-search.php' );
include( get_template_directory().'/inc/review-functions.php' );
include( get_template_directory().'/inc/geotargeting.php' );


if(function_exists( 'pll_register_string' ) ) {
   pll_register_string( '404', 'Error 404', 'bingo');
   pll_register_string( 'moved', 'The page you requested does not exist or has moved.', 'bingo');
   pll_register_string( 'helpfulpages404', 'Here are some helpful links instead:', 'bingo');
   pll_register_string( 'read_review', 'Read Review', 'bingo');
   pll_register_string( 'mobile_tablet', 'You can play on mobiles or on tablets', 'bingo');
   pll_register_string( 'play_now', 'Play Now', 'bingo');

//search
    pll_register_string( 'search', 'Search', 'bingo');
    pll_register_string( 'search_for', 'Search for:', 'bingo');
//footer
    pll_register_string( 'responsible_gambling', 'Responsible Gambling', 'bingo');
    pll_register_string( 'privacy', 'We do not share any presonally identifiable information. Please see Our Privacy Policy for more.', 'bingo');
    pll_register_string( 'copyright', 'All rights reserved 2017 Bingo.org', 'bingo');
    pll_register_string( 'player_favourites', 'Players Favourites', 'bingo');
//review page
    pll_register_string( 'pros_and_cons', 'Pros and cons', 'bingo');
    pll_register_string( 'specifications', 'Specifications', 'bingo');
    pll_register_string( 'payment_options', 'Payment Options', 'bingo');   

}

if(!function_exists( 'pll_e' ) ) {
function pll_e($string){
  echo $string;
}
}



function mce_formats( $init ) {

  $formats = array(
    'p'          => __( 'Paragraph', 'bingo' ),
    'h1'         => __( 'Heading 1', 'bingo' ),
    'h2'         => __( 'Heading 2', 'bingo' ),
    'h3'         => __( 'Heading 3', 'bingo' ),
    'h4'         => __( 'Heading 4', 'bingo' ),
    'h5'         => __( 'Heading 5', 'bingo' ),
    'h6'         => __( 'Heading 6', 'bingo' ),
    'pre'        => __( 'Preformatted', 'bingo' ),
    'pullquote-1' => __( 'Bingo Quote 1', 'bingo' ),
    'pullquote-2' => __( 'Green Button', 'bingo' ),
    'pullquote-3' => __( 'Full Width Orange Button', 'bingo' ),
    'pullquote-4' => __( 'Caption button', 'bingo' ),
  );
    
    // concat array elements to string
  array_walk( $formats, function ( $key, $val ) use ( &$block_formats ) {
    $block_formats .= esc_attr( $key ) . '=' . esc_attr( $val ) . ';';
  }, $block_formats = '' );

  $init['block_formats'] = $block_formats;

  return $init;
}
add_filter( 'tiny_mce_before_init', __NAMESPACE__ . '\\mce_formats' );



// Enqueue the script to customize the formats
add_action( 'after_wp_tiny_mce', 'custom_after_wp_tiny_mce' );
function custom_after_wp_tiny_mce() {
printf( "<script type='text/javascript'>

jQuery( document ).on( 'tinymce-editor-init', function( event, editor ) {
    // register the formats
    tinymce.activeEditor.formatter.register('pullquote-1', {
       inline: 'span',
       classes : 'blockquote-1',
    });
    tinymce.activeEditor.formatter.register('pullquote-2', {
        inline: 'span',
        classes : 'blockquote-2',
    });
    tinymce.activeEditor.formatter.register('pullquote-3', {
        inline: 'span',
        classes : 'blockquote-3',
    });

    tinymce.activeEditor.formatter.register('pullquote-4', {
        inline: 'span',
        classes : 'blockquote-4',
    });

});
  </script>", get_stylesheet_directory_uri() );
}


//Editor-style

function bingo_editor_styles() {
    add_editor_style( 'style.css' );
}
add_action( 'init', 'bingo_editor_styles' );






//* Remove version number from js and css files, keep other variables intact.
function remove_cssjs_ver( $src ) {
    if( strpos( $src, '?ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );


if ( function_exists( 'add_theme_support' ) ) {
add_theme_support( 'post-thumbnails' );

add_image_size( 'bingo_review_slider', 815, 373, true );
add_image_size( 'bingo_post_image', 943, 373, true );
add_image_size( 'bingo_header_ball', 150, 150, true );
add_image_size( 'bingo_slider', 510, 340, true );
add_image_size( 'bingo_top_list_logo', 160, 90, true );
add_image_size( 'bingo_icon', 50, 50, true );

}


function hlm_sports_form_widget_size( $widget, $return, $instance ) {



if (strpos($widget->id_base, '_id_name') !== false || strpos($widget->id_base, 'text_editor_bingo') !== false) {
   

        $widget_size = isset( $instance['widget_size'] ) ? $instance['widget_size'] : 'col-lg-12 col-12';


        ?>
      <h4>Widget Size:</h4>
            <p class="widget-size-radio">

      <input type="radio" name="<?php echo esc_attr($widget->get_field_name( 'widget_size' )); ?>" value="col-lg-4 col-12" <?php checked('col-lg-4 col-12',$widget_size); ?> class="one-thirds"/>
      <input type="radio" name="<?php echo esc_attr($widget->get_field_name( 'widget_size' )); ?>" value="col-lg-8 col-12" <?php checked('col-lg-8 col-12', $widget_size); ?> class="two-thirds" />
      <input type="radio" name="<?php echo esc_attr($widget->get_field_name( 'widget_size' )); ?>" value="col-lg-12 col-12" <?php checked('col-lg-12 col-12',$widget_size); ?> class="three-thirds"/>

      <input type="radio" name="<?php echo esc_attr($widget->get_field_name( 'widget_size' )); ?>" value="col-lg-3 col-md-6 col-12" <?php checked('col-lg-3 col-md-6 col-12',$widget_size); ?> class="one-part"/>
      <input type="radio" name="<?php echo esc_attr($widget->get_field_name( 'widget_size' )); ?>" value="col-lg-6 col-12" <?php checked('col-lg-6 col-12', $widget_size); ?> class="two-parts" />
      <input type="radio" name="<?php echo esc_attr($widget->get_field_name( 'widget_size' )); ?>" value="col-lg-9 col-12" <?php checked('col-lg-9 col-12',$widget_size); ?> class="three-parts"/>
      <input type="radio" name="<?php echo esc_attr($widget->get_field_name( 'widget_size' )); ?>" value="col-lg-12 col-md-12 col-12" <?php checked('col-lg-12 col-md-12 col-12',$widget_size); ?> class="four-parts"/>
      <input type="radio" name="<?php echo esc_attr($widget->get_field_name( 'widget_size' )); ?>" value="fullwidth-widget" <?php checked('fullwidth-widget',$widget_size); ?> class="fullwidth-widget"/>
            </p>

        <?php
  }


}
add_filter('in_widget_form', 'hlm_sports_form_widget_size', 5, 3 );



function hlm_sports_update_widget_size( $instance, $new_instance ) {

  $instance['widget_size'] = $new_instance['widget_size'];


    return $instance;
}
add_filter( 'widget_update_callback', 'hlm_sports_update_widget_size', 10, 2 );


function hlm_sports_display_widget_size($instance, $widget, $args)  {
if (strpos($widget->id_base, '_id_name') !== false || strpos($widget->id_base, 'text_editor_bingo') !== false) {
    if(empty($instance['widget_size'])){$instance['widget_size'] = "col-lg-12 col-12".$widget->id_base;}
}
    $widget_classname = $instance['widget_size'];

  //  $geolocation = $instance['geolocation'];
    //$geo_hide = $instance['geo_hide'];

    $args['before_widget'] = preg_replace('/class="/', 'class="home-widget row flex-wrap '. $widget_classname . ' ',  $args['before_widget'], 1 );

   /*   if($geolocation != 'none' && !empty($geolocation) && $geo_hide == false){
        echo do_shortcode( '[geoip-content country="'.$geolocation.'"][widget id="'.$widget->id.'"][/geoip-content]' );
      }elseif($geolocation != 'none' && !empty($geolocation) && $geo_hide == true){
        echo do_shortcode( '[geoip-content not-country="'.$geolocation.'"][widget id="'.$widget->id.'"][/geoip-content]' );
      }else{
        $widget->widget($args, $instance);
      }*/

  $widget->widget($args, $instance);
    return false;
}
add_filter( 'widget_display_callback', 'hlm_sports_display_widget_size', 10, 3 );



function hlm_sports_widgets_style(){
  echo 
"<style type='text/css'>
  div.widget[id*=_id_name] .widget-title h3:before, div.widget[id*=text_editor_bingo] .widget-title h3:before {content: '';background: url(".esc_url(get_template_directory_uri())."/images/logo.png)no-repeat;width: 56px;height: 16px;float: left;margin-right: 5px;background-size: 100%;}
  .widget-size-radio .widget-title h3{color: #0F7BB8;}
  .widget-size-radio input[type=radio], body div.widget[id*=text_editor_bingo] input[type=radio]{height:30px;border-radius:0;width:23%;margin: 0 1% 2% 0;text-indent:0;font-size:12px;line-height:30px;color:#747474;font-weight:700;background-color: #D1D1D1;text-shadow: 1px 1px 0px #FFF;box-shadow: inset 1px 1px 1px #AAA;}
  .widget-size-radio input[type=radio]:checked:before{border-radius:0;padding:0;margin:0;height:100%;width:100%;background-color: #0DA000;text-indent:0;font-size:12px;line-height:30px;color:#FFF;font-weight:700;text-shadow: 1px 1px 0px #000;box-shadow: none;content:'selected';    text-transform: uppercase;
    font-family: inherit;}


.widget-size-radio input[type=radio].full-parts{width:96%;margin:10px 0;}
.widget-size-radio .one-part:before{content: '25%';}
.widget-size-radio .two-parts:before{content: '50%';}
.widget-size-radio .three-parts:before{content: '75%';}
.widget-size-radio .four-parts:before{content: '100%';}
.widget-size-radio{left: 5px;top: 50px;width: 100%;}
input[type=radio].one-thirds{width:31%;}
input[type=radio].two-thirds{width:31%;}
input[type=radio].three-thirds{width:31%;}
input[type=radio].fullwidth-widget{width:97%;}
.widget-size-radio .one-thirds:before{content: '33%';}
.widget-size-radio .two-thirds:before{content: '66%';}
.widget-size-radio .three-thirds:before{content: '100%';}
.widget-size-radio .fullwidth-widget:before{content: 'fullwidth';}

div.widget[id*=text_editor_bingo] .widget-size-radio input[type=radio].full-parts{width:96%;margin:10px 0;}
div.widget[id*=text_editor_bingo] .widget-size-radio .one-part:before{content: '25%';}
div.widget[id*=text_editor_bingo] .widget-size-radio .two-parts:before{content: '50%';}
div.widget[id*=text_editor_bingo] .widget-size-radio .three-parts:before{content: '75%';}
div.widget[id*=text_editor_bingo] .widget-size-radio .four-parts:before{content: '100%';}
div.widget[id*=text_editor_bingo] .widget-size-radio{left: 5px;top: 50px;width: 100%;}
div.widget[id*=text_editor_bingo] input[type=radio].one-thirds{width:31%;}
div.widget[id*=text_editor_bingo] input[type=radio].two-thirds{width:31%;}
div.widget[id*=text_editor_bingo] input[type=radio].three-thirds{width:31%;}
div.widget[id*=text_editor_bingo] input[type=radio].fullwidth-widget{width:97%;}
div.widget[id*=text_editor_bingo] .widget-size-radio .one-thirds:before{content: '33%';}
div.widget[id*=text_editor_bingo] .widget-size-radio .two-thirds:before{content: '66%';}
div.widget[id*=text_editor_bingo] .widget-size-radio .three-thirds:before{content: '100%';}
div.widget[id*=text_editor_bingo] .widget-size-radio .fullwidth-widget:before{content: 'fullwidth';}


</style>"
;}
add_action('admin_print_styles-widgets.php', 'hlm_sports_widgets_style');


function bingo_get_star_rating($rating = 1){

if(empty($rating)){ $rating = 1;}
  ?>



  <?php 

      for ($star=0; $star < 5; $star++) { 

        if($rating - $star >= 1)
          {  echo '<span class="fa fa-star" aria-hidden="true"></span>';}
        elseif($rating - $star > 0.1 && $rating - $star < 1)
          { echo '<span class="fa fa-star-half" aria-hidden="true"></span>';}
        elseif($rating - $star <= 1 )
          { echo '<span class="fa fa-star gray-star" aria-hidden="true"></span>';}
      }
  ?>

<?php 

}





// Dynamic Widget area for alternative homepage 
function bingo_alternative_homepage(){
if ( function_exists('register_sidebar') ) {
  $pageposts = get_posts(array('posts_per_page' => -1, 'post_type' => 'page', 'post_status' => 'publish', 'meta_query' => array(array('key' => '_wp_page_template', 'value' => 'home-page.php')),));
  foreach ( $pageposts as $q ){

  $id = 'main-'.esc_html($q->ID);
  $page_title = 'main-'.esc_html($q->post_title);

  if ($page_title && function_exists('register_sidebar')){
  register_sidebar(array(
    'id' => $id, 
    'name' => $page_title ,
    'description'   => esc_html($q->post_title).' Widget Area.',
    'before_widget' => '<div class="home-widget"><div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="widget-title"><h2>',
    'after_title' => '</h2></div>',
  ));


  }
  }
}
}
add_action( 'after_setup_theme', 'bingo_alternative_homepage' );




/*
// 1. customize ACF path
add_filter('acf/settings/path', 'my_acf_settings_path');
 
function my_acf_settings_path( $path ) {
 
    // update path
    $path = get_stylesheet_directory() . '/plugins/advanced-custom-fields-pro/';
    
    // return
    return $path;
    
}
 

// 2. customize ACF dir
add_filter('acf/settings/dir', 'my_acf_settings_dir');
 
function my_acf_settings_dir( $dir ) {
 
    // update path
    $dir = get_stylesheet_directory_uri() . '/plugins/advanced-custom-fields-pro/';
    
    // return
    return $dir;
    
}
 

// 3. Hide ACF field group menu item
//add_filter('acf/settings/show_admin', '__return_false');


// 4. Include ACF
include_once( get_stylesheet_directory() . '/plugins/advanced-custom-fields-pro/acf.php' );*/


// 5. Acf style
function my_acf_admin_head() {
    ?>
    <style type="text/css">

     .acf-field-5b9a317f65833, .acf-field-5b9a317f61dae{float:left;margin:12px !important;width:calc(34% - 24px);padding:10px;box-sizing: border-box;clear:initial;}
     .acf-field-5b9a31a94e920, .acf-field-5b9a34a53cf02{float:left;margin:12px !important;width:calc(66% - 24px);padding:10px;box-sizing: border-box;clear:initial;}
     .acf-field-5b9a317f619bf, .acf-field-5b9a32224e921{float:left;margin:12px !important;width:calc(100% - 24px);padding:10px;box-sizing: border-box;clear:initial;}
	 .acf-field-repeater .acf-row:nth-child(2n) td {background: #eaeaef;}
	 .acf-field-repeater .acf-row .acf-accordion {background-color: #f0fffd;}
	 .acf-field-repeater .acf-accordion .acf-accordion-title:hover {background: #c3f9ff!important;transition: all 0.5s;}
	 .acf-field-repeater .acf-accordion .acf-accordion-title label {cursor: pointer;}
		
		
	 /*add counter to the relationship field ul list and show number*/
    .acf-relationship ul.choices-list li ul.acf-bl, .acf-relationship ul.values-list {counter-reset: item;}
    .acf-relationship ul.choices-list li ul.acf-bl > li, .acf-relationship ul.values-list li {counter-increment: item;}
    .acf-relationship ul.choices-list li ul.acf-bl > li span::before,  .acf-relationship ul.values-list li span::before {
      margin-right: 10px;
      content: counter(item);
      background: lightblue;
      border-radius: 100%;
      width: 1.2em;
      text-align: center;
      display: inline-block;
      font-size: 12px;
      padding: 1px;
    }
	/*fix acf field width on the editor sidebar*/
    .editor-sidebar__panel .acf-field {
        width: 100% !important;
    }
	 
    </style>
    <?php
}

add_action('acf/input/admin_head', 'my_acf_admin_head');

function custom_admin_css() {
    echo '<style>
        .edit-widgets-main-block-list .wp-block { max-width: 900px !important; }
		.blocks-widgets-container .edit-widgets-main-block-list .editor-styles-wrapper { max-width: 900px !important; }
        .edit-widgets-main-block-list .components-sidebar { max-width: 900px !important; }
        .edit-widgets-main-block-list .components-panel { max-width: 900px !important; }		
    	.block-editor-block-inspector .acf-field {width: 100% !important;}
    </style>';
}
add_action('admin_head', 'custom_admin_css');



/* ACF options pages
---------------------------------------------------------------------------- */
add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {
	
	if( function_exists('acf_add_options_page') ) {

		acf_add_options_page(array(
		  'page_title'  => 'Bingo Theme Options',
		  'menu_title'  => 'Bingo Theme Options',
		  'menu_slug'   => 'bingo_options_page',
		  'capability'  => 'edit_posts',
		  'redirect'  => false,
			  'icon_url' => 'dashicons-marker',
			  'position' => 3
		));

		acf_add_options_sub_page(array(
			 'page_title'  => 'Footer',
			 'menu_title'  => 'Footer',
			 'parent_slug' => 'bingo_options_page',
		));

		acf_add_options_sub_page(array(
			'page_title' 	=> 'Horizontal Top Lists',
			'menu_title'	=> 'Horizontal Top Lists',
			'parent_slug'	=> 'bingo_options_page'
		));

		  acf_add_options_sub_page(array(
			  'page_title' 	=> 'Vertical Top Lists',
			  'menu_title'	=> 'Vertical Top Lists',
			  'parent_slug'	=> 'bingo_options_page'
		  ));

		  acf_add_options_sub_page(array(
			  'page_title' 	=> 'Double Coupons Lists',
			  'menu_title'	=> 'Double Coupons Lists',
			  'parent_slug'	=> 'bingo_options_page'
		  ));

	  }
}

if (!class_exists('Widget_Shortcode')) {
  include( get_stylesheet_directory() . '/plugins/widget-shortcode/init.php' );
}

// Include SMG Block
include_once( get_stylesheet_directory() . '/plugins/custom-smg-blocks/index.php' );


//Background enable
$args = array(
  'default-color' => 'FFFFFF',
);
add_theme_support( 'custom-background', $args );


//Header-image enable
$args = array( 
  'width'         => 165,
  'height'        => 48,
  'default-image' => get_template_directory_uri() . '/images/logo.png',
  'header-text'   => false,
  'random-default' => false,
  'flex-height'            => true,
  'flex-width'             => true,

);
add_theme_support( 'custom-header', $args );


function bingo_fonts_url() {
    $fonts_url = '';

    $fonts     = array('Montserrat', 'Open Sans');
    $subsets   = '';
    if ( $fonts ) {
        $fonts_url = add_query_arg( array(
            'family' => urlencode( implode( ':300,400,600,700,800|', $fonts ) ),
            'subset' => urlencode( $subsets ),
        ), 'https://fonts.googleapis.com/css' );
    }
    return $fonts_url;
}

function bingo_fonts_add() {
    // Add custom fonts, used in the main stylesheet.
    //wp_enqueue_style( 'bingo-fonts', bingo_fonts_url(), array(), null );
}

add_action( 'wp_enqueue_scripts', 'bingo_fonts_add' );


//include(get_template_directory().'/widgets/acf_fields_bingo.php');

include(get_template_directory().'/widgets/text-editor-widget/text-editor-widget.php');
include(get_template_directory().'/widgets/slider/slider.php');
include(get_template_directory().'/widgets/vertical_top_list/vertical_top_list.php');
include(get_template_directory().'/widgets/Header_block/Header_block.php');
include(get_template_directory().'/widgets/Hotizontal_Top_List/Hotizontal_Top_List.php');
include(get_template_directory().'/widgets/buttons/buttons.php');
include(get_template_directory().'/widgets/double_coupons/double_coupons.php');
include(get_template_directory().'/widgets/carousel/carousel.php');
include(get_template_directory().'/widgets/big_top_list/big_top_list.php');








//Stepfox widgets falat sliki da se regnat

include(get_template_directory().'/widgets/stepfox-widgets/image-sizes.php');

include(get_template_directory().'/widgets/stepfox-widgets/big-featured/big-featured-images.php');
include(get_template_directory().'/widgets/stepfox-widgets/huge-featured/huge-featured-images.php');
include(get_template_directory().'/widgets/stepfox-widgets/small-featured/small-featured-images.php');
include(get_template_directory().'/widgets/stepfox-widgets/blogroll/blogroll.php');
include(get_template_directory().'/widgets/stepfox-widgets/thumbnails/thumbnails.php');
include(get_template_directory().'/widgets/stepfox-widgets/combinator/combinator.php');
include(get_template_directory().'/widgets/stepfox-widgets/video/video.php');
include(get_template_directory().'/widgets/stepfox-widgets/social-widget/social-widget.php');

// Excerpt Limit

function bingo_excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    if(!empty($excerpt)) {
      $excerpt = implode(' ',$excerpt).'...';
    }else{
      $excerpt = '';
    }
  } elseif ( strpos( get_the_excerpt(), 'more-link' ) === false ) {
    $excerpt = implode(' ',$excerpt).'...';  
  } else {
    $excerpt = implode(' ',$excerpt);
  }
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;

}

function bingo_excerpt_length($length) {return 120;}
add_filter('excerpt_length', 'bingo_excerpt_length');

//Theme Javascript Files

function bingo_scripts() {

  wp_enqueue_style('bingo_widgets-style', get_template_directory_uri() . '/widgets/stepfox-widgets/widgets.css');
  
  $disable_boxed_layout_style = get_field('disable_boxed_layout_style');
	
  $disable_boxed_layout_global = get_field('disable_boxed_layout_style','option');
	
  if ($disable_boxed_layout_style || $disable_boxed_layout_global) return;
	
  wp_enqueue_script( 'boxed-layout', get_stylesheet_directory_uri() . '/js/boxed-layout.js' );

}
add_action('wp_enqueue_scripts', 'bingo_scripts');



function bingo_widgets_style(){
  echo   
"<style type='text/css'>
  div.widget[id*=_bingo] .widget-title h3:before {content: '';background: url(".esc_url(get_template_directory_uri())."/images/logo.png)no-repeat;width: 56px;height: 16px;float: left;margin-right: 5px;background-size: 100%;}
  div.widget[id*=_bingo] .widget-title h3{}
  div.widget[id*=_bingo] input[type=radio]{height:30px;border-radius:0;width:22%;margin: 0 1% 0 0;text-indent:0;font-size:12px;line-height:30px;color:#747474;font-weight:700;font-family: Open Sans;background-color: #D1D1D1;text-shadow: 1px 1px 0px #FFF;box-shadow: inset 1px 1px 1px #AAA;}
  div.widget[id*=_bingo] input[type=radio]:checked:before{border-radius:0;padding:0;margin:0;height:100%;width:100%;background-color: #0DA000;text-indent:0;font-size:12px;line-height:30px;color:#FFF;font-weight:700;font-family: Open Sans;text-shadow: 1px 1px 0px #000;box-shadow: none;}
  div.widget[id*=_bingo] .one-part:before{content: '1/4';}
  div.widget[id*=_bingo] .two-parts:before{content: '2/4';}
  div.widget[id*=_bingo] .three-parts:before{content: '3/4';}
  div.widget[id*=_bingo] .four-parts:before{content: '4/4';}
</style>"
;}
add_action('admin_print_styles-widgets.php', 'bingo_widgets_style');


//is mobile
function bingo_wp_is_mobile() {
    static $is_mobile;

    if ( isset($is_mobile) )
        return $is_mobile;

    if ( empty($_SERVER['HTTP_USER_AGENT']) ) {
        $is_mobile = false;
    } elseif (
        strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false ) {
            $is_mobile = true;
    } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') !== false) {
        $is_mobile = false;
    } else {
        $is_mobile = false;
    }

    return $is_mobile;
}



// category archive and search number of posts
/*function bingo_archive_page_queries( $query ) {

  $page = (get_query_var('paged')) ? get_query_var('paged') : 1;

    if(is_category() && $query->is_main_query()){
      $query->set('posts_per_page', '9');
    }

    if($query->is_main_query() && $query->is_search()){
      $query->set('posts_per_page', '9');
    }
}
add_action( 'pre_get_posts', 'bingo_archive_page_queries' );*/






function get_the_menu_name_by_location($menu_name){
  $locations = get_nav_menu_locations();
  $menu_id = $locations[ $menu_name ] ;
  $menu = wp_get_nav_menu_object($menu_id); 
  echo $menu->name; 
}







//registering cpt



function review_post_type(){

    $labels = array(
        'name'               => esc_html__('Reviews', 'bingo'),
        'singular_name'      => esc_html__('Review', 'bingo'),
        'menu_name'          => esc_html__('Reviews', 'bingo'),
        'name_admin_bar'     => esc_html__('Review', 'bingo'),
        'add_new'            => esc_html__('Add New', 'bingo'),
        'add_new_item'       => esc_html__('Add New Review', 'bingo'),
        'new_item'           => esc_html__('New Review', 'bingo'),
        'edit_item'          => esc_html__('Edit Review', 'bingo'),
        'view_item'          => esc_html__('View Review', 'bingo'),
        'all_items'          => esc_html__('All Reviews', 'bingo'),
        'search_items'       => esc_html__('Search Reviews', 'bingo'),
        'parent_item_colon'  => esc_html__('Parent Reviews:', 'bingo'),
        'not_found'          => esc_html__('No Reviews found.', 'bingo'),
        'not_found_in_trash' => esc_html__('No Reviews found in Trash.', 'bingo'),
        );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'reviews', 'with_front' => false ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 5,
		'with_front' => false,
		'show_in_rest'       => true,
       // 'register_meta_box_cb' => 'metabox_review',
        'supports'           => array( 'title', 'thumbnail', 'comments', 'author','editor','custom-fields')
        );

    register_post_type( 'review', $args );

}

// Hook into the 'init' action
add_action( 'init', 'review_post_type');





function sf_adjust_customizer_responsive_sizes() {


    $mobile_margin_left = '-240px'; 
    $mobile_width = '480px';
    $mobile_height = '720px';

    $mobile_landscape_width = '720px';
    $mobile_landscape_height = '480px';

    $tablet_width = '768px';
    $tablet_height = '1023px';

    $tablet_landscape_width = '1023px';
    $tablet_landscape_height = '768px';

    ?>
    <style>

      .preview-expand_customizer .wp-full-overlay-sidebar{width:600px;}
      .collapsed.preview-only .wp-full-overlay-sidebar{width:0;max-width: 0;}
      .wp-full-overlay.preview-expand_customizer{margin-left:600px;}

        .wp-customizer .preview-mobile .wp-full-overlay-main {
            margin-left: <?php echo esc_html($mobile_margin_left); ?>;
            width: <?php echo esc_html($mobile_width); ?>;
            height: <?php echo esc_html($mobile_height); ?>;
        }

        .wp-customizer .preview-mobile-landscape .wp-full-overlay-main {

            width: <?php echo esc_html($mobile_landscape_width); ?>;
            height: <?php echo esc_html($mobile_landscape_height); ?>;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .wp-customizer .preview-tablet .wp-full-overlay-main {

            width: <?php echo esc_html($tablet_width); ?>;
            height: <?php echo esc_html($tablet_height); ?>;
        }

        .wp-customizer .preview-tablet-landscape .wp-full-overlay-main {

            width: <?php echo esc_html($tablet_landscape_width); ?>;
            height: <?php echo esc_html($tablet_landscape_height); ?>;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .wp-full-overlay-footer .devices .preview-tablet-landscape:before {
            content: "\f167";
        }

        .wp-full-overlay-footer .devices .preview-mobile-landscape:before {
            content: "\f167";
        }

        .wp-full-overlay-footer .devices .preview-expand_customizer:before {
            content: "\f310";
        }

    </style>
    <?php

}

add_action( 'customize_controls_print_styles', 'sf_adjust_customizer_responsive_sizes' );
function sf_filter_customize_previewable_devices( $devices )
{
    
    $custom_devices[ 'expand_customizer' ] = array (
            'label' => esc_html__( 'expand controls', 'bingo' ), 'default' => false,
    );

    $custom_devices[ 'desktop' ] = $devices[ 'desktop' ];
    $custom_devices[ 'tablet' ] = $devices[ 'tablet' ];
    $custom_devices[ 'tablet-landscape' ] = array (
            'label' => esc_html__( 'Enter tablet landscape preview mode', 'bingo' ), 'default' => false,
    );
    $custom_devices[ 'mobile' ] = $devices[ 'mobile' ];
    $custom_devices[ 'mobile-landscape' ] = array (
            'label' => esc_html__( 'Enter mobile landscape preview mode', 'bingo' ), 'default' => false,
    );

    foreach ( $devices as $device => $settings ) {
        if ( ! isset( $custom_devices[ $device ] ) ) {
            $custom_devices[ $device ] = $settings;
        }
    }

    return $custom_devices;
}

add_filter( 'customize_previewable_devices', 'sf_filter_customize_previewable_devices' );


















function hlm_sports_scripts() {
    if (is_home() || is_page_template('home-page.php') || is_front_page()) { 
      wp_enqueue_script('jquery-masonry');
      wp_enqueue_script('masonry-layout', get_template_directory_uri() . '/widgets/masonry-layout.js', array('jquery', 'jquery-masonry'));
    }
}
add_action('wp_enqueue_scripts', 'hlm_sports_scripts');


include_once 'lib/bingo-wp-navwalker.php';

global $bingo_version;

$bingo_version = '4.0.0';

// Le sigh...
if ( ! isset( $content_width ) ) $content_width = 837;


if ( ! function_exists( 'bingo_widgets_init' ) ) :
  function bingo_widgets_init() {
    register_sidebar( array(
      'name' => __( 'Bottom Widget Area (Post, Game, Archive, Search)', 'bingo' ),
      'id' => 'right-sidebar',
    'before_widget' => '<div class="home-widget"><div id="%1$s" class="widget row flex-wrap p-0 overflow-hidden mb-2 %2$s">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="widget-title text-center pt-3 pb-3 background-1 text-white font-weight-bold">',
    'after_title' => '</div>',
    ) );
  }
endif;
add_action( 'widgets_init', 'bingo_widgets_init' );


if ( ! function_exists( 'bingo_setup' ) ) :
  function bingo_setup() {

    add_theme_support( 'custom-background', array(
      'default-color' => 'ffffff',
    ) );

    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 'title-tag' );

    add_theme_support( 'html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ) );

    register_nav_menus( array(
      'main-menu' => __( 'Main Menu', 'bingo' ),
      'footer_menu1' => 'Footer Menu1',
      'footer_menu2' => 'Footer Menu2',
      'footer_menu3' => 'Footer Menu3',
      'footer_menu4' => 'Footer Menu4',

    ) );

    add_editor_style( 'css/bootstrap.min.css' );
  }
endif; // bingo_setup
add_action( 'after_setup_theme', 'bingo_setup' );


if ( ! function_exists( 'bingo_theme_styles' ) ) :
  function bingo_theme_styles() {
    global $bingo_version;
    wp_enqueue_style( 'bingo-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.4.0' );
    wp_register_style( 'bingo-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), $bingo_version );
    wp_enqueue_style( 'bingo-styles', get_stylesheet_uri(), array( 'bingo-bootstrap' ), '1' );
  }
endif;
add_action('wp_enqueue_scripts', 'bingo_theme_styles');


function enqueue_custom_admin_style($hook) {
    // Check if we are on the post editor screen
    if ('post.php' == $hook || 'post-new.php' == $hook) {
        global $bingo_version;
   		wp_enqueue_style( 'bingo-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.4.0' );    	
    }
}
add_action('admin_enqueue_scripts', 'enqueue_custom_admin_style');

if ( ! function_exists( 'bingo_theme_scripts' ) ) :
  function bingo_theme_scripts() {
    global $bingo_version;
    wp_enqueue_script( 'bingo-bootstrap-tether', get_template_directory_uri() . '/js/tether.js', array( 'jquery' ), $bingo_version, true );
    wp_enqueue_script( 'bingo-bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array( 'jquery' ), $bingo_version, true );

  }
endif;
add_action('wp_enqueue_scripts', 'bingo_theme_scripts');


function bingo_nav_li_class( $classes, $item ) {
  $classes[] .= '';
  return $classes;
}
add_filter( 'nav_menu_css_class', 'bingo_nav_li_class', 10, 2 );



function bingo_comment_form_before() {
  echo '<div class="card"><div class="card-block">';
}
add_action( 'comment_form_before', 'bingo_comment_form_before', 10, 5 );


function bingo_comment_form( $fields ) {
  $fields['fields']['author'] = '
  <fieldset class="form-group comment-form-email">
    <label for="author">' . __( 'Name *', 'bingo' ) . '</label>
    <input type="text" class="form-control" name="author" id="author" placeholder="' . __( 'Name', 'bingo' ) . '" aria-required="true" required>
  </fieldset>';
  $fields['fields']['email'] ='
  <fieldset class="form-group comment-form-email">
    <label for="email">' . __( 'Email address *', 'bingo' ) . 'Email address *</label>
    <input type="email" class="form-control" id="email" placeholder="' . __( 'Enter email', 'bingo' ) . '" aria-required="true" required>
    <small class="text-muted">' . __( 'Your email address will not be published.', 'bingo' ) . '</small>
  </fieldset>';
  $fields['fields']['url'] = '
  <fieldset class="form-group comment-form-email">
    <label for="url">' . __( 'Website *', 'bingo' ) . '</label>
    <input type="text" class="form-control" name="url" id="url" placeholder="' . __( 'http://example.org', 'bingo' ) . '">
  </fieldset>';
  $fields['comment_field'] = '
  <fieldset class="form-group">
    <label for="comment">' . __( 'Comment *', 'bingo' ) . '</label>
    <textarea class="form-control" id="comment" name="comment" rows="3" aria-required="true" required></textarea>
  </fieldset>';
  $fields['comment_notes_before'] = '';
  $fields['class_submit'] = 'btn btn-primary';
  return $fields;
}
add_filter( 'comment_form_defaults', 'bingo_comment_form', 10, 5 );


function bingo_comment_form_after() {
  echo '</div><!-- .card-block --></div><!-- .card -->';
}
add_action( 'comment_form_after', 'bingo_comment_form_after', 10, 5 );


/* * * * * * * * * * * * * * *
 * BS4 Utility Functions
 * * * * * * * * * * * * * * */

function bingo_get_posts_pagination( $args = '' ) {
  global $wp_query;
  $pagination = '';

  if ( $GLOBALS['wp_query']->max_num_pages > 1 ) :

    $defaults = array(
      'total'     => isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1,
      'current'   => get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1,
      'type'      => 'array',
      'prev_text' => '&laquo;',
      'next_text' => '&raquo;',
    );

    $params = wp_parse_args( $args, $defaults );

    $paginate = paginate_links( $params );

    if( $paginate ) :
      $pagination .= "<ul class='pagination'>";
      foreach( $paginate as $page ) :
        if( strpos( $page, 'current' ) ) :
          $pagination .= "<li class='active'>$page</li>";
        else :
          $pagination .= "<li>$page</li>";
        endif;
      endforeach;
      $pagination .= "</ul>";
    endif;

  endif;

  return $pagination;
}


function bingo_the_posts_pagination( $args = '' ) {
  echo bingo_get_posts_pagination( $args );
}
function page_template_javascript() { ?> <?php } 
add_action('wp_head', 'page_template_javascript'); 

//change canonical for paged results
add_filter( 'wpseo_canonical', 'paged_canonical' );
function paged_canonical($canonical) {
	if(is_paged()) {
		$canonical = explode('page',$canonical)[0];
	}
	return $canonical;
}



/*#######   Adding The x-default Value On Other Pages. Set to the english translation url if exist. 
#########   Otherwise, set X-default to the first available translation   #####*/

add_filter( 'pll_rel_hreflang_attributes', function( $hreflangs ) {

  // Remove the 'en' element from the array and store its value in a variable
  $value = $hreflangs['en'];

  unset($hreflangs['en']);

  // Add the 'en' element to the beginning of the array with the same value
  $hreflangs = array('en' => $value) + $hreflangs;

  //set x-default 
   foreach ( $hreflangs as $lang => $url ) {

      if(!empty($url)) {
            $hreflangs['x-default'] = $url;
            break;
      }

   }

    return $hreflangs;

} );



//Remove hreflang from anchor links in the  switcher
add_filter( 'pll_the_languages', 'remove_menu_hreflang', 10, 2 ); 
function remove_menu_hreflang( $output, $args ) {

    if ( $args['dropdown'] ) {
        return $output;
    }

    // Create a pattern to match the lang and hreflang attributes
    $pattern = '/\s*(lang|hreflang)="[^"]*"/';
    
    $output = preg_replace($pattern, '', $output);

    return $output;

}



/* Google tag manager code
---------------------------------------------------------------------------- */

  add_action( 'wp_head', 'gtm_script_code' ); 
function gtm_script_code() {
    echo "<!-- Google Tag Manager -->
<script type='lazyloadscript'>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5P4NK52K');</script>
<!-- End Google Tag Manager -->";
}

add_action( 'wp_body_open', 'gtm_noscript_code' ); 
function gtm_noscript_code() {
    echo '<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5P4NK52K"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->';
}




/* Additional js scripts in footer
---------------------------------------------------------------------------- */
add_action( 'wp_footer', 'additional_scripts_footer' ); 
function additional_scripts_footer() { ?>

		<script>
			
			jQuery(function($){
				jQuery('.search-menu-icon').attr('aria-label','search icon'); 
			});
					
		//lazyload js script
		['mouseenter', 'keydown', 'touchmove', 'touchstart'].forEach(function(e) {
		  document.body.addEventListener(e, function(){       
			var bodyScripts = document.querySelectorAll("script[type=lazyloadscript]");
				if(bodyScripts){
					var bodyScriptsOn = [];
					bodyScripts.forEach(bodyScript=>{
						var script = document.createElement('script');
						script.setAttribute('type', 'text/javascript');
						if(bodyScript.getAttribute('src'))
						script.setAttribute('src', bodyScript.getAttribute('src'));
						if(bodyScript.getAttribute('id'))
						script.setAttribute('id', bodyScript.getAttribute('id'));
						script.innerHTML = bodyScript.innerHTML;
						//bodyScriptsOn.push(script);
						bodyScript.parentNode.insertBefore(script, bodyScript);
						bodyScript.parentNode.removeChild(bodyScript);
					})            
				}
		  });
    	});	

		</script>

	<?php
	
}


/* Top list shortcode
---------------------------------------------------------------------------- */
add_shortcode( 'toplist', 'top_list_function');
function top_list_function( $atts ) {
	
	ob_start();	
	
	extract(shortcode_atts(array( 'id' => null, ), $atts));
	
    $list_id = isset($atts['id']) ? $atts['id'] : '';

	if( have_rows($list_id, "option" ) ) { ?>

		<div class="home-widget <?php echo strpos( $list_id, 'double_coupons' ) === 0 ? 'row' : ''?> <?php echo strpos( $list_id, 'vertical' ) === 0 ? 'vertical-widget' : '' ?>">
			<?php 
				if(strpos( $list_id, 'horizontal' ) === 0) {
				  include(get_stylesheet_directory()."/template-parts/horizontal-reviews-cards.php") ;  
				} 
				elseif(strpos( $list_id, 'vertical' ) === 0) {
				  include(get_stylesheet_directory()."/template-parts/vertical-reviews-cards.php") ;  
				} 
				elseif(strpos( $list_id, 'double_coupons' ) === 0) {
				  include(get_stylesheet_directory()."/template-parts/double-coupons-cards.php") ;  
				}?> 

		</div> 

	<?php }


$top_list = ob_get_clean();
	
	return $top_list;
	  	
}


/* Add shortcode in h1 title
---------------------------------------------------------------------------- */
add_filter('the_title', 'allow_shortcode_in_titles');
function allow_shortcode_in_titles($title) {
    return do_shortcode($title);
}


/* Enable shortcode in title SEO snippet
---------------------------------------------------------------------------- */
add_filter( 'wpseo_title', 'do_shortcode' );
add_filter( 'wpseo_metadesc', 'do_shortcode' );
add_filter( 'the_title', 'do_shortcode' );

/* Current year shortcode
---------------------------------------------------------------------------- */
add_shortcode( 'year' , 'current_year' );
function current_year() {
    $year = date("Y");
    return "$year";
}

/*
 * Check if a current admin page is a acf option page and a specific language is selected in polylang admin lang switcher	
 *
 * @param string $slug ACF Option page slug.
 * @return string $lang current language selected in admin dashboard. 
---------------------------------------------------------------------------------------------------------------------------- */
function is_acf_options_page($slug,$lang) {
	
	 if (!is_admin()) return false;
	
	global $pagenow;
	
	if( $pagenow !== 'admin.php' ||  !function_exists('acf_get_options_page')  ) return false;
	
    // Get the options page settings
    $options_page = acf_get_options_page($slug);

    // Check if the options page exists and if the current page is the correct options page
    if ($options_page && isset($_GET['page']) && $_GET['page'] === $slug && pll_current_language('slug') === $lang) {
        return true;
    }

    return false;
}
	

/* Redirect "en", "br", "it" and "es" version of the acf list option pages to the "show all languages" version
------------------------------------------------------------------------------------------------------- */
add_action('admin_init', function() {

    $list_options_pages = array('acf-options-horizontal-top-lists','acf-options-vertical-top-lists','acf-options-double-coupons-lists');

    foreach ($list_options_pages as $option_page) {  

        if (is_acf_options_page($option_page,'en') ||is_acf_options_page($option_page,'br') || is_acf_options_page($option_page,'it') || is_acf_options_page($option_page,'es')) { 
    		$toplist_url = add_query_arg(array(
                    'page' => $option_page,
                    'lang' => 'all'
                ), admin_url('admin.php'));

                // Perform the redirect
                wp_redirect($toplist_url);
                exit;
        }

    }
});	

/* Remove from the url front /news/ in vegasgero_games post type
------------------------------------------------------------------------------------------------------- */
add_filter('post_type_link', 'custom_post_permalink', 10, 3);
function custom_post_permalink($permalink, $post, $leavename) {
    // Check if it's a post
    if ($post->post_type == 'vegashero_games') {		
        $permalink = home_url('/game/' . $post->post_name . '/');		
    }
    return $permalink;
}

add_filter('rewrite_rules_array', 'custom_rewrite_rules');
function custom_rewrite_rules($rules) {
    $new_rules = array(
        'game/([^/]+)/?$' => 'index.php?name=$matches[1]&post_type=vegashero_games',
        'game/([^/]+)/page/?([0-9]{1,})/?$' => 'index.php?name=$matches[1]&post_type=vegashero_games&paged=$matches[2]',
    );
    return $new_rules + $rules;
}


/*Rewrite rules for the paginations on pages: reviews, avaliacao, recensione and revision  ------------------------------------------------------------------------------------------------------- */
add_action('init', 'bingo_pagination_rewrite');

function bingo_pagination_rewrite() {   

    add_rewrite_rule('reviews/page/([0-9]+)/?$', 'index.php?page_id=15110&paged=$matches[1]', 'top');
    add_rewrite_rule('br/avaliacao/page/([0-9]+)/?$', 'index.php?page_id=15112&paged=$matches[1]', 'top');
    add_rewrite_rule('it/recensione/page/([0-9]+)/?$', 'index.php?page_id=15113&paged=$matches[1]', 'top');
    add_rewrite_rule('es/revision/page/([0-9]+)/?$', 'index.php?page_id=15114&paged=$matches[1]', 'top');

}



/* Register the Modified column for all public post types
------------------------------------------------------------------------------------------------------- */
// Register the column for all public post types
function modified_column_register_for_all( $columns ) {
    $columns['modified_list'] = __( 'Modified', 'my-plugin' );
    return $columns;
}

// Display the column content for all public post types
function modified_column_display_for_all( $column_name, $post_id ) {
    if ( 'modified_list' != $column_name )
        return;
    echo get_the_modified_date( 'Y/m/d \a\t g:i a' );
}

// Register the column as sortable for all public post types
function modified_column_register_sortable_for_all( $columns ) {
    $columns['modified_list'] = 'modified_list';
    return $columns;
}

// Function to add actions and filters for all public post types
function add_modified_column_to_all_post_types() {
    $post_types = get_post_types( array( 'public' => true ), 'names' );
    foreach ( $post_types as $post_type ) {
        add_filter( "manage_edit-{$post_type}_columns", 'modified_column_register_for_all' );
        add_action( "manage_{$post_type}_posts_custom_column", 'modified_column_display_for_all', 10, 2 );
        add_filter( "manage_edit-{$post_type}_sortable_columns", 'modified_column_register_sortable_for_all' );
    }
}
add_action( 'admin_init', 'add_modified_column_to_all_post_types' );

// Ensure correct sorting for the modified column
function modified_column_sorting( $query ) {
    if( ! is_admin() )
        return;

    $orderby = $query->get( 'orderby');

    if ( 'modified_list' == $orderby ) {
        $query->set('orderby', 'modified');
    }
}
add_action( 'pre_get_posts', 'modified_column_sorting' );



/* SCROLLTOP BUTTON
---------------------------------------------------------------------------- */
add_action('wp_footer', 'scroll_to_top_scripts');
function scroll_to_top_scripts() {
	
    echo '<script>
    document.addEventListener("DOMContentLoaded", function() {
        var scrollToTopBtn = document.createElement("div");
        scrollToTopBtn.id = "scroll-to-top";
        scrollToTopBtn.innerHTML = "&#8593;";
        document.body.appendChild(scrollToTopBtn);

        scrollToTopBtn.addEventListener("click", function() {
            window.scrollTo({ top: 0, behavior: "smooth" });
        });

        window.addEventListener("scroll", function() {
            if (window.pageYOffset > 500) {
                scrollToTopBtn.style.display = "block";
            } else {
                scrollToTopBtn.style.display = "none";
            }
        });
    });
    </script>';
}

// Add boxed-layout class if boxed layout is active

add_filter( 'body_class', function( $classes ) {
	$disable_boxed_layout_style = get_field('disable_boxed_layout_style');
	$disable_boxed_layout_global = get_field('disable_boxed_layout_style','option');
    if ( $disable_boxed_layout_style || $disable_boxed_layout_global) {
		return array_merge( $classes, array( 'boxed-layout-disabled' ) );
	}
	else {
		return array_merge( $classes, array( 'boxed-layout' ) );
	}
} );


/* Add h3 to yoast faq block
---------------------------------------------------------------------------- */
function overdide_yoast_faqs($block_content, $block){
if ( 'yoast/faq-block' == $block['blockName'] ){
// This turns strong tags into h3 tags
return preg_replace('/<strong([^>]*)>(.*?)<\/strong>/i', '<h3$1>$2</h3>', $block_content);
}
return $block_content;
}
add_filter( 'render_block', 'overdide_yoast_faqs', 10, 2 );




/* All Posts column in the WordPress users list that counts all post types for each user.
---------------------------------------------------------------------------- */
// Add custom column to users table
function add_custom_posts_column($columns) {
    $columns['all_posts'] = __('All Posts', 'textdomain'); // Add custom column
    return $columns;
}
add_filter('manage_users_columns', 'add_custom_posts_column');

// Populate custom column with post counts
function add_custom_posts_column_content($value, $column_name, $user_id) {
    if ($column_name === 'all_posts') {
        $count = 0;

        // Get all public post types
        $args = array(
            'public' => true,
            '_builtin' => false,
        );
        $custom_post_types = get_post_types($args, 'names');
        
        // Include 'post' in the count
        array_unshift($custom_post_types, 'post');

        // Count posts for each post type
        foreach ($custom_post_types as $post_type) {
            $count += count_user_posts($user_id, $post_type);
        }

        return $count;
    }

    return $value;
}
add_filter('manage_users_custom_column', 'add_custom_posts_column_content', 10, 3);

// Make custom column sortable
function sortable_custom_column($columns) {
    $columns['all_posts'] = 'all_posts';
    return $columns;
}
add_filter('manage_users_sortable_columns', 'sortable_custom_column');
