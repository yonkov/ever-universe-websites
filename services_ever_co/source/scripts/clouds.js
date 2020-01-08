let clouds;

if (/Edge/.test(navigator.userAgent)) {
    clouds = Array.from(document.getElementsByClassName("cloud"));
} else {
    clouds = [...document.getElementsByClassName("cloud")];
}


clouds.forEach(cloud => {
    cloud.addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        let descriptionDiv;
        if (/Edge/.test(navigator.userAgent)) {
            descriptionDiv = Array.from(this.children)[1].children;

        }else{
            descriptionDiv  = [...this.children][1].children;

        }
        let close = descriptionDiv[0];
      
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
     
        setTimeout(()=>{
            this.style.height = "fit-content";
         
        },3000)

    })
});