setInterval(shift_caroussel, 5000);
var index = 0;
var ecart;
var responsive = 0;
if(window.innerWidth <= 850){
    ecart = 0;
}else{
    ecart = 200;
    responsive = 1;
}
var caroussel = document.getElementById("carousselID");
var items = caroussel.children;
var buttons = document.querySelector(".switcher").children;
items.item(1).classList.add('rightItem');
for(let btn of buttons){
    btn.addEventListener('click', ()=>{
        let indexOf = [].indexOf.call(buttons, btn);
        switch(indexOf){
            case 0 :
                caroussel.scrollLeft = 0;
                break;
            case 1 :
                caroussel.scrollLeft = ecart === 0 ? 400 : 200;
                break;
            default :
                caroussel.scrollLeft = (400 * (indexOf-responsive)) + ecart;
        }
        index = indexOf;
        changeRadioBtnColors(indexOf);
        animateSideImage();

    });
}
/**
 * function qui va permettre de shifter les elements du caroussels toutes les 6s
 */
 function shift_caroussel(){
    //si dernier element, on reinit l index
    if(index === 6){
        index = 0;
        caroussel.scrollLeft = 0;
        animateSideImage();
        index = index + 1;
    }else{
        caroussel.scrollLeft = (400 * (index-responsive)) + ecart;
        animateSideImage();
        index = index + 1;
    }
    changeRadioBtnColors(null);
}
/**
 * ajoute une opacity aux elements adjacents
 */
function animateSideImage(){
    clearPreviousClass();
    if(index != 0 && index != 5){
        items[index-1].classList.add('leftItem');
        items[index+1].classList.add('rightItem');
    }else{
        if(index === 0){
            items[index+1].classList.add('rightItem');
        }else{
            items[index-1].classList.add('leftItem');
        }
    }
}
/**
 * clear les classes dans les elements avant chaque traitement
 */
function clearPreviousClass(){
    for(let item of items){
        item.classList.remove('leftItem','rightItem');
    }
}
// change la couleur du boutton en fonction de l'index
function changeRadioBtnColors(indexOf){
    for(let btn of buttons){
        btn.style.backgroundColor = "#8D2CDD";
    }
    buttons.item(indexOf == null ? index - 1 : indexOf ).style.backgroundColor = "#F40099";

}
// reset les index
function resetindex(){
    index = 0;
    caroussel.scrollLeft = 0;
}

// listener pour rendre le caroussel responsive
window.addEventListener('resize', (x)=>{
    if(window.innerWidth <= 850){
        ecart = 0;
        responsive = 0;
        resetindex();
    }else{
        ecart = 200;
        responsive = 1;
        resetindex();
    }
})