<?php get_header(); ?>
               
<section class="page-header-hero">
    <?php the_post_thumbnail('banner-image'); ?>              
</section>
 
<section class="page">
    <div class="wrap">
        <div class="row">
            <div class="medium-3 columns">
                <?php if(have_posts()) : ?>
                    <?php while(have_posts()) : the_post(); ?>
                        <h2>
                            <div class="page-breadcrumb">
                                <?php
                                if(function_exists('bcn_display')) {
                                   bcn_display();
                                    }
                                ?>
                            </div>
                        </h2>
            </div>
            <div class="medium-8 medium-offset-1 columns">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="post-text">
                    <?php the_content(); ?>
                </article>
                <?php endwhile; ?>
                    <?php else : ?>
                        <p>
                            <?php __('No Page Found'); ?>
                        </p>
                        <?php endif; ?>
            </div>
        </div><!-- row -->
    </div><!-- wrap -->
</section>

<?php get_footer(); ?>