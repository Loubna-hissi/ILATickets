<?php
require('fpdf.php');
require 'index.php';
require 'base.php';
require 'main.php';
$cne=$_SESSION['cne'];
//Selectionner des informations de l'utilsateur de la base de données
$responce=$connexion->prepare("SELECT *FROM etudiant WHERE CNE='$cne'");
$responce->execute();
$resultat=$responce->fetchAll(PDO::FETCH_ASSOC);

//fonction recuperation
$cne=$resultat[0]['CNE'];
$nom=$resultat[0]['NOM_ETUDIANT'];
$prenom=$resultat[0]['PRENOM_ETUDIANT'];
$email=$resultat[0]['EMAIL_ETUDIANT'];
$dateReserve=$_SESSION['time'];
//selectionner des informations de tickets de l utilisateur
$tick= $connexion->prepare("SELECT * FROM ticket where CNE='$cne' and DATE_DE_RESEVATION='$dateReserve'");
$tick->execute();
$produit = $tick->fetchAll(PDO::FETCH_ASSOC); 
        $IDTicket =$produit[0]['ID_TICKET'];

        //selectionner des informations de contient de l utilisateur
        $contenir= $connexion->prepare("SELECT * FROM contient where ID_TICKET='$IDTicket'");
        $contenir->execute();
        $product= $contenir->fetchAll(PDO::FETCH_ASSOC); 
        $i=0;
        
$position_detail = 78;
class PDF extends FPDF
{
//Page header
function Header()
{
  // AFFICHAGE EN-TÊTE DU TABLEAU
    //Logo
    $this->Image('K.png',160,18,33);
    //Saut du ligne
    $this->Ln(30);
    $this->Image('image.jpeg',30,18,33);
    //Saut du ligne
    $this->Ln(10);
    //Helvetica bold 15
    $this->SetFont('Helvetica','B',15);
    // fond de couleur gris (valeurs en RGB)
    $this->setFillColor(235,165,137);
    //Move to the right
    $this->Cell(60);
    //Title
    $this->Cell(90,15,'Les tickets de la semaine',14,14,'C',1);
    //Line break
}
//Page footer
function Footer()
{
    //Position at 1.5 cm from bottom
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Helvetica','I',8);
    //Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

//Instanciation of inherited class
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Helvetica','B',12);
//Fonction en-tête des tableaux en 3 colonnes de largeurs variables
function entete_table($position_entete) {
  global $pdf;
  $pdf->SetDrawColor(12); // Couleur du fond RVB
  $pdf->SetFillColor(235,165,137); // Couleur des filets RVB
  $pdf->SetTextColor(0); // Couleur du texte noir
  $pdf->SetY($position_entete);
  // position de colonne 1 (10mm à gauche)  
  $pdf->SetX(10);
  $pdf->Cell(60,12,'Date de ticket',1,0,'L',1);  // 60 >largeur colonne, 12>hauteur colonne
  // position de la colonne 2 (70 = 10+60)
  $pdf->SetX(70); 
  $pdf->Cell(60,12,'Dejeuner',1,0,'C',1);
  // position de la colonne 3 (130 = 70+60)
  $pdf->SetX(130); 
  $pdf->Cell(60,12,'dinner',1,0,'C',1);

  $pdf->Ln(); // Retour à la ligne
}
// AFFICHAGE EN-TÊTE DU TABLEAU
// Position ordonnée de l'entête en valeur absolue par rapport au sommet de la page (70 mm)
$position_entete = 70;
// police des caractères
$pdf->SetFont('Helvetica','',9);
$pdf->SetTextColor(0);
// on affiche les en-têtes du tableau
entete_table($position_entete);
// Définition des propriétés du tableau.
$position_detail = 82; // Position ordonnée = $position_entete+hauteur de la cellule d'en-tête (60+8)
$j=1;

$position_detail =82;
foreach($product as $g){    
  $IDrepas =$product[$i]['ID_REPAS'];
  $i=$i+1;
  //selectionner des informations de Repas de l utilisateur
  $Repas= $connexion->prepare("SELECT * FROM repas where ID_REPAS='$IDrepas'");
  $Repas->execute();
  $result= $Repas->fetchAll(PDO::FETCH_ASSOC); 
  print_r($result);
foreach($result as $clef){
    $pdf->SetY( $position_detail );
    $pdf->SetX(10);
    $pdf->MultiCell(60,8,utf8_decode(' '.$clef['DATE_RESERVATION'].''),1,'L');
    $pdf->SetY( $position_detail );
    $pdf->SetX(70);
    if($clef['TYPE_REPAS']=='déjeuner'){
    $pdf->MultiCell(60,8,utf8_decode(' '."reservée".''),1,'C');
    }
    else{
    $pdf->MultiCell(60,8,utf8_decode(' '."non reservée".''),1,'C');
    }
    $pdf->SetY($position_detail);
    $pdf->SetX(130);
    if($clef['TYPE_REPAS']=='dîner'){
      $pdf->MultiCell(60,8,utf8_decode(' '."reservée".''),1,'C');
      }
      else{
      $pdf->MultiCell(60,8,utf8_decode(' '."non reservée".''),1,'C');
      }
      $pdf->SetY($position_detail);
      $pdf->SetX(130);
    $position_detail += 8;
}}
$doc=$pdf->Output('','S');
        

        //creation du code QR par la base de données:
        $contenu="les données personnels :
                  Nom : $nom 
                  Prénom:$prenom 
                  cne:$cne
        Date de réservation: $dateReserve ";

        include('phpqrcode/qrlib.php');

        QRcode::png($contenu,'k.png');
        echo'<img src="k.png"/>';

//Envoyer de mails à l'utilisteur 
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = "loubnahissi03@gmail.com"; // Gmail address which you want to use as SMTP server
    $mail->Password ="el mehdi1999"; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';
   
    $mail->setFrom('loubnahissi03@gmail.com'); // Gmail address which you used as SMTP serverss
    $mail->addAddress('loubnahissi03@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)
    
    $mail->isHTML(true);
    $mail->Subject = 'Message Received (Contact Page)';
    $mail->Body='<html><body><center><font size=3>Salut voici vos tickets!</font><br></body></html>';
    $mail->AddStringAttachment($doc, 'doc.pdf', 'base64', 'application/pdf');
    $mail->send();
    $alert = '<div class="alert-success">
                 <span>Message Sent! Thank you for contacting us.</span>
                </div>';
                
  } catch (Exception $e){
    $alert = '<div class="alert-error">
                <span>'.$e->getMessage().'</span>
              </div>';
  }
?>								