<?php

$player_lang = pll_current_language( 'slug' );
$country = getenv('HTTP_GEOIP_COUNTRY_CODE');
 if ( $country == "CH" && $player_lang == "it" ) {
    wp_redirect(home_url());
    exit();
  }

 get_header(); 

//review_header_title(); ?>

  <main id="main">
	  <h1><?php echo get_the_title() ?></h1>
        
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
       
        <div class="right-sidebar">
          <?php dynamic_sidebar( 'Right Sidebar' ); ?>
        </div>        
   
  </main>
<?php get_footer(); ?>