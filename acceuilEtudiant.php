<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
</head>
<body>
  <h3>bienveune</h3>
  <?php
  echo $_SESSION['nom'];
  echo '<br>';
  echo  $_SESSION['prenom'];
    if(isset($_POST["tic"])){
      header('location:ticket.php');
    }
  ?>
  <form method="post" action="ticket.php">
	<input type="submit" name="tic" value="ticket" >
</body>
</html>