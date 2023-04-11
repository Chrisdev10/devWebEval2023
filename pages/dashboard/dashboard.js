function showLicense(index){
    let elem = 'blurBtn'+index;
    let obj = document.getElementById(elem);
    let btn = document.querySelector(".btn"+index);
    if(obj.classList.contains('license')){
        obj.classList.remove('license');
        btn.textContent = "Cacher";
    }else{
        obj.classList.add('license');
        btn.textContent = "Voir";
    }
}