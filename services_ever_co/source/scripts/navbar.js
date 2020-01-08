
window.addEventListener('load', (e) => {
    e.preventDefault();
    e.stopPropagation();
    let hiddenMenu = document.getElementsByClassName("hidden-menu")[0];
    let miniMenu = document.getElementById("mini-menu");
    let isHidden = true;
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
    
    document.addEventListener("click", function(e){
        if(hiddenMenu !==e.target){
            hiddenMenu.style.transform = "translate(0,-500px)";
    
        }
    })
  });