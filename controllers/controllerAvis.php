<?php 
require_once ("{$ROOT}{$DS}models{$DS}modelUtilisateur.php");
require_once ("{$ROOT}{$DS}models{$DS}modelFormation.php"); 
 require_once ("{$ROOT}{$DS}models{$DS}modelCatégorie.php");
 require_once ("{$ROOT}{$DS}models{$DS}modelCommande.php");
 require_once ("{$ROOT}{$DS}models{$DS}modelLcommande.php");
 require_once ("{$ROOT}{$DS}models{$DS}modelAbonnement.php");
 require_once ("{$ROOT}{$DS}models{$DS}modelAvis.php");

if(isset($_REQUEST['action']))	
	$action = $_REQUEST['action'];
else $action="acceuil";	

switch ($action) {
/* Ajouter un avis à une formation ****************************************************/
	 case "ajouter":
        if(isset($_SESSION["idclient"])){
         if(isset($_REQUEST['nbr'])&&isset($_REQUEST['id_f']))
         {$id=$_REQUEST['id_f'];
         $rep=modelAvis::ajouter($_REQUEST['nbr'],$_REQUEST['id_f']);
         header("location:http://localhost/site_cni/index.php?controller=formation&action=consulterdetailform&id_f=$id");
         }
     }else{header("location:http://localhost/site_cni/index.php?controller=utilisateur&action=connect");}
        break;

     }