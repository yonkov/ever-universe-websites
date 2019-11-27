let hiddenMenu = document.getElementsByClassName("hidden-menu")[0];
let miniMenu = document.getElementById("mini-menu");
let isHidden = true;
miniMenu.addEventListener("click", function (e) {
    e.preventDefault();
    e.stopPropagation();

    if(isHidden){
        hiddenMenu.style.transform = "translate(0,0)";
    }else{
        hiddenMenu.style.transform = "translate(0,-400px)";
    }
    
    isHidden = !isHidden;
})

hiddenMenu.addEventListener('click', function(e){
    e.preventDefault();
    e.stopPropagation();
    hiddenMenu.style.transform = "translate(0,-400px)";
})