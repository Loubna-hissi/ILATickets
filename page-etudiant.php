<?php session_start();
require 'base.php';
require 'configDate.php';
$cne=$_SESSION['cne'];
$prix=$_SESSION['prix'];
$sth = $connexion->prepare("SELECT * FROM etudiant where CNE=? ");
  $sth->execute([$cne]);
  $etudiant = $sth->fetchAll(PDO::FETCH_ASSOC);
  //this is how we will know the user is logget in
  $nom=$etudiant[0]["NOM_ETUDIANT"];
  $prenom=$etudiant[0]["PRENOM_ETUDIANT"];
  $cin=$etudiant[0]["CIN_ETUDIANT"];
  $ecole=$etudiant[0]["ECOLE"];
  $sexe=$etudiant[0]["SEXE_ETUDIANT"];
if (isset($_POST['confirme'])) {
if(isset($_POST['prenom']))     $prenom=htmlspecialchars($_POST['prenom']);   
if(isset($_POST['nom']))     $nom=htmlspecialchars($_POST['nom']);   
if(isset($_POST['cin']))     $cin=htmlspecialchars($_POST['cin']);  
if(isset($_POST['etab']))     $etab=htmlspecialchars($_POST['etab']);  
if(isset($_POST['sexe']))     $sexe=htmlspecialchars($_POST['sexe']);  

$req = $connexion->exec("UPDATE `etudiant` SET `CIN_ETUDIANT` = '$cin',`NOM_ETUDIANT`='$nom',`PRENOM_ETUDIANT`='$prenom',`ECOLE`='$etab',`SEXE_ETUDIANT`='$sexe' WHERE `etudiant`.`CNE` = '$cne'");

} 
//selectionner des informations de tickets de l utilisateur
$dateReserve=$_SESSION['time'];
$tick= $connexion->prepare("SELECT * FROM ticket where CNE='$cne' and DATE_DE_RESEVATION='$dateReserve'");
$tick->execute();
$produit = $tick->fetchAll(PDO::FETCH_ASSOC); 
$IDTicket =$produit[0]['ID_TICKET'];
//selectionner des informations de contient de l utilisateur
$contenir= $connexion->prepare("SELECT * FROM contient where ID_TICKET='$IDTicket'");
$contenir->execute();
$product= $contenir->fetchAll(PDO::FETCH_ASSOC); 

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Profile Page</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link rel="shortcut icon" href="StylesP/About-Style/img/favicon.ico" />

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link
      href="StylesP/About-Style/vendor/animate.css/animate.min.css"
      rel="stylesheet"
    />
    <link
      href="StylesP/About-Style/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="StylesP/About-Style/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link
      href="StylesP/About-Style/vendor/boxicons/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      href="StylesP/About-Style/vendor/glightbox/css/glightbox.min.css"
      rel="stylesheet"
    />
    <link
      href="StylesP/About-Style/vendor/remixicon/remixicon.css"
      rel="stylesheet"
    />
    <link
      href="StylesP/About-Style/vendor/swiper/swiper-bundle.min.css"
      rel="stylesheet"
    />

    <!-- Template Main CSS File -->
    <link href="StylesP/About-Style/css/style.css" rel="stylesheet" />
    <style>
    input,select
{
    border: 1px solid #1670BE;
    box-shadow: 0 0 3px #1670BE;
    outline-offset: 0px;
    outline: none;
}
    </style>
  </head>
  <body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
      <div class="container d-flex align-items-center">
        <a href="index.html" class="logo me-auto"
          ><img src="StylesP/About-Style/img/logo.jpg" alt="" class="img-fluid"
        /></a>

        <nav id="navbar" class="navbar">
          <ul>
            <li>
              <a href="AcceuilEtud.php" class="active">Home</a>
            </li>
            <li><a href="About.php">About</a></li>
            <li><a href="Services.php">Services</a></li>
            <li><a href="Contact.php">Contact</a></li>
            <li>
              <a href="profile.php" class="getstarted"
                ><i class="bi bi-person-circle"></i>Profile</a
              >
            </li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->
      </div>
    </header>
    <!-- End Header -->
    
  <div class="container" style="padding-top: 120px;">
    <div class="row gutters">
      <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
          <div class="card-body">
            <div class="account-settings">
              <div class="user-profile">
                <div class="user-avatar">
                  <img src="StylesP/About-Style/img/logo-removebg.png" alt="Logo" />
                </div>
              </div>
              <div class="about">
                <h5 class="mb-2 text-primary">Remarque</h5>
                <p>
                  Les modifications seront immédiatement appliquées et vous ne pouvez pas revenir a l'état précedent
                </p>
                
                <div>
              </div>
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
                  <form method="post" action="profile.php">
                  <label>CIN :</label>
                  <hr>
                  <input name="cin" type="text" value="<?php echo $_POST['cin'] ?? $cin;?>"style="background: transparent;">
                  <hr>
              </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                  <label>Prenom :</label>
                  <hr>
                  <input type="text" name="prenom"  value="<?php echo $_POST['prenom'] ?? $prenom;?>"style="background: transparent">
                  <hr>
              </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                  <label>Nom :</label>
                  <hr>
                  <input name="nom" type="text" value="<?php echo $_POST['nom'] ?? $nom;?>"style="background: transparent">
                  
                  <hr>
              </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                  <label>Ecole :</label>
                  <hr>
                  <select name="etab" style="background: transparent;">
                  <?php
                   if($_SESSION['ecole']=='ENSA'){
                  echo ' <option value="ENSA">ENSA</option>
                 <option value="faculté">La Faculté</option>';
                  }else{
                    echo '<option value="faculté">La Faculté</option>  
                    <option value="ENSA">ENSA</option>';
                  }
                  ?>
                   </select>
                  <hr>
              </div>
              </div>
            </div>
            <div class="row gutters">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                  <label>CNE :</label>
                  <hr>
                  <p><?php echo $_SESSION['cne']?></p>
                  <hr>
              </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                  <label>Sexe :</label>
                  <hr>
                  <select name="sexe" style="background: transparent;">
                  <?php
                   if($_SESSION['sexe']=='Homme'){
                  echo ' <option value="Homme">Homme</option>
                 <option value="Femme">Femme</option>';
                  }else{
                    echo '<option value="Femme">Femme</option>  
                    <option value="Homme">Homme</option>';
                  }
                  ?>
                   </select>
                  <hr>
              </div>
              </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="text-right" style="margin-top: 40px;">
                  <input style="background-color:#0d6efd;width:130px;color:white;font-size:20px;border-radius: .25rem;  
height: 40px;" type="submit" value="Confirmer" name="confirme">
                </div>
              </div>
              </form>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="text-right" style="margin-top: 40px;">
                  <button id="myBtn" class="btn btn-primary modifier">
                    Consulter un résumé de votre tickets du semaine </button>
                </div>
              </div>
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
          <th scope="col">Date de ticket</th>
          <th scope="col">Déjeuner</th>
          <th scope="col">dîner</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i=0;
        foreach($product as $g){    
            $IDrepas =$product[$i]['ID_REPAS'];
            $i=$i+1;
            //selectionner des informations de Repas de l utilisateur
            $Repas= $connexion->prepare("SELECT * FROM repas where ID_REPAS='$IDrepas'");
            $Repas->execute();
            $result= $Repas->fetchAll(PDO::FETCH_ASSOC); 
        foreach($result as $clef){
            echo "<tr>";
            echo '<th scope="row">'.$clef['DATE_RESERVATION'].'</th>';
            if($clef['TYPE_REPAS']=='déjeuner'){
            echo  '<td>reservée</td>';
            }
            else{
            echo  '<td>non reservée</td>';
                }
            if($clef['TYPE_REPAS']=='dîner'){
            echo  '<td>reservée</td>';
                }
            else{
            echo  '<td>non reservée</td>';
            }
            echo "</tr>";
        }
    }
         
        echo "<tr>"; 
         echo '<td colspan="3" style="text-align: center;">Prix totale est <span style="font-weight: 800;">'.$prix.' DH</span></td>';
          echo "</tr>";
        ?>
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
    <script src="StylesP/About-Style/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="StylesP/About-Style/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="StylesP/About-Style/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="StylesP/About-Style/vendor/php-email-form/validate.js"></script>
    <script src="StylesP/About-Style/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="StylesP/About-Style/vendor/waypoints/noframework.waypoints.js"></script>

    <!-- Template Main JS File -->
    <script src="StylesP/About-Style/js/main.js"></script>
  </body>
</html>