/* The Main js file for the Ever theme */

/*===============
===MOBILE MENU===
================*/
jQuery(function($){
var hiddenMenu = document.getElementsByClassName("hidden-menu")[0];
var miniMenu = document.getElementById("mini-menu");
var isHidden = true;
miniMenu.addEventListener("click", function(e) {
    e.preventDefault();
    e.stopPropagation();

    if (isHidden) {
        hiddenMenu.style.transform = "translate(0,0)";
    } else {
        hiddenMenu.style.transform = "translate(0,-900px)";
    }
})

document.addEventListener("click", function(e) {
    if (hiddenMenu !== e.target) {
        hiddenMenu.style.transform = "translate(0,-900px)";
        isHidden = true
    }
})

})

/*=================
====ANIMATIONS=====
==================*/

//Clouds 

jQuery(function($){

  if (/Edge/.test(navigator.userAgent)) {
      var clouds = Array.from(document.getElementsByClassName("cloud"));
  } else {
      clouds = [...document.getElementsByClassName("cloud")];
  }

  clouds.forEach(cloud => {
      cloud.addEventListener("click", function(e) {
          e.preventDefault();
          e.stopPropagation();
          if (/Edge/.test(navigator.userAgent)) {
              var descriptionDiv = Array.from(this.children)[1].children;
          } else {
              descriptionDiv = [...this.children][1].children;
          }
          var close = descriptionDiv[0];
          close.addEventListener("click", (e) => {
              e.preventDefault();
              e.stopPropagation();

              this.classList.remove("show-info-cloud");
              this.offsetWidth;
              this.classList.add("hide-info-cloud");
          })
          this.classList.remove("hide-info-cloud");
          this.offsetWidth;
          this.classList.add("show-info-cloud");

          setTimeout(() => {
              this.style.height = "fit-content";

          }, 3000)
      })
  }); 

});

/* Execute animations on page scroll */
jQuery(function($) {
    $(window).on('scroll', function() {
        scroll_pos = $(window).scrollTop() + $(window).height();

        /* Add animation class to Projects */
        var projects = $('.project.col');
        if (projects.length > 0) {
            element_pos = projects.offset().top;
            /*check if the window scroll position is higher 
              than that of the element's offset from the top of the document */
            if (scroll_pos > element_pos) {
                $('.project.col').addClass('animated');
            };
        }

        /* Add animation class to Services */
        var everServices = $('.e-commerce-container.col');
        if(everServices.length>0){
            element_pos = everServices.offset().top;
            if (scroll_pos > element_pos) {
                $('.e-commerce-container.col').addClass('animated');
            };
        }

        //Add animation to Software Contribution
        if($('.fifth-txt-containers').length>0){
            element_pos = $('.fifth-txt-containers').offset().top;
            if (scroll_pos > element_pos) {
                $('.fifth-txt-containers').addClass('animatedText');
            };
        }

        // Technologies
        var technologies = $('.list-wrapper.row');
        if(technologies.length>0){
            element_pos = technologies.offset().top;
            if (scroll_pos > element_pos) {
                $('.list-wrapper.row').addClass('animatedText');
            };
        }
        // Values
        var values = $('.core-values-txt-container');
        if(values.length>0){
            element_pos = values.offset().top;
            if (scroll_pos > element_pos) {
                $('.core-values-txt-container').addClass('animatedText');
            };
        }
        //Contact us
        if($('.message-us-container').length>0){
            element_pos = $('.message-us-container').offset().top;
            if (scroll_pos > element_pos) {
                $('.message-us-container').addClass('animated');
            };
        }
    })
    /*==================
    REVERSE HOMEPAGE HTML
    ====ON PROJECTS====
    ===================*/

    //Reverse statistics html about latest projects on the left/right side of the panel
    var list = $('section.col:nth-of-type(2) div.project a').first();
    var listItems = list.children();
    list.append(listItems.get().reverse());

    var secondList = $('section.col:nth-of-type(2) div.project a').last();
    var secondListItems = secondList.children();
    secondList.append(secondListItems.get().reverse());
});

/*==============
=====SLIDER=====
===============*/

