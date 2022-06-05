
<?php
/**

 * Template Name: Home

 **/

get_header(); ?>

<section id="homeTopFold" class="relative" >
    <img class="topfoldDesktop" src="<?php echo get_the_post_thumbnail_url() ?>" >    </div>
</section>




<?php 
 if(have_rows('content_sections')):
    while (have_rows('content_sections')): the_row();
        get_template_part('templates/flexible/'. get_row_layout() .'');
    endwhile;
 endif;

get_footer(); ?> 