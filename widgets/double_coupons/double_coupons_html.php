<?php $element_size = get_field("element_size", "widget_" . $this->id);?>
           <div class="element-size vertical-card <?php echo esc_attr($element_size);?>">                    
            <div class="panel panel-danger panel-pricing text-center">
                        <div class="panel-heading">
                        <div class="media-object img-rounded img-responsive mx-auto d-block">
                             <?php $image = get_sub_field('image', "widget_" . $this->id);                                      
                        if( $image ) {?>
                            <img src="<?php  echo $image['sizes']['bingo_top_list_logo']; ?>" loading="lazy" alt="<?php  echo $image['alt'] ?>">                              
                        <?php } ?>
                        </div>
                            <div class="bonus_title">
                                <?php echo get_sub_field('title', "widget_" . $this->id); ?>
                                
                            </div>
                            <div class="bonus_money">
                                <?php echo get_sub_field('bonus', "widget_" . $this->id); ?>
                                </div>
                        </div>
                        <div class="panel-footer">
                            <a target="_blank" aria-label="<?php echo get_sub_field('button_title', "widget_" . $this->id); ?>" class="btn btn-lg btn-block top-list-play" href="<?php echo get_sub_field('link', "widget_" . $this->id); ?>"><?php echo get_sub_field('button_title', "widget_" . $this->id); ?></a>
                        </div>
                            <small class="text-center font-weight-bold">
                                <a href="<?php echo get_sub_field('terms_and_conditions_link', "widget_" . $this->id); ?>" aria-label="terms and conditions">
                                <?php echo get_sub_field('terms_and_conditions', "widget_" . $this->id); ?>
                                </a>
                            </small>

                    </div></div>