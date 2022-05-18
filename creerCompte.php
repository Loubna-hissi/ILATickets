<?php
    
    //Etablir la connexion à la base de données 
     $server="localhost";
     $login="root";
     $pass="root";
     try{
     $connexion=new PDO("mysql:host=$server;dbname=allo",$login,$pass);
     $connexion->setAttribute(PDO::ATTR_ERRMODE ,PDO::ERRMODE_EXCEPTION);
     }
     catch(PDOException $e){
         echo 'Echec de la connexion'.$e->getMessage();
     }
    //Verification des champs d'un fomulaire
    if(isset($_POST['creer'])){
        if(!empty($_POST['Nom']) AND !empty($_POST['Prénom']) AND !empty($_POST['cin']) 
        AND !empty($_POST['inlineRadioOptions']) AND !empty($_POST['email']) 
        AND !empty($_POST['password1'])AND !empty($_POST['password2'])
        AND !empty($_POST['radio'])){
           
        }
        else{
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Sign Up Form</title>
    <link rel="stylesheet" href="css/css-material-design-iconic-font.min.css" />
    <link rel="stylesheet" href="css/css-style.css" />
  </head>
  <body>
    <div class="main">
      <section class="signup">
        <div class="container">
          <div class="header">
            <h2 class="form-title">Créer un Compte</h2>
          </div>
          <div class="signup-content">
            <form method="POST" class="signup-form">
              <div class="form-group full-name">
                <input type="text" class="form-input" placeholder="Nom" name="Nom"/>
                <input type="text" class="form-input" placeholder="Prénom" name="Prénom"/>
              </div>
              <div class="form-group">
                <input
                  type="text"
                  class="form-input"
                  placeholder="Numéro de la Carte d'Identité Nationale (CIN)" name="cin"
                />
              </div>
              <div class="form-check form-check-inline">
                <label>Indiquez votre sexe : </label>
                <input
                  class="form-check-input"
                  type="radio"
                  name="inlineRadioOptions"
                  id="inlineRadio1"
                  value="option1"
                />
                <label class="form-check-label" for="inlineRadio1">Homme</label>
                <input
                  class="form-check-input"
                  type="radio"
                  name="inlineRadioOptions"
                  id="inlineRadio2"
                  value="option2"
                />
                <label class="form-check-label" for="inlineRadio2">Femme</label>
              </div>
              <div class="form-group">
                <input
                  type="email"
                  class="form-input"
                  placeholder="Vôtre Email"
                  name="email"
                />
              </div>
              <div class="form-group">
                <input
                  type="text"
                  class="form-input"
                  name="password1"
                  id="password"
                  placeholder="Mot De Passe"
                />
                <span
                  toggle="#password"
                  class="zmdi zmdi-eye field-icon toggle-password"
                ></span>
              </div>
              <div class="form-group">
                <input
                  type="password"
                  class="form-input"
                  placeholder="Confirmation de Mot De Passe"
                  name="password2"
                />
              </div>
              <div class="form-group">
                <input
                  type="checkbox"
                  name="agree-term"
                  id="agree-term"
                  class="agree-term"
                />
                <label
                  for="agree-term"
                  class="label-agree-term"
                  onclick="checked_Student()"
                >
                  <span><span></span></span>Je suis un(e) étudiant(e)
                </label>
              </div>
              <div class="form-group hidden" id="input1">
                <input
                  type="text"
                  class="form-input"
                  id="input-1"
                  placeholder="Code national de l'étudiant (CNE)"
                  name="cne"
                />
              </div>
              <div class="form-check hidden" id="input2">
                <input
                  class="form-check-input"
                  type="radio"
                  name="radio"
                  id="input-2"
                />
                <label class="form-check-label" id="label1"
                  >École nationale des sciences appliquées de Safi</label
                >
              </div>
              <div class="form-check hidden" id="input3">
                <input
                  class="form-check-input"
                  type="radio"
                  name="radio"
                  id="input-3"
                />
                <label class="form-check-label" id="label2"
                  >Faculté Polydisciplinaire de Safi</label
                >
              </div>
              <div class="form-group" style="margin-top: 35px">
                <input type="submit" name="creer" class="form-submit" value="Sign up" />
              </div>
            </form>
            <p class="loginhere">
              Vous avez déjà créé un compte ?
              <a href="#" class="loginhere-link">Login ici</a>
            </p>
          </div>
        </div>
      </section>
    </div>

    <script src="js/jquery-jquery.min.js"></script>
    <script src="js/8755-js-main.js"></script>

    <script
      async
      src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"
    ></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag() {
        dataLayer.push(arguments);
      }
      gtag("js", new Date());

      gtag("config", "UA-23581568-13");
    </script>
  </body>
</html>
