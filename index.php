<?php

$ROOT = __DIR__;
$DS = DIRECTORY_SEPARATOR;
$controleur_default = "utilisateur" ;
if(!isset($_REQUEST['controller']))
$controller=$controleur_default;
			else 
				$controller = $_REQUEST['controller'];
switch ($controller) {

case "utilisateur" :session_start();
				require ("{$ROOT}{$DS}controllers{$DS}controllerUtilisateur.php");

				break;
case "formation" :session_start();
				require ("{$ROOT}{$DS}controllers{$DS}controllerFormation.php");

				break;
case "commande" :session_start();
				require ("{$ROOT}{$DS}controllers{$DS}controllerCommande.php");

				break;				
case "chapitre" :session_start();
				require ("{$ROOT}{$DS}controllers{$DS}controllerChapitre.php");

				break;

case "lc" :session_start();
				require ("{$ROOT}{$DS}controllers{$DS}controllerLcommande.php");

				break;
case "abonnement" :session_start();
				require ("{$ROOT}{$DS}controllers{$DS}controllerAbonnement.php");

				break;
case "factureab" :session_start();
				require ("{$ROOT}{$DS}controllers{$DS}controllerFactureab.php");

				break;
case "categorie" :session_start();
				require ("{$ROOT}{$DS}controllers{$DS}controllerCategorie.php");

				break;
case "avis" :session_start();
				require ("{$ROOT}{$DS}controllers{$DS}controllerAvis.php");

				break;
}
?>