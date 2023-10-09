<?php 
require_once ("{$ROOT}{$DS}models{$DS}modelUtilisateur.php");
require_once ("{$ROOT}{$DS}models{$DS}modelFormation.php"); 
 require_once ("{$ROOT}{$DS}models{$DS}modelCatégorie.php");
 require_once ("{$ROOT}{$DS}models{$DS}modelCommande.php");
 require_once ("{$ROOT}{$DS}models{$DS}modelLCommande.php");

if(isset($_REQUEST['action']))	
	$action = $_REQUEST['action'];
else $action="acceuil";	
$reponse=modelCatégorie::categories();

switch ($action) {
/* Affichage des lignes d'une commande ***************************/
    case "listelcommande":
    $id=$_REQUEST["id_c"];
	 $rep=modelLcommande::consulter($id);
	require ("{$ROOT}{$DS}views{$DS}view.php");break;
	break;
/* Affichage des apprentissages d'un client ********************/
    case "mesapprentissages":
    if(isset($_SESSION['idclient'])){$id=$_SESSION['idclient'];}
    $rep=modelLcommande::formations_achetée($id);
    require ("{$ROOT}{$DS}views{$DS}view.php");
    break;

}
