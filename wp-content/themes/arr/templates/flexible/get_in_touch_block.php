<script> 
    function showHideModal(){
        document.getElementById('modal').classList.toggle("hidden");
        document.querySelector('body').classList.toggle('overflow-hidden');
    }
</script>

<section class="container text-center p-20 <?php if (get_sub_field('hide_on_mobie')):?>hidden sm:block <?php endif ?>"> 
    <h2> 
        Like what you see? Get in touch with our expert team 
    </h2> 
    <p class="mx-auto grayP" style="max-width:875px;"> 
        Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur 
    </p>
    <div class="mt-10 mb-6">
        <!-- pop-up modal if desktop -->
        <div  onclick="showHideModal()" class="inline-flex py-6 px-10 text-white rounded uppercase transform hover:scale-105 cursor-pointer hidden lg:block mx-auto opacity-90" style="background-color: #D50606; width: fit-content; font-family: Roboto; font-weight: 500; letter-spacing: 2.52px;" >
            Start your project
        </div> 
        <!-- link if mobile -->
        <a  href="/start-your-project" class="inline-flex py-6 px-10 text-white rounded uppercase transform hover:scale-105 cursor-pointer lg:hidden mx-auto opacity-90" style="background-color: #D50606; width: fit-content; font-family: Roboto; font-weight: 500 letter-spacing: 2.52px;" >
            Start your project
        </a> 
    </div>
</section> 

<div id="modal" class="hidden fixed">
    <div id="modal-box" style="height: 90vh;  z-index: 9999; top: 50%; left: 50%; transform: translate(-50%, -50%); overflow: auto;" class="bg-white p-10 fixed w-4xl">
    <img class="ml-auto cursor-pointer" onclick="showHideModal()" src="/wp-content/themes/arr/src/img/icons/black-x.svg">
        <?= do_shortcode('[ninja_form id=6]'); ?>
    </div>
</div>
