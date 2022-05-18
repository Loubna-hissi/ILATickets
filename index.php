<?php
session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
  if(isset($_POST['login'])){
require 'base.php';
require 'configDate.php';
//session_start(); 
if(isset($_POST['identifiant']))      $identifiant=$_POST['identifiant'];
if(isset($_POST['password']))      $password=$_POST['password'];
// On vérifie si les champs sont vides 
if(empty($identifiant) or empty($password)) {
  $empty='tous les champs doivent etre remplis ';
}  
else{
  //escape email tp protect against sql injections:
$sth = $connexion->prepare("SELECT * FROM compte where CNE=? ");
$sth->execute([$identifiant]);
$result = $sth->fetchAll(PDO::FETCH_ASSOC);
if($result){//exsite
  if(password_verify($_POST['password'],$result[0]["MOT_DE_PASSE"])){
    $sth = $connexion->prepare("SELECT * FROM etudiant where CNE=? ");
    $sth->execute([$identifiant]);
    $etudiant = $sth->fetchAll(PDO::FETCH_ASSOC);
    //this is how we will know the user is logget in
    $_SESSION['nom']=$etudiant[0]["NOM_ETUDIANT"];
    $_SESSION['prenom']=$etudiant[0]["PRENOM_ETUDIANT"];
    $_SESSION['cne']=$result[0]['CNE'];
    //header('location:acceuilEtudiant.php');
    $d=date('Y/m/d');
    if(check_Lundi($d)==0){
      $date=date('Y-m-d');
      $sth = $connexion->prepare("SELECT * FROM ticket where CNE=? and DATE_DE_RESEVATION='$date'");
      $sth->execute([$identifiant]);
      $product = $sth->fetchAll(PDO::FETCH_ASSOC);
      $prix=$product[0]['PRIX_A_PAYE'];
      if($product==null){
        header('location:AcceuilEtud.php');
      }
      else{
      if($product[0]['STATUT_PAIMENT']==0){
        $_SESSION["prix"]=$prix;
        header('location:paiment.php');
      }else{
        $_SESSION['message']="Veuillez vérifier votre boîte de réception e-mail pour telecharger le pdf de votre paiement.";
        header('location:message.php');
      }
      }    
    }     
    else{
      $_SESSION['message']="desole!!";
      header('location:message.php');
    }
  }else{
    $message="le mot de passe entré n'est pas correct!";
  }
}
elseif(!$result){//use exist
  $sth = $connexion->prepare("SELECT * FROM responsable where CIN_RESPONSABLE=? ");
  $sth->execute([$identifiant]);
  $result = $sth->fetch();
  if($result){//exsite
    if(password_verify($_POST['password'],$result['MOT_DE_PASSE'])){
      //this is how we will know the user is logget in
      header('location:espaceAdmin.php');
    }else{
      $message="le mot de passe entré n'est pas correct!";
    }
  }else{
    $message="cet idendifiant ne correspond à aucun compte!";
  }
}
}
  }
}
$identifiant="";
$password="";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" type="image/png" href="img/favicon.ico" />

    <link rel="stylesheet" type="text/css" href="css/css-bootstrap.min.css" />

    <link rel="stylesheet" type="text/css" href="css/animate-animate.css" />

    <link rel="stylesheet" type="text/css" href="css/css-animsition.min.css" />

    <link rel="stylesheet" type="text/css" href="css/select2-select2.min.css" />

    <link rel="stylesheet" type="text/css" href="css/css-util.css" />
    <link rel="stylesheet" type="text/css" href="css/css-main.css" />
  </head>
  <body>
    <div class="limiter">
      <div class="container-login100">
        <div class="wrap-login100">
          <form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="POST">
            <span class="login100-form-title"> Sign In </span>
            <div
              class="wrap-input100 validate-input m-b-16"
              data-validate="Please enter username"
            >
              <input class="input100" type="text" placeholder="Votre Identifiant" name="identifiant" value="<?php echo $_POST['identifiant'] ?? ''; ?>"/>
              <span class="focus-input100"></span>
            </div>
            <div
              class="wrap-input100 validate-input"
              data-validate="Please enter password"
            >
              <input
                class="input100"
                type="password"
                placeholder="Mot De Passe"
                name="password"
                value="<?php echo $_POST['password'] ?? '';?>"
              />
              <span class="focus-input100"></span>
            </div>
            <div class="text-right p-t-13 p-b-23">
              <span class="txt1">vous avez oublié votre</span>
              <a href="forgot.php" class="txt2" name>Password?</a>
            </div>
            <div class="container-login100-form-btn">
              <input type="submit" class="login100-form-btn"value="Sign In" name="login">
            </div>
            <p><?php if(isset($empty)){echo $empty;} ?></p>
            <p><?php  if(isset($message)) echo '<br>'.$message; ?></p>
            <div class="flex-col-c p-t-170 p-b-40">
              <span class="txt1 p-b-9">Créer un Compte</span>
              <a href="sign.php" class="txt3"> Sign up </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
