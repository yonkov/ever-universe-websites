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
    element.addEventListener("click", function (e) {
        e.stopPropagation();
        e.preventDefault();
        if (element.nodeName === "svg") {
            details.style.height = `${details.clientHeight}px`;
            setTimeout(function () {
                details.style.height = "0px";
            }, 500)
        }
        details.classList.remove(removedClass);
        details.classList.add(addedClass);
        plus.style.transform = `scale(${plusValue})`;


    });
};