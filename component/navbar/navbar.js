/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function myFunction() {
    var y = document.querySelector('.nav-wrapper');
    if($('#myTopnav').hasClass('fader')){
      $('#myTopnav').removeClass('fader');
    }
    if (y.className === "nav-wrapper") {
      y.className += " responsive";
      $('#myTopnav').removeClass('fader');
      
    } else {
      y.className = "nav-wrapper";
      $('#myTopnav').addClass('fader');
    }
} 

window.addEventListener('scroll', () =>{
  if(this.scrollY < 200){
    if(!$('#myTopnav').hasClass('fader')){
      $('#myTopnav').addClass('fader');
    }
  }else{
    if($('#myTopnav').hasClass('fader')){
      $('#myTopnav').removeClass('fader');
    }

  }
})