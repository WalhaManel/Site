<?php 
require_once ("{$ROOT}{$DS}models{$DS}modelUtilisateur.php");
require_once ("{$ROOT}{$DS}models{$DS}modelFormation.php"); 
 require_once ("{$ROOT}{$DS}models{$DS}modelCatégorie.php");
 require_once ("{$ROOT}{$DS}models{$DS}modelCommande.php");
 require_once ("{$ROOT}{$DS}models{$DS}modelLcommande.php");

if(isset($_REQUEST['action']))	
	$action = $_REQUEST['action'];
else $action="acceuil";	

switch ($action) {
/* Ajouter une formation au panier ********************************/
    case "ajouterpanier":
           if(isset($_SESSION['idclient'])){
            $rep=modelLcommande::test_form($_SESSION['idclient'],$_REQUEST['id_f']);
                if($rep!="aucun"){   $test="oui"; 
                   header("location:http://localhost/site_cni/index.php?controller=lc&action=mesapprentissages&test=oui"); 
             }else{ $rep=modelCommande::ajoutpanier();
             $action="panier";}
            
           }else{
           $rep=modelCommande::ajoutpanier();
           $action="panier";}
		   require ("{$ROOT}{$DS}views{$DS}view.php");

        break;
/* Affichage du panier ******************************************/        
    case "afficherpanier":
			     $action="panier";
			     require ("{$ROOT}{$DS}views{$DS}view.php");
            
        break;

/* Modifier le panier ********************************************/
        case "supanier":
        $id=$_REQUEST['id'];
        modelCommande::supanier($id);
        	     $action="panier";
			     require ("{$ROOT}{$DS}views{$DS}view.php");
        break;
/* Affichage de liste des commandes *******************************/
case "listecommande":
         $rep1=modelUtilisateur::liste_client();
            $rep=modelCommande::liste_commande();
require ("{$ROOT}{$DS}views{$DS}view.php");
break;

/* Ajouter une commande *************************************************************/
 case "ajoutercommande":
          if(isset($_REQUEST['total'])){
            $r=modelCommande::ajoutercommande($_SESSION['idclient'],$_REQUEST['total']); 
            if($r!="echec"){$rep=modelLcommande::ajouter($_SESSION['panier'],$r);
            header("location:http://localhost/site_cni/index.php?controller=lc&action=mesapprentissages");}
          else{header("location:http://localhost/site_cni/index.php?controller=commande&action=afficherpanier");}

          }
            else{
          if(isset($_REQUEST['listeid'])) {
            $choix=$_REQUEST['listeid']; 
            $t=0;
            foreach ($choix as $key => $c) {
            $prix=modelFormation::getprix($c);
            while ($ligne = $prix->fetchObject()){
            $t=$t+$ligne->prix;} }
            $id=modelCommande::ajoutercommande($_SESSION['idadmin'],$t);
            $rep=modelLcommande::ajouter($choix,$id);
            if($rep=='validation'){
                header("location:http://localhost/site_cni/index.php?controller=commande&action=listecommande&msg=validajout");}
            
             }else{
                $rep=modelFormation::read();
             require ("{$ROOT}{$DS}views{$DS}view.php");}}
        break;

/* Supprimer une commande **********************************************************/
case "supprimer":
        $id=$_REQUEST["id_c"];
        $rep=modelCommande::supprimer($id);
        header("location:http://localhost/site_cni/index.php?controller=commande&action=listecommande&msg=sup");
                break;

/* formulaire de paiement ************************************************************/
case "paiement":
     $controller="utilisateur";
     require ("{$ROOT}{$DS}views{$DS}view.php");
break;

    }

