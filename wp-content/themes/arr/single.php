<?php get_header(); ?>

<div class="mx-auto narrow container">
    <h1> <?php the_title(); ?> </h1>
    <?php if (get_the_post_thumbnail_url()) : ?>
        <img class="my-20" src="<?php echo get_the_post_thumbnail_url(); ?>"  />
    <?php endif; ?>
    <?php the_content(); ?>

<?php if (get_field('results')) : ?>
    <h2 class="my-20"> Results </h2>
    <div id="results" class="mb-20">
        <?php the_field('results') ?> 
    </div> 
<?php endif; ?> 


<?php $images = get_field('gallary'); if($images): ?>
    <h2 class="my-20"> Gallery </h2>
    <div id="gallery" class="mb-20">
        <?php foreach( $images as $image ): ?>
            <img class="img-responsive mx-4 w-100" src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php the_title();; ?>" />
        <?php endforeach; ?>
    </div>
<?php endif; ?>


</div>

<?php get_footer(); ?>