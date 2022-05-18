<?php
require 'base.php';
$cne='K132089385';
$responce=$connexion->prepare("SELECT *FROM etudiant WHERE CNE='$cne'");
$responce->execute();
$resultat=$responce->fetchAll(PDO::FETCH_ASSOC);
print_r($resultat);

$sql = "DELETE FROM compte WHERE CNE='$cne'";
$stmt= $connexion->prepare($sql);
$stmt_>execute();

?>