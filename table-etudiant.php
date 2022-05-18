<?php require 'base.php';
$responce=$connexion->prepare("SELECT *FROM etudiant ");
$responce->execute();
$resultat=$responce->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style/css/table-style.css" />
    <title>Table Etudiant</title>
  </head>
  <body>
    <h1>Table des étudiants</h1>
    <table>
      <thead>
        <tr>
          <th>CNE</th>
          <th>CIN</th>
          <th>Nom Etudiant</th>
          <th>Prénom Etudiant</th>
          <th>Etablissement</th>
          <th>Email Etudiant</th>
          <th>Sexe</th>
        </tr>
      </thead>
      <tbody>
        
        <?php
        foreach($resultat as $clef){
          echo "<tr>";
          echo "<td>".$clef['CNE']."</td>";
          echo "<td>".$clef['CIN_ETUDIANT']."</td>";
          echo "<td>".$clef['NOM_ETUDIANT']."</td>";
          echo "<td>".$clef['PRENOM_ETUDIANT']."</td>";
          echo "<td>".$clef['ECOLE']."</td>";
          echo "<td>".$clef['EMAIL_ETUDIANT']."</td>";
          echo "<td>".$clef['SEXE_ETUDIANT']."</td>";
          echo "</tr>";
        }
          ?>  
        
      </tbody>
    </table>
  </body>
</html>