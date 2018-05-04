<div class="columns">
    <figure class="slide-up">
        <?php if(has_post_thumbnail()) : ?>

          <?php the_post_thumbnail('small-thumbnail'); ?>

          <?php endif; ?>

        <figcaption>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p class="view"><a href="<?php the_permalink(); ?>"><i class="fa fa-angle-double-right"></i></a></p>
        </figcaption>
    </figure>
</div>