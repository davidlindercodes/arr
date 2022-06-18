// Mobile Slideout menu

let menuEl = document.querySelectorAll('.menu-toggle');

for(let i =0; i < menuEl.length; i++) {
    menuEl[i].onclick = function() { 
        let body = document.querySelector('body');
        let slideout = document.querySelector('.slideout');
        body.classList.toggle('menu-open');
        slideout.classList.toggle('active');
    };
};

// Initialize Splide JS

document.addEventListener('DOMContentLoaded', function () {
    var elms = document.getElementsByClassName( 'splide' );
    for ( var i = 0, len = elms.length; i < len; i++ ) {
        new Splide( elms[ i ] ).mount();
    }
});



// Ajax Filters JS Code
"use strict";
$ = jQuery;
jQuery(function($) {

    /*
    ** Filters Init
    */    
    MCF_FILTERS.init();    
});

const MCF_FILTERS = {

    init: function(argument) {
        this.eventHandler();
    },
    
    eventHandler: function(){

        /**
         * Submit the event form filters
        */
        jQuery(document).on('submit', '.filter-form-js', function(e){
            e.preventDefault();

            MCF_FILTERS.blockUI('.ormwc-wrapper', 'start');
            $('.filter-form-js input[name="mcf_current_page"]').val(1);
            var data = jQuery(this).serialize();

            jQuery.post(mcf_vars.ajax_url, data, function(resp) {
                console.log(resp);  
                if (resp.status == "success") {
                   jQuery('.wpposts-wrapper').html(resp.html);
                }
                
                MCF_FILTERS.blockUI('.ormwc-wrapper', 'end');              
            }, 'json');

        });

        /**
         * Pagination Ajax
        */
        jQuery(document).on('click', '.pagination a', function(e){
            e.preventDefault();

            var $this = $(this);

            var $page = parseInt($this.attr('href').replace(/\D/g,''));

            $('.filter-form-js input[name="mcf_current_page"]').val($page);
            var data = jQuery('.filter-form-js').serialize();

            jQuery.post(mcf_vars.ajax_url, data, function(resp) {
                console.log(resp);  
                if (resp.status == "success") {
                   jQuery('.wpposts-wrapper').html(resp.html);
                }
            }, 'json');
        });
    },

    blockUI: function(selector, type){
        
        if (type == 'start') {

            $.blockUI({ css: {
                border: 'none', 
                padding: '15px', 
                backgroundColor: '#000', 
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                opacity: .5, 
                color: '#fff' 
            }});
        }else{
            $.unblockUI()
        }
    },
} 