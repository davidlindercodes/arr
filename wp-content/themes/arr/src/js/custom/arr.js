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



// ajax filters 

