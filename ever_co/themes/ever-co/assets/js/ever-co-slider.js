
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
		1120: {
			items: 3,
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
			items: 2,
		},
		600: {
			items: 3,
		},
		1120: {
			items: 4
		}
	},
	parentContainer: ".businesses-container"
}
addSlider(businessVerticalsSlider);

var sneakPeakSlider = {
	selector: ".sneak-peak .slider",
	items: 1,
	parentContainer: ".sneak-peak"
}
addSlider(sneakPeakSlider)

//  RESPONSIVE Sliders
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

// What do you get (all vericals page)
var whatDoYouGetSlider = {
	selector: '.w-d-y-g-container',
		loop: false,
	responsive: {
		300: {
			items: 1,
			disable: false,
			mouseDrag: true,
		},
		600: {
			items: 1,
			disable: false,
			mouseDrag: true,
		},
		800: {
			disable: true,
		}
	},
	arrows: false
}
addSlider(whatDoYouGetSlider);

// Button responsive sliders on all solutions page

var solutionsFilterButtonsSlider = {
	selector: '.solutions-filter-btns',
	disable: true,
	loop: false,
	rewind: false,
	responsive: {
		300: {
			gutter: 150,
			items: 3,
			disable: false,
		},
		600: {
			disable: true,
		}
	},
	arrows: false
}
addSlider(solutionsFilterButtonsSlider);


var benefitFilterButtonsSlider = {
	selector: '.benefit-filter-btns',
	loop: false,
	responsive: {
		300: {
			gutter: 150,
			items: 3,
			disable: false,
		},
		600: {
			disable: true,
		}
	},
	arrows: false
}
addSlider(benefitFilterButtonsSlider);
