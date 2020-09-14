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

document.addEventListener('DOMContentLoaded', function() {
	$(window).scroll(function(event){
	   var st = $(this).scrollTop();
	   var lastScrollTop = 0;
	   if (st > lastScrollTop){
	       var brandBuilderBounding = document.getElementById('card-brandbuilder').getBoundingClientRect();
				 var specializationBounding = document.getElementById('card-specialization').getBoundingClientRect();
				 var distributionBounding = document.getElementById('card-distributionchannel').getBoundingClientRect();
				 var partnerBuilderBounding = document.getElementById('card-partner').getBoundingClientRect();

	       if (brandBuilderBounding.top >= 0 && brandBuilderBounding.left >= 0 && brandBuilderBounding.right <= window.innerWidth && brandBuilderBounding.bottom <= window.innerHeight) {
	         animateCSS('#card-brandbuilder', 'fadeInUp');
	       }
				 if (specializationBounding.top >= 0 && specializationBounding.left >= 0 && specializationBounding.right <= window.innerWidth && specializationBounding.bottom <= window.innerHeight) {
	         animateCSS('#card-specialization', 'fadeInUp');
	       }
				 if (distributionBounding.top >= 0 && distributionBounding.left >= 0 && distributionBounding.right <= window.innerWidth && distributionBounding.bottom <= window.innerHeight) {
	         animateCSS('#card-distributionchannel', 'fadeInUp');
	       }
				 if (partnerBuilderBounding.top >= 0 && partnerBuilderBounding.left >= 0 && partnerBuilderBounding.right <= window.innerWidth && partnerBuilderBounding.bottom <= window.innerHeight) {
	         animateCSS('#card-partner', 'fadeInUp');
	       }
	   }
	   lastScrollTop = st;
	});
}, false);
