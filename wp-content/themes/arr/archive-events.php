<?php
/**
** Events Archive Template
*/

/*
**========== Direct Access Restriction =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

// Load Header
get_header(); 

$event_cat = get_field('category');
$field     = get_field_object('category');
$paged     = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$event_type = isset($_GET['event_type']) ? $_GET['event_type'] : '';
?>

<section class="mainContent smallerSectionPadding bg-white topfoldDesktop">
    <div class="sm-container mx-auto">
    <h1 class="text-center sm:mt-2 blue" >Upcoming Club Events</h1> 
    <p class="text-center"> See you there. </p>
    <div class="text-center event-block justify-center sm:justify-start" >

        <!-- filters wrapper start  -->
        <div class="filers-wrapper">
            <form class="filter-form-js form-inline" data-type="event">
                <input type="hidden" name="action" value="mcf_filters_form_action">
                <input type="hidden" name="mcf_post_type" value="events">
                <input type="hidden" name="mcf_current_page" value="<?php echo esc_attr($paged); ?>">
                <div class="form-group mt-5">                    
                    <span>
                        <strong>Filter By Date:</strong>
                    </span>                    
                </div>
                <div class="form-group date mb-2 mx-sm-3">
                    <div class="filter-by-date">
                        <label>Start Date</label>
                        <input type="date" class="filter-input" name="start_date">
                    </div>
                </div>
                <div class="form-group date mb-2 mx-sm-3">   
                    <label>End Date</label>
                    <input type="date" class="filter-input" name="end_date">
                </div>
                <div class="form-group event label mt-5">                    
                    <span>
                        <strong>Filter By Event Type:</strong>
                    </span>                    
                </div>
                <div class="form-group event-type mb-2 mx-sm-3">
                    <label>Event Type:</label>
                    <select class="filter-input" name="event_type">
                        <option value="">All</option>
                        <?php foreach ($field['choices'] as $key => $val): ?>                    
                            <option <?php selected($event_type, $key, true); ?> value="<?php echo esc_attr($key); ?>"><?php echo $val; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <input type="submit" value="Apply Filter" class="filter-button mt-5">
            </form>
        </div>
        <!-- filters wrapper end  -->

        <!-- Load Events Template -->
        <div class="wpposts-wrapper">    
            <?php 
                $query         = mcf_events_query_callback();
                $paginate_args = mcf_pagination_args($query, $paged);
                if ($query->have_posts()) :
                    while( $query->have_posts() ) : $query->the_post();
                            get_template_part('templates/event-template');                        
                    endwhile;
                    ?>
                    <div class="pagination container">
                        <?php echo paginate_links( $paginate_args ); ?>
                    </div>
                    <?php
                else :
                    echo 'No events found';
                endif
            ?>
        </div>
           
        </div>
    </div> 

        <?php wp_reset_postdata(); ?>

</section> 

<?php get_footer(); ?>