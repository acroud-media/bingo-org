<header class="business-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center text-md-left">
            <h1 class="text-white main_title"><?php echo get_field('main_title', "widget_" . $this->id); ?></h1>
          </div>
          <div class="col-md-2 ml-lg-5 text-center text-md-left mb-lg-0 mb-4">
                        <?php $image = get_field('content_image', "widget_" . $this->id);                                      
                        if( $image ) {?>
                            <img src="<?php  echo $image['sizes']['bingo_header_ball']; ?>" loading="lazy" alt="<?php  echo $image['alt'] ?>">                              
                        <?php } ?>
          </div>
          <div class="col-md-9 title_description text-center text-md-left">
            <p class="text-white"><?php echo get_field('content', "widget_" . $this->id); ?></p>
          </div>
        </div>
      </div>
    </header>