<section class="sidebar-widgets">                            
       <div class="wrap">
           <div class="row">
                <div class="medium-4  text-left columns">
                   <?php if(is_active_sidebar('blog-sidebar1')): ?>
                  <?php dynamic_sidebar('blog-sidebar1'); ?>
                  <?php endif; ?>
                </div>
                <div class="medium-4 text-center columns">
                   <?php if(is_active_sidebar('blog-sidebar2')): ?>
                      <?php dynamic_sidebar('blog-sidebar2'); ?>
                      <?php endif; ?>
                </div>
                <div class="medium-4 text-right columns">
                   <?php if(is_active_sidebar('blog-sidebar3')): ?>
                  <?php dynamic_sidebar('blog-sidebar3'); ?>
                  <?php endif; ?>
                </div>
            </div>
        </div>
</section><!-- sidebar-widgets -->



<?php get_footer(); ?>
