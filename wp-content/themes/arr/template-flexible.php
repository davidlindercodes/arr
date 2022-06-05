<?php
/**

 * Template Name: Flexible Template

 **/

?>

<?php get_header(); ?>

<?php if(have_rows('content_sections')): ?>
    <?php while (have_rows('content_sections')): the_row(); ?>
        <?php get_template_part('templates/flexible/'. get_row_layout() .''); ?>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>