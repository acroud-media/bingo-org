<?php 


add_action( "widgets_init", "Header_block_class_name_widget" );

function Header_block_class_name_widget() {register_widget( "Header_block_class_name" );}






            class Header_block_class_name extends WP_Widget {


               function __construct() {
                  parent::__construct(
                    "Header_block_id_name", // Widget ID
                    "Header block",  //Name
                    array( "description" => "") // Args
                  );
        if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() ) {
                add_action( "wp_enqueue_scripts", array( $this, "widget_enqueue_scripts" ) );
            }

                }



      function widget_enqueue_scripts() {
      wp_enqueue_style("Header_block", get_stylesheet_directory_uri() . "/widgets/Header_block/Header_block.css");
      wp_enqueue_script("Header_block_script", get_stylesheet_directory_uri() . "/widgets/Header_block/Header_block.js", array("jquery"));
      
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
                    $this->id = $args['widget_id'];



                    
                   
                      

                    $args["before_widget"] = str_replace("home-widget", "header-widget home-widget ", $args["before_widget"]);
                    
                    echo $args["before_widget"];
                    
                    if (!empty($title))
                        echo $args["before_title"] . $title . $args["after_title"];


                       



      include( locate_template( "widgets/Header_block/Header_block_html.php", false, false ) );


                     

                  echo $args["after_widget"];
                }           
            }        