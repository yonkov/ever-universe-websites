/* Add your custom js here */

jQuery(function ($) {
    /* Global scripts */

    //Dynamic header 
    $(window).scroll(function () {
        if ($(window).scrollTop() >= 50 || window.screen.width <= 1280) {
                $('.light-mode .navbar').css('background', '#fff');
        //    Single business verticals light mode navbar background colors
                $('.massage.light-mode .navbar').css('background', 'linear-gradient(90deg, rgba(248,151,169,1) 0%, rgba(250,130,154,1) 38%, rgba(253,146,151,1) 61%, rgba(254,164,150,1) 100%)');
                $('.cleaning.light-mode .navbar').css('background', 'transparent linear-gradient(270deg, rgba(	233, 233, 255,.9) 0%, rgba(	35, 37, 95,.9) 100%) 0% 0% no-repeat padding-box');
                $('.restaurants.light-mode .navbar').css('background', 'linear-gradient(to right, rgba(210,	79,	69, .9), rgba(237,	75,	73, .9) )');
                $('.beauty.light-mode .navbar').css('background', 'transparent linear-gradient(91deg, #644E1E 0%, #AD8D47CC 49%, #D2C699 100%) 0% 0% no-repeat padding-box');
                $('.grocery-delivery.light-mode .navbar').css('background',  'transparent linear-gradient(90deg, #D2933E 0%, #FED092 100%) 0% 0% no-repeat padding-box');
           
            $('.dark-mode .navbar').css('background', '#071627');
            $('.single-businessverticals.dark-mode .navbar').css('background', '#020508');
            $('.light-mode .navbar').css('box-shadow', 'none');
        } else if ($(window).scrollTop() >= 50 || window.screen.width > 1280) {
            $('body .navbar').css('background', 'transparent');
            $('.light-mode .navbar').css('box-shadow', '0px 1px 10px 0px rgba(0,0,0,0.1)');
        }
    });


    // Remove empty paragraphs
    $('p:empty').remove();

    /* Massage page */

    $('.question-wrapper').click(function () {

        $(this).find('.answer').slideToggle();

        $(this).find('.question').toggleClass('active');

    })



})

var isOpen = false;
let miniMenu = document.getElementById("mini-menu");

miniMenu.addEventListener("click", function (e) {
    e.preventDefault();
    e.stopPropagation();
    if (!isOpen) {
        miniMenu.classList.remove("close");
        miniMenu.classList.add("open");
        isOpen = true;
    } else if (isOpen) {
        miniMenu.classList.remove("open");
        miniMenu.classList.add("close");
        isOpen = false;
    }
})

var windowSize = screen.width;
window.addEventListener('resize', () =>{
    windowSize = screen.width;
    
} );
window.addEventListener('load', (event) => {
    addSubMenuItems();
    if (windowSize <= 850) {
        lightenLanguage();
        addDropdowns();
    }
    if (!!document.querySelector('.all-apps .benefits.row')) {
        showBenefit();
    }
    if (!!getArrayOfClassElements('solution-filter-btn').length > 0) {
        hideShowSolutions();
    }
})

// Adding Ever and Gauzy platform as sub-menu items to primary menu

function addSubMenuItems() {
    var platformsContainer = windowSize <= 850 ? arr(getArrayOfClassElements('products-sub-menu')[1].children)[1]: arr(getArrayOfClassElements('products-sub-menu')[0].children)[1]
    if(  windowSize > 850){
    platformsContainer.className = "products-sub-menu-container-wrapper";
    platformsContainer = platformsContainer.appendChild(document.createElement('div'));
    platformsContainer.className = "products-sub-menu-container row";
    }
    var everPlatform = windowSize <= 850 ? getArrayOfClassElements('ever-platform-sub')[1] : getArrayOfClassElements('ever-platform-sub')[0];
    var gauzyPlatform = windowSize <= 850 ? getArrayOfClassElements('gauzy-platform-sub')[1] : getArrayOfClassElements('gauzy-platform-sub')[0];

    platformsContainer.appendChild(everPlatform);
    platformsContainer.appendChild(gauzyPlatform)
 

    var everSubContent = document.createElement('div');
    var gauzySubContent = document.createElement('div');
    everSubContent.className = "ever-platform-sub-content prducts-sub-content-sub col";
    everSubContent.innerHTML = createSubMenuElement(
        {
            imgSrc: '/wp-content/themes/ever/assets/images/home-images/projects/ever.png',
            title: 'Ever Platform',
            description: 'Open-Source Commerce Platform for On-Demand Economy and Digital Marketplaces',
            firstBtn: 'Open Commerce',
            firstBtnLink: '/features-ever-platform',
            secondBtn: 'Cloud Commerce',
            secondBtnLink: '/features-ever-cloud-platform',
            featuresLink: '/features-ever-platform'
        });

    gauzySubContent.className = "gauzy-platform-sub-content prducts-sub-content-sub col";
    gauzySubContent.innerHTML = createSubMenuElement(
        {
            imgSrc: '/wp-content/themes/ever/assets/images/home-images/projects/gauzy.png',
            title: 'Gauzy Platform',
            description: 'Open-Source Business Management Platform focused on Fairness and Transparency',
            firstBtn: 'Open ERP/CRM',
            firstBtnLink: '/features-gauzy-platform',
            secondBtn: 'Cloud ERP/CRM',
            secondBtnLink: '/features-gauzy-cloud-platform',
            featuresLink: "/features-gauzy-platform"
        });


    everPlatform.appendChild(everSubContent);
    gauzyPlatform.appendChild(gauzySubContent);


    arr(getArrayOfClassElements('ever-platform-sub')[0].children)[0].style.display = "none";
    arr(getArrayOfClassElements('gauzy-platform-sub')[0].children)[0].style.display = "none";

}

