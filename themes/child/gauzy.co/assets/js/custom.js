/* Add your custom js here */

jQuery(function ($) {
  /* Global scripts */

  //Dynamic header
  $(window).scroll(function () {
    if ($(window).scrollTop() >= 50 || window.screen.width <= 1280) {
      $(".light-mode .navbar").css("background", "#fff");
      $(".light-mode .navbar").css("box-shadow", "none");
      $(".dark-mode .navbar").css("background", "#3C3E5B");
     
    } else if ($(window).scrollTop() >= 50 || window.screen.width > 1280) {
      $("body .navbar").css("background", "transparent");
      $(".light-mode .navbar").css(
        "box-shadow",
        "0px 1px 10px 0px rgba(0,0,0,0.1)"
      );
    }
  });

  // Remove empty paragraphs
  $("p:empty").remove();

  /* FAQ Sections */

  $(".question-wrapper").click(function () {
    $(this).find(".answer").slideToggle();

    $(this).find(".question").toggleClass("active");
  });
});


// Mini menu /////////

var isOpen = false;
let miniMenu = document.getElementById("mini-menu");
let mobileMenu = [...document.getElementsByClassName("hidden-menu")][0];

miniMenu.addEventListener("click", function (e) {
  e.preventDefault();
  e.stopPropagation();
  if (!isOpen) {
    miniMenu.classList.remove("close");
    miniMenu.classList.add("open");

    mobileMenu.classList.remove("h-m-close");
    mobileMenu.classList.add("h-m-open");

    isOpen = true;
  } else if (isOpen) {
    miniMenu.classList.remove("open");
    miniMenu.classList.add("close");

    mobileMenu.classList.remove("h-m-open");
    mobileMenu.classList.add("h-m-close");

    isOpen = false;
  }
});

var windowSize = screen.width;
window.addEventListener("resize", () => {
  windowSize = screen.width;
});
window.addEventListener("load", () => {
  addSubMenuItems();
  if (windowSize <= 1024) {
    // lightenLanguage();
    addDropdowns();
  }
  if (!!document.querySelector('.benefits')) {
      showBenefit();
  }
  if (!!getArrayOfClassElements("solution-filter-btn").length > 0) {
    hideShowSolutions();
  }
});

// Adding Ever and Gauzy platform as sub-menu items to primary menu

function addSubMenuItems() {
  // Features
  var featureDropdown = document.querySelector(".navbar .features-gauzy-dropdown ul");
  var triangle = document.createElement('div');
  triangle.className = "features-gauzy-dropdown-triangle"
  featureDropdown.prepend(triangle)
  var dropdownFeatures = [...document.getElementsByClassName("dropdown-feature")];
  dropdownFeatures.forEach(feature=>{
    feature.innerHTML += `<p class="dropdown-feature-descr"> Gauzy has a self-hosted edition for tech savvy people </p>`;
  })


  // Products
  var platformsContainer =
    windowSize <= 1024
      ? arr(getArrayOfClassElements("products-sub-menu")[1].children)[1]
      : arr(getArrayOfClassElements("products-sub-menu")[0].children)[1];

  var compareBtn = document.createElement("div");
  compareBtn.className = "w-100"
  compareBtn.innerHTML = `
    <div class="row flex-center"> 
        <a href="/compare">
            <button class="transparent-btn-red">
            <svg width="15.36" height="14.117" viewBox="0 0 15.36 14.117">
                <g id="arrows" data-name="arrow" transform="translate(0 -0.022)" fill="var(--warning-color)">
                    <path id="arrow-1" d="M11.179,6.72l.677.677,3.36-3.36a.48.48,0,0,0,0-.677L11.856,0l-.677.682,2.544,2.539H0v.96H13.723Z" transform="translate(0 0.022)" />
                    <path id="arrow-2" data-name="Path" d="M15.36,3.221H1.637L4.181.682,3.5,0,.14,3.36a.48.48,0,0,0,0,.677L3.5,7.4l.677-.677L1.637,4.181H15.36Z" transform="translate(0 6.742)" />
                </g>
            </svg>
                Compare
            </button>
        </a>
    </div>`;

  if (windowSize > 1024) {
    platformsContainer.className = "products-sub-menu-container-wrapper";
    platformsContainer = platformsContainer.appendChild(
      document.createElement("div")
    );
    platformsContainer.className = "products-sub-menu-container e-row";
  }
  var selfHosted =
    windowSize <= 1024
      ? getArrayOfClassElements("self-hosted-sub")[1]
      : getArrayOfClassElements("self-hosted-sub")[0];
  var cloudBased =
    windowSize <= 1024
      ? getArrayOfClassElements("cloud-based-sub")[1]
      : getArrayOfClassElements("cloud-based-sub")[0];

  platformsContainer.appendChild(selfHosted);
  platformsContainer.appendChild(cloudBased);
  platformsContainer.appendChild(compareBtn);

  var selfHostedSubContent = document.createElement("div");
  var cloudBasedSubContent = document.createElement("div");
  selfHostedSubContent.className =
    "self-hosted-sub-content prducts-sub-content-sub e-col";
  selfHostedSubContent.innerHTML = createSubMenuElement({
    imgSrc: "/wp-content/themes/gauzy/assets/img/self-hosted.svg",
    title: "Self Hosted",
    description: "Gauzy has a self-hosted edition for tech savvy people",
    firstBtn: "Explore",
    firstBtnLink: "/self-hosted",
    secondBtn: "Download",
    secondBtnLink: "/",
    featuresLink: "/self-hosted",
  });

  cloudBasedSubContent.className =
    "cloud-based-sub-content prducts-sub-content-sub e-col";
  cloudBasedSubContent.innerHTML = createSubMenuElement({
    imgSrc: "/wp-content/themes/gauzy/assets/img/cloud-based.svg",
    title: "Cloud-Based",
    description: "Cloud-based edition is coming soon for all users",
    firstBtn: "Explore",
    firstBtnLink: "/cloud-based",
    secondBtn: "Sign Up",
    secondBtnLink: "/",
    featuresLink: "/cloud-based",
  });

  selfHosted.appendChild(selfHostedSubContent);
  cloudBased.appendChild(cloudBasedSubContent);

  arr(getArrayOfClassElements("self-hosted-sub")[0].children)[0].style.display =
    "none";
  arr(getArrayOfClassElements("cloud-based-sub")[0].children)[0].style.display =
    "none";
}

