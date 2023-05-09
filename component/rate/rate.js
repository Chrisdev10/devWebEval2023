var stars = Object.values(document.getElementsByClassName("starrate"));
var score;
if(typeof id_user === 'undefined'){
    let btn = document.getElementById("rate");
    btn.disabled = true;
    console.log("undef");
    document.getElementById("rateComment").placeholder = "Vous devez vous connecter pour voter.."
    btn.style.filter = "brightness(70%)";
}
stars.forEach(elem =>{
    elem.addEventListener('click', () => {
        changeStarsDisableEvent(elem);
        score = stars.indexOf(elem)+1;
    })
});

stars.forEach(elem =>{
    elem.addEventListener('mouseover', () => {
        changeStars(elem);
        score = stars.indexOf(elem)+1;
    });
});
function changeStarsDisableEvent(elem){
    stars.forEach(star => star.removeEventListener('mouseover', () => changeStars(elem)));
}
function changeStars(elem){
    let index = stars.indexOf(elem);
    iteratorStars(index);
    
}
function iteratorStars(index){
    for(let i=0;i<stars.length;i++){
        if(i <= index){
            stars[i].setAttribute("src", "/mist/assets/banner/fullstaryellow.png");
        }else{
            stars[i].setAttribute("src", "/mist/assets/banner/fullstar.png");
        }
    }
}
document.getElementById("rate").addEventListener('click', (e)=>{
    let comment = document.getElementById("rateComment").value;
    var wrapper = {
        "comment": comment,
        "score": score,
        "game": id_game,
        "user": id_user
    }; 
    e.preventDefault();
    let request = new XMLHttpRequest();
    request.open("POST", "../../helper/commentrate.php", true);
    request.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            console.log(request.response);
            document.getElementById("rateForm").style.display = 'none';
            document.getElementById("showsucces").style.display = 'block';
        }
    };
    request.send(JSON.stringify(wrapper));
})