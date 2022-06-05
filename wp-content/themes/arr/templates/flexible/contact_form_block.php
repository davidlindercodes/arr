<?php if (!get_sub_field('start_project_page')): ?>
    <section> 
        <div class="contactContainer lg:flex mt-10">
            <div class="relative w-100 text-center lg:mr-10" style="width: 100%;">
                <img style="width: 100%;" src="<?php echo(get_sub_field('image')['url'])?>" > 
                <div class="mx-10 p-4 -mt-20 bg-white relative" >
                    <div class="flex relative mx-auto justify-center p-4">
                        <div style="width: 40%; max-width:135px">
                        <img class="w-100 mx-auto" src="<?php echo get_field('main_logo', 'option')['url']; ?>">
                    </div> 
                        <div class="border-l-2 mx-2" style="width: 10%;margin-left: 10%;">
                        </div>
                        <div style="width: 40%; max-width:135px">
                            <img class="w-100 mx-auto" src="<?php echo get_sub_field('logo_2')['url']; ?>">
                        </div>
                    </div>
                    <p class="font-extrabold text-2xl mt-10"><?php the_field('telephone_number', 'option'); ?></p>
                    <p class="font-extrabold"><?php the_field('email_address', 'option'); ?></p>
                    <p class="mx-auto" style="max-width: 400px"><?php the_field('physical_address', 'option'); ?></p>
                    <div class="flex flex-wrap justify-center container">
                        <?php if(have_rows('social_media_links', 'option')): ?>
                            <?php while (have_rows('social_media_links', 'option')): the_row(); ?>
                                <a href="<?php the_sub_field('link'); ?>">
                                    <img class="w-auto mx-2" style="height: 30px;" src="<?php echo get_sub_field('color_logo')['url']; ?>" />
                                </a>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div> 
            </div>
            <div class="relative w-100 lg:ml-10" style="width: 100%;">
                <?= do_shortcode('[ninja_form id=5]'); ?>
            </div>
        </div>
    </section>
<?php else : ?> 
<?= do_shortcode('[ninja_form id=6]'); ?>
<?php endif ?> 