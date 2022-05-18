<?php
require 'base.php';
require 'configDate.php';
session_start();
if(isset($_GET["action"])){
  if($_GET["action"]=="remove"){
    foreach ($_SESSION["cart_item"] as $keys => $values) {
     if($values['ID_REPAS']==$_GET["code"]){
       unset($_SESSION["cart_item"][$keys]);
       echo'<script>window.location="ticket.php"</script>';
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
        echo'<script>window.location="ticket.php"</script>';
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
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ticket</title>
</head>
<body>
<h3>bienveune</h3>
  <?php
  echo $_SESSION['nom'];
  echo  $_SESSION['prenom'];
  $cne=$_SESSION['cne'];
  ?>
<?php
$sth = $connexion->prepare("SELECT * FROM repas ");
$sth->execute();
$LesRepas = $sth->fetchAll(PDO::FETCH_ASSOC);
$i=1;
foreach ($LesRepas as $key => $value) {
  $i++;
?>
<div class="product-item">
			<div id="day">
      <?php
      if($i%2==0){
        echo strftime("%A ", strtotime($LesRepas[$key]["DATE_RESERVATION"]));
        echo strftime("%B ", strtotime($LesRepas[$key]["DATE_RESERVATION"]));
        }
      ?>
      </div>
      <form method="post" action="ticket.php?action=add&code=<?php echo $LesRepas[$key]['ID_REPAS']; ?>">
			<input type="submit" value='<?php echo $LesRepas[$key]["TYPE_REPAS"]; ?>'></div>
    	</form>
		</div>
<?php
} 
?> 
<?php
if(isset($_SESSION["cart_item"])){
    $total_price = 0;
?>
<table>
<tr>
<th >Repas</th>
<th >Date</th>
<th >Price</th>
<th >Remove</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){    
		?>
				<tr>
				<td><?php echo $item['TYPE_REPAS']; ?></td>
				<td><?php echo $item['DATE_RESERVATION']; ?></td>
				<td ><?php echo "DH".$item['TARIF']; ?></td>
				<td >
				<a href='ticket.php?action=remove&code=<?php echo $item['ID_REPAS']; ?>'>Remove</a></td>
				</tr>
				<?php
				$total_price += $item['TARIF'];
		}
    $_SESSION['prix']=$total_price;

		?>
<tr>
<td>Total:</td>
<td ><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
</tr>
</table>
<?php
}
?>
	<form method="post" action="ticket.php">
	<input type="submit" name="valider" value="valider" ></div>	
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
</body>
</html>