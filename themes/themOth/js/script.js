// pour activer l'ouverture des liens dans nouvelle fenetre
/*
var loadhref = function(){
$(document).on("click","a", function(e){ 
    e.preventDefault(); 
    var url = $(this).attr("href"); 
    window.open(url, "_blank");
});
};
window.onload = loadhref;
*/
//ce code nous permet de faire une boucle sur tous les classes nommé pup-poste
/*
var elements = document.getElementsByClassName("pup-poste");
var names = '';
for(var i=0; i<elements.length; i++) {
    //names += elements[i].name;
    console.log(elements[i].innerHTML)
    elements[i].innerHTML = new Date(elements[i].innerHTML).getFullYear();
}
*/