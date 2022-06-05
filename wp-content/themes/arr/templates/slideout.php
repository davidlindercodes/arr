<div class="slideout ">
    <div class="close-menu menu-toggle">
        <img src="<?php bloginfo('stylesheet_directory');?>/src/img/icons/white-x.svg" alt="Close Menu" />
    </div>
    <div class="nav">
        <?php if(!is_front_page()): ?>
            <ul class="home uppercase text-center tracking-widest">
                <li><a href="/" title="Home">Home</a></li>
            </ul>
        <?php endif; ?>
        <div class="text-center uppercase tracking-widest">
            <?php wp_nav_menu( array('theme_location' => 'slideout-nav') ); ?>
        </div>
        <div class="mt-8 px-0 w-100">
            <a href="/contact" class="py-3 mx-5 block text-center text-xl w-100 font-medium text-white transform hover:scale-105 uppercase" style="background-color: #D50606">Start Your project
            </a>
        </div>
    </div>
    <div class="slideoutFooter">
    <div class="flex flex-wrap justify-center lg:justify-start xl:hidden">
            <?php if(have_rows('social_media_links', 'option')): ?>
                <?php while (have_rows('social_media_links', 'option')): the_row(); ?>
                    <a href="<?php the_sub_field('link'); ?>">
                        <img class="w-auto mx-2" style="height: 30px;" src="<?php echo get_sub_field('white_logo')['url']; ?>" />
                    </a>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
