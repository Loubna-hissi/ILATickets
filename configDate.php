<?php
require 'base.php';
setlocale(LC_TIME,'fr_FR.utf8','fra');
function check_Dimanche($date){ 
  $date=strtotime($date);
  $date=date("l",$date);
  $date=strtolower($date);
  if($date=="sunday"){
    return 1;}
  else{return 0;} 
}
  $d=date('Y/m/d');
  $existe=true;
  $newtime=date('Y-m-d');
  $_SESSION['time']=$newtime;
if(check_Dimanche($d)==0){
  $newtime=date('Y-m-d');
  $newtime=date('Y-m-d',strtotime($newtime.'+1 day'));
  $sth = $connexion->prepare("SELECT * FROM repas where DATE_RESERVATION='$newtime'");
  $sth->execute();
  $ex = $sth->fetchAll(PDO::FETCH_ASSOC);
  if($ex==null){
    $existe=false;
  }
  if($existe==false){
  for($i=1;$i<=6;$i++){
  $sql = "INSERT INTO repas (TYPE_REPAS,DATE_RESERVATION,TARIF) VALUES (?,?,?)";
  $stmt= $connexion->prepare($sql);
  $stmt->execute(["déjeuner",$newtime,'1.4']);
  $sql = "INSERT INTO repas (TYPE_REPAS,DATE_RESERVATION,TARIF) VALUES (?,?,?)";
  $stmt= $connexion->prepare($sql);
  $stmt->execute(["dîner",$newtime,'1.4']);
  $newtime=date('Y-m-d',strtotime($newtime.'+1 day'));
  }
  }}
  //verier le jour
  
  function check_Lundi($date){ 
    $date=strtotime($date);
    $date=date("l",$date);
    $date=strtolower($date);
    if($date=="monday"){
      return 1;}
    else{return 0;} 
  }   
?>