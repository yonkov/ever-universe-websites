let clouds = [...document.getElementsByClassName("cloud")];

clouds.forEach(cloud=>{
    cloud.addEventListener("click", function(e){
        e.preventDefault();
        e.stopPropagation();
        let descriptionDiv =[...this.children][1].children;
        let close = descriptionDiv[0];
        let hiddenP = descriptionDiv[2];
        close.addEventListener("click",(e)=>{
            e.preventDefault();
            e.stopPropagation();
            this.setAttribute("class", "cloud")
            hiddenP.setAttribute("style","display:none;");
        
        })
        this.setAttribute("class","info-cloud");
        window.setTimeout(() => {
            hiddenP.setAttribute("style","display:block;");
        }, 250);
    })
})