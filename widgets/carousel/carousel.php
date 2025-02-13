<?php 


add_action( "widgets_init", "carousel_class_name_widget" );

function carousel_class_name_widget() {register_widget( "carousel_class_name" );}






            class carousel_class_name extends WP_Widget {


               function __construct() {
                  parent::__construct(
                    "carousel_id_name", // Widget ID
                    "Carousel Widget",  //Name
                    array( "description" => "") // Args
                  );
        if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() ) {
                add_action( "wp_enqueue_scripts", array( $this, "widget_enqueue_scripts" ) );
            }

                }



      function widget_enqueue_scripts() {
      wp_enqueue_style("carousel", get_stylesheet_directory_uri() . "/widgets/carousel/carousel.css");
      wp_enqueue_script("carousel_script", get_stylesheet_directory_uri() . "/widgets/carousel/carousel.js", array("jquery"));
      
      }




                function form($instance) {
                    $instance = wp_parse_args( (array) $instance, array( "title" => "" ) );
                    $title = $instance["title"];?>
                    <p><label for="<?php echo $this->get_field_id("title"); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id("title");?>" name=" <?php echo $this->get_field_name("title"); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
                <?php
                }

                function update($new_instance, $old_instance) {
                    $instance = $old_instance;
                    $instance["title"] = $new_instance["title"];
                    
                    $fields = get_fields("widget_" . $this->id);
                    foreach ($fields as $field => $value) {
                      $instance[$field] = $value;
                    }

                    return $instance;
                }

                function widget($args, $instance) {
                    $defaults = array("title" => "");
                    $instance = wp_parse_args( (array) $instance, $defaults );
                    
                    $title = $instance["title"];
                    $widget_size_carousel = $instance["widget_size"];
                    $this->id = $args['widget_id'];



                    
                   
                      

                    
                    
                    echo $args["before_widget"];
                    
                    if (!empty($title))
                        echo $args["before_title"] . $title . $args["after_title"];


                     

?>


<div class="card p-0 col-md-12 mt-12 mb-12">
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="100000">
    <div class="w-100 carousel-inner" role="listbox">

<?php
  if( have_rows("manual_repeater", "widget_" . $this->id ) ):
   while ( have_rows("manual_repeater", "widget_" . $this->id ) ) : the_row();
       include( locate_template( "widgets/carousel/carousel_html.php", false, false ) ); 
  endwhile;
endif;
?>





</div>
    <ol class="carousel-indicators d-block mt-4 mb-0 ml-0 w-100 text-center">
<?php
$count_controls = 0;
  if( have_rows("manual_repeater", "widget_" . $this->id ) ):
   while ( have_rows("manual_repeater", "widget_" . $this->id ) ) : the_row();?>

<li data-target="#carouselExampleControls" data-slide-to="<?php echo $count_controls;?>" class="d-inline-block <?php if($count_controls == 0){echo 'active';}?>"></li>

<?php
$count_controls++;
  endwhile;
endif;

?>
  </ol>

  </div>
</div>

<?php


                     

                  echo $args["after_widget"];
                }           
            }