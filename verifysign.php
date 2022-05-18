<?php
  //Verification des champs d'un fomulaire
        //securisation les inputs:
        //Assurer le hachage de mot de passe
        if(isset($_POST['Nom']))             $Nom=htmlspecialchars($_POST['Nom']);
        if(isset($_POST['Prénom']))          $Prénom=htmlspecialchars(($_POST['Prénom']));
        if(isset($_POST['cin']))             $cin=htmlspecialchars($_POST['cin']);
        if(isset($_POST['cne']))             $cne=htmlspecialchars($_POST['cne']);
        if(isset($_POST['email']))            $email=htmlspecialchars($_POST['email']);
        $ecole='';
        if(isset($_POST['radio']))
        {
          $ecole=$_POST['radio'];
        }
        $sexe='';
        if(isset($_POST['inlineRadioOptions']))
        {
          $sexe=$_POST['inlineRadioOptions'];
        }
        
        $password1=password_hash($_POST['password1'],PASSWORD_BCRYPT);
        $password2=password_hash($_POST['password2'],PASSWORD_BCRYPT);
        //verifiction des champs vides

        if(!empty($_POST['Nom']) AND !empty($_POST['Prénom']) AND !empty($_POST['cin']) 
        AND !empty($_POST['inlineRadioOptions']) AND !empty($_POST['email']) 
        AND !empty($_POST['password1']) AND !empty($_POST['password2']) AND empty($_POST['agree-term'])){
            //verification du email s'il s agit vraiment d une adresse mail
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                if($_POST['password1']==$_POST['password2']){
                  $verifyCne=$connexion->prepare("SELECT * FROM responsable WHERE cin_responsable=?");
                  $verifyCne->execute([$cin]);
                  $donnee1=$verifyCne->fetch();
      
                  $verifyemail=$connexion->prepare("SELECT * FROM responsable WHERE email_responsable=?");
                  $verifyemail->execute([$email]);
                  $donnee2=$verifyemail->fetch();            
                  if($donnee1){
                    if($donnee2==NULL){
                      $req = $connexion->exec("UPDATE `responsable` SET `NOM_RESPONSABLE` = '$Nom',`PRENOM_RESPONSABLE`='$Prénom',`EMAIL_RESPONSABLE`='$email',`MOT_DE_PASSE`='$password1',`SEXE_RESPONSABLE`='$sexe' WHERE `responsable`.`CIN_RESPONSABLE` = '$cin'");
                    }
                    else{
                      $erreur="vorte email existe déja";
                    }
                  }
                  else{
                      $erreur="votre cin n 'existe pas ";
                  }
                }
                else{
                    $erreur=" vos mots de passe ne correspondent pas !";
                }
            }
            else{
                    $erreur =" votre adresse email n'est pas valide !";
            } 

        }
        else if(!empty($_POST['Nom']) AND !empty($_POST['Prénom']) AND !empty($_POST['cin']) 
        AND !empty($_POST['inlineRadioOptions']) AND !empty($_POST['email']) 
        AND !empty($_POST['password1']) AND !empty($_POST['password2']) AND !empty($_POST['agree-term'])){
          if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            if($_POST['password1']==$_POST['password2']){
                //continue
            }
            else{
                $erreur=" vos mots de passe ne correspondent pas !";
            }
        }
        else{
                $erreur =" votre adresse email n'est pas valide !";
        } 
          if(empty($_POST['radio']) OR empty($_POST['cne'])){
            $erreur="tous les champs doivent être complétés !";
          }
          else{
            $verifyCne=$connexion->prepare("SELECT * FROM etudiant WHERE cne=?");
            $verifyCne->execute([$cne]);
            $donnee1=$verifyCne->fetch();

            $verifyemail=$connexion->prepare("SELECT * FROM etudiant WHERE email_etudiant=?");
            $verifyemail->execute([$email]);
            $donnee2=$verifyemail->fetch();            
            if($donnee1){
              if($donnee2==NULL){
                $req = $connexion->exec("UPDATE `etudiant` SET `CIN_ETUDIANT` = '$cin',`NOM_ETUDIANT` = '$Nom',`PRENOM_ETUDIANT`='$Prénom',`ECOLE`='$ecole',`EMAIL_ETUDIANT`='$email',`SEXE_ETUDIANT`='$sexe' WHERE `etudiant`.`CNE` = '$cne'");
                require 'addIdCompte.php';
            }
              else{
                $erreur="vorte email existe déja";
              }
            }
            else{
                $erreur="votre cne n 'existe pas ";
            }
        }
      }
        else{
             $erreur="tous les champs doivent être complétés !";
        } 

?>