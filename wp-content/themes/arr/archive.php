<?php
/**
** Archive Template
*/

/*
**========== Direct Access Restriction =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

// Load Header
get_header(); 

$categories = get_categories( array(
    'orderby' => 'name',
    'order'   => 'ASC'
));

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

?>

<section id="featured-events" class="mainContent smallerSectionPadding bg-white topfoldDesktop">
    <div class="sm-container mx-auto">
        <h1 class="text-center sm:mt-2 blue" > Club Blog </h1> 
        <p class="text-center px-10"> Keep up to date with the latest club news, photos and results... </p>
        
        <!-- filters wrapper start  -->
        <div class="filers-wrapper">
            <form class="filter-form-js form-inline" data-type="event">
                <input type="hidden" name="action" value="mcf_filters_form_action">
                <input type="hidden" name="mcf_post_type" value="post">
                <input type="hidden" name="mcf_current_page" value="<?php echo esc_attr($paged); ?>">
                <div class="form-group mt-5">                    
                    <span>
                        <strong>Filter By Date:</strong>
                    </span>                    
                </div>
                <div class="form-group mb-2 mx-sm-3">
                    <div class="filter-by-date">
                        <label>Start Date</label>
                        <input type="date" class="filter-input" name="start_date">
                    </div>
                </div>
                <div class="form-group mb-2 mx-sm-3">   
                    <label>End Date</label>
                    <input type="date" class="filter-input" name="end_date">
                </div>
                <div class="form-group event-type mb-2 mx-sm-3">
                    <label>Category:</label>
                    <select class="filter-input" name="post_cat">
                        <option value="">All</option>
                        <?php foreach ($categories as $category): ?>                    
                            <option value="<?php echo esc_attr($category->term_id); ?>"><?php echo $category->name; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <input type="submit" value="Apply Filter" class="filter-button mt-5">
            </form>
        </div>
        <!-- filters wrapper end  -->

        <div class="wpposts-wrapper text-center events-block justify-start" >

            <!-- Load Posts Template -->
            <?php 
                $query         = mcf_posts_query_callback();
                $paginate_args = mcf_posts_pagination_args($query, $paged);
                if ($query->have_posts()) :
                    while( $query->have_posts() ) : $query->the_post();
                        get_template_part('templates/blog-template');    
                    endwhile;
                    ?>
                    <div class="pagination container">
                        <?php echo paginate_links( $paginate_args ); ?>
                    </div>
                    <?php
                else :
                    echo 'No Posts found';
                endif
            ?>

        </div>
        
        <?php wp_reset_postdata(); ?>
    </div> 
</section>

<?php get_footer(); ?>