/* Team slider */
if(document.querySelector(".home .people.row")){
    var teamSlider = tns({
        container: document.querySelector(".home .people.row"),
        nav: false,
        autoplay: true,
        speed: 500,
        autoplayTimeout: 5000,
        autoplayButton: false,
        items: 5,
        mouseDrag: true,
        gutter: 40,
        controls: false,
        responsive: {
            250: {
                items: 1
            },
            480: {
                items: 2
            },
            640: {
                items: 3
            },
            820: {
                items: 3
            },
            992: {
                items: 4
            },
            1120: {
                items: 5
            }
        }
    });
}

/* Testimonials slider */
if(document.querySelector(".home .clients-feedback.row")){
    var testimonialsSlider = tns({
        container: document.querySelector(".home .clients-feedback.row"),
        nav: false,
        autoplay: true,
        speed: 1000,
        autoplayTimeout: 8000,
        autoplayButton: false,
        items: 1,
        center: true,
        gutter: 4,
        controls: false,
        mouseDrag: true,
        responsive: false
    });
}


/* Slider arrows */
var prev =document.querySelector(".next");
var next =document.querySelector(".prev");

if(prev){
    document.querySelector(".prev").onclick = (() => {
        testimonialsSlider.goTo("prev");
    });
}
if(next){
    document.querySelector(".next").onclick = (() => {
    testimonialsSlider.goTo("next");
})
}

/* Counter decoration */
jQuery(function($) {
    $('.counter').after('<div id="ever-line">line</div>');
})

/* Services page text */

let allPluses;
let allCloses;

if (/Edge/.test(navigator.userAgent)) {
    allPluses = Array.from(document.getElementsByClassName("plus-arr"));
    allCloses = Array.from(document.getElementsByClassName("close-details"))
} else {

    allPluses = [...document.getElementsByClassName("plus-arr")];
    allCloses = [...document.getElementsByClassName("close-details")]
}


allPluses.forEach(plus => {
    let details = [...plus.parentElement.parentElement.parentElement.childNodes][3];
    let values = {
        details,
        plus,
        plusValue: "0",
        removedClass: "hide",
        addedClass: "show",
    }

    showHideMoreInfo(plus, values);
})

allCloses.forEach(ex => {
    let details = ex.parentElement.parentElement;
    let plus = [...[...[...details.parentElement.childNodes][1].childNodes][1].childNodes][3];
    let values = {
        details,
        plus,
        plusValue: "1",
        removedClass: "show",
        addedClass: "hide",
    }
    showHideMoreInfo(ex, values)
});

function showHideMoreInfo(element, {
    details,
    plus,
    plusValue,
    removedClass,
    addedClass
}) {
    element.addEventListener("click", function(e) {
        e.stopPropagation();
        e.preventDefault();
        if (element.nodeName === "svg") {
            details.style.height = `${details.clientHeight}px`;
            setTimeout(function() {
                details.style.height = "0px";
            }, 500)
        }
        details.classList.remove(removedClass);
        details.classList.add(addedClass);
        plus.style.transform = `scale(${plusValue})`;

    });
};

/* SWITCH TO LIGHT or DARK MODE */

jQuery(function($) {
    
    //Check if user has chosen light mode
    var lightMode = localStorage.getItem('lightMode') || 0;
    //Click on light mode icon. Store user preference through sessions
    $('.switch-field input[value="day"]').click(function(){
        $('body').addClass('light-mode');
        //Save user preference
        localStorage.setItem('lightMode', 1);
    })

    //Click on dark mode icon. Store user preference through sessions
    $('.switch-field input[value="night"]').click(function(){
        $('body').removeClass('light-mode');
        //Save user preference
        localStorage.setItem('lightMode', 0);
        console.log(lightMode);
    })
    
    // If user has set up light mode, display light theme  
    if(localStorage.getItem("lightMode")==1){
        console.log('light mode user preference');
        $('body').addClass('light-mode');
    }

});

/* APPEND COUNTER BOX */

jQuery(function($){
    $('.wpsm_row:first-child').append('<div class="wpsm_col-md-3 wpsm_col-sm-6"> \
        <div class="wpsm_counterbox"> \
            <div class="wpsm_number" style="#ffffff"> \
            <span class="counter">2015</span> \
            <div id="ever-line">line</div> \
            </div> \
            <h3 class="wpsm_count-title" #ffffff=""> Since</h3> \
        </div> \
    </div>'
    )
})