<?php 


add_action( "widgets_init", "vertical_top_list_class_name_widget" );

function vertical_top_list_class_name_widget() {register_widget( "vertical_top_list_class_name" );}






            class vertical_top_list_class_name extends WP_Widget {


               function __construct() {
                  parent::__construct(
                    "vertical_top_list_id_name", // Widget ID
                    "Vertical Top List",  //Name
                    array( "description" => "") // Args
                  );
        if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() ) {
                add_action( "wp_enqueue_scripts", array( $this, "widget_enqueue_scripts" ) );
            }

                }



      function widget_enqueue_scripts() {
      wp_enqueue_style("vertical_top_list", get_stylesheet_directory_uri() . "/widgets/vertical_top_list/vertical_top_list.css");
      wp_enqueue_script("vertical_top_list_script", get_stylesheet_directory_uri() . "/widgets/vertical_top_list/vertical_top_list.js", array("jquery"));
      
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
                    $multiple_tabs = get_field("multiple_tabs", "widget_" . $this->id );                    
                
                    echo $args["before_widget"];
                    
                    if (!empty($title))
                        echo $args["before_title"] . $title . $args["after_title"];


if($multiple_tabs != 'single'){?>

     <div class="vertical-top-list-buttons col-12 btn-group-justified" data-toggle="buttons">
        <a bingo_tab="#tab_1" class="col-md-3 col-sm-12 mr-2 btn btn-default top-list-play active-top-list" data-toggle="tab">
          <?php echo get_field("button_title_tab1", "widget_" . $this->id);?>
        </a>
        <a bingo_tab="#tab_2" class="col-md-3 col-sm-12 mr-2 btn btn-default top-list-play" data-toggle="tab">
          <?php echo get_field("button_title_tab2", "widget_" . $this->id);?>
        </a>
        <a bingo_tab="#tab_3" class="col-md-3 col-sm-12 mr-2 btn btn-default top-list-play" data-toggle="tab">
          <?php echo get_field("button_title_tab3", "widget_" . $this->id);?>
        </a>
        <a bingo_tab="#tab_4" class="col-md-3 col-sm-12 btn btn-default top-list-play" data-toggle="tab">
          <?php echo get_field("button_title_tab4", "widget_" . $this->id);?>
        </a>
      </div>

      <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
         <?php 
      if( have_rows("manual_repeater", "widget_" . $this->id ) ):
         while ( have_rows("manual_repeater", "widget_" . $this->id ) ) : the_row();

            include( locate_template( "widgets/vertical_top_list/vertical_top_list_html.php", false, false ) );

        endwhile;
      endif;
          ?>
        </div>
        <div class="tab-pane" id="tab_2">
           <?php 
        if( have_rows("manual_repeater_tab2", "widget_" . $this->id ) ):
           while ( have_rows("manual_repeater_tab2", "widget_" . $this->id ) ) : the_row();

              include( locate_template( "widgets/vertical_top_list/vertical_top_list_html.php", false, false ) );

          endwhile;
        endif;
            ?>
        </div>
        <div class="tab-pane" id="tab_3">
         <?php 
      if( have_rows("manual_repeater_tab3", "widget_" . $this->id ) ):
         while ( have_rows("manual_repeater_tab3", "widget_" . $this->id ) ) : the_row();

            include( locate_template( "widgets/vertical_top_list/vertical_top_list_html.php", false, false ) );

        endwhile;
      endif;
          ?>
        </div>
        <div class="tab-pane" id="tab_4">
         <?php 
      if( have_rows("manual_repeater_tab4", "widget_" . $this->id ) ):
         while ( have_rows("manual_repeater_tab4", "widget_" . $this->id ) ) : the_row();

            include( locate_template( "widgets/vertical_top_list/vertical_top_list_html.php", false, false ) );

        endwhile;
      endif;
          ?>
        </div>
      </div>

<?php }else{

                    


if( have_rows("manual_repeater", "widget_" . $this->id ) ):
   while ( have_rows("manual_repeater", "widget_" . $this->id ) ) : the_row();

      include( locate_template( "widgets/vertical_top_list/vertical_top_list_html.php", false, false ) );

  endwhile;
endif;

    }                 

                  echo $args["after_widget"];
                }           
            }
      //include(get_stylesheet_directory() . "/widgets/vertical_top_list/vertical_top_list_acf_fields.php");

        