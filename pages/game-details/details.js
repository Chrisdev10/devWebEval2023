(function() {
  var btn = document.getElementById('buy');
  var btn2 = document.getElementById('connecter');
  console.log(user_id);
  if(user_id == ''){
    btn2.style.display = 'block';
  }else{
    btn.style.display = 'block';
  }
  btn.addEventListener('click', function() {
  document.location.href = '/mist/helper/game_controller.php?id='+game_id;
  });
  btn2.addEventListener('click', function() {
  document.location.href = '/mist/pages/login/login.php';
  });
})();
