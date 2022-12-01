const boutonPlus = document.getElementById('boutonPlus');
const champMessage = document.getElementById('champMessage');
const btnAjouter = document.getElementById('btnAjouter');

boutonPlus.addEventListener("click",() => {
    if (champMessage.style.display === "none" && btnAjouter.style.display === "none" ) {
        champMessage.style.display = "block";
        btnAjouter.style.display = "block";
      } else {
        champMessage.style.display = "none";
        btnAjouter.style.display = "none";
      }
})