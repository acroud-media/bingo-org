<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <?php 

    wp_head(); ?>
    

</head>
<body <?php body_class(); ?>>

<?php do_action( 'wp_body_open' ); ?>	
<header>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="big-logo navbar-brand">
      <a href="<?php echo esc_url(home_url('/')); ?>">
        <img src="<?php header_image(); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>" alt="<?php bloginfo( 'name' ); ?>" style="object-fit: contain;"/>
      </a>
    </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
                <div id="mob-menu">
                    <div class="mob-menu-button">
                    </div>
                    <!-- mob-menu-button -->
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <img src="<?php header_image(); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>" alt="<?php bloginfo( 'name' ); ?>"/>
                    </a>
                    <div class="search-box">
                    </div>
                    <!--search-box-->
                </div>
                <!--mob-menu-->            
        <?php if ( has_nav_menu( 'main-menu' ) ) {wp_nav_menu(array(
        'theme_location' => 'main-menu',
        'depth' => 2, 
        'menu_class' => 'navbar-nav ml-auto',
        'fallback_cb'     => 'wp_page_menu',
        'walker' => new bingo_wp_navwalker()
        ));}else { echo '<span class="add-menu"></span>';} ?>
        </div>


                <a href="#" class="search-menu-icon">
                </a>
                <span class="close-search-box">
                </span>
            <div class="search-box">
                <?php get_search_form(); ?>
            </div>
            <!--search-box-->
        </nav>
	</header>	