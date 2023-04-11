<html>
    <head>  
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="/mist/styles/global.css">
      <link rel="stylesheet" href="/mist/styles/button.css">
      <link rel="stylesheet" href="/mist/index.css">
      <link rel="stylesheet" href="/mist/component/header/header.css">
      <link rel="stylesheet" href="/mist/component/navbar/navbar.css">   
      <link rel="stylesheet" href="/mist/component/footer/footer.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    </head>
    <body style="background-color: #333333">
      <?php include '../../component/navbar/navbar.php' ?>
      <div class="sign">
          <div class="container d-flex justify-content-center align-items-center pt-5 pb-5">
              <h2>Se connecter</h2>
          </div> 
          
          <form action="/mist/helper/auth_checker.php" method="post">
              <div class="mb-3">
                  <input 
                      type="email" 
                      class="form-control"
                      placeholder="Email" 
                      name="email"
                      required>
              </div>
          
              <div class="mb-3">
                  <input 
                  type="password" 
                  class="form-control"
                  placeholder="Mot de passe"
                  name="password" 
                  required>
              </div>
          
              <button type="submit" class="sign-in w-100 p-2 mb-2">
                  Se connecter
              </button>
          </form>
          
          <p>Toujours pas de compte ? Inscrivez-vous dès maintenant !</p>
          <a class="sign-up" href="/mist/pages/sign-up/signup.php">
              S'inscrire
          </a>
      </div>
      <?php include '../../component/footer/footer.html' ?>
    </body>
    <script
			  src="https://code.jquery.com/jquery-3.6.4.min.js"
			  integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
			  crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/2c684a3113.js" crossorigin="anonymous"></script>
    <script src="/mist/component/navbar/navbar.js"></script>
</html>
