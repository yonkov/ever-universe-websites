let hiddenMenu = document.getElementsByClassName("hidden-menu")[0];
let miniMenu = document.getElementById("mini-menu");
let isHidden = true;
miniMenu.addEventListener("click", function (e) {
    e.preventDefault();
    e.stopPropagation();

    if(isHidden){
        hiddenMenu.style.transform = "translate(0,0)";
        hiddenMenu.focus()
    miniMenu.style.opacity = 0
    }else{
        hiddenMenu.style.transform = "translate(0,-400px)";
        miniMenu.style.opacity = 1
    }
    
    isHidden = !isHidden;
})

hiddenMenu.addEventListener('click', function(e){
    e.preventDefault();
    e.stopPropagation();
    console.log("ok")
    hiddenMenu.style.transform = "translate(0,-400px)";
    miniMenu.style.opacity = 1
})