function createSubMenuElement(el) {
  return `
    <div class="e-col align-center">
    <a href=${el.featuresLink}>
        <div class="menu-icon-container">
            <img src=${el.imgSrc}  class="products-sub-menu-img"/>
        </div>
        <div class="products-sub-menu-descr ">
            <h6 class="bold">${el.title}</h6> 
            <p class="d-w-55">${el.description} </p>
        </div>
    </a>
        <div class="sub-menu-btns e-col align-center w-100">
            <a href=${el.firstBtnLink} class="sub-btn-links">
                <button class="dark-btn-gauzy d-w-80">
                    ${el.firstBtn}
                </button>
            </a>
            <a href=${el.secondBtnLink} class="sub-btn-links">
                <button class="transparent-btn-gauzy-main d-w-80">
                    ${el.secondBtn}
                </button>
            </a>
        </div>
  
    </div>
    `;
}

// Create all features dropdown



{
  /* <a href="/compare" class="sub-btn-links">
<button class="sub-compare-btn e-row">
    <svg width="15.36" height="14.117" viewBox="0 0 15.36 14.117">
          <g id="arrows" data-name="arrow" transform="translate(0 -0.022)">
            <path id="arrow-1" d="M11.179,6.72l.677.677,3.36-3.36a.48.48,0,0,0,0-.677L11.856,0l-.677.682,2.544,2.539H0v.96H13.723Z" transform="translate(0 0.022)" />
            <path id="arrow-2" data-name="Path" d="M15.36,3.221H1.637L4.181.682,3.5,0,.14,3.36a.48.48,0,0,0,0,.677L3.5,7.4l.677-.677L1.637,4.181H15.36Z" transform="translate(0 6.742)" />
          </g>
    </svg>
    Compare
</button>
</a> */
}

// Adding switch theme and social media icons to mobile-menu

// function lightenLanguage() {
//     var selectedLanguage = document.querySelector('.hidden-menu .pll-parent-menu-item>a').innerText;
//     var allLanguages = arr(document.querySelector('.hidden-menu .pll-parent-menu-item .sub-menu ').childNodes);

//     allLanguages = allLanguages.filter(lang => lang.innerText !== undefined);
//     allLanguages.map(lang => {
//         addRemoveClass(lang.innerText === selectedLanguage, 'selected-lang', 'selected-lang', lang);
//     })
// }

