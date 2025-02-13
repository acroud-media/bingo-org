<?php 
/* Template Name: Homepage
 * Description : Homepage
 */
?>
<?php get_header(); 


 ?> 
  <main id="main" style="max-width: none;margin: 74px 0 0;" >    
    
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
    
  </main>
<?php get_footer(); ?>