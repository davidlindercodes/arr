<?php
/**
** Event Template
*/

/*
**========== Direct Access Restriction =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

?>

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