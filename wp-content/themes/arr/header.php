<!DOCTYPE html>
<html lang="en" style="margin-top: 0px!important">

<script> 
function burgermenu() {
    document.getElementById("line1").classList.toggle( "mobile-nav-button__line--1");
    document.getElementById("line2").classList.toggle( "mobile-nav-button__line--2");  
    document.getElementById("line3").classList.toggle( "mobile-nav-button__line--3");  
    document.getElementById("mobilemenu").classList.toggle('mobile-menu--open');
    document.getElementById("burger").classList.toggle('absolute');
}

</script>
           


    <?php get_template_part('templates/head'); ?>
    <body <?php body_class(); ?>>
    <header>
        <div class="flex lg:block items-center justify-between header-margin">
        <a href="/" class="headerlogo lg:justify-center"> 
            <img class="placeholder" src="<?php echo get_field('header_logo', 'option')['url']; ?>"  />
            Accrington Road Runners
        </a>
            <div class="flex flex-col lg:w-full lg:justify-between">
                <div class="hidden lg:flex justify-center content-center text-base xl:text-lg uppercase" style="letter-spacing: 1.06px;">
                    <?php wp_nav_menu( array( 'theme_location' => 'main-nav' ) ); ?>
                </div>
                <div class="block lg:hidden">
                    <div id="burger" class="mobile-nav-button" onclick="burgermenu()">
                        <div id="line1" class="mobile-nav-button__line"></div>
                        <div id="line2" class="mobile-nav-button__line"></div>
                        <div id="line3" class="mobile-nav-button__line"></div>
                    </div>

                    <nav id="mobilemenu" class="mobile-menu" > 
                        <?php wp_nav_menu( array( 'theme_location' => 'main-nav' ) ); ?>
                    </nav>
                </div>
            </div>
        </div>
    </header>


    <main>
