// Menu

const animateCSS = (element, animation, prefix = 'animate__') =>
  // We create a Promise and return it
  new Promise((resolve, reject) => {
    const animationName = `${prefix}${animation}`;
    const node = document.querySelector(element);

    node.classList.add(`animate__delay-0.5s`);
    node.style.visibility = "visible";
    node.classList.add(`${prefix}animated`, animationName);


  });

function getCurrentPage() {
    var path = window.location.pathname;
    return path.split("/").pop();
}

document.addEventListener('DOMContentLoaded', function() {

    $('#brandCarousel').carousel({
        interval: 10000
    })

    $('.carousel .carousel-item').each(function(){
        var minPerSlide = 3;
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        for (var i=0;i<minPerSlide;i++) {
            next=next.next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }

            next.children(':first-child').clone().appendTo($(this));
        }
    });


    $('.navbar .navbar-nav > li.dropdown').hover(function() {
        $('ul.dropdown-menu', this).stop(true, true).slideDown('fast');
        $(this).addClass('show');
    }, function() {
        $('ul.dropdown-menu', this).stop(true, true).slideUp('fast');
        $(this).removeClass('show');
    });

    if (getCurrentPage() === 'home') {
        $(window).scroll(function(event){
            var st = $(this).scrollTop();
            var lastScrollTop = 0;
            if (st > lastScrollTop){
                const homeNewsSection = document.getElementById('news-section').getBoundingClientRect();
                const homeBrochureSection = document.getElementById('brochure-section').getBoundingClientRect();

                if (homeNewsSection.top >= 0 && homeNewsSection.left >= 0 && homeNewsSection.right <= window.innerWidth && homeNewsSection.bottom <= window.innerHeight) {
                    animateCSS('#news-section', 'fadeInUp');
                }
                else if (homeBrochureSection.top >= 0 && homeBrochureSection.left >= 0 && homeBrochureSection.right <= window.innerWidth && homeBrochureSection.bottom <= window.innerHeight) {
                    animateCSS('#brochure-section', 'fadeInUp');
                }
            }
        });
    }
    else if (getCurrentPage() === 'over-ons') {
        $(window).scroll(function(event){
            var st = $(this).scrollTop();
            var lastScrollTop = 0;
            if (st > lastScrollTop){
                const brandBuilderBounding = document.getElementById('card-brandbuilder').getBoundingClientRect();
                const specializationBounding = document.getElementById('card-specialization').getBoundingClientRect();
                const distributionBounding = document.getElementById('card-distributionchannel').getBoundingClientRect();
                const partnerBuilderBounding = document.getElementById('card-partner').getBoundingClientRect();


                if (brandBuilderBounding.top >= 0 && brandBuilderBounding.left >= 0 && brandBuilderBounding.right <= window.innerWidth && brandBuilderBounding.bottom <= window.innerHeight) {
                    animateCSS('#card-brandbuilder', 'fadeInUp');
                }
                else if (specializationBounding.top >= 0 && specializationBounding.left >= 0 && specializationBounding.right <= window.innerWidth && specializationBounding.bottom <= window.innerHeight) {
                    animateCSS('#card-specialization', 'fadeInUp');
                }
                else if (distributionBounding.top >= 0 && distributionBounding.left >= 0 && distributionBounding.right <= window.innerWidth && distributionBounding.bottom <= window.innerHeight) {
                    animateCSS('#card-distributionchannel', 'fadeInLeft');
                }
                else if (partnerBuilderBounding.top >= 0 && partnerBuilderBounding.left >= 0 && partnerBuilderBounding.right <= window.innerWidth && partnerBuilderBounding.bottom <= window.innerHeight) {
                    animateCSS('#card-partner', 'fadeInRight');
                }
            }
            lastScrollTop = st;
        });
    }
}, false);
