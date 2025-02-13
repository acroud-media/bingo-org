<?php $element_size = get_field("element_size", "widget_" . $this->id);
           echo '<div class="'.$element_size.' vertical-card">';?>                     
           <div class="panel panel-danger panel-pricing text-center">
                        <div class="panel-heading">
                             <?php $image = get_sub_field('image', "widget_" . $this->id);                                      
                        if( $image ) {?>
                            <a href="<?php echo get_sub_field('read_review_link', "widget_" . $this->id); ?>">
                                <img src="<?php  echo $image['sizes']['bingo_top_list_logo']; ?>" loading="lazy" alt="<?php  echo $image['alt'] ?>" width="140" height="65" style="object-fit: contain;">  
                            </a>                            
                        <?php } ?>
                        </div>
                        <div class="panel-body text-center">
                            <div class="star-rating">                        
                                <?php bingo_get_star_rating(get_sub_field('review_star_rating', "widget_" . $this->id));?>
                            </div>
                            <div class="read_review_link">
                                <a href="<?php echo get_sub_field('read_review_link', "widget_" . $this->id); ?>">
                                   <?php echo get_sub_field('read_review_text', "widget_" . $this->id); ?>
                                </a>
                            </div>

                            
                            <div class="bonus_title">
                                <?php echo get_sub_field('title', "widget_" . $this->id); ?>
                            </div>
                            <div class="bonus_money">
                                <?php echo get_sub_field('content', "widget_" . $this->id); ?>
                            </div>

                        </div>
                        <ul class="list-group text-center">
                              <i class="fa fa-check-square-o vertical-check" aria-hidden="true"></i>
                            <?php 
                            if( have_rows("mini_titles") ):
                               while ( have_rows("mini_titles" ) ) : the_row();

                            ?>
                            <li class="list-group-item text-center">
                                <?php echo get_sub_field('mini_title'); ?>
                            
                                </li>

                            <?php 
                              endwhile;
                            endif;
                            ?>


                        </ul>
                        <div class="panel-footer">
                        <div class="media-object mx-auto d-block">
                        <?php $image = get_sub_field('icon', "widget_" . $this->id);                                      
                        if( $image ) {?>
                            <img src="<?php  echo $image['sizes']['bingo_icon']; ?>" loading="lazy" alt="<?php  echo $image['alt'] ?>" width="35" height="31">                              
                        <?php } ?>
                        </div>

                            <small class="text-center ">
                                <?php echo get_sub_field('features', "widget_" . $this->id); ?>
                            </small>
                            <a target="_blank" class="btn regular_button btn-lg btn-block top-list-play mt-4" href="<?php echo get_sub_field('link', "widget_" . $this->id); ?>"><?php echo get_sub_field('button_title', "widget_" . $this->id); ?>
                            </a>
                            <small class="text-center font-weight-bold">
                                <?php echo get_sub_field('terms_and_conditions', "widget_" . $this->id); ?>
                            </small>
                        </div>
                            <small class="text-center font-weight-bold">
                                <?php echo get_sub_field('new_customers_only', "widget_" . $this->id); ?>
                            </small>
                    </div>
                </div>