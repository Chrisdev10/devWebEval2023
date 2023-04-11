<?php
  $isConnected= false;
  if(isset($_SESSION['user_id'])){
    $isConnected=true;
  }

?>
<div id="myTopnav" class="fader">
  <div class="nav-wrapper">
    <a class="logo-a"><img id="logo" src="/mist/assets/logo.png" alt="App logo"></a>
    <form class="searchbar" action="/mist/pages/research/research.php" method="post">
        <input class="research"
            type="search"
            placeholder="Rechercher..."
            name="criteria"
            >
            
        <button id="search_sub" class="submit_btn" type="submit">Go</button>
    </form>
    <a href="/mist/index.php">Home</a>
    <?php if($isConnected){ ?>
    <a href="/mist/pages/dashboard/dashboard.php">mon compte</a>
    <a href="/mist/helper/auth_checker.php?id=disc">se déconnecter</a>
    <?php }else{ ?>
    <a href="/mist/pages/login/login.php">se connecter</a>
    <?php } ?>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <img id="cross" src="/mist/assets/close.png">
    </a>
  </div>
  <a href="javascript:void(0);" id="ext_btn" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div> 


