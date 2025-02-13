<?php 


add_action( "widgets_init", "Buttons_class_name_widget" );

function Buttons_class_name_widget() {register_widget( "Buttons_class_name" );}






            class Buttons_class_name extends WP_Widget {


               function __construct() {
                  parent::__construct(
                    "Buttons_id_name", // Widget ID
                    "Buttons",  //Name
                    array( "description" => "") // Args
                  );
        if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() ) {
                add_action( "wp_enqueue_scripts", array( $this, "widget_enqueue_scripts" ) );
            }

                }



      function widget_enqueue_scripts() {
      wp_enqueue_style("Buttons", get_stylesheet_directory_uri() . "/widgets/buttons/buttons.css");
      wp_enqueue_script("Buttons_script", get_stylesheet_directory_uri() . "/widgets/buttons/buttons.js", array("jquery"));
      
      }




                function form($instance) {
                    $instance = wp_parse_args( (array) $instance, array( "title" => "" ) );
                    $title = $instance["title"];
?>
                    <p><label for="<?php echo $this->get_field_id("title"); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id("title");?>" name=" <?php echo $this->get_field_name("title"); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
                <?php
                }

                function update($new_instance, $old_instance) {
                    $instance = $old_instance;
                    $instance["title"] = $new_instance["title"];
                    return $instance;
                }

                function widget($args, $instance) {
                    $defaults = array("title" => "");
                    $instance = wp_parse_args( (array) $instance, $defaults );
                    
                    $title = $instance["title"];
                    $this->id = $args['widget_id'];               
                    
                    echo $args["before_widget"];
                    
                    if (!empty($title))
                        echo $args["before_title"] . $title . $args["after_title"];



                            if( have_rows("manual_repeater", "widget_" . $this->id ) ):
                               while ( have_rows("manual_repeater", "widget_" . $this->id ) ) : the_row();
                                  include( locate_template( "widgets/buttons/buttons_html.php", false, false ) );
                              endwhile;
                            endif;              

                  echo $args["after_widget"];
                }           
            }        