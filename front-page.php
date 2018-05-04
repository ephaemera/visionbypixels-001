<?php get_header(); ?>
               
<?php 
    echo do_shortcode("[metaslider id=312]"); 
?>
               
<?php 
    echo do_shortcode("[metaslider id=138]"); 
?>   
              
<?php 
    echo do_shortcode("[metaslider id=7]"); 
?>   
               
               
                
<?php
if ( is_home() ) {
query_posts( 'cat= -92' );
}
?>
            
            

<?php
if ( is_home() ) {
query_posts('posts_per_page=5');
}
?>
             
              
                
<!-- GRID SECTION -->

<section>
    <div class="row">
        <div class="text-center columns">
            <h3 class="grid-header">Latest Work</h3>
        </div>
    </div>
</section>

<section class="grid gallery front">
    <div class="wrap">
        <div class="row small-up-1 medium-up-2 large-up-3" text-center id="masonry-container">

          <?php if(have_posts()) : ?>

            <?php while(have_posts()) : the_post(); ?>

            <?php get_template_part('content', get_post_format()); ?>

            <?php endwhile; ?>

            <?php else : ?>

            <p><?php __('No Posts Found'); ?></p>

            <?php endif; ?>

        </div>
    </div>
</section>


                
<?php get_sidebar('portfolio'); ?>