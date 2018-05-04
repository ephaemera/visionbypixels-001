<div class="columns">
    <figure class="post-thumb">
            <?php if(has_post_thumbnail()) : ?>

              <?php the_post_thumbnail('related-image'); ?>

              <?php endif; ?>
                
             <figcaption>
                <h3>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h3>
                <?php the_excerpt(); ?>
                <span class="more"><a href="<?php the_permalink(); ?>">Read More<i class="fa fa-angle-double-right"></i></a></span>
            </figcaption>
    </figure>
</div>