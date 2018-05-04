<?php get_header(); ?>


    <section class="page-header-hero">

        <div class="wrap">

            <h2 class="archives">

        <?php

            if ( is_category() ) {
                single_cat_title('Category Archives > '); // https://codex.wordpress.org/Function_Reference/single_tag_title

            } elseif ( is_tag() ) {
                single_tag_title('Tag Archives > '); 

            } elseif ( is_author() ) {
                the_post();
                echo 'Author Archives > ' . get_the_author();
                rewind_posts();

            } elseif ( is_day() ) {
                echo 'Daily Archives > ' . get_the_date();

            } elseif ( is_month() ) {
                echo 'Monthly Archives > ' . get_the_date('F Y');

            } elseif ( is_year()) {
                echo 'Yearly Archives > ' . get_the_date('Y');

            } else {
                echo 'Archives >';
            }

        ?>

        </h2>

        </div>

    </section>


    <section class="grid gallery">

        <div class="wrap">

            <div class="row small-up-1 medium-up-2 large-up-3" text-center id="masonry-container">

                <?php if(have_posts()) : ?>

                    <?php while(have_posts()) : the_post(); ?>

                        <?php get_template_part('content', get_post_format()); ?>

                            <?php endwhile; ?>

                                <?php the_posts_navigation(); ?>


                                    <?php else : ?>

                                        <p>
                                            <?php __('No Posts Found'); ?>
                                        </p>

                                        <?php endif; ?>

            </div>

        </div>

    </section>


    <?php get_sidebar('portfolio'); ?>