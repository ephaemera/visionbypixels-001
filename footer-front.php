<!-- FOOTER -->

            <footer>
               
                <section class="up">
                        <div class="row">
                            <div class="large-4 large-centered text-center columns">
                               <a href="#top" class="top"><i class="fa fa-angle-double-up fa-lg"></i></a>
                            </div>
                        </div>
                </section>

                <section class="copyright">
                    <div class="row">
                        <div class="large-4 large-centered text-center columns">
                          <h2 class="tagline"><?php bloginfo('description'); ?></h2>

                            <ul class="social">
                                <li class="500px"><a href="https://500px.com/visionbypixels"><i class="fa fa-500px"></i></a></li>
                                <li class="twitter"><a href="https://twitter.com/visionbypixels"><i class="fa fa-twitter"></i></a></li>
                                <li class="facebook"><a href="https://www.facebook.com/visionbypixels/"><i class="fa fa-facebook"></i></a></li>
                                <li class="googlePlus"><a href="https://plus.google.com/105622031354455999589"><i class="fa fa-google-plus"></i></a></li>
                                <li class="email"><a href="mailto:visionbypixels@gmail.com"><i class="fa  fa-envelope-o"></i></a></li>
                            </ul>

                            <p>&copy; 2000 - <?php echo Date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved. Site by <a href="http://vbpjournal.ephaemera.com/">ephaemera.</a></p>
                            <div class="text-link-footer">
                                <p><a href="https://www.visionbypixels.com/terms/">Terms &amp; Conditions</a> <span class="footer-pipe">|</span> <a href="https://www.visionbypixels.com/privacy-policy/">Privacy Policy</a></p>
                            </div>

                        </div>
                    </div>
                </section><!-- wrap -->


                
                

            </footer>

        </div><!-- off-canvas-content -->
        
    </div><!-- off-canvas-wrapper-inner -->

</div><!-- off-canvas-wrapper -->
    
     
<script>

    $(window).load(function() {
        $('#masonry-container').masonry({
            itemSelector: '#masonry-container div'
        });
    });

    $(function() { <!-- https://css-tricks.com/snippets/jquery/smooth-scrolling/ -->
      $('a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html, body').animate({
              scrollTop: target.offset().top
            }, 1000);
            return false;
          }
        }
      });
    });

</script>

<?php wp_footer(); ?>

<script>
$(document).foundation();
</script>

</body>

</html>
