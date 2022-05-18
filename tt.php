<?php require 'base.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
       <form method="POST">
            
       <?php 
       if(!empty($_POST['fichier']) ){
        echo "RRR";
   }
else{
    echo "t";
}
       
       ?>
       <input type="file" name="fichier" value="fichier"> 
       <label for=" "></label> 
       <div>
           <div>
       <input type="submit" name="Execiter" value="Executer">
     
            <div>
       </div>
       </form>
       
       
</body>
</html>