// add responsive sub menu dropdowns{

function addDropdowns() {
  var dropdowns = arr(
    document.querySelectorAll(".menu-item-has-children")
  ).filter(
    (item) =>
      item.classList.contains("products-sub-menu") ||
      item.classList.contains("solutions-main") ||
      item.classList.contains("company-sub-menu")
  );
  var dropdownList = dropdowns.reduce(function (acc, cur, i) {
    acc[i] = { element: cur, isOppened: false };
    return acc;
  }, []);

  dropdowns.forEach((dropD) =>
    dropD.addEventListener("click", (e) => {
      e.preventDefault();
      e.stopPropagation();
      console.log("here");
      goThoughObj(dropD);
    })
  );
  function goThoughObj(dropD) {
    dropdownList.forEach((item) => {
      if (item["element"] === dropD) {
        item["isOppened"] = !item["isOppened"];
      }
    });
    dropdownList.forEach((el) => {
      addRemoveClass(el["isOppened"], "oppen-sub", "oppen-sub", el["element"]);
    });
  }
}

// Careers filter buttons
// var filterButtons = getArrayOfClassElements('filter-btn');
// filterButtons.forEach(btn => {
//     btn.addEventListener('click', filterResults);
// })

// function filterResults({ target }) {
//     var allOffers = getArrayOfQuerySelectorAll('.sjb-listing .list-view .list-data');
//     allOffers.forEach(jOffer => {
//         var jType = jOffer.querySelector('.job-type');
//         if (jType.innerText.toLowerCase() !== target.id && target.id !== "all") {
//             jOffer.style.display = "none";
//         } else if (jType.innerText.toLowerCase() === target.id || target.id === "all") {
//             jOffer.style.display = "block";
//         }
//     })
//     toggleFilterBtnClass(target);
// }

function toggleFilterBtnClass(btn) {
  filterButtons.forEach((fBtn) => {
    addRemoveClass(
      fBtn.id === btn.id,
      "selected-filter",
      "selected-filter",
      fBtn
    );
  });
}

// Benefits section

if (!!document.querySelector(".benefits")) {
  document.getElementById("benefit-filter-btns").addEventListener("change", (e)=> toggleBenefit(e.target.value))

  var allBenefitsArticles = arr(
    document.querySelector(".benefits").childNodes
  ).filter((article) => article.id !== undefined);

}

var benefitsObj = {
  openSource: true,
  whiteLabel: false,
  documentation: false,
  quickStart: false,
};

function toggleBenefit(id) {
  console.log(id)
  benefitsObj[id] = true;
  allBenefitsArticles.forEach((article) => {
    if (id !== article.id) {
      benefitsObj[article.id] = false;
    }
    addRemoveClass(
     id === article.id,
      "show-benefit",
      "show-benefit",
      article
    );
  });

}

function showBenefit() {
  allBenefitsArticles.forEach((article) => {
    addRemoveClass(benefitsObj[article.id], "show-benefit", "", article);
  });
}

// Solutions

var solutionsObj = {
  trending: true,
  services: false,
  goodsondemand: false,
  transportation: false,
  all: false,
};

if (!!getArrayOfClassElements("solution-filter-btn").length > 0) {
  var solutionFilterBtns = getArrayOfClassElements("solution-filter-btn");
  var allSolutions = getArrayOfClassElements("business-card");

  solutionFilterBtns.forEach((btn) => {
    btn.addEventListener("click", toggleSolutions);
  });
}

function toggleSolutions({ target }) {
  var clickedFilter = target.id.toLowerCase();
  solutionsObj[clickedFilter] = true;
  Object.keys(solutionsObj).forEach((k) => {
    if (k !== clickedFilter) {
      solutionsObj[k] = false;
    }
  });
  solutionFilterBtns.forEach((btn) => {
    addRemoveClass(
      solutionsObj[btn.id.toLowerCase()],
      "selected-filter-item",
      "selected-filter-item",
      btn
    );
  });
  hideShowSolutions();
}

function hideShowSolutions() {
  Object.keys(solutionsObj).forEach((k) => {
    if (solutionsObj[k]) {
      allSolutions.forEach((solution) => {
        if (
          !!solution.getAttribute(`data-solution-${k}`) ||
          solutionsObj["all"]
        ) {
          solution.style.display = "flex";
        } else {
          solution.style.display = "none";
        }
      });
    }
  });
}

