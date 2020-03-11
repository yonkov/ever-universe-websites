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
        autoplay: false,
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

/* Project Thumbnails Slider */

if(document.querySelector("article .projects-slider")){
    var testimonialsSlider = tns({
        container: document.querySelector("article .projects-slider"),
        nav: true,
        autoplay: true,
        speed: 1000,
        autoplayTimeout: 5000,
        autoplayButton: false,
        items: 1,
        center: true,
        gutter: 4,
        controls: false,
        mouseDrag: true,
        responsive: false
    });
}

/* Single Project Page Slider */

if(document.querySelector(".single-project-slider")){
    var testimonialsSlider = tns({
        container: document.querySelector(".single-project-slider"),
        nav: true,
        autoplay: false,
        speed: 1000,
        autoplayTimeout: 5000,
        autoplayButton: false,
        items: 1,
        center: true,
        gutter: 4,
        controls: false,
        mouseDrag: true,
        responsive: false
    });
}

/* See more projects slider */

if(document.querySelector(".more-projects")){
    var moreProjectsSlider = tns({
        container: document.querySelector(".more-projects"),
        nav: true,
        autoplay: true,
        speed: 3000,
        autoplayTimeout: 5000,
        autoplayButton: false,
        items: 1,
        center: true,
        gutter: 1,
        controls: false,
        mouseDrag: true,
        responsive: false
    });
}