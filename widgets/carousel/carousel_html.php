     <div class="carousel-item <?php if(empty($active_slide)) {echo 'active'; $active_slide = 1; } ?>">
            <div class="col-12 p-0 pull-right">
                            <?php $image = get_sub_field('image', "widget_" . $this->id);                                      
                        if( $image ) {
                          
 
if($widget_size_carousel == "col-lg-4 col-12"){$carousel_image_size = 'bingosmallimagefeatured';}
elseif($widget_size_carousel == "col-lg-8 col-12"){$carousel_image_size = 'bingoslider-three';}
elseif($widget_size_carousel == "col-lg-12 col-12"){$carousel_image_size = 'bingoslider-four';}
elseif($widget_size_carousel == "col-lg-3 col-md-6 col-12"){$carousel_image_size = 'bingosmallimagefeatured';}
elseif($widget_size_carousel == "col-lg-6 col-12"){$carousel_image_size = 'bingohugeimagefeatured';}
elseif($widget_size_carousel == "col-lg-9 col-12"){$carousel_image_size = 'bingoslider-three';}
elseif($widget_size_carousel == "col-lg-12 col-md-12 col-12"){$carousel_image_size = 'bingoslider-four';}
elseif($widget_size_carousel == "fullwidth-widget"){$carousel_image_size = 'bingoslider-four';}

                          ?>
                            <img class=" pull-right w-100" src="<?php  echo $image['sizes'][$carousel_image_size]; ?>" alt="">                              
                        <?php } ?>
            </div>

      </div>