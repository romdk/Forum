const boutonPlus = document.getElementById('boutonPlus');
const nouveauSujet = document.getElementById('nouveauSujet')


boutonPlus.addEventListener("click",() => {
    if (nouveauSujet.style.height === "50px" ) {
       nouveauSujet.style.height = "210px" 
       boutonPlus.style.transform = "rotate(45deg)"
       boutonPlus.style.borderRadius = "50%"
      } else {
        nouveauSujet.style.height = "50px"        
        boutonPlus.style.transform = "rotate(0deg)"
        boutonPlus.style.borderRadius = "5px"
      }
})