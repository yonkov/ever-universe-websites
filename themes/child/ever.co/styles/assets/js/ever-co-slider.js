
function addSlider({ selector, speed = 1000, nav = false, items = 1, mouseDrag = true, loop = true, disable = false, responsive = false, parentContainer, arrows = true }) {
	if (document.querySelector(selector)) {
		var sliderContainer = tns({
			container: document.querySelector(selector),
			nav,
			speed,
			items,
			mouseDrag,
			loop,
			disable,
			responsive,
			preventScrollOnTouch: "auto"
		});
		if (arrows && !!parentContainer) {
			var container = document.querySelector(parentContainer);
			var prevArrow = container.querySelector('.ever-co-prev');
			var nextArrow = container.querySelector('.ever-co-next');

			prevArrow.onclick = (() => {
				sliderContainer.goTo("prev");
			});
			nextArrow.onclick = (() => {
				sliderContainer.goTo("next");
			});
		}
	}
}

/*
 * Desktop Sliders
 *  
*/

// Company types slider on the home page
var companySlider = {
	selector: ".customers-container .slider",
	items: 3,
	responsive: {
		325: {
			items: 1,
		},
		600: {
			items: 2,

		},
		1280: {
			items: 3,
			center: true,

		},
	},
	parentContainer: ".customers-container"
}
addSlider(companySlider);

// Business verticals slider on the home page
var businessVerticalsSlider = {
	selector: ".businesses-container .slider",
	items: 4,
	responsive: {
		325: {
			items: 1,
			nav: false
		},
		600: {
			items: 3,
			nav: false
		},
		1120: {
			items: 4
		}
	},
	parentContainer: ".businesses-container"
}
addSlider(businessVerticalsSlider);

/* Sneak peak slider on All solutions page and Single Feature page */
var sneakPeakSlider = {
	selector: ".sneak-peak .slider",
	items: 1,
	parentContainer: ".sneak-peak",
	navPosition: "bottom",
	responsive: {
		280: {
			items: 1,
			nav: true,
		},
		850: {
			// nav: false
		}
	}
}
addSlider(sneakPeakSlider)

/* 
 * Mobile Sliders
 * 
*/

// Button responsive filter slider on top of All solutions page

var solutionsFilterButtonsSlider = {
	selector: '.solutions-filter-btns',
	disable: true,
	loop: false,
	rewind: false,
	responsive: {
		300: {
			disable: false,
			items: 2
		},
		601: {
			disable: true,
		}
	},
	arrows: false
}
addSlider(solutionsFilterButtonsSlider);

// Responsive Features slider (All Solutions page, Single feature page, SIngle Vertical page)
var whatDoYouGetSlider = {
	selector: '.w-d-y-g-container',
	loop: false,
	responsive: {
		300: {
			disable: false,
			items: 1,
		},
		600: {
			disable: false,
			items: 2,
		},
		800: {
			disable: false,
			items: 3
		},
		1025: {
			disable: true,
		}

	},
	arrows: false
}
addSlider(whatDoYouGetSlider);

var companyTypeWhatDoYouGetSlider = {
	selector: '.w-d-y-g-container-2',
	loop: false,
	responsive: {
		300: {
			disable: false,
			items: 1,
		},
		600: {
			disable: false,
			items: 2,
		},
		800: {
			disable: false,
			items: 3
		},
		1025: {
			disable: true,
		}

	},
	arrows: false
}
addSlider(companyTypeWhatDoYouGetSlider);

/* Responsive slider on Single Feature page */
var benefitFilterButtonsSlider = {
	selector: '.benefit-filter-btns',
	loop: false,
	responsive: {
		300: {
			disable: false,
			items: 2
		},
		600: {
			disable: true,
		}
	},
	arrows: false
}
addSlider(benefitFilterButtonsSlider);

/* Career page sliders */
var careerIconsSlider = {
	selector: ".careers-header .career-icons-container",
	// nav: true,
	// navPosition: "bottom",
	responsive: {
		300: {
			items: 3,
			loop: true,
			rewind: true,
			disable: false
		},
		801: {
			disable: true
		}
	},
	arrows: false
}
addSlider(careerIconsSlider);

var careerPicturesSlider = {
	selector: ".careers-header .career-pictures",
	nav: true,
	navPosition: "bottom",
	responsive: {
		300: {
			items: 2,
			loop: true,
			rewind: true,
			disable: false
		},
		801: {
			disable: true
		}
	},
	arrows: false
}
addSlider(careerPicturesSlider);

// Beauty business types slider

var beautySupportTypesSlider = {
	selector: ".beauty .types-icons-container",
	responsive: {
		300: {
			items: 3,
			loop: true,
			rewind: true,
			disable: false
		},

		1025: {
			disable: true
		}
	},
	arrows: false
}
addSlider(beautySupportTypesSlider);
// Beauty get started slider
var beautyGetStartedSlider = {
	selector: ".beauty .h-t-get-started-container",
	responsive: {
		300: {
			items: 1,
			loop: true,
			rewind: true,
			disable: false
		},
		600: {
			items: 2,
			loop: true,
			rewind: true,
			disable: false
		},
		1025: {
			disable: true
		}
	},
	arrows: false
}
addSlider(beautyGetStartedSlider);

// Grocery delivery Get started Slider
var groceryDeliveryGetStartedSlider = {
	selector: ".grocery-delivery .h-t-get-started-container",
	responsive: {
		300: {
			items: 1,
			loop: true,
			rewind: true,
			disable: false
		},
		600: {
			items: 2,
			loop: true,
			rewind: true,
			disable: false
		},
		1025: {
			disable: true
		}
	},
	arrows: false
}
addSlider(groceryDeliveryGetStartedSlider);

// Beauty business types slider

var groceryBusinessTypesSlider = {
	selector: ".grocery-delivery .types-icons-container",
	responsive: {
		300: {
			items: 3,
			loop: true,
			rewind: true,
			disable: false
		},

		1025: {
			disable: true
		}
	},
	arrows: false
}
addSlider(groceryBusinessTypesSlider);
// Single business vertical pages slider

// var singleBusinessVerticalsSlider = {
// 	selector: ".single-post-navigtation-slider",
// 	nav: false,
// 	arrows: false
// }
// addSlider(singleBusinessVerticalsSlider);


//   const postNavSlider = tns({
//     container: '.my-slider',
//     loop: true,
//     items: 1,
//     slideBy: 'page',
//     nav: false,    
//     autoplay: true,
//     speed: 400,
//     autoplayButtonOutput: false,
//     mouseDrag: true,
//     lazyload: true,
//     controlsContainer: "#customize-controls",

//   });
if (document.querySelector('.single-b-v-bottom-slider-container')) {
	// Swiper
	var mySwiper = new Swiper('.swiper-container', {
		slidesPerView: 1,
		spaceBetween: 10,
		// Navigation arrows
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		on: {
			init: function () {
				checkArrow();
			},
			resize: function () {
				checkArrow();
			}
		}

	})

	function checkArrow() {
		var swiperPrev = document.querySelector('.swiper-button-prev');
		var swiperNext = document.querySelector('.swiper-button-next');
		if (window.innerWidth > 1024) {
			swiperPrev.style.display = 'block';
			swiperNext.style.display = 'block';
		} else {
			swiperPrev.style.display = 'none';
			swiperNext.style.display = 'none';
		}
	}
}
// business-needs-container

// Pricing top slider
if(document.querySelector('.business-needs-container')){
    console.log('in business needs')
    var businessNeedsSwiper = new Swiper('.business-needs-container', {
        lazy: false,
        slidesPerView: 1,
        slideToClickedSlide: true,
        breakpoints: {
            1024: {
                slidesPerView: 3,
                loop:false
            },
            600:{
                slidesPerView: 2,
            },
            200:{
                slidesPerView: 1,
            }
     
        }

    })

}



