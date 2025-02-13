<?php


add_action('acf/init', 'smg_register_blocks');

function smg_register_blocks()
{
	//Top List Casino Reviews block
    acf_register_block_type(array(
        'name'              => 'smg/reviews_list',
        'title'             => 'Top List Casino Reviews',
        'description'       => '',
        'render_callback'   => 'smg_reviews_list_callback',
        'category'          => 'formatting',
        'mode'              => 'edit',
        'align'             => 'full',
        'supports'          => array(
            'mode' => true,
            'align' => false,
        ),
        'enqueue_style'     => SMG_BLOCKS_URL . 'assets/css/reviews-list.css',
    ));
	
	//Bingo Carousel block
   /* acf_register_block_type(array(
        'name'              => 'smg/bingo_carousel',
        'title'             => 'Bingo Carousel',
        'description'       => '',
        'render_callback'   => 'smg_carousel_callback',
        'category'          => 'formatting',
        'mode'              => 'edit',
        'align'             => 'full',
        'supports'          => array(
            'mode' => true,
            'align' => false,
        ),
        'enqueue_style'     => SMG_BLOCKS_URL . 'assets/css/bingo-carousel.css',
    ));*/
}

function smg_reviews_list_callback()
{
    include 'templates/reviews-list.php';
}
/*function smg_carousel_callback()
{
    include 'templates/bingo-carousel.php';
}*/


