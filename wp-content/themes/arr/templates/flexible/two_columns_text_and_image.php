<?php if ( get_sub_field('image')): ?> 
    <section <?php if(get_sub_field("section-id")) : ?> id="<?php the_sub_field('section-id'); ?>" <?php endif; ?> class="mx-auto mainContent smallerSectionPadding" <?php if ( get_sub_field('background-yellow')) : ?>style="background-color: #EBFF00;" <?php endif; ?>>
        <div class="relative w-full mx-auto justify-center"> 
            <div class="<?php if ( !get_sub_field('full_width_image')) : ?> container <?php endif ?> two-col justify-center" >
                <div class="<?php if ( !get_sub_field('full_width_image')) : ?> mr-20 w-full<?php endif ?>
                            <?php if ( get_sub_field('position')=='right') : ?> order-2 right-col <?php else : ?> left-col <?php endif ?>" > 
                    <img style="<?php if ( get_sub_field('full_width_image')) : ?>width: -webkit-fill-available; max-width: 900px<?php else : ?> width: inherit <?php endif ?>" 
                        class="mb-6 sm:mb-10 lg:mb-0 <?php if ( !get_sub_field('full_width_image')) : ?>mx-auto lg:mx-0<?php else : ?>ml-auto mr-10<?php endif ?> my-auto" src="<?php echo get_sub_field('image')['url']; ?>" >
                </div>
                <div class="mb-auto  <?php if ( get_sub_field('full_width_image')) : ?>containerSM<?php else : ?> w-full <?php endif ?> <?php if ( get_sub_field('position')=='right') : ?> order-1 left-col pr-10 <?php else : ?> right-col <?php endif ?>">
                    <div class="two-col-text">    
                        <h2 class="text-center lg:text-left lg:mt-0 mt-6 lg:mt-0 tracking-wide uppercase mx-auto lg:mx-0 font-bold text-black"> 
                           <?php the_sub_field('title'); ?>
                        </h2>
                        <div class=" mb-0 text-center lg:text-left"> <?php the_sub_field('text'); ?></div>
                            <?php if (get_sub_field('button_text')):  ?>
                                <div class="text-center lg:text-left mt-auto">
                                    <a class="blue-link-solid mt-10 ml-auto lg:ml-0" 
                                    href="<?php the_sub_field('button_link'); ?>" title="<?php the_sub_field('button_text'); ?>"  target="_blank" rel="noopener noreferrer">
                                        <?php the_sub_field('button_text'); ?>
                                    </a>
                                </div>
                            <?php endif ?>
                        </div >
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php else: ?>
    <section <?php if(get_sub_field("section-id")) : ?> id="<?php get_sub_field('section-id'); ?>" <?php endif; ?> class="mx-auto mainContent smallerSectionPadding" <?php if ( the_sub_field('background-yellow')) : ?>style="background-color: #EBFF00;" <?php endif; ?>>
        <div class="relative w-full mx-auto justify-center"> 
            <div class="<?php if ( !get_sub_field('full_width_image')) : ?> container <?php endif ?> justify-center" >
                <div class="mb-auto w-full order-1"> 
                    <h2 class="text-center lg:mt-0 mt-6 lg:mt-0 tracking-wide uppercase mx-auto lg:mx-0 font-bold text-black"> <?php the_sub_field('title'); ?></h2>
                    <div class=" mb-0 text-center" style="max-width: 800px; margin-left: auto; margin-right: auto;"> <?php the_sub_field('text'); ?></div>
                        <?php if (get_sub_field('button_text')):  ?>
                            <div class="text-center mt-auto">
                                <a class="blue-link-solid mt-10 mx-auto" 
                                href="<?php the_sub_field('button_link'); ?>" title="<?php the_sub_field('button_text'); ?>"  target="_blank" rel="noopener noreferrer">
                                    <?php the_sub_field('button_text'); ?>
                                </a>
                            </div>
                        <?php endif ?>
                    </div >
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>