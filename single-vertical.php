<?php
/*
Template Name: Single Vertical Image Template
*/
?>

<?php get_header(); ?>

<section class="page-header-hero">
    <div class="wrap">
        <h2 class="single">  
            <?php

                $categories = get_the_category();
                $separator = ", ";
                $output = '';

                if ($categories) {

                    foreach ($categories as $category){

                        $output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>' . $separator;
                    }

                    echo trim($output, $separator);
                }

                ?>  > <span class="breadcrumb-separator"> <?php the_title(); ?> </span>
        </h2>
    </div><!--wrap -->
</section><!-- page-header-hero -->
                
<section class="single-view vertical">
    <div class="wrap">
        <div class="row">
            <div class="medium-5 large-5 columns">

                <?php if(have_posts()) : ?>

                <?php while(have_posts()) : the_post(); ?>

                <?php if(has_post_thumbnail()) : ?>

                <?php the_post_thumbnail(); ?>

                <?php endif; ?>
                
            </div>

            <div class="medium-7 large-7 columns">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="single-text">
                    <h2><?php the_title(); ?></h2>
                    <?php the_content(); ?>
                    <h6 class="tag"><?php the_tags( 'Tags > ',' , ' ); ?></h6> 
                </article><!-- single-text -->

                <?php endwhile; ?>

                <?php else : ?>

                <p><?php __('No Posts Found'); ?></p>

                <?php endif; ?>
            </div>
        </div><!-- row -->
    </div><!-- wrap -->
    
</section><!-- single-view vertical -->
                   
<section class="portfolio-nav">
   <div class="wrap">
       <div class="row">
            <div class="small-6 text-center  columns">
               <a href="#" class="previous"><?php previous_post_link('%link', '<i class="fa fa-angle-double-left"></i>', TRUE); ?></a>
            </div>

            <div class="small-6  text-center columns">
               <a href="#" class="next"><?php next_post_link('%link', '<i class="fa fa-angle-double-right"></i>', TRUE); ?></a>
            </div>
        </div><!-- row -->
    </div><!-- wrap -->
</section><!-- portfolio-nav -->
                                     
<section class="grid gallery related">
    <div class="wrap">
       <h3>Related Items</h3>       
        <div class="row small-up-1 medium-up-2 large-up-3" id="masonry-container">

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
    </div><!-- wrap -->
</section><!-- grid gallery related -->
                
                
<?php get_sidebar('portfolio'); ?>