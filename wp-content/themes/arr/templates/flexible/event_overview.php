<section class="container sm:flex sm:mt-16" <?php if(get_sub_field("section-id")) : ?> id="<?php the_sub_field("section-id"); ?>" <?php endif; ?>>
    <div class=" <?php if (get_sub_field('specifications') || get_sub_field('services')) : ?>sm:w-7/12 <?php else : ?> w-100 <?php endif; ?> "> 
        <h5 class="font-bold uppercase tracking-widest text-xl text-center sm:text-left">Project Overview</h5>
        <p><?php the_sub_field('overview')?></p>
    </div>
    <?php if (get_sub_field('specifications') || get_sub_field('services')) : ?>
    <div class="relative w-1/12 hidden sm:block">
        <div class="border-opacity-25 border-r-2 border-gray-500" style=" margin-right: 50%; height: 100%">
        </div>
    </div>
    <?php endif; ?>
    
    <div class="sm:w-4/12 hidden sm:block">
        <?php if (get_sub_field('specifications')):?>
        <h5 class="font-bold uppercase tracking-widest text-xl">Specifications</h5>
        <p class="leading-relaxed tracking-wider font-medium" style="color:#808080"><?php the_sub_field('specifications')?></p>
        <?php endif; ?> 
        <?php if (have_rows('services')): ?>
        <h5 class="font-bold uppercase tracking-widest text-xl mb-5 mt-10 text-left">Services</h5>
            <?php while (have_rows('services')) : the_row()?>
                <p class="leading-relaxed tracking-wider uppercase font-medium" style="color: #C20101;"> <span>></span> <?php the_sub_field('service'); ?> </p>
            <?php endwhile; ?>
        <?php endif; ?> 
    </div>
</section>

<section class="container pt-10 sm:pt-0 sm:my-16"> 
    <div class="sm:flex sm:flex-wrap w-100">
        <?php while (have_rows('galary')) : the_row()?>
            <div class="sm:w-3/6 sm:p-2">
                <img style="width:100%" src="<?php echo get_sub_field('image')['url']; ?>">
                <p class="text-gray-400 italic text-sm"> <?php the_sub_field('image_caption') ?></p>
            </div>
        <?php endwhile; ?>
    </div>
</section>

<div class="container sm:hidden text-center py-0">
        <h5 class="font-bold uppercase tracking-widest text-xl mt-10 text-center text-center">Specifications</h5>
        <p class="leading-relaxed tracking-wider font-medium mt-4" style="color: #808080"><?php the_sub_field('specifications')?></p>

        <?php if (have_rows('services')): ?>
        <h5 class="font-bold uppercase tracking-widest text-xl mt-10 text-center text-center">Services</h5>
        <div class="flex flex-wrap mt-4">
                <?php while (have_rows('services')) : the_row()?>
                    <p class="leading-relaxed ml-2 uppercase font-normal" style="color: #C20101;"> >  <?php the_sub_field('service'); ?></p>
                <?php endwhile; ?>
            <?php endif; ?> 
        </div>
    </div>
