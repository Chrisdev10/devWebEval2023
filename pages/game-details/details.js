document.getElementById('min').style.display = "block";
var btn = document.getElementsByClassName("tablinks");
btn[1].classList.add('filterb');
function opencfg(settings){
  switcher(settings);
  document.getElementById(settings).style.display = "block";
}

function switcher(settings){
  clearFilter();
  if(settings === "min"){
    btn[1].classList.add('filterb')
    document.getElementById('max').style.display = "none";
  }else{
    btn[0].classList.add('filterb')
    document.getElementById('min').style.display = "none";
  }
}
function clearFilter(){
  for(let i = 0; i < btn.length ; i++){
    btn.item(i).classList.remove("filterb");
  }
}