<?php 
    
    // defining icons by file name inside the /icons image folder
    
    $decades_of_expertise_img = 'red-smiley-face';
    $aftercare_packages_img = 'love-house';
    $award_winning_designs_img = 'award';
    $available_nationwide_img = 'thumbs-up';
    $over_xxx_live_sites_img = 'red-building-icon';
    $industry_leading_partners_img = 'red-handshake';
    $highest_quality_materials_img = 'red-paint-roller';

    
    // defining itles 

    $decades_of_expertise_title = 'decades of expertise';
    $aftercare_packages_title = 'aftercare packages';
    $award_winning_designs_title = 'award winning designs';
    $available_nationwide_title = 'available nationwide';
    $over_xxx_live_sites_title = 'over xxx live sites';
    $industry_leading_partners_title = 'Award-winning Contractors';
    $highest_quality_materials_title = 'highest quality materials';

    // defining descriptions 

    $decades_of_expertise_text = 'We have over 30 years in the industry';
    $aftercare_packages_text = 'Neque porro quisquam est qui ';
    $award_winning_designs_text = 'We&apos;re recognised by the biggest names in the industry.';
    $available_nationwide_text = 'Neque porro quisquam est qui ';
    $over_xxx_live_sites_text = 'Neque porro quisquam est qui ';
    $industry_leading_partners_text = 'We&apos;re recognised by the biggest names in the industry.';
    $highest_quality_materials_text = 'We only work with the best, to give you the best.';
    
    ?> 

<section class="relative md:px-44 lg:px-32 xl:px-0">
    <div class="container mx-32 pt-0 grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-4" style="display: flex;
    justify-content: center;">

        <!-- Coloumn 1 -->
        <div class="p-5 hidden xl:flex" style="background-color: #FFF8F8; width: fit-content;">
            <img class="ml-0 h-10 mt-2" src="<?php bloginfo('stylesheet_directory'); ?>/src/img/icons/<?php echo ${get_sub_field('column_one'). '_img'}  ?>.svg">
            <div class="ml-3">
                <p class="font-bold mb-0 uppercase text-lg tracking-wide"><?php echo ${get_sub_field('column_one'). '_title'}  ?></p>
                <p class="text-gray-500 mb-0"><?php echo ${get_sub_field('column_one'). '_text'}  ?></p>
            </div>
        </div>

        <!-- Coloumn 2 -->
        <div class="p-5 flex justify-center lg:justify-start" style="background-color: #FFF8F8; width: fit-content;">
            <img class="ml-0 h-10 mt-2" src="<?php bloginfo('stylesheet_directory'); ?>/src/img/icons/<?php echo ${get_sub_field('column_two'). '_img'}  ?>.svg">
            <div class="ml-3">
                <p class="font-bold mb-0 uppercase text-lg tracking-wide"><?php echo ${get_sub_field('column_two'). '_title'}  ?></p>
                <p class="text-gray-500 mb-0"><?php echo ${get_sub_field('column_two'). '_text'}  ?></p>
            </div>
        </div>

        <!-- Coloumn 3 -->
            <div class="p-5 flex justify-center lg:justify-start hidden lg:flex" style="background-color: #FFF8F8; width: fit-content;">
            <img class="ml-0 h-10 mt-2" src="<?php bloginfo('stylesheet_directory'); ?>/src/img/icons/<?php echo ${get_sub_field('column_three'). '_img'}  ?>.svg">
            <div class="ml-3">
                <p class="font-bold mb-0 uppercase text-lg tracking-wide"><?php echo ${get_sub_field('column_three'). '_title'}  ?></p>
                <p class="text-gray-500 mb-0"><?php echo ${get_sub_field('column_three'). '_text'}  ?></p>
            </div>
        </div>
    </div>
</section> 