<?php get_header(); ?>

                
<section class="page-header-hero">

     <?php 
     if ( function_exists('z_taxonomy_image_url') && z_taxonomy_image_url() != null ) {
         echo '<figure class="category-image">';
         echo '<img src="' . z_taxonomy_image_url() . '" alt="">'; 
         echo '</figure>';
     } 
    ?>

    <div class="wrap">
        <h2 class="category">
            <div class="page-breadcrumb">
                    <?php
                    if(function_exists('bcn_display')) {
                       bcn_display();
                        }
                    ?>
            </div>
        </h2>
    </div><!-- wrap -->

</section><!-- page-header-hero -->


<section class="grid gallery">
    <div class="wrap">
        <div class="row small-up-1 medium-up-2 large-up-3" text-center id="masonry-container">

            <?php if(have_posts()) : ?>

            <?php while(have_posts()) : the_post(); ?>

            <?php get_template_part('content', get_post_format()); ?>

            <?php endwhile; ?>

            <?php the_posts_navigation(); ?>

            <?php else : ?>

            <p><?php __('No Posts Found'); ?></p>

            <?php endif; ?>

        </div>
    </div>
</section>
                
                

<?php get_sidebar('portfolio'); ?>