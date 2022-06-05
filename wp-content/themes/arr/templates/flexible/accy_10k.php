<section id="accrington-10k">
    <div class="container accy-10k flex"> 
        <div class="text-wrapper"> 
            <img class="logo" src="<?php echo get_field('header_logo', 'option')['url']; ?>" ?>
            <img class="accy-10k-mb2" src="<?php echo get_sub_field('image2')['url']; ?>">
            <h2>  <?php the_sub_field('title'); ?> </h2> 
            <p> <?php the_sub_field('text'); ?> </p>
            <a href="<?php the_sub_field('button_link'); ?>" target="_blank" rel="noopener noreferrer"> <?php the_sub_field('button_text'); ?> </a>
        </div>
        <div  class="w-100">
            <img class="accy-10k" src="<?php echo get_sub_field('image')['url']; ?>">
            <img class="accy-10k-mb" src="<?php echo get_sub_field('image2')['url']; ?>">
        </div>
    </div> 
</section> 