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

jQuery(function($){

  /* CLOUDS ANIMATIONS */

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

    /* GREEN POINTER ICON SMOOTH SCROLL */

    if (!/Edge/.test(navigator.userAgent)) {
        let wLocation = window.location.href;
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                if(wLocation.includes('home')){
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }else{
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }
            });
        });
    }

    /* EXECUTE ANIMATIONS ON PAGE SCROLL */

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

});

/* REVERSE HOMEPAGE HTML ON PROJECTS */

jQuery(function($) {

    //Reverse statistics html about latest projects on the left/right side of the panel
    var list = $('section.col:nth-of-type(2) div.project a').first();
    var listItems = list.children();
    list.append(listItems.get().reverse());

    var secondList = $('section.col:nth-of-type(2) div.project a').last();
    var secondListItems = secondList.children();
    secondList.append(secondListItems.get().reverse());
    
});

/* STATS COUNTER */

jQuery(function($) {
    
    /* Counter decoration */
    $('.counter').after('<div id="ever-line">line</div>');

    /* APPEND BOX TO STATS COUNTER HOMEPAGE*/

    $('.wpsm_row:first-child').prepend('<div class="wpsm_col-md-3 wpsm_col-sm-6"> \
        <div class="wpsm_counterbox"> \
            <div class="wpsm_number" style="#ffffff"> \
            <span class="counter">2015</span> \
            <div id="ever-line">line</div> \
            </div> \
            <h3 class="wpsm_count-title" #ffffff=""> Since</h3> \
        </div> \
    </div>'
    )
});

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

/* SWITCH TO LIGHT or DARK THEME MODE */    

jQuery(function($){
    
    function toggleThemeMode (){
        //Check if user has chosen light mode
        var lightMode = localStorage.getItem('lightMode') || 0;
        //Click on light mode icon. Add light mode classes and wrappers. Store user preference through sessions
        $('.switch-field input[value="day"]').click(function(){
            $('body').addClass('light-mode');
            lightModeMagic();
            changeIconsLightMode();
            //Save user preference
            localStorage.setItem('lightMode', 1);
        })

        //DARK MODE Click on dark mode icon. Store user preference through sessions
        $('.switch-field input[value="night"]').click(function(){
            $('body').removeClass('light-mode');
            //Save user preference
            localStorage.setItem('lightMode', 0);
            changeIconsDarkMode();
        })
        
        //LIGHT MODE If user has set up light mode, display light theme  
        if(localStorage.getItem("lightMode")==1){
            $('body').addClass('light-mode');
            /* Change input checked attribute to light mode */
            $('#radio-one').prop('checked',false);
            $('#radio-two').prop('checked',true);
            lightModeMagic();
            changeIconsLightMode();
        }

    }

    toggleThemeMode ();

    /* WRAP SECTIONS TO CUSTOMIZE LIGHT THEME MODE */

    function lightModeMagic(){
        //wrap stats counter
        if($('body').hasClass('light-mode')){
            //wrap stats counter
            if($('.light-wrapper').length==0){
                $('.wpsm_counter_b_row').wrap('<div class="light-wrapper">');
                //Core Values
                $('.core-values-container').wrap('<div class="light-wrapper">');
            }
            if($('.dark-wrapper').length==0){
            //wrap e-commerce boxes
                $('.e-commerce-container').wrap('<div class="dark-wrapper">');
                //tech we use
                $('.tech-we-use').wrap('<div class="dark-wrapper">');
				$('.tech-stack').wrap('<div class="dark-wrapper">');
            }
            //wrap team members container
            if($('body').hasClass('home')){
                if($('.parent-team-members').length==0){
                    $('.team-w-ninjas-container, #tns1-ow, .h-eight').wrapAll('<div class="parent-team-members" />');
                }
            }
            else if ($('body').hasClass('page')){
                if($('.parent-team-members').length==0){
                    $('.team-w-ninjas-container').wrap('<div class="parent-team-members" />');
                }
            }
            if($('.message-us').length==0){
                $('.small-form').wrap('<div class="message-us">');
            }
        }
    }

    lightModeMagic();

    //Append black icons on light mode
    function changeIconsLightMode(){
        /*
         * Replace all project icons
         *
        */
        $('.gh-dets img').each(function() {
            //get old image url
            var oldSrc = $(this).attr('src');
            //get image name from old url
            var lastString = oldSrc.split("/").pop();
            
            //check if it is old url. Replace with new url.
            if(!lastString.includes("-black")){
                // change image name to new one
                var newImage = (lastString.split(".")[0]).concat('-black.png');
                //costruct the whole new image url
                var newSrc = oldSrc.split(lastString).join(newImage);
                //replace the old image src with the new one
                $(this).attr('src', newSrc);
            }
        });
        /*
         * Add black back arrow on signle projects page
         * 
        */
        $('#_Icon_Сolor').css({ fill: "#000" });
    }

    //Restore light icons on dark mode
    function changeIconsDarkMode(){
        //replace all project icons
        $('.gh-dets img').each(function() {
            //get old image url
            var oldSrc = $(this).attr('src');
            //get image name from old url
            var lastString = oldSrc.split("/").pop();
            //check if it is old url. Replace with new url.
            if(lastString.includes("-black")){
                // change image name to new one
                var newImage = lastString.split("-black").join('');
                //costruct the whole new image url
                var newSrc = oldSrc.split(lastString).join(newImage);
                //replace the old image src with the new one
                $(this).attr('src', newSrc);
            }
        });
        /*
         * Restore light back arrow on signle projects page
         * 
        */
        $('#_Icon_Сolor').css({ fill: "#fff" });
    }

});


/* SERVICES PAGE 
 * Get the corresponding div id on the Services page to expand 
 * if the user has clicked on it from the footer link 
 */

jQuery(function($){

    //Check if we are on services page
    if (window.location.href.indexOf("services" > -1)) {
        var full_url = window.location.href ; // Get current url

        var service_id = full_url.split('/');
        var id = service_id[service_id.length-1];

        setTimeout(()=> {
            $(id).find('.product-quality-container').removeClass('hide');
            $(id).find('.product-quality-container').addClass('show');
        }, 100)

        $('.services-icon-title a img').click(function(){
            var elem=$(this).parent().attr('href');
            $(elem).find('.product-quality-container').removeClass('hide');
            $(elem).find('.product-quality-container').addClass('show');
        })

    }

});

/* SINGLE TEAMMEMBERS PAGE
 * Hide open-source /customers projects 
 * if there are no projects associated with a team member
 * */

jQuery(function($){

    var openSourceProjects = $('.projects-container .title').first();
    var customersProjects = $('.projects-container .title').last();
    
    if(customersProjects.siblings().length==0){
        customersProjects.parent().hide();
    }

    if(openSourceProjects.siblings().length==0){
        openSourceProjects.parent().hide();
    }

});

