<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <title>Login form Design</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="login from design.css">
         <div class="loginbox">
            <img src="avatar icon.jpg" alt="avatar icon" class="Avatar">
                <h1>Se connecter </h1>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                    <label for="cne">CNE<br/></label>
                    <input type="text" name="cne"id="cne" placeholder="Entrer votre cne"><br>

                    <label for="nom">Nom<br/></label>
                    <input type="text" name="nom"id="nom" placeholder="votre nom"><br>

                    <label for="pass_word">Mot de passe<br/></label>
                    <input type="password" name="pass_word"id="pass_word" placeholder="Entrer votre mot de passe"><br>

                    <input type="submit" name="submit" value="Se connecter">
                </form>
         </div>
<?php

   $cne=$_POST["cne"];
   $nom=$_POST["nom"];

   $_SESSION["cne"]=$cne;
   $_SESSION["nom"]=$nom;
   
   echo $_SESSION['cne'];
   echo $_SESSION['nom'];
?>
</body>
</html>