<?php get_header(); ?>

<section class="post-image">
    
</section>

<section class="page">
    <div class="wrap">
        <div class="row">
            <div class="medium-4 columns">

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

                <?php wp_link_pages( array( //https://codex.wordpress.org/Function_Reference/wp_link_pages
                    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'visionbypixels' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                    ) );
                ?>
            </div>

            <div class="medium-7 medium-offset-1 columns">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="post-text">
                    <?php the_content(); ?>
                    <p class="meta"><?php the_time('F jS, Y'); ?>  ::  by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>"><?php the_author(); ?></a>    ::  <?php the_tags( '', ', ', '' ); ?> :: <?php comments_number(); ?>
                    </p>
                    <hr>
                    <section class="blog-nav">
                       <div class="wrap">
                           <div class="row">
                                <div class="small-4 text-center  columns">
                                   <a href="#" class="previous"><?php previous_post_link('%link', '<i class="fa fa-angle-double-left"></i>', TRUE); ?></a>
                                </div>
                                <div class="small-4  text-center columns">
                                   <a href="#" class="next"><?php next_post_link('%link', '<i class="fa fa-angle-double-right"></i>', TRUE); ?></a>
                                </div>
                            </div>
                        </div>
                    </section><!-- blog-nav -->
                <hr>
                </article><!-- post-text -->

                <?php 
                if( comments_open() ){ 
                    comments_template();
                } else {
                    echo '<h5 class="text_center">Sorry, comments are closed!</h5>';
                }
                ?>

            <?php endwhile; ?>

            <?php else : ?>

            <p><?php __('No Posts Found'); ?></p>

            <?php endif; ?>

         </div><!-- columns -->
      </div><!-- row -->
    </div><!-- wrap -->
</section><!-- page -->


<section class="grid gallery related">
    <div class="wrap">
       <h3>Related posts</h3>
        <div class="row small-up-1 medium-up-2 large-up-3 text-center" id="masonry-container">

        <?php // https://www.elegantthemes.com/blog/tips-tricks/display-related-posts-in-wordpress
        $orig_post = $post;
        global $post;
        $tags = wp_get_post_tags($post->ID);

        if ($tags) {
            $tag_ids = array();
        foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
            $args=array(
                'tag__in' => $tag_ids,
                'post__not_in' => array($post->ID),
                'posts_per_page'=>3, // Number of related posts to display.
                'ignore_sticky_posts'=>1 // modified from deprecated original
            );

        $my_query = new wp_query( $args );

        while( $my_query->have_posts() ) {
            $my_query->the_post();
        ?>

        <?php get_template_part('content', 'image'); ?>


        <?php }
        }
        $post = $orig_post;
        wp_reset_query();
        ?>

        </div><!-- masonry-container -->
    </div><!--wrap -->
</section><!-- grid gallery related -->


<?php get_sidebar('portfolio'); ?>

                