function createSubMenuElement(el) {
    return `
	<a href=${el.featuresLink}>
        <img src=${el.imgSrc}  class="products-sub-menu-img"/>
        <div class="products-sub-menu-descr main-title-container">
            <h3>${el.title}</h3> 
            <p>${el.description} </p>
        </div>
    </a>
        <div class="sub-menu-btns col">
            <a href=${el.firstBtnLink} class="sub-btn-links">
                <button class="transparent-btn-ever col-12">
                    ${el.firstBtn}
                </button>
            </a>
            <a href=${el.secondBtnLink} class="sub-btn-links">
                <button class="dark-btn-ever col-12">
                    ${el.secondBtn}
                </button>
            </a>
        </div>
        <h5>Or</h5>
        <a href="/compare" class="sub-btn-links">
            <button class="sub-compare-btn row">
		        <svg width="15.36" height="14.117" viewBox="0 0 15.36 14.117">
  			        <g id="arrows" data-name="arrow" transform="translate(0 -0.022)">
    			        <path id="arrow-1" d="M11.179,6.72l.677.677,3.36-3.36a.48.48,0,0,0,0-.677L11.856,0l-.677.682,2.544,2.539H0v.96H13.723Z" transform="translate(0 0.022)" />
    			        <path id="arrow-2" data-name="Path" d="M15.36,3.221H1.637L4.181.682,3.5,0,.14,3.36a.48.48,0,0,0,0,.677L3.5,7.4l.677-.677L1.637,4.181H15.36Z" transform="translate(0 6.742)" />
  			        </g>
		        </svg>
	            Compare
	        </button>
        </a>

    `;
}

// Adding switch theme and social media icons to mobile-menu

function lightenLanguage() {
    var selectedLanguage = document.querySelector('.hidden-menu .pll-parent-menu-item>a').innerText;
    var allLanguages = arr(document.querySelector('.hidden-menu .pll-parent-menu-item .sub-menu ').childNodes);

    allLanguages = allLanguages.filter(lang => lang.innerText !== undefined);
    allLanguages.map(lang => {
        addRemoveClass(lang.innerText === selectedLanguage, 'selected-lang', 'selected-lang', lang);
    })
}

// add responsive sub menu dropdowns{

function addDropdowns() {
    var dropdowns = arr(document.querySelectorAll('.menu-item-has-children')).filter(item => item.classList.contains("products-sub-menu") || item.classList.contains("solutions-main") || item.classList.contains("company-sub-menu"));
    var dropdownList = dropdowns.reduce(function (acc, cur, i) {
        acc[i] = { 'element': cur, 'isOppened': false };
        return acc
    }, [])

    dropdowns.forEach(dropD => dropD.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        console.log('here')
        goThoughObj(dropD)
    })
    )
    function goThoughObj(dropD) {
        dropdownList.forEach(item => {
            if (item['element'] === dropD) {
                item['isOppened'] = !item['isOppened'];
            }
        })
        dropdownList.forEach(el => {
            addRemoveClass(el['isOppened'], 'oppen-sub', 'oppen-sub', el['element']);
        })
    }
}

// Careers filter buttons
var filterButtons = getArrayOfClassElements('filter-btn');
filterButtons.forEach(btn => {
    btn.addEventListener('click', filterResults);
})


function filterResults({ target }) {
    var allOffers = getArrayOfQuerySelectorAll('.sjb-listing .list-view .list-data');
    allOffers.forEach(jOffer => {
        var jType = jOffer.querySelector('.job-type');
        if (jType.innerText.toLowerCase() !== target.id && target.id !== "all") {
            jOffer.style.display = "none";
        } else if (jType.innerText.toLowerCase() === target.id || target.id === "all") {
            jOffer.style.display = "block";
        }
    })
    toggleFilterBtnClass(target);
}