// Returning an array from HtmlCpllection
function arr(list) {
  return [...list];
}

function getArrayOfClassElements(className) {
  return arr(document.getElementsByClassName(`${className}`));
}

function getArrayOfQuerySelectorAll(qSelector) {
  return arr(document.querySelectorAll(`${qSelector}`));
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
    learnMoreBtn.addEventListener("click", (e) => {
      var banner = document.querySelector(bannerSelector);
      window.scrollTo({
        top: document.getElementById(scrollToId).offsetTop - 100,
        left: 0,
        r: "smooth",
      });
      banner.animate(
        [
          // keyframes
          { transform: "scale(1)" },
          { transform: "scale(1.2)" },
          { transform: "scale(1.1)" },
          { transform: "scale(1.05)" },
          { transform: "scale(1.02)" },
        ],
        {
          // timing options
          duration: 500,
          iterations: 3,
        }
      );
    });
  }
}
// Ever Cloud
addCommingSoonAnimation(
  "learn-more-ever-cloud",
  ".comming-soon-banner.ever-cloud",
  "ever-cloud-banner"
);
// Gauzy Cloud
addCommingSoonAnimation(
  "learn-more-gauzy-cloud",
  ".comming-soon-banner.gauzy-cloud",
  "gauzy-cloud-banner"
);

// Rename buttons in careers page / job offers

// arr(document.querySelectorAll(".job-description .btn.btn-primary")).forEach(
//   (btn) => {
//     btn.innerText = "Apply Now";
//   }
// );



// Pricing
// Pricing
var pricingObj = {
  allInOne: {
    period: "annual",
    storageType: "selfHosted",
  },
  ever: {
    period: "annual",
    storageType: "selfHosted",
  },
  gauzy: {
    period: "annual",
    storageType: "selfHosted",
  },
};

showHidePricing();

var allContainers = [
  ...document.getElementsByClassName("b-n-offer-cards-container"),
];
var allPeriodSwitches = [...document.querySelectorAll(".billing-period input")];
var allHostingSwitches = [
  ...document.querySelectorAll(".hosted-filter-btns input"),
];

allPeriodSwitches.forEach((pSwitch) => {
  pSwitch.addEventListener("click", togglePeriod);
});

allHostingSwitches.forEach((hSwitch) => {
  hSwitch.addEventListener("click", toggleHosting);
});

function toggleHosting() {
  var parentContainer = getParent(this, 5).id;
  var hostingValue = this.value;
  pricingObj[parentContainer].storageType = hostingValue;
  showHidePricing();
}

function togglePeriod() {
  var parentContainer = getParent(this, 5).id;
  var periodValue = this.value;
  pricingObj[parentContainer].period = periodValue;
  showHidePricing();
}

function getParent(element, num) {
  var parent = element;
  for (var i = 0; i < num; i++) {
    if (parent.parentNode) {
      parent = parent.parentNode;
    }
  }
  return parent;
}

function showHidePricing() {
  Object.keys(pricingObj).forEach((prObjKeys) => {
    let pricingWrapper = document.getElementById(prObjKeys);
    if (pricingWrapper) {
      let currentWrapperContainers = [
        ...pricingWrapper.getElementsByClassName("b-n-offer-cards-container"),
      ];
      currentWrapperContainers.forEach((pricingContainer) => {
        if (
          pricingContainer.id.includes(pricingObj[prObjKeys].period) &&
          pricingContainer.id.includes(pricingObj[prObjKeys].storageType)
        ) {
          pricingContainer.style.display = "flex";
        } else {
          pricingContainer.style.display = "none";
        }
      });
    }
  });
}




// Toggle all switch theme buttons

var allMoonBtns = getArrayOfClassElements("night-theme-input");
var allSunBtns = getArrayOfClassElements("day-theme-input");
var e = document.querySelector("body");

var observer = new MutationObserver(function (event) {
  changeAllThemeBtns();
})

observer.observe(e, {
  attributes: true,
  attributeFilter: ['class'],
  childList: false,
  characterData: false
})

function changeAllThemeBtns() {
  if (e.classList.contains("dark-mode")) {
    allMoonBtns.forEach(moonBtn => {
      moonBtn.checked = true;
    })

  } else if (e.classList.contains("light-mode")) {
    allSunBtns.forEach(sunBtn => {
      sunBtn.checked = true;
    })
  }
}

changeAllThemeBtns();



