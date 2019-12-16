/* Mobile menu */
var hiddenMenu = document.getElementsByClassName("hidden-menu")[0];
var miniMenu = document.getElementById("mini-menu");
var isHidden = true;
miniMenu.addEventListener("click", function (e) {
    e.preventDefault();
    e.stopPropagation();

    if(isHidden){
        hiddenMenu.style.transform = "translate(0,0)";
    }else{
        hiddenMenu.style.transform = "translate(0,-500px)";
    }
    
    isHidden = !isHidden;
})

/* Services animations on homepage */
var clouds = [...document.getElementsByClassName("cloud")];

clouds.forEach(cloud=>{
    cloud.addEventListener("click", function(e){
        e.preventDefault();
        e.stopPropagation();
        var descriptionDiv =[...this.children][1].children;
        var close = descriptionDiv[0];
        close.addEventListener("click",(e)=>{
            e.preventDefault();
            e.stopPropagation();
            this.setAttribute("class", "cloud")
        
        })
        this.setAttribute("class","info-cloud");
       
    })
})

/* AY 12.11 Add animation class to projects on page scroll */
jQuery(function($){
  $(window).on('scroll' , function(){
      scroll_pos = $(window).scrollTop() + $(window).height();
      element_pos = $('.project.col').offset().top;
      /*check if the window scroll position is higher 
    than that of the element's offset from the top of the document */
      if (scroll_pos > element_pos) {
          $('.project.col').addClass('animated');
      };
  })
});

/* Tiny Slider Implementation */

/* Team slider */
var teamSlider = tns({
    container: document.querySelector(".people.row"),
    nav: false,
    autoplay: true,
    speed: 400,
    autoplayTimeout: 4000,
    autoplayButton: false,
    items: 5,
    mouseDrag: true,
    gutter: 20,
    controls: false,
    responsive: {
      250: {
          items: 1
      },
      640: {
          items: 2
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
/* Testimonials slider */
var testimonialsSlider = tns({
    container: document.querySelector(".clients-feedback.row"),
    nav: false,
    autoplay: true,
    speed: 400,
    autoplayTimeout: 4000,
    autoplayButton: false,
    items: 1,
    center: true,
    gutter: 4,
    controls: false,
    mouseDrag: true,
    responsive: false
});