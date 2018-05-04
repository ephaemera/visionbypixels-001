<?php get_header(); ?>
               
        
	    
<!-- GRID SECTION -->

<section class="grid">
    <div class="wrap"><!-- wrap set to max-width 1200px so that 400px wide related images would center -->
        <div class="row small-up-1 medium-up-2 large-up-3" text-center id="masonry-container">

            <?php if(have_posts()) : ?>

            <?php while(have_posts()) : the_post(); ?>

            <?php get_template_part('content', get_post_format()); ?>

            <?php endwhile; ?>

            <?php the_posts_navigation(); ?>

            <?php else : ?>

            <p><?php __('No Posts Found'); ?></p>

            <?php endif; ?>

        </div><!-- row -->
    </div><!-- wrap -->
</section><!-- grid -->

<?php get_footer(); ?>