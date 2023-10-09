<?php 
require_once ("{$ROOT}{$DS}models{$DS}modelUtilisateur.php");
 require_once ("{$ROOT}{$DS}models{$DS}modelCatégorie.php");
 require_once ("{$ROOT}{$DS}models{$DS}modelFactureab.php");
 require_once ("{$ROOT}{$DS}models{$DS}modelAbonnement.php");
require_once ("{$ROOT}{$DS}models{$DS}model.php");

if(isset($_REQUEST['action']))	
	$action = $_REQUEST['action'];
else $action="acceuil";	
$reponse=modelCatégorie::categories();

switch ($action) {
/* Affichage des détails d'une facture d'un abonnement *****************************/
    case "detailab":
          $rep=modelFactureab::abonnement_client($_SESSION['idclient']); 
			     require ("{$ROOT}{$DS}views{$DS}view.php");
        break;

/* Formulaire de paiement *********************************************************/
case "paiement":
     
     $controller="utilisateur";
     require ("{$ROOT}{$DS}views{$DS}view.php");
break;

/* Ajouter une facture d'abonnement **********************************************/
case "abvous":
      $idab=$_REQUEST['idab'];
      $d=$_REQUEST['duree'];
 
    if(isset($_SESSION['idclient'])){

      $rep=modelFactureab::ajouterabonnement($_SESSION['idclient'],$idab,$d);
        if($rep!=0) { 

          header("location:http://localhost/site_cni/index.php?controller=factureab&action=detailab");}else{
          header("location:http://localhost/site_cni/index.php?controller=factureab&action=detailab&msg=erreurab");           }
            
        }else{$_SESSION['demandeab']=$idab;$_SESSION['duree']=$d;
          header("location:http://localhost/site_cni/index.php#course-sec");}
        break; 
/* Affichage des factures des abonnements ********************************************/
    case "factures":
    $rep=modelFactureab::factures(); 
    require ("{$ROOT}{$DS}views{$DS}view.php");
           
        break;

     }

