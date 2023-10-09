<?php 
require_once ("{$ROOT}{$DS}models{$DS}modelUtilisateur.php");
require_once ("{$ROOT}{$DS}models{$DS}modelFormation.php"); 
 require_once ("{$ROOT}{$DS}models{$DS}modelCatégorie.php");
 require_once ("{$ROOT}{$DS}models{$DS}modelCommande.php");
 require_once ("{$ROOT}{$DS}models{$DS}modelLcommande.php");
 require_once ("{$ROOT}{$DS}models{$DS}modelAbonnement.php");

if(isset($_REQUEST['action']))	
	 $action = $_REQUEST['action'];
else $action="acceuil";	

switch ($action) {
/* Affichage des offres des abonnements ****************************************************/
  case "abonnements":
    $rep=modelAbonnement::abonnements();
	require ("{$ROOT}{$DS}views{$DS}view.php");
  break;
/* Modifier un abonnement *****************************************************************/
  case "modifab":
    if(isset($_REQUEST['duree'])&&isset($_REQUEST['prix'])&&isset($_REQUEST['id_ab'])) {
      	$d=$_REQUEST['duree'];
      	$p=$_REQUEST['prix'];
      	$id=$_REQUEST['id_ab'];
        $rep=modelAbonnement::modifier($id,$d,$p);
     if($rep=='validation'){
        header("location:http://localhost/site_cni/index.php?controller=abonnement&action=abonnements");
      }else{header("location:http://localhost/site_cni/index.php?controller=abonnement&action=modifier&id_ab=$id");}
    }else{
       $rep=modelAbonnement::detailab($_REQUEST['id_ab']);
       require ("{$ROOT}{$DS}views{$DS}view.php");}
    break;
/* Supprimer un abonnement *****************************************************************/
case "supprimer":
    $rep=modelAbonnement::supprimer($_REQUEST['id_ab']);
 header("location:http://localhost/site_cni/index.php?controller=abonnement&action=abonnements");            
 break;
/* Ajouter un abonnement *******************************************************************/
case "ajoutab":
          if(isset($_REQUEST['duree'])&&isset($_REQUEST['prix'])) {
          	$d=$_REQUEST['duree'];
          	$p=$_REQUEST['prix'];
    $rep=modelAbonnement::ajouter($d,$p);
 header("location:http://localhost/site_cni/index.php?controller=abonnement&action=abonnements");     }else{   
                require ("{$ROOT}{$DS}views{$DS}view.php");}       
        
break;
     }

