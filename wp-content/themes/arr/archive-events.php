<?php get_header(); ?>


<section class="mainContent smallerSectionPadding bg-white topfoldDesktop">
    <div class="sm-container mx-auto">
    <h1 class="text-center sm:mt-2 blue" >Upcoming Club Events</h1> 
    <p class="text-center"> See you there. </p>
    <div class="text-center event-block justify-center sm:justify-start" >
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
                    <div class="event-listing">
                        <a href="<?php echo get_permalink() ?>">
                            <?php if (get_the_post_thumbnail_url()) : ?>
                                <img class="main-image" src="<?php echo get_the_post_thumbnail_url(); ?>"  />
                            <?php else : ?>
                                <img class="main-image placeholder" src="/wp-content/themes/arr/src/img/global/pcs.jpeg"  />
                            <?php endif; ?>
                            <div class="w-full py-5 relative mx-auto font-medium">
                                <?php if (get_field('date')) : ?> 
                                    <p class="date"> 
                                        <?php the_field('date'); ?> 
                                    </p>  
                                <?php endif; ?>
                                <?php if (get_the_title()) : ?>
                                    <p class="title"> <?php print the_title(); ?> </p>
                                <?php endif; ?>
                                <?php if (get_field('location')) : ?>
                                    <p class="location"> 
                                        <img src="/wp-content/themes/arr/src/img/icons/location-arrow-solid.svg" />
                                        <?php the_field('location'); ?> 
                                    </p> 
                                <?php endif; ?>

                                <?php if (have_rows('disances')) : 
                                    while (have_rows('disances')) : the_row(); 
                                        if (get_sub_field('distance')) : ?>
                                            <p class="distance"> 
                                                <img src="/wp-content/themes/arr/src/img/icons/person-running-solid.svg" />
                                                <?php the_sub_field('distance') ?>
                                            </p>
                                        <?php break; ?>
                                        <?php endif; ?>
                                    <?php endwhile; ?> 
                                <?php endif; ?> 

                                <?php if (get_field('cost')) : ?>
                                    <p class="cost">
                                        <img src="/wp-content/themes/arr/src/img/icons/ticket-solid.svg" />
                                        <?php if (get_field('cost') == 0) : 
                                            echo 'Free';
                                        else:
                                            echo "£" . number_format(get_field('cost'), 2, ".", ",");
                                        endif; ?>
                                    </p>
                                <?php endif; ?>

                                <?php if ( get_field('category') === 'club_road_race' || get_field('category') === 'club_fell_race' || get_field('category') ===  'club_trail_race' ) : ?> 
                                    <div class="points-race-bullet">
                                        Points Race
                                    </div>
                                <?php endif ; ?>
                            </div>
                        </a>
                    </div>
                    <?php endif; ?>
                <?php endwhile; ?>
        </div>
    </div> 


    <div class="pagination container">
            <?php 
                echo paginate_links( array(
                    'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                    'total'        => $query->max_num_pages,
                    'current'      => max( 1, get_query_var( 'paged' ) ),
                    'format'       => '?paged=%#%',
                    'show_all'     => false,
                    'type'         => 'plain',
                    'end_size'     => 2,
                    'mid_size'     => 1,
                    'prev_next'    => true,
                    'prev_text'    => sprintf( '<i></i> %1$s', __( 'Previous', 'text-domain' ) ),
                    'next_text'    => sprintf( '%1$s <i></i>', __( 'Next', 'text-domain' ) ),
                    'add_args'     => false,
                    'add_fragment' => '',
                ) );
            ?>
        </div>

        <?php wp_reset_postdata(); ?>

</section> 


<?php get_footer(); ?>



