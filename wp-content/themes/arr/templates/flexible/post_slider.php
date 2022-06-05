<section id="featured-posts" class="mainContent mb-14" >
    <div class="container mx-auto ">
        <div class="splide mt-6 sm:mt-14" 
            data-splide='{
                "perPage":3,
                "lazyLoad":"nearby",
                "arrows":0,
                "pagination":1,
                "gap": "1em",
                "breakpoints": {
                    "1280": {
                        "autoplay": 1,
                        "perPage": 2
                    },
                    "700": {
                        "autoplay": 1,
                        "perPage": 1
                    }
                }
            }'
        >

            <div class="splide__track" style="max-width: 1280px;">
                <ul class="splide__list">
                <?php 
                
                $args = array(  
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'post_parent' => 0,
                    'posts_per_page' => 0, 
                    'orderby' => 'menu_order', 
                    'order' => 'ASC',
                );

                $projects = new WP_Query( $args ); 
                $count = 0;
                    
                while ( $projects->have_posts() ) : $projects->the_post();
                 $count++; if ($count<4): 
                ?>
                    <li class="splide__slide pb-20 px-4">
                        <div class="p-2 shadow-md">
                            <a class="flex" href="<?php echo get_permalink() ?>">
                                <img class="w-20 sm:w-28 h-20 sm:h-28" src="<?php echo get_the_post_thumbnail_url(); ?>"  />
                                <div class="pl-4 my-auto">
                                    <p class=" uppercase" style="font-weight: 400; font-size: 1rem; letter-spacing: 0.1px;"><?php print the_title(); ?></p>
                                    <div class="flex moving-arrow "> 
                                        <p style="font-weight: 500; font-size: 0.9rem; margin-bottom: 0px; letter-spacing: 0.1px;">VIEW ARTICLE</p> 
                                        <img class="h-4 pt-1  ml-4 arrow-to-move" src="/wp-content/themes/arr/src/img/icons/arrow-right-no-shadow.svg">
                                    </div>
                                </div>
                            </a>
                        </div>
                    </li>
                <?php endif; endwhile; wp_reset_query(); ?>  
                </ul>
            </div>
        </div>
    </div> 
</section> 
