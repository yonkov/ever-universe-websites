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
        let descriptionDiv
        if (/Edge/.test(navigator.userAgent)) {
            descriptionDiv = Array.from(this.children)[1].children;

        }else{
            descriptionDiv  = [...this.children][1].children;

        }
        let close = descriptionDiv[0];
        close.addEventListener("click", (e) => {
            e.preventDefault();
            e.stopPropagation();
            this.setAttribute("class", "cloud")

        })
        this.setAttribute("class", "info-cloud");

    })
});