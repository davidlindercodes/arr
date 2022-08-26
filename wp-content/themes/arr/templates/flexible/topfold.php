    <?php if (get_sub_field('topfold_image')['url']): ?>
        <section class="relative <?php if (get_sub_field('hide_on_mobile')): ?> hidden sm:block <?php endif ?> ">
            <div class="w-full"> 
                <div class="topfoldDesktop <?php if (get_sub_field('topfold_image_mobile')): ?> hidden sm:block <?php endif ?> " style="height:500px; background-image: url('<?php echo get_sub_field('topfold_image')['url']; ?>'); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
                    <?php if (get_sub_field('topfold_image_mobile')): ?>
                        <div class="topfoldDesktop <?php if (get_sub_field('topfold_image_mobile')): ?>  sm:hidden <?php endif ?> " style="height:500px; background-image: url('<?php echo get_sub_field('topfold_image_mobile')['url']; ?>'); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
                    <?php endif ?>
                </div>
            </div>
        </section>
    <?php endif ?>
    <?php if (get_sub_field('topfold_header') || get_sub_field('topfold_description') ): ?>
        <section>
            <div class="container bg-white z-40 relative"  <?php if (get_sub_field('topfold_image')['url']): ?>style="margin-top: -140px;" <?php endif ?> >
                <?php if (get_sub_field('topfold_header')): ?>
                    <h1 class="text-center mx-auto my-auto pt-5 sm:pt-10" style="max-width: 800px"> <?php the_sub_field('topfold_header');?></h1>
                    <div class="cheeky-spacer"></div>
                <?php endif ?>
                <?php if (get_sub_field('topfold_description')): ?>
                    <p class="py-3 sm:py-6 sm:p-8 md:px-16 text-center grayP" > <?php the_sub_field('topfold_description');?>
                <?php endif; ?>
            </div>
        </section> 
    <?php endif ?>
