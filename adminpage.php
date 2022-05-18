<?php
require "base.php";
require 'configDate.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title>Admin Page</title>
  <meta content="" name="description" />
  <meta content="" name="keywords" />

  <!-- Favicons -->
  <link rel="shortcut icon" href="assets/img/favicon.ico" />

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet" />
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <!-- Vendor CSS Files -->
  <link href="style/vendor/animate.css/animate.min.css" rel="stylesheet" />
  <link href="style/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="style/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
  <link href="style/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
  <link href="style/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
  <link href="style/vendor/remixicon/remixicon.css" rel="stylesheet" />
  <link href="style/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />


  <!-- Template Main CSS File -->
  <link href="style/css/style.css" rel="stylesheet" />
</head>

<body>
  <div class="container">
    <div class="row gutters" style="margin-top: 60px;">
      <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
          <div class="card-body">
            <div class="account-settings">
              <div class="user-profile">
                <div class="user-avatar">
                  <img src="style/img/logo-removebg.png" alt="Logo" />
                </div>
                <h5 class="user-name">Nom admin</h5>
                <h6>Identifiant</h6>
              </div>
              <div class="about">
                <h5 class="mb-2 text-primary">Remarque</h5>
                <p>
                  Les modifications seront immédiatement appliquées et vous ne pouvez pas revenir a l'état précedent
                </p>
              </div>
            </div>
            
          </div>
          
        </div>
      </div>
      
      <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
          <div class="card-body">
            <div class="row gutters">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                  <form method="post">
                  <?php
                  if(!empty($_POST['fichier']) && $_POST['fichier']=="ajouter.php"){
                    echo "yeah";
                  }
                  else{
                    echo "nope";
                  }
                  ?>
                  <label>insérer une base de données</label>
                
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="text-right">
                  <input type="file" name="fichier" style="margin-top: 5px;border: 3px dotted black;">
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
              </div>
            </div>
            <div class="row gutters">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="text-right">
                  <input type="submit" name="Ajouter" value=" Ajouter" class="btn btn-primary modifier">
                 
               </div>
              </div>
              
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group" style="margin-top: 15px;">
                  <label>Modifier Prix</label>
                  <input type="name" name="PrixModifie"class="form-control" placeholder="Enter un nouveau prix" />
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                  <div class="text-right">
                    <input type="submit" name="Modifier" value="Modifier" class="btn btn-primary modifier">
                    <?php
                    if(!empty($_POST['Modifier'])&& isset($_POST['PrixModifie'])){
                      $tarif=$_POST['PrixModifie'];
                      $_SESSION['TARIF']=$tarif;
                      echo $tarif;
                      echo $_SESSION['TARIF'];
                      $newtime=$_SESSION['Time'];
                        $sql = "UPDATE  repas SET TARIF='$tarif' WHERE DATE_RESERVATION>='$newtime'";
                        $stmt= $connexion->prepare($sql);
                        $stmt->execute();
                     }
                     else {
                      echo "rien modifier";
                    }
                    ?>
          
                  </div>
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
              </div>
              
              
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="text-right">
                <a href="table-etudiant.php" target="_blank" class="btn btn-primary modifier">Table des étudiants</a>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </form>
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6" style="margin-top: 20px">
        <div class="card border-success">
          <div class="card-body bg-success text-white">
            <div class="row">
              <div class="col-3">
                <i class="fa fa-user-tie fa-5x"></i>
              </div>
              <div class="col-9 text-right">
                <h1>3</h1>
                <h4>Admin</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6" style="margin-top: 20px">
        <div class="card border-secondary">
          <div class="card-body bg-secondary text-white">
            <div class="row">
              <div class="col-3">
                <i class="fa fa-user-graduate fa-5x"></i>
              </div>
              <div class="col-9 text-right">
                <h1>347</h1>
                <h4>Etudiants<small style="font-size: smaller;">
                  <a href="Etudiants.html">Cliquez ici</a></small> </h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6" style="margin-top: 20px">
        <div class="card border-danger">
          <div class="card-body bg-danger text-white">
            <div class="row">
              <div class="col-3">
                <i class="fal fa-burger-soda fa-5x"></i>
              </div>
              <div class="col-9 text-right" style="padding-left: 50px;">
                <h1>145</h1>
                <h4>Tickets <small style="font-size: smaller;">
                  <a href="tickets.html">Cliquez ici</a></small> </h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <table class="table">
      <thead class="thead-dark" style="background-color: black;color: white;">
        <tr>
          <th scope="col">CNE</th>
          <th scope="col">CIN Etudiant</th>
          <th scope="col">Nom Etudiant</th>
          <th scope="col">Prenom Etudiant</th>
          <th scope="col">Ecole</th>
          <th scope="col">Email Etudiant</th>
          <th scope="col">Sexe Etuduant</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">V464632</th>
          <td>N467922</td>
          <td>El Hajali</td>
          <td>Imad Eddine</td>
          <td>Ensa</td>
          <td>ImadHajali66@gmail.com</td>
          <td>Homme</td>
        </tr>
        <tr>
          <th scope="row">V464632</th>
          <td>N467922</td>
          <td>El Hajali</td>
          <td>Imad Eddine</td>
          <td>Ensa</td>
          <td>ImadHajali66@gmail.com</td>
          <td>Homme</td>
        </tr>
        <tr>
          <th scope="row">V464632</th>
          <td>N467922</td>
          <td>El Hajali</td>
          <td>Imad Eddine</td>
          <td>Ensa</td>
          <td>ImadHajali66@gmail.com</td>
          <td>Homme</td>
        </tr>
        <tr>
          <th scope="row">V464632</th>
          <td>N467922</td>
          <td>El Hajali</td>
          <td>Imad Eddine</td>
          <td>Ensa</td>
          <td>ImadHajali66@gmail.com</td>
          <td>Homme</td>
        </tr>
        <tr>
          <th scope="row">V464632</th>
          <td>N467922</td>
          <td>El Hajali</td>
          <td>Imad Eddine</td>
          <td>Ensa</td>
          <td>ImadHajali66@gmail.com</td>
          <td>Homme</td>
        </tr>
        <tr>
          <th scope="row">V464632</th>
          <td>N467922</td>
          <td>El Hajali</td>
          <td>Imad Eddine</td>
          <td>Ensa</td>
          <td>ImadHajali66@gmail.com</td>
          <td>Homme</td>
        </tr>
        <tr>
          <th scope="row">V464632</th>
          <td>N467922</td>
          <td>El Hajali</td>
          <td>Imad Eddine</td>
          <td>Ensa</td>
          <td>ImadHajali66@gmail.com</td>
          <td>Homme</td>
        </tr>
        <tr>
          <th scope="row">V464632</th>
          <td>N467922</td>
          <td>El Hajali</td>
          <td>Imad Eddine</td>
          <td>Ensa</td>
          <td>ImadHajali66@gmail.com</td>
          <td>Homme</td>
        </tr>
        <tr>
          <th scope="row">V464632</th>
          <td>N467922</td>
          <td>El Hajali</td>
          <td>Imad Eddine</td>
          <td>Ensa</td>
          <td>ImadHajali66@gmail.com</td>
          <td>Homme</td>
        </tr>
        <tr>
          <th scope="row">V464632</th>
          <td>N467922</td>
          <td>El Hajali</td>
          <td>Imad Eddine</td>
          <td>Ensa</td>
          <td>ImadHajali66@gmail.com</td>
          <td>Homme</td>
        </tr>
        <tr>
          <th scope="row">V464632</th>
          <td>N467922</td>
          <td>El Hajali</td>
          <td>Imad Eddine</td>
          <td>Ensa</td>
          <td>ImadHajali66@gmail.com</td>
          <td>Homme</td>
        </tr>
        <tr>
          <th scope="row">V464632</th>
          <td>N467922</td>
          <td>El Hajali</td>
          <td>Imad Eddine</td>
          <td>Ensa</td>
          <td>ImadHajali66@gmail.com</td>
          <td>Homme</td>
        </tr>
        <tr>
          <th scope="row">V464632</th>
          <td>N467922</td>
          <td>El Hajali</td>
          <td>Imad Eddine</td>
          <td>Ensa</td>
          <td>ImadHajali66@gmail.com</td>
          <td>Homme</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<script>
var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];
btn.onclick = function () {
  modal.style.display = "block";
};
span.onclick = function () {
  modal.style.display = "none";
};
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};
</script>
  <!-- Vendor JS Files -->
  <script src="/Sailor/style/vendor/bootstrap/js/bootstrap.js"></script>
  <script src="style/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="style/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="style/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="style/vendor/php-email-form/validate.js"></script>
  <script src=style/vendor/swiper/swiper-bundle.min.js"></script>
  <script src=style/vendor/waypoints/noframework.waypoints.js"></script>
</body>
</html>
