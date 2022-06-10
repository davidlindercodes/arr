<?php
/**
** Blog Template
*/

/*
**========== Direct Access Restriction =========== 
*/
if( ! defined('ABSPATH' ) ){ exit; }

?>

<a class="article-tile" href="<?php echo get_permalink() ?>">
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
    <p class="title"> <?php print the_title(); ?> </p>
    <?php if (get_field('short_description')): ?>
        <p class="short"> <?php the_field('short_description') ?> </p>
    <?php endif; ?>
</a>