  
       </main>
       
	    <footer>
            <div class="container mx-auto flex py-8 justify-between footer-container"> 
                    <div class="text-white footer-menu"> 
                        <p class="footer-menu-title text-white font-bold tracking-wide mb-0"> Menu </p>
                        <?php wp_nav_menu( array( 'theme_location' => 'main-nav' ) ); ?>
                        <?php if (have_rows('policies', 'option')) : ?>
                            <p class="footer-menu-title text-white font-bold tracking-wide policies mb-0 mt-5"> Policies </p>
                            <ul> 
                                <?php while (have_rows('policies', 'option')) :  the_row(); ?>
                                    <li>
                                        <a href="<?php echo get_sub_field('pdf')['url']; ?>" title="<?php the_sub_field('policy_name'); ?>"  target="_blank" rel="noopener noreferrer">
                                        <?php the_sub_field('policy_name'); ?>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                    <div class="text-white"> 
                        <a href="https://www.facebook.com/accringtonroadrunners" class="facebook-button"  target="_blank" rel="noopener noreferrer">
                            <h2 class="text-white text-center"> FOLLOW US ON FACEBOOK </h2> 
                            <img class="fb-logo" src="/wp-content/themes/arr/src/img/icons/facebook-brands.svg" />
                        </a>
                    </div>
                </div> 
            </div> 
        </footer>

        <?php get_template_part('templates/slideout'); ?>
    </body>
    <?php wp_footer(); ?>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <?php get_template_part('templates/global-footer-styles'); ?>
    </html>