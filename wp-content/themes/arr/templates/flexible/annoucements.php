<?php if (have_rows("annoucements", "option")) : ?>
    <section id="announcement-bar">
        <?php $announcementotaltindex = 0; while (have_rows("annoucements", "option")):the_row();  if (strtotime(get_sub_field('end_date')) > strtotime(date('jS F Y'))): $announcementotaltindex++; endif; endwhile; if ($announcementotaltindex > 1) : ?>
        <div class="splide splide2 text-center" data-splide='{ "type":"loop", "perPage":1, "lazyLoad":"nearby", "arrows":1, "pagination": 0, "autoplay": 1, "interval": 10000 }'>
            <div class="splide__track flex-1 flex-row">
                <ul class="splide__list">
                    <?php $announcementindex = 0; while (have_rows("annoucements", "option")):the_row();
                    
                    if (strtotime(get_sub_field('end_date')) > strtotime(date('jS F Y'))):
                    $announcementindex++; ?>
                        <li class="splide__slide">
                            <p> Announcement <?php echo $announcementindex . " / " . $announcementotaltindex ?> : <?php the_sub_field('announcement'); ?>  <?php if (get_sub_field('link_text')): ?> <a href="<?php the_sub_field('link_url') ?>" target="_blank"> <?php the_sub_field('link_text') ?>  </a> <?php endif; ?> </p>
                        </li> 
                    <?php endif; endwhile; ?>
                </ul>
            </div>
        </div>
        <?php else: while (have_rows("annoucements", "option")):the_row();?>
            <p class="text-center pb-2"> Announcement 1/ 1 : <?php the_sub_field('announcement');?> <?php if (get_sub_field('link_text')): ?> <a href="<?php the_sub_field('link_url') ?>" target="_blank"> <?php the_sub_field('link_text') ?>  </a> <?php endif; ?> </p>
        <?php endwhile; endif; ?>
    </section>       
<?php endif; ?>

