<?php get_header(); ?>

<section class="event-top-fold"> 
    <h1> <?php the_title() ?> </h1> 
    <h3 class="event text-center"> 
        <?php if (get_field('category') == 'club_road_race') : ?> Club Road Race 
        <?php elseif (get_field('category') == 'club_fell_race') : ?> Club Fell Race 
        <?php elseif (get_field('category') == 'club_trail_race') : ?> Club Trail Race 
        <?php elseif (get_field('category') == 'cross_country') : ?> Cross Country 
        <?php elseif (get_field('category') == 'local_race') : ?> Local Race 
        <?php elseif (get_field('category') == 'team_relay') : ?> Team Relay 
        <?php elseif (get_field('category') == 'summer_run') : ?> Summer Run 
        <?php elseif (get_field('category') == 'social_event') : ?> Social Event 
        <?php endif; ?>
    </h3>
</section> 

<section> 
    <?php if (get_the_post_thumbnail_url()) : ?>
        <img class="main-event-image" src="<?php echo get_the_post_thumbnail_url(); ?>"  />
    <?php endif; ?>
</section> 

<section class="container short-container">
    <div class="booking-block">
        <p class="text-center font-medium">
            <?php if (get_field('cost') >= 0) : ?>
                <?php 
            $lowest = get_field('cost');
            $highest = get_field('cost');
            if (have_rows('disances')) : 
                while (have_rows('disances')) :  the_row(); 
                    if ((get_sub_field('cost') < $lowest) && (get_sub_field('cost') > 0)) :
                        $lowest = get_sub_field('cost');
                    endif;
                    if ((get_sub_field('cost') > $highest) && (get_sub_field('cost') > 0)) :
                        $highest = get_sub_field('cost');
                    endif;
                endwhile; 
            endif;

            if ($lowest == $highest ) :
                echo "£" . get_field('cost');
            else : 
                echo "£" . $lowest . " - £" . $highest;
            endif;
            ?>
            <?php else : ?>
                £ TBC
            <?php endif ; ?>
        </p>
        <a class="blue-link-solid" href="<?php the_field('link'); ?>"> 
            Book
        </a>
    </div>
</section> 

<section class="container event-description"> 
    <h2> About <?php the_title(); ?> </h2>
    <?php the_content(); ?>
</section> 

<section class="container md:flex justify-center mt-10">
    <?php if (have_rows('disances')) : ?>
        <div class="p-4 md:p-10">  
            <img class="h-10 mb-4 mx-auto" src="/wp-content/themes/arr/src/img/icons/running-solid.svg" />
            <p class="text-center font-medium">
                <?php while (have_rows('disances')) :  the_row(); ?>  
                    <?php the_sub_field('name'); ?> <br />
                <?php endwhile; ?>
            </p>
        </div> 
    <?php endif; ?> 
    <?php if (get_field('date')) : ?>
        <div class="p-4 md:p-10">  
            <img class="h-10 mb-4 mx-auto" src="/wp-content/themes/arr/src/img/icons/calendar-alt-regular.svg" />
            <p class="text-center font-medium"> <?php the_field('date') ?> <br /> <?php the_field('time') ?> </p>
        </div> 
    <?php endif; ?> 
    <?php if (get_field('location')) : ?>
    <div class="p-4 md:p-10">  
        <img class="h-10 mb-4 mx-auto" src="/wp-content/themes/arr/src/img/icons/map-marker-alt-solid.svg" />
        <p class="text-center font-medium"> <?php the_field('location') ?> </p>
    </div> 
    <?php endif; ?>
    <?php if (get_field('cost')) : ?>
    <div class="p-4 md:p-10">  
        <img class="h-10 mb-4 mx-auto" src="/wp-content/themes/arr/src/img/icons/money-check-alt-solid.svg" />
        <p class="text-center font-medium">
            <?php 
            $lowest = get_field('cost');
            $highest = get_field('cost');
            if (have_rows('disances')) : 
                while (have_rows('disances')) :  the_row(); 
                    if ((get_sub_field('cost') < $lowest) && (get_sub_field('cost') > 0)) :
                        $lowest = get_sub_field('cost');
                    endif;
                    if ((get_sub_field('cost') > $highest) && (get_sub_field('cost') > 0)) :
                        $highest = get_sub_field('cost');
                    endif;
                endwhile; 
            endif;

            if ($lowest == $highest ) :
                echo "£" . get_field('cost');
            else : 
                echo "£" . $lowest . " - £" . $highest;
            endif;
            ?>
        </p>
    </div> 
    <?php endif; ?> 
</section>

<?php if (get_field('the_route')) : ?> 
    <section class="container short-container text-center mt-20"> 
        <h2> The Route </h2>
        <?php the_field('the_route'); ?>
    </section> 
<?php endif;?>

<?php if (get_field('logistics_info')) : ?>     
    <section class="container short-container text-center mt-20"> 
        <h2> Event day logistics </h2>
        <?php the_field('logistics_info'); ?>
    </section> 
<?php endif;?>

<?php if (get_field('included')) : ?> 
    <section class="container short-container text-center mt-20"> 
        <h2> What's included</h2>
            <?php
                $included = get_field( 'included' );
                if( $included ): ?>
                <ul class="included">
                    <?php foreach ($included as $include) : ?>
                        <li> <?php echo ($include) ?> </li>
                    <?php endforeach; ?>
                <ul>
            <?php endif; ?>
    </section> 
<?php endif;?>

<?php get_template_part('templates/flexible/events_slider'); ?>

<?php get_footer(); ?>