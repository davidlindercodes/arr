
<div style="background-color: rgba(237,241,245);"> 
  <section class="relative mx-auto sm:text-center container mx-auto py-10" >
<!-- header -->
<h2 class="text-3xl sm:text-4xl font-bold mx-10 md:mx-0 text-center mb-10">  <?php the_sub_field('circle_points_header') ?> </h2> 
<!-- description -->
    <div class="text-md sm:text-xl opacity-70 tracking-wide mt-8 mx-10 md:mx-0">  
      <?php the_sub_field('description') ?>
    </div>
<!-- Regular non-slider section for desktop -->
    <div class="hidden xl:block xl:flex xl:block flex-1 justify-center flex-row flex-wrap text-center">
      <?php while (have_rows("each_point")):the_row(); ?>
          <div class="relative inline-flex mx-0 px-4">
            <div class="service-card" >
              <img class="mx-auto mt-14 rounded-full services-image" src="<?php echo get_sub_field('photo')['url']; ?>" alt="<?php the_sub_field("title"); ?>"/>
              <h3 class="text-2xl 2xl:text-3xl text-blue tracking-wide mt-3 ">
                <?php the_sub_field("title"); ?> 
              </h3>
              <p class="mb-0 poacity-50" style="height: 47px;"><strong> <?php the_sub_field("sub-title"); ?> </strong> </p>
              <p class="text-base 2xl:text-lg mb-10"> 
                <?php the_sub_field("description"); ?> 
              </p>
            </div>
          </div>
      <?php endwhile; ?> 
    </div>
<!-- slider for narrow screens -->
    <div class="splide splide2 xl:hidden text-center" 
          data-splide='{
              "type":"loop",
              "perPage":4,
              "lazyLoad":"nearby",
              "arrows":0,
                "breakpoints": {
                        "1024": {
                            "perPage": 3
                        },
                        "768px": {
                            "perPage": 3
                        },
                        "640": {
                            "perPage": 1 
                        }
                    }
          }'>
      <div class="splide__track flex-1 flex-row">
        <ul class="splide__list">
          <?php while (have_rows("each_point")):the_row(); ?>
              <li class="splide__slide">
                <div class="relative inline-flex mx-auto px-0">
                  <div class="service-card" >
                    <img class="mx-auto mt-14 rounded-full services-image" src="<?php echo get_sub_field('photo')['url']; ?>" alt="<?php the_sub_field("title"); ?>" />
                    <h3 class="text-3xl text-blue tracking-wide mt-3 ">
                    <?php the_sub_field("title"); ?> 
                    </h3>
                    <p><strong> <?php the_sub_field("sub-title"); ?> </strong> </p>
                    <p class="text-lg mt-4 mb-16"> 
                       <?php the_sub_field("description"); ?> 
                    </p>
                  </div>
                </div>
              <li>
          <?php endwhile; ?>
        </ul>
      </div>
    </div>
  </section>
</div>