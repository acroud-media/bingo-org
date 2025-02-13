     <div class="carousel-item <?php if(empty($active_slide)) {echo 'active'; $active_slide = 1; } ?>">
        <div class="carousel-caption">

            <div class="col-md-7 pr-md-5 text-center text-md-left pr-sm-0">
              <h3 class="bonus_title promotion_widget_title "><?php echo get_sub_field('title', "widget_" . $this->id); ?></h3>
              <small class=" promotion_widget_expiry_date d-block smallest mute block text-danger pb-4 mb-2 "><?php echo get_sub_field('expiry_date', "widget_" . $this->id); ?></small>
              <small class="promotion_widget_text d-md-block d-none"><?php echo get_sub_field('content', "widget_" . $this->id); ?></small>
            </div>
            <div class="col-md-5 pull-right">
        <?php if(!empty(get_sub_field('image_link', "widget_" . $this->id))){ ?>
      <a target="_blank" href="<?php echo get_sub_field('image_link', "widget_" . $this->id); ?>">
    <?php } ?>

                            <?php $image = get_sub_field('image', "widget_" . $this->id);                                      
                        if( $image ) {?>
                            <img class=" pull-right w-100" src="<?php  echo $image['sizes']['bingo_slider']; ?>" loading="lazy" alt="<?php  echo $image['alt'] ?>">                              
                        <?php } ?>
        <?php if(!empty(get_sub_field('image_link', "widget_" . $this->id))){ ?>
          </a>
    <?php } ?> 

                <small class="w-100 font-weight-bold text-danger d-block text-center">
                  <a href="<?php echo get_sub_field('terms_and_conditions_link', "widget_" . $this->id); ?>">
                  <?php echo get_sub_field('terms_and_conditions', "widget_" . $this->id); ?>
                  </a>
                </small>
            </div>

        </div>
      </div>