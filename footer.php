<footer class="footer-wrap">

	<div class="players-favorites-footer flex-wrap row ml-0 mr-0 pl-0 pr-0">
		<div class="container">
			<div class="row">
				<div class="players-favorites-title font-weight-bold d-inline col-lg-2 col-md-12 col-12 text-center text-lg-left align-self-center">
					<?php _e('Players Favourites', 'bingo'); ?>
				</div>

				<?php 

				if(function_exists( 'pll_current_language' ) ) {
					$player_lang = pll_current_language( 'slug' ); if($player_lang == 'en'){$player_lang = '';}  
				}else{
					$player_lang = '';
				}

				?>        
				<div class="players-favorite d-inline col-md-2 col-sm-12 col-12 text-center text-md-left">
					<?php
					$post_object = get_field('players_favourites_1'.$player_lang, 'options');
					if( $post_object ): 
					$post = $post_object;
					setup_postdata( $post ); 
					?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php $image = get_field('image');                                      
						if( $image ) {?>
						<img class="media-object mx-auto d-block " src="<?php  echo $image['sizes']['bingo_top_list_logo']; ?>" loading="lazy" alt="<?php  echo $image['alt'] ?>">                      
						<?php } ?>
					</a>

					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">      
						<div class="col-12 text-center font-weight-bold">
							<?php the_title(); ?>
						</div>
					</a>
					<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
					<?php endif; ?>
				</div>
				<div class="players-favorite d-inline col-md-2 col-sm-12 col-12 text-center text-md-left">
					<?php
					$post_object = get_field('players_favourites_2'.$player_lang, 'options');
					if( $post_object ): 
					$post = $post_object;
					setup_postdata( $post ); 
					?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php $image = get_field('image');                                      
						if( $image ) {?>
						<img class="media-object mx-auto d-block " src="<?php  echo $image['sizes']['bingo_top_list_logo']; ?>" loading="lazy" alt="<?php  echo $image['alt'] ?>">                      
						<?php } ?>
					</a>

					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">      
						<div class="col-12 text-center font-weight-bold">
							<?php the_title(); ?>
						</div>
					</a>
					<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
					<?php endif; ?>
				</div>
				<div class="players-favorite d-inline col-md-2 col-sm-12 col-12 text-center text-md-left">
					<?php
					$post_object = get_field('players_favourites_3'.$player_lang, 'options');
					if( $post_object ): 
					$post = $post_object;
					setup_postdata( $post ); 
					?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php $image = get_field('image');                                      
						if( $image ) {?>
						<img class="media-object mx-auto d-block " src="<?php  echo $image['sizes']['bingo_top_list_logo']; ?>" loading="lazy" alt="<?php  echo $image['alt'] ?>">                      
						<?php } ?>
					</a>

					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">      
						<div class="col-12 text-center font-weight-bold">
							<?php the_title(); ?>
						</div>
					</a>
					<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
					<?php endif; ?>
				</div>
				<div class="players-favorite d-inline col-md-2 col-sm-12 col-12 text-center text-md-left">
					<?php
					$post_object = get_field('players_favourites_4'.$player_lang, 'options');
					if( $post_object ): 
					$post = $post_object;
					setup_postdata( $post ); 
					?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php $image = get_field('image');                                      
						if( $image ) {?>
						<img class="media-object mx-auto d-block " src="<?php  echo $image['sizes']['bingo_top_list_logo']; ?>" loading="lazy" alt="<?php  echo $image['alt'] ?>">                      
						<?php } ?>
					</a>

					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">      
						<div class="col-12 text-center font-weight-bold">
							<?php the_title(); ?>
						</div>
					</a>
					<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
					<?php endif; ?>
				</div>
				<div class="players-favorite d-inline col-md-2 col-sm-12 col-12 text-center text-md-left">
					<?php
					$post_object = get_field('players_favourites_5'.$player_lang, 'options');
					if( $post_object ): 
					$post = $post_object;
					setup_postdata( $post ); 
					?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php $image = get_field('image');                                      
						if( $image ) {?>
						<img class="media-object mx-auto d-block " src="<?php  echo $image['sizes']['bingo_top_list_logo']; ?>" loading="lazy" alt="<?php  echo $image['alt'] ?>">                      
						<?php } ?>
					</a>

					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">      
						<div class="col-12 text-center font-weight-bold">
							<?php the_title(); ?>
						</div>
					</a>
					<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
					<?php endif; ?>
				</div>
			</div> 
		</div>
	</div>




	<div class="container">
		<div class="container-widgets">
			<div class="widget-wrap">

				<h3 class="footer_menu_title"><?php get_the_menu_name_by_location('footer_menu1'); ?></h3>
				<?php if ( has_nav_menu( 'footer_menu1' ) ) {wp_nav_menu(array(
						'theme_location' => 'footer_menu1',
						'depth' => 1, 
						'menu_class' => 'footer-links',
						'fallback_cb'     => 'wp_page_menu',

					));}else { echo '<span class="add-menu"></span>';} ?>

			</div>

			<div class="widget-wrap">
				<h3 class="footer_menu_title"><?php get_the_menu_name_by_location('footer_menu2'); ?></h3>
				<?php if ( has_nav_menu( 'footer_menu2' ) ) {wp_nav_menu(array(
						'theme_location' => 'footer_menu2',
						'depth' => 1, 
						'menu_class' => 'footer-links',
						'fallback_cb'     => 'wp_page_menu',

					));}else { echo '<span class="add-menu"></span>';} ?>
			</div>

			<div class="widget-wrap">
				<h3 class="footer_menu_title"><?php get_the_menu_name_by_location('footer_menu3'); ?></h3>
				<?php if ( has_nav_menu( 'footer_menu3' ) ) {wp_nav_menu(array(
						'theme_location' => 'footer_menu3',
						'depth' => 1, 
						'menu_class' => 'footer-links',
						'fallback_cb'     => 'wp_page_menu',

					));}else { echo '<span class="add-menu"></span>';} ?>
			</div>

			<div class="widget-wrap">
				<h3 class="footer_menu_title"><?php get_the_menu_name_by_location('footer_menu4'); ?></h3>
				<?php if ( has_nav_menu( 'footer_menu4' ) ) {wp_nav_menu(array(
						'theme_location' => 'footer_menu4',
						'depth' => 1, 
						'menu_class' => 'footer-links',
						'fallback_cb'     => 'wp_page_menu',

					));}else { echo '<span class="add-menu"></span>';} ?>
			</div>

			<div class="widget-wrap">
				
				<div class="logos-wrapp">
				
					<div>
						<h3 class="footer_menu_title"><?php pll_e('Responsible Gambling'); ?></h3>
					</div>
					
					<div>
						<a href="https://about.gambleaware.org/" target="_blank">
						<img src="/wp-content/uploads/2024/05/GambleAware.png" loading="lazy" alt="GambleAware" style="background: #fff;" width="100" height="24">
						</a>
					</div>
				
				</div>
				
			</div>

		</div>

		<div class="copyright-wrapper">
			
			<div>

				<?php pll_e('We do not share any presonally identifiable information. Please see Our Privacy Policy for more.'); ?> | 
				<?php pll_e('All rights reserved 2017 Bingo.org'); ?>
			
			</div>	
				
		</div> 

	</div>

</footer>

<?php wp_footer(); ?>
</body>
</html>
