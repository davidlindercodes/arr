<section id="featured-news" class="mainContent smallerSectionPadding bg-white">
    <div class="sm-container mx-auto">
    <h2 class="text-center sm:mt-2" >Latest News </h2> 
    <p class="text-center"> Keep up to date with the latest club news, results & photos... </p>
    <div class="splide splide2 text-center" 
          data-splide='{
              "type":"slide",
              "perPage": 5,
              "lazyLoad":"nearby",
              "autoplay":0,
              "arrows":0,
              "pagination":0,
                "breakpoints": {
                        "1280": {
                            "perPage": 4
                        },
                        "1160": {
                            "perPage": 3
                        },
                        "715": {
                            "perPage": 2,
                            "autoplay":0
                        },
                        "512": {
                            "perPage": 1.5,
                            "autoplay":0
                        }
                    }
          }'>

            <div class="splide__track" >
                <ul class="splide__list">
                <?php 
                
                $args = array(  
                    'post_status' => 'publish',
                    'post_parent' => 0,
                    'posts_per_page' => 0, 
                    'orderby' => 'date', 
                    'order' => 'DESC',
                );

                $events = new WP_Query( $args ); 

                while ( $events->have_posts() ) : $events->the_post(); ?>
                    <li class="splide__slide" style="padding: 20px;">
                        <a href="<?php echo get_permalink() ?>">
                            <?php if (get_the_post_thumbnail_url()) : ?>
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>"  />
                            <?php else : ?>
                                <img class="placeholder" src="/wp-content/themes/arr/src/img/global/pcs.jpeg"  />
                            <?php endif; ?>
                            <?php if (get_field('gallary')): ?> 
                            <div class="photo-counter">
                                <img src="/wp-content/themes/arr/src/img/icons/camera-solid.svg" />
                                <?php echo count(get_field('gallary')); ?> Photos
                            </div>
                        <?php endif ; ?>
                        <p class="author"> By <?php echo get_the_author_nickname() ?> <span class="date">  <?php the_date(); ?> </span> </p>
                        <p class="title"> 
                            <?php print the_title(); ?> 
                        </p>

                        $out = strlen($in) > 50 ? substr($in,0,50)."..." : $in;

                        <?php if (get_field('short_description')): ?>
                            <p class="short"> 
                                <?php the_field('short_description') ?> 
                            </p>
                        <?php endif; ?>
                        </a>
                    </li>
                    <?php endwhile; ?>
                <?php wp_reset_query(); ?>  
                </ul>
            </div>
        </div>
    </div> 
    <a class="blue-link mx-auto" href="/events">
        Visit Blog
    </a>


</section> 
