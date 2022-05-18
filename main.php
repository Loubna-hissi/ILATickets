<?php
require 'base.php';
require 'configDate.php';
session_start();
if(isset($_GET["action"])){
  if($_GET["action"]=="remove"){
    foreach ($_SESSION["cart_item"] as $keys => $values) {
     if($values['ID_REPAS']==$_GET["code"]){
       unset($_SESSION["cart_item"][$keys]);
       echo'<script>window.location="main.php"</script>';
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
          echo'<script>window.location="main.php"</script>';
        }else{
                      $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
        }
        
      }
      else {
          $_SESSION["cart_item"] = $itemArray;
        }
      
}}
ob_start();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />

    <title>Main_Page</title> 
    <!--  Favicon  -->
    <link  href="assetsMain/img/favicon.ico" />
    <!-- Vendor CSS Files -->
    <link href="assetsMain/vendor/animate.css/animate.min.css" rel="stylesheet" />
    <link
      href="assetsMain/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="assetsMain/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link href="assetsMain/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link
      href="assetsMain/vendor/glightbox/css/glightbox.min.css"
      rel="stylesheet"
    />
    <link href="assetsMain/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="assetsMain/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />
    <style>
      .calendrier {
        display: flex;
        flex-direction: column;
      } 
    </style>
  </head>
  <body>
    <header>
      <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
          <a href="#" class="navbar-brand d-flex align-items-center">
            <img src="assetsMain/img/logo.jpg" alt="Logo" style="height: 50px;">
          </a>
        </div>
      </div>
    </header>
    <main>
       <div class="album py-5 bg-light">
        <div class="container">
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <?php
          $sth = $connexion->prepare("SELECT * FROM repas ORDER BY DATE_RESERVATION DESC LIMIT 12");
          $sth->execute();
          $sth->execute();
          $LesRepas = $sth->fetchAll(PDO::FETCH_ASSOC);
          sort($LesRepas);
          //print_r($LesRepas);

          $j=-2;
for($i=0;$i<6;$i++){
  $j=$j+2;
  ?>
  <!-- Start first box   -->
  <div class="col">
    <div class="card shadow-sm">
      <div class="calendrier">
        <p id="month-name-<?php echo $i+1?>">
        <?php   echo strftime("%A ", strtotime($LesRepas[$j]["DATE_RESERVATION"])); ?>
        </p>
        <p id="day-name-<?php echo $i+1?>">
        <?php echo strftime("%B ", strtotime($LesRepas[$j]["DATE_RESERVATION"])); ?>
        </p>
        <p id="day-number-<?php echo $i+1?>">
        <?php   echo strftime("%d ", strtotime($LesRepas[$j]["DATE_RESERVATION"])); ?>
        </p>
        <p id="year-<?php echo $i+1?>"> </p>
      </div>
      <div class="card-body">                  
        <div
          class="d-flex justify-content-between align-items-center"
        > 
          <div class="btn-group">
          <form method="post" action="main.php?action=add&code=<?php echo $LesRepas[$j]['ID_REPAS']; ?>">
            <input type="submit"
            class="btn btn-sm btn-outline-secondary"
            value="Déjeuner" >
            </form>
            <form method="post" action="main.php?action=add&code=<?php echo $LesRepas[$j+1]['ID_REPAS']; ?>">
            <input type="submit"
            class="btn btn-sm btn-outline-secondary"
            value="Dîner" ></form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--  End fisrt box  -->
  <?php
}
?>           <!--  add more boxes here  -->
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
            <td><a href='main.php?action=remove&code=<?php echo $item['ID_REPAS']; ?>'><i class="bi bi-x-square"></i></a></td>
          </tr>
          <?php
				$total_price += $item['TARIF'];
		}
    $_SESSION['prix']=$total_price;

		?>
    <tr>
<td>Total:</td>
<td></td>
<td ><strong><?php echo number_format($total_price, 2)."DH"; ?></strong></td>
</tr>
          <!--
            Ajouter autre lignes ici
          -->
        </tbody>
      </table>
      <?php
}?>
	<form method="post" action="main.php">
	<input type="submit" name="valider" value="Confirmer" ></div>	

    </div>


    <script
      src="/docs/5.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
      crossorigin="anonymous"
    ></script>
    <script src="script-3.js"></script>
  </body>
</html>
<?php
  $cne=$_SESSION['cne'];
if(isset($_POST["valider"])){   
    $sql = "INSERT INTO ticket (CNE,DATE_DE_RESEVATION,	PRIX_A_PAYE	,STATUT_PAIMENT) VALUES (?,?,?,?)";
    //$d=date('Y-m-d');
    $stmt= $connexion->prepare($sql);
    $stmt->execute([$cne,$d,$_SESSION['prix'],'0']);
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
}?>