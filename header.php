<!doctype html>
<html class="no-js" <?php language_attributes(); ?> dir="ltr">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
        <link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700|Montserrat:400,700|Quattrocento+Sans" rel="stylesheet">
        <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <a id="top"></a>
    <div class="off-canvas-wrapper">
        <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
            <div class="off-canvas position-right" id="mobile-menu" data-off-canvas data-position="right">
                <button class="close-button" aria-label="Close menu" type="button" data-close>
                    <span aria-hidden="true">&times;</span>
                </button>
                <?php

                    wp_nav_menu(array(
                    'container' => false,                           // remove nav container
                    'container_class' => '',           		 // class of container
                    'menu' => '',                      	        // menu name
                    'menu_class' => 'top-bar-menu right',         	// adding custom nav class
                    'theme_location' => 'top-bar-r',                // where it's located in the theme
                    'before' => '',                                 // before each link <a>
                    'after' => '',                                  // after each link </a>
                    'link_before' => '',                            // before each link text
                    'link_after' => '',                             // after each link text
                    'depth' => 5,                                   // limit the depth of the nav
                    'fallback_cb' => false,                         // fallback function (see below)
                    'walker' => new top_bar_walker()
                ));

            ?>

            <div class="search-form-container">
                <?php get_search_form(); ?>
            </div>
            <!-- search-form-container -->

            </div>
            <!-- off-canvas position-right -->

            <!-- MOBILE NAVIGATION -->

            <div class="off-canvas-content" data-off-canvas-content>

                <div class="title-bar">
                    <div class="wrap">

                        <div class="title-bar-left">
                            <h1 class="title-bar-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span class="pipe">|</span> <span class="name"><?php bloginfo('name'); ?></span></a></h1>
                        </div>

                        <div class="title-bar-right">
                            <button class="menu-icon" type="button" data-open="mobile-menu"></button>
                        </div>
                    </div>

                </div>
                <!-- title-bar -->