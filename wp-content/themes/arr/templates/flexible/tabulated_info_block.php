<script> 

//tabulated content function for desktop, one tab open at a time
    function show($index){
        $content = 'content' + $index;
        $menutitle = 'menutitle' + $index;
        for (let e of document.getElementsByClassName("show")) { e.classList.remove("show") }
        document.getElementById($content).classList.add("show");
        for (let e of document.getElementsByClassName("selected")) { e.classList.remove("selected") }
        document.getElementById($menutitle).classList.add("selected");
    }

//accordion content for mobile (can have multiple open)
    function toggle($index){
        $content = 'content' + $index; 
        $title = 'title' + $index;
        $icon1 = 'icon1' + $index;
        $icon2 = 'icon2' + $index;
        document.getElementById($content).classList.toggle("show");
        document.getElementById($title).classList.toggle("blue");
        document.getElementById($icon1).classList.toggle("show");
        document.getElementById($icon2).classList.toggle("show");
    }
</script>

<!-- desktop view -->
<?php if( have_rows('info_section')): ?>
    <section class="container hidden lg:block overflow-hidden sectionPadding"> 
        <div class="flex">
            <div>
                <?php while( have_rows('info_section') ): the_row(); ?> 
                   <div class="menu-title font-extrabold tracking-wide flex <?php if(get_row_index()==1): ?> selected <?php endif ?>" id="menutitle<?php echo get_row_index(); ?>" onclick="show(<?php echo get_row_index(); ?>)" style="width: 300px;">
                         <?php the_sub_field('title'); ?>
                        <img class="h-5 pt-1 arrow-black ml-auto" src="/wp-content/themes/arr/src/img/icons/arrow-right-solid.svg">
                    </div> 
                <?php endwhile; ?>
            </div>
            <div>
                <?php while( have_rows('info_section') ): the_row(); ?> 
                    <div id="content<?php echo get_row_index(); ?>" class="content hidden <?php if (get_row_index() == 1): ?>show<?php endif; ?> ">
                        <h2 class="mb-0 pb-2 text-3xl tracking-wider uppercase"><?php the_sub_field('title'); ?></h2>
                    <hr/> 
                       <div class="mt-8" style="font-family: Roboto-Regular; letter-spacing: 0.9px;"> 
                        <?php if (get_sub_field('choose_template') == 'custom') : ?>
                            <?php the_sub_field('content'); ?> </div>
                        <?php endif ; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

<!-- tablet and mobile view -->
    <section class="container lg:hidden mx-auto overflow-hidden sectionPadding" style="max-width: 750px;"> 
            <?php while( have_rows('info_section') ): the_row(); ?> 
                <div id="title1<?php echo get_row_index(); ?>" class="flex font-extrabold tracking-wide py-5 uppercase <?php if (get_row_index() == 1): ?>blue<?php endif; ?>" onclick="toggle(1<?php echo get_row_index(); ?>)" style="border-top: 1px solid #E8E8E8;">
                    <?php the_sub_field('title'); ?>
                    <img id="icon11<?php echo get_row_index(); ?>" class="h-6 arrow-black ml-auto hidden <?php if (get_row_index() != 1): ?>show<?php endif; ?>" src="/wp-content/themes/arr/src/img/icons/black-plus-icon.svg">
                    <img id="icon21<?php echo get_row_index(); ?>" class="h-6 arrow-red ml-auto hidden make-it-blue <?php if (get_row_index() == 1): ?>show<?php endif; ?>" src="/wp-content/themes/arr/src/img/icons/circle-minus-regular.svg">
                </div>
                <div id="content1<?php echo get_row_index(); ?>" class="content hidden <?php if (get_row_index() == 1): ?>show<?php endif; ?> ">
                    <div class="mt-2 sm:mt-6 grayC"> <?php the_sub_field('content'); ?> </div>
                </div>
            <?php endwhile; ?>
    </section>

<?php endif; ?>