function toggleFilterBtnClass(btn) {
    filterButtons.forEach(fBtn => {
        addRemoveClass(fBtn.id === btn.id, 'selected-filter', 'selected-filter', fBtn);
    })
}

// All solutions benefits section

if (!!document.querySelector('.all-apps .benefits.row')) {
    var benefitFilterBtns = getArrayOfClassElements('benefit-filter-btn');
    var allBenefitsArticles = arr(document.querySelector('.all-apps .benefits.row').childNodes).filter(article => article.id !== undefined);

    benefitFilterBtns.forEach(btn => {
        btn.addEventListener('click', toggleBenefit);
    })
}


var benefitsObj = {
    openSource: true,
    whiteLabel: false,
    documentation: false,
    quickStart: false
}



function toggleBenefit(e) {
    benefitsObj[e.target.id] = true;
    allBenefitsArticles.forEach(article => {
        if (e.target.id !== article.id) {
            benefitsObj[article.id] = false;
        }
        addRemoveClass(e.target.id === article.id, 'show-benefit', 'show-benefit', article)

    })
    benefitFilterBtns.forEach(btn => {
        addRemoveClass(benefitsObj[btn.id], 'selected-filter-item', 'selected-filter-item', btn);
    })
}

function showBenefit() {
    allBenefitsArticles.forEach(article => {
        addRemoveClass(benefitsObj[article.id], 'show-benefit', '', article);
    })
}

// Solutions

var solutionsObj = {
    trending: true,
    services: false,
    goodsondemand: false,
    transportation: false,
    all: false
}

if (!!getArrayOfClassElements('solution-filter-btn').length > 0) {
    var solutionFilterBtns = getArrayOfClassElements('solution-filter-btn');
    var allSolutions = getArrayOfClassElements('business-card');

    solutionFilterBtns.forEach(btn => {
        btn.addEventListener('click', toggleSolutions);
    })
}

function toggleSolutions({ target }) {
    var clickedFilter = target.id.toLowerCase();
    solutionsObj[clickedFilter] = true;
    Object.keys(solutionsObj).forEach(k => {
        if (k !== clickedFilter) {
            solutionsObj[k] = false;
        }
    })
    solutionFilterBtns.forEach(btn => {
        addRemoveClass(solutionsObj[btn.id.toLowerCase()], 'selected-filter-item', 'selected-filter-item', btn);
    });
    hideShowSolutions();
}

function hideShowSolutions() {
    Object.keys(solutionsObj).forEach(k => {
        if (solutionsObj[k]) {
            allSolutions.forEach(solution => {
                if (!!solution.getAttribute(`data-solution-${k}`) || solutionsObj['all']) {
                    solution.style.display = "flex";
                } else {
                    solution.style.display = "none";
                }
            })
        }
    })
}





// Returning an array from HtmlCpllection
function arr(list) {
    return [...list];
}

function getArrayOfClassElements(className) {
    return arr(document.getElementsByClassName(`${className}`))
}

function getArrayOfQuerySelectorAll(qSelector) {
    return arr(document.querySelectorAll(`${qSelector}`))
}
// Toggle class
function addRemoveClass(condition, addClass, removeClass, element) {
    if (condition) {
        return element.classList.add(`${addClass}`);
    } else if (!condition && removeClass.length > 0) {
        return element.classList.remove(`${removeClass}`);
    }
}

// Comming soon animation

function addCommingSoonAnimation(buttonId, bannerSelector, scrollToId) {
    var learnMoreBtn = document.getElementById(buttonId);
    if (learnMoreBtn) {
        learnMoreBtn.addEventListener('click', (e) => {

            var banner = document.querySelector(bannerSelector);
            window.scrollTo({
                top: document.getElementById(scrollToId).offsetTop - 100,
                left: 0, r: 'smooth'
            });
            banner.animate([
                // keyframes
                { transform: 'scale(1)' },
                { transform: 'scale(1.2)' },
                { transform: 'scale(1.1)' },
                { transform: 'scale(1.05)' },
                { transform: 'scale(1.02)' },
            ], {
                    // timing options
                    duration: 500,
                    iterations: 3
                });
        })
    }
}
// Ever Cloud
addCommingSoonAnimation("learn-more-ever-cloud", ".comming-soon-banner.ever-cloud", "ever-cloud-banner");
// Gauzy Cloud
addCommingSoonAnimation("learn-more-gauzy-cloud", ".comming-soon-banner.gauzy-cloud", "gauzy-cloud-banner");

// Rename buttons in careers page / job offers

arr(document.querySelectorAll('.job-description .btn.btn-primary')).forEach(btn => {
    btn.innerText = "Apply Now";
})