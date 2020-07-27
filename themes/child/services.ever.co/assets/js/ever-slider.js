/**Slider Settings 
 * ===========
 * Tiny Slider - Vanilla javascript slider for all purposes.
 * ===========
 * @link https://github.com/ganlanyuan/tiny-slider
 */

/* Team slider homepage */
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

/* Testimonials slider Homepage */
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
var prev =document.querySelector(".prev");
var next =document.querySelector(".next");

if(prev){
    prev.onclick = (() => {
        testimonialsSlider.goTo("prev");
    });
}
if(next){
    next.onclick = (() => {
        testimonialsSlider.goTo("next");
    });
}

/**
 * 
 * Sliders on Project Archive page
 * 
 * Here we have multiple sliders on the same page. 
 * We will iterate dynamically to all the html nodes to create an array of sliders
 * In this way we can use one classname for each slider container and slider btns
 * 
 */

if(document.querySelector("article .projects-slider")){

    //get the nodelist with all sliders

    var archiveProjectSliders = document.querySelectorAll('article .projects-slider');
    
    // initiate an empty array where we will push the sliders as array of objects
    
    var archiveProjectSlidersArr=[];

    //Create all hire us sliders and push them to an array of sliders

    for (i = 0; i < archiveProjectSliders.length; ++i) {
            
            var currentSlider = archiveProjectSliders[i];
            
            var archiveProjectSlider = tns({
                container: currentSlider,
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
                loop: true,
                responsive: false
            });

        archiveProjectSlidersArr.push(archiveProjectSlider);

    }

    // Get all slider arrows
    prev= document.querySelectorAll(".prev");
    next= document.querySelectorAll(".next");

    /* Attach click event to all slider arrows on hire us page */

    prev.forEach((element, index)=> {

        element.addEventListener("click", function(){
                
            //Activate the slider by the corresponding index
            archiveProjectSlidersArr[index].goTo("prev");

        });

    });

    next.forEach((element, index)=> {

        element.addEventListener("click", function(){
            
            //Activate the slider by the corresponding index
            archiveProjectSlidersArr[index].goTo("next");

        });

    });

}

/* Single Project Page Slider */

if(document.querySelector(".single-project-slider")){
    var testimonialsSlider = tns({
        container: ".single-project-slider",
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

/* ========================
   Hire Us Multiple Sliders 
 ========================*/

/**
 * Here we have multiple sliders on the same page. 
 * We will iterate dynamically to all the html nodes to create an array of sliders
 * In this way we can use one classname for each slider container and slider btns
 */

//Execute the code on hire us page only 

if(document.querySelector(".single-project-slider")){

    //get the nodelist with all sliders

    var hireUsSliders = document.querySelectorAll('.single-project-slider');
    
    // initiate an empty array where we will push the sliders
    
    var hireSlidersArr=[];

    //Create all hire us sliders and push them to an array of sliders

    for (i = 0; i < hireUsSliders.length; ++i) {
            
            var slider = hireUsSliders[i];
            
            hireUsSlider = tns({
                container: slider,
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

        hireSlidersArr.push(hireUsSlider);

    }

    // Get all slider arrows
    prev= document.querySelectorAll(".prev");
    next= document.querySelectorAll(".next");

    /* Attach click event to all slider arrows on hire us page */

    prev.forEach((element, index)=> {

        element.addEventListener("click", function(){
                
            //Activate the slider by the corresponding index
            hireSlidersArr[index].goTo("prev");

        });

    });

    next.forEach((element, index)=> {

        element.addEventListener("click", function(){
            
            //Activate the slider by the corresponding index
            hireSlidersArr[index].goTo("next");

        });

    });

}