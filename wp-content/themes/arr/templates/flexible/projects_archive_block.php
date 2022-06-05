

<section class=" mainContent">
    <div class="container pb-14 sm:pb-20">
        <div class="flex flex-wrap">
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="sm:w-1/2 lg:w-1/3 mb-2">
                    <div class="px-5 py-2 md:py-5">
                        <a href="<?php echo get_permalink() ?>" class="relative"> 
                            <img class="w-full" src="<?php echo get_the_post_thumbnail_url();; ?>"  />
                            <div class="bg-white -mt-20 w-10/12 py-5 relative mx-auto">
                                <p class="text-lg text-center font-bold uppercase" style="font-weight: 700; font-size: 1.25rem; margin-bottom: 0px; letter-spacing: 1.26px;"><?php print the_title(); ?></p>
                                <?php print the_content(); ?>
                                <div class="flex mx-auto moving-arrow pl-2"> 
                                    <p>VIEW PROJECT</p> 
                                    <img class="h-6 pt-1  ml-4 arrow-to-move" src="/wp-content/themes/arr/src/img/icons/small-black-right-arrow.svg">
                                </div>
                            </div>
                        </a>   
                    </div>
                </div>
            <?php endwhile; wp_reset_query();?>
        </div>
        <div class="next-prev mt-5 flex justify-center text-white">
            <span class="d-flex justify-content-center align-items-center nav flex">
                <?php posts_nav_link('','<div class="load-more text-center" style="color:black; width: 250px;"> Previous </div>', '<div class="load-more text-center" style="color:black; width: 250px;"> Next </div>')?>
            </span>
        </div>
    </div>
</section>