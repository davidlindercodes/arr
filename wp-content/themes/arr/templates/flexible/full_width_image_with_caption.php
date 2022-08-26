<section class="container pb-6" <?php if(get_sub_field("section-id")) : ?> id="<?php the_sub_field("section-id"); ?>" <?php endif; ?>> 
    <img class="w-full" src="<?php echo get_sub_field('img')['url']; ?>">
    <p class="text-gray-500 italic text-xs">
        <?php the_sub_field('caption') ?>
    </p>
</section>