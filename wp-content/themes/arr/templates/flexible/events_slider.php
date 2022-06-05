<section id="featured-events" class="mainContent smallerSectionPadding bg-white">
    <div class="sm-container mx-auto">
    <h2 class="text-center sm:mt-2" >Upcoming Club Events </h2> 
    <p class="text-center"> See you there. </p>
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
                <?php  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$query = new WP_Query( array(  
                'posts_per_page' => 15, 
                'paged' => $paged,
                'post_type' => 'events',
                'post_status' => 'publish',
                'meta_key'  => 'date',
                'orderby'   => 'meta_value_num',
                'order'     => 'ASC',
            ));

while ( $query->have_posts() ) : $query->the_post(); ?>
                        <?php if (strtotime(get_field('date')) > strtotime(date('jS F Y'))):?>
                            <li class="splide__slide" style="padding: 20px;">
                                <a href="<?php echo get_permalink() ?>">
                                    <?php if (get_the_post_thumbnail_url()) : ?>
                                        <img src="<?php echo get_the_post_thumbnail_url(); ?>"  />
                                    <?php else : ?>
                                        <img class="placeholder" src="/wp-content/themes/arr/src/img/global/pcs.jpeg"  />
                                    <?php endif; ?>
                                    <?php if ( get_field('category') === 'club_road_race' || get_field('category') === 'club_fell_race' || get_field('category') ===  'club_trail_race' ) : ?> 
                                        <div class="points-race">
                                            Points Race
                                        </div>
                                    <?php endif ; ?>
                                    <div class="w-full py-5 relative mx-auto font-medium">
                                        <?php if (get_field('date')) : ?>
                                            <p class="date"> <?php the_field('date'); ?> </p>  
                                        <?php endif; ?>
                                        <?php if (get_the_title()) : ?>
                                            <p class="title"> <?php print the_title(); ?> </p>
                                        <?php endif; ?>
                                        <?php if (get_field('location')) : ?>
                                            <p class="lcoation"> <?php the_field('location'); ?> </p> 
                                        <?php endif; ?>
                                        <?php if (get_field('cost')):?> 
                                            <p>
                                                <?php if (get_field('cost') == 0) : 
                                                    echo 'Free';
                                                else:
                                                    echo "£" . number_format(get_field('cost'), 2, ".", ",");
                                                endif; ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php wp_reset_query(); ?>  
                </ul>
            </div>
        </div>
    </div> 
    <a class="blue-link mx-auto" href="/events">
        View All Events
    </a>


</section> 
