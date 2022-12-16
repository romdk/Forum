const menuMobile = document.getElementById('menuMobile');
const imageUtilisateur = document.getElementById('imageUtilisateur');
const btnFermer = document.getElementById('btnFermer');
const overlay = document.getElementById('overlay');
const mediaQuery = window.matchMedia('(max-width: 500px)')
const searchBar = document.getElementById('searchBar')
const btnSearch = document.getElementById('btnSearch')

imageUtilisateur.addEventListener("click",() => {
    menuMobile.style.transform = "translateX(-300px)";
    overlay.style.zIndex = "998";
    overlay.style.backgroundColor = "#0f0f0f62";
    overlay.style.backdropFilter = "blur(4px)";    
})

btnFermer.addEventListener("click",() => {
    menuMobile.style.transform = "translateX(0px)";
    overlay.style.backgroundColor = "#0f0f0f00";
    overlay.style.backdropFilter = "blur(0px)";
    overlay.style.zIndex = "-1";
})

btnSearch.addEventListener("click",() => {
    if(mediaQuery.matches) {
        searchBar.style.display = "block";
        overlay.style.zIndex = "998";
        overlay.style.backgroundColor = "#0f0f0f62";
        overlay.style.backdropFilter = "blur(4px)";  
    }
})

overlay.addEventListener("click", () => {
    if(mediaQuery.matches) {
        searchBar.style.display = "none";
    }
    if(menuMobile.style.transform !== "translateX(-300px)"){
        overlay.style.backgroundColor = "#0f0f0f00";
        overlay.style.backdropFilter = "blur(0px)";
        overlay.style.zIndex = "-1";
    }
})
