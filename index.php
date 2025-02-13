<?php get_header(); ?>

  <main id="main" class="row">
    <div class="col-12 widget">
        <?php
          if ( have_posts() ) :
            while ( have_posts() ) : the_post();
              the_content();
            endwhile;
              bingo_the_posts_pagination();
          else :
            ?><p><?php _e( 'Sorry, no posts matched your criteria.', 'bingo' ); ?></p><?php
          endif;
        ?>
    </div>  
  </main>

<?php get_footer(); ?>
