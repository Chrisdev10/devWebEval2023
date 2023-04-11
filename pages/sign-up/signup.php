<html>
    <?php include '../../helper/css.php' ?>
    <body style="background-color: #333333">
        <?php include '../../component/navbar/navbar.php' ?>
        <div class="sign">
          <div class="container d-flex justify-content-center align-items-center pt-5 pb-5">
              <h2>Créer un compte</h2>
          </div> 
          
          <form action="/mist/helper/signup_controller.php" method="post">
            <div class="mb-3">
                <input type="text" class="form-control"
                        placeholder="Prénom"
                        name="firstname"
                        required>
            </div>

            <div class="mb-3">
                <input type="text" class="form-control"
                        placeholder="Nom"
                        name="lastname"
                        required>
            </div>

            <div class="mb-3">
                <input type="date" class="form-control"
                        placeholder="Date de naissance"
                        name="birthdate"
                        required>
            </div>

            <div class="mb-3">
                <input type="email" class="form-control"
                        placeholder="Email"
                        name="email"
                        required>
            </div>

            <div class="mb-3">
                <input type="text" class="form-control"
                        placeholder="Téléphone"
                        name="phone"
                        required>
            </div>
          
            <div class="mb-3">
                <input type="text" class="form-control"
                        placeholder="Nom d'utilisateur"
                        name="username"
                        required>
            </div>
          
            <div class="mb-3">
                <input type="password" class="form-control"
                        placeholder="Mot de passe"
                        name="password"
                        required>
            </div>
          
            <button type="submit" class="sign-up">
                Créer mon compte
            </button>
        </form>
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
