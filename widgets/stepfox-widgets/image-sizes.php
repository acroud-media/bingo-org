<?php

// Register Thumbnails


$ratio = 1300;

$width25 = round((($ratio - 20) * 0.25 ) - 20 );
$width50 = round((($ratio - 20) * 0.5 ) - 20 );
$width75 = round((($ratio - 20) * 0.75 ) - 20 );
$width100 = round( $ratio - 20 );

$superslider = round( $ratio * 0.25 );
$superslider_height = round( ($ratio / 10) * 4 );


$block = round((($width25 / 0.877) / 4) - 20 + round(20 / 4));
$height_thumb = round((($width25 / 0.877) / 3) - 20 + round(20 / 3));
$width_thumb = round(($width25 / 100) * 33.5);

$block2 = $block * 2 + 20;
$block4 = $block * 4 + 20 * 3;
$block6 = $block * 5 + 20 * 4;


// Register Thumbnails

if ( function_exists( 'add_theme_support' ) ) {
add_theme_support( 'post-thumbnails' );

//thumbnails
add_image_size( 'bingosmallthumb', $width_thumb, $height_thumb, true );
//huge-featured-images
add_image_size( 'bingohugeimagefeatured', $width50, $block4, true );
//big-featured-images
add_image_size( 'bingomediumimagefeatured', $width25, $block4, true );

//small-featured-images
add_image_size( 'bingosmallimagefeatured', $width25, $block2 , true );
//slider
add_image_size( 'bingoslider-three', $width75, $block6, true );
add_image_size( 'bingoslider-four', $width100, round( $block6 + 100 ), true );
}

add_filter( 'image_size_names_choose', 'bingo_fighter_image_sizes_reg' );

function bingo_fighter_image_sizes_reg( $sizes ) {
	$new_sizes = array();
	$added_sizes = get_intermediate_image_sizes();
	foreach( $added_sizes as $key => $value) {
		$new_sizes[$value] = $value;
	}
	$new_sizes = array_merge( $new_sizes, $sizes );
	return $new_sizes;


}



?>