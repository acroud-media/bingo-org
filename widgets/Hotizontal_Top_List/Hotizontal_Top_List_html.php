           <div class="horizontal-list col-12">

            <div class="horizonta-wrap d-md-flex">
                <div class="media col-md-2 align-self-center text-center media-object mx-auto d-block">

                            <?php $image = get_sub_field('image', "widget_" . $this->id);                                      
                        if( $image ) {?>
                            <a href="<?php echo get_sub_field('read_review_link', "widget_" . $this->id); ?>">
                            <img  src="<?php  echo $image['sizes']['bingo_top_list_logo']; ?>" loading="lazy" alt="<?php  echo $image['alt'] ?>" width="140" height="65" style="object-fit: contain;">
                            </a>                              
                        <?php } ?>

                </div>
                <div class="col-md-10 mt-md-0 mb-md-0 mt-sm-3 mb-sm-2 col-sm-12 horizontal-list-inside">

                        <?php if(!empty(get_sub_field('content', "widget_" . $this->id))) { ?>

                        <div class="col-12">
                        <div class="horizontal-list-content col-12 text-center align-self-center text-md-left">
                            <?php echo get_sub_field('content', "widget_" . $this->id); ?>
                        </div>
                        </div>
                        <?php } ?>

                        <div class="col-12 d-md-flex">
                        <div class="col-md-2 col-sm-12 text-center align-self-center">
                            <div class="star-rating">                        
                                <?php bingo_get_star_rating(get_sub_field('review_star_rating', "widget_" . $this->id));?>
                            </div>
                            <div class="read_review_link">

                               <a href="<?php echo get_sub_field('read_review_link', "widget_" . $this->id); ?>">
                                    <?php echo get_sub_field('read_review_text', "widget_" . $this->id); ?>
                                </a>

                            </div>
                        </div>
                <div class="col-md-6 col-sm-12 pl-4 pr-4 align-self-center">
                        <div class="bonus_title list-group-item-heading text-center"><?php echo get_sub_field('title', "widget_" . $this->id); ?>      
                        </div>
                        <div class="bonus_money text-center">
                            <?php echo get_sub_field('bonus', "widget_" . $this->id); ?>
                        </div>
                </div>
                <div class="col-md-1 col-sm-12 align-self-center text-center media-object mx-auto d-block">
                        <?php $image = get_sub_field('icon', "widget_" . $this->id);                                      
                        if( $image ) {?>
                            <img src="<?php  echo $image['sizes']['bingo_icon']; ?>" loading="lazy" alt="<?php  echo $image['alt'] ?>">                              
                        <?php } ?>
                </div>
                <div class="col-md-3 col-sm-12 pl-4 pr-4 mt-4 text-center align-self-center">
                            <a target="_blank" class="btn regular_button btn-lg btn-block top-list-play" href="<?php echo get_sub_field('link', "widget_" . $this->id); ?>"><?php echo get_sub_field('button_title', "widget_" . $this->id); ?>
                            </a>
                             <a href="<?php echo get_sub_field('terms_and_conditions_link', "widget_" . $this->id); ?>" target="_blank">
                            <small class="font-weight-bold"><?php echo get_sub_field('terms_and_conditions', "widget_" . $this->id); ?></small>
                            </a>
                </div>
                </div>
                </div>
            </div>
                        <div class="small font-weight-bold list-group-item-text text-center"><?php echo get_sub_field('bottom_terms_and_conditions', "widget_" . $this->id); ?>
                        </div>
          </div>