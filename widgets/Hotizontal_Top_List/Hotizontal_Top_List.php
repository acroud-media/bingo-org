<?php 


add_action( "widgets_init", "Hotizontal_Top_List_class_name_widget" );

function Hotizontal_Top_List_class_name_widget() {register_widget( "Hotizontal_Top_List_class_name" );}






            class Hotizontal_Top_List_class_name extends WP_Widget {


               function __construct() {
                  parent::__construct(
                    "Hotizontal_Top_List_id_name", // Widget ID
                    "Horizontal Top List",  //Name
                    array( "description" => "") // Args
                  );
        if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() ) {
                add_action( "wp_enqueue_scripts", array( $this, "widget_enqueue_scripts" ) );
            }

                }



      function widget_enqueue_scripts() {
      wp_enqueue_style("Hotizontal_Top_List", get_stylesheet_directory_uri() . "/widgets/Hotizontal_Top_List/Hotizontal_Top_List.css");
      wp_enqueue_script("Hotizontal_Top_List_script", get_stylesheet_directory_uri() . "/widgets/Hotizontal_Top_List/Hotizontal_Top_List.js", array("jquery"));
      
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



                    
                   
                      

                    
                    
                    echo $args["before_widget"];
                    
                    if (!empty($title))
                        echo $args["before_title"] . $title . $args["after_title"];


                       


if( have_rows("manual_repeater", "widget_" . $this->id ) ):
   while ( have_rows("manual_repeater", "widget_" . $this->id ) ) : the_row();

      include( locate_template( "widgets/Hotizontal_Top_List/Hotizontal_Top_List_html.php", false, false ) );

  endwhile;
endif;

      if(get_field('bottom_button_title', "widget_" . $this->id)){
 ?>
 
      <div class="horizontal-top-list-buttons col-12">
        <a href="<?php echo get_field('bottom_button_link', "widget_" . $this->id); ?>" class="col-12 btn btn-default top-list-play active-top-list">
          <?php echo get_field('bottom_button_title', "widget_" . $this->id);?>
        </a>
      </div>

 <?php        

      }              

                  echo $args["after_widget"];
                }           
            }        