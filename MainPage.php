<?php
require 'base.php';
require 'configDate.php';
session_start();
if(isset($_GET["action"])){
  if($_GET["action"]=="remove"){
    foreach ($_SESSION["cart_item"] as $keys => $values) {
     if($values['ID_REPAS']==$_GET["code"]){
       unset($_SESSION["cart_item"][$keys]);
       echo'<script>window.location="MainPage.php"</script>';
     }
    }
  }
}
if(isset($_GET["action"])) {
  if($_GET["action"]=="add") {
      $sth = $connexion->prepare("SELECT * FROM repas WHERE ID_REPAS='" . $_GET["code"] . "'");
      $sth->execute();
      $productByCode= $sth->fetchAll(PDO::FETCH_ASSOC);
      //print_r($productByCode);
      $itemArray = array($productByCode[0]['ID_REPAS']=>array('TYPE_REPAS'=>$productByCode[0]["TYPE_REPAS"], 'ID_REPAS'=>$productByCode[0]['ID_REPAS'],'DATE_RESERVATION'=>$productByCode[0]["DATE_RESERVATION"] ,'TARIF'=>$productByCode[0]["TARIF"]));
     // print_r($itemArray);
      if(!empty($_SESSION["cart_item"])){
         if(in_array($productByCode[0]['ID_REPAS'],array_keys($_SESSION["cart_item"]))) {

        echo'<script>alert("vous avez deja reserve ce ticket")</script>';
        echo'<script>window.location="MainPage.php"</script>';
      } 
        else{
            $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
        } 
      }
      else {
          $_SESSION["cart_item"] = $itemArray;
        }
      
}}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />

    <title>Main_Page</title> 
    <!--  Favicon  -->
    <link  href="assets/img/favicon.ico" />
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet" />
    <link
      href="assets/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="assets/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link
      href="assets/vendor/glightbox/css/glightbox.min.css"
      rel="stylesheet"
    />
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />
    <style>
      .calendrier {
        display: flex;
        flex-direction: column;
      } 
    </style>
  </head>
  <body>
  <?php
  $cne=$_SESSION['cne'];
  ?>
    <header>
      <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
          <a href="#" class="navbar-brand d-flex align-items-center">
            <img src="assets/img/logo.jpg" alt="Logo" style="height: 50px;">
          </a>
        </div>
      </div>
    </header>
    <main>
       <div class="album py-5 bg-light">
        <div class="container">
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

            <!-- Start first box   -->
            <?php
$sth = $connexion->prepare("SELECT * FROM repas ");
$sth->execute();
$LesRepas = $sth->fetchAll(PDO::FETCH_ASSOC);
$i=1;
foreach ($LesRepas as $key => $value) {
  $i++;
?>
<?php
if($i%2==0){
?>
            <div class="col">
              <div class="card shadow-sm">
                <div class="calendrier">
                  <p id="month-name-1">
                    <?php   echo strftime("%A ", strtotime($LesRepas[$key]["DATE_RESERVATION"])); ?>
                    <!-- Month field -->
                  </p>
                  <p id="day-name-1">
                  <?php echo strftime("%B ", strtotime($LesRepas[$key]["DATE_RESERVATION"])); ?>
                    <!-- Day name field -->
                  </p>
                  <p id="day-number-1">
                  <?php   echo strftime("%d ", strtotime($LesRepas[$key]["DATE_RESERVATION"])); ?>
                    <!-- Day number field -->
                  </p>
                  <p id="year-1">
                    2021
                    <!-- Year field -->
                  </p>
                </div>
                <?php } ?>
                <div class="card-body">                  
                  <div class="d-flex justify-content-between align-items-center">
                   <form method="post" action="MainPage.php?action=add&code=<?php echo $LesRepas[$key]['ID_REPAS']; ?>">
                    <div class="btn-group">
                      <input type="submit" class="btn btn-sm btn-outline-secondary" value="Déjeuner" >
                    </form>
                    <form method="post" action="MainPage.php?action=add&code=<?php echo $LesRepas[$key]['ID_REPAS']; ?>">
                      <input type="submit" class="btn btn-sm btn-outline-secondary" value="Dîner" >
                    </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
</div>
<?php
} 
?>  
            <!--  End fisrt box  -->

            <!--  add more boxes here  -->

            </div>
          </div>
        </div>
      </div>
    </main>
    <?php
if(isset($_SESSION["cart_item"])){
    $total_price = 0;
?>
    <div class="table-container" style="width: 90vw;margin: 10px auto;text-align: center;" >
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Choix</th>
            <th scope="col">Date</th>
            <th scope="col">Prix</th>
            <th scope="col">Supprimer</th>
          </tr>
        </thead>
        <tbody>
        <?php		
    foreach ($_SESSION["cart_item"] as $item){    
		?>
          <tr>
            <td><?php echo $item['TYPE_REPAS']; ?></td>
            <td><?php echo $item['DATE_RESERVATION']; ?></td>
            <td><?php echo $item['TARIF']."DH"; ?></td>
            <td><a href='MainPage.php?action=remove&code=<?php echo $item['ID_REPAS']; ?>'><i class="bi bi-x-square"></i></a></td>
          </tr>
          <?php
				$total_price += $item['TARIF'];
		}
    $_SESSION['prix']=$total_price;

		?>
    <tr>
<td>Total:</td>
<td></td>
<td ><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
</tr>
          <!--
            Ajouter autre lignes ici
          -->
        </tbody>
        <?php
}
?>
      </table>
      <form method="post" action="MainPage.php">
      <input type="submit" name="valider" class="btn btn-outline-success btn-sm" value="Confirmer"></form>
    </div>
    <?php

if(isset($_POST["valider"])){   
    $sql = "INSERT INTO ticket (CNE,DATE_DE_RESEVATION,	PRIX_A_PAYE	,STATUT_PAIMENT) VALUES (?,?,?,?)";
    //$d=date('Y-m-d');
    $stmt= $connexion->prepare($sql);
    $stmt->execute([$cne,$d,$_SESSION['prix'],'false']);
    $date=date('Y-m-d');
    $sth = $connexion->prepare("SELECT * FROM ticket where CNE='$cne' and DATE_DE_RESEVATION='$date'");
    //$sth = $connexion->prepare("SELECT * FROM ticket where CNE='$cne'");
    $sth->execute();
    $product = $sth->fetchAll(PDO::FETCH_ASSOC);
    $IdTicket=$product[0]['ID_TICKET'];
    foreach ($_SESSION["cart_item"] as $item) {
      $id=$item["ID_REPAS"]; 
      $sql = "INSERT INTO contient (ID_TICKET,ID_REPAS) VALUES (?,?)";
      $stmt= $connexion->prepare($sql);
      $stmt->execute([$IdTicket,$id]);
      $item=Array();
  }
  unset($_SESSION["cart_item"]);
  header('location:paiment.php');
}
?>		
    <script
      src="/docs/5.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
      crossorigin="anonymous"
    ></script>
    <script src="script.js"></script>
  </body>
</html>
