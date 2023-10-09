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
/* Ajouter une catégorie ****************************************************/
case "ajoutercat":
	if(isset($_FILES['img'])&&isset($_REQUEST['nom'])){

        $file = rand(1000,100000)."-".$_FILES['img']['name'];
  		$file_loc = $_FILES['img']['tmp_name'];
 		$file_size = $_FILES['img']['size'];
 		$file_type = $_FILES['img']['type'];
		$folder="img/";
  		$new_size = $file_size/1024;  
		 $new_file_name = strtolower($file);
		 $final_file=str_replace(' ','-',$new_file_name);
		if(move_uploaded_file($file_loc,$folder.$final_file))
		 {   $rep=modelCatégorie::ajouter($_REQUEST['nom'],$final_file);
             if($rep=='validation'){
        	 header("location:http://localhost/site_cni/index.php?controller=categorie&action=catégories");
      		 }else{header("location:http://localhost/site_cni/index.php?controller=categorie&action=catégories&msg=erreur"); }
		}else{header("location:http://localhost/site_cni/index.php?controller=categorie&action=ajoutercat"); }

    }else{ require ("{$ROOT}{$DS}views{$DS}view.php");}
break;

/* Affichage des catégories *****************************************************/
case "catégories":
	$reponse=modelCatégorie::categories();
	require ("{$ROOT}{$DS}views{$DS}view.php");   

        break;

/* Supprimer une catégorie ******************************************************/
case "supprimer":
        $cat=$_REQUEST['cat'];
         $rep2=modelCatégorie::supprimer($cat);
        if($rep2=="echec"){
        header("location:http://localhost/site_cni/index.php?controller=categorie&action=catégories&msg=echecsup");
        }else{  header("location:http://localhost/site_cni/index.php?controller=categorie&action=catégories");}
break;

/* Modifier une catégorie **********************************************************/
case "modifiercat":
        if (isset($_REQUEST['cat'])&&isset($_FILES['img'])&&isset($_REQUEST['nom'])){

        $file = rand(1000,100000)."-".$_FILES['img']['name'];
  		$file_loc = $_FILES['img']['tmp_name'];
 		$file_size = $_FILES['img']['size'];
 		$file_type = $_FILES['img']['type'];
		$folder="img/";
  		$new_size = $file_size/1024;  
		 $new_file_name = strtolower($file);
		 $final_file=str_replace(' ','-',$new_file_name);
		if(move_uploaded_file($file_loc,$folder.$final_file))
		 { 
        	$cat=$_REQUEST['cat'];
         $rep2=modelCatégorie::modifier($cat,$_REQUEST['nom'],$final_file);
        if($rep2=="echec"){
        header("location:http://localhost/site_cni/index.php?controller=categorie&action=catégories&msg=echecsup");
        }else{  header("location:http://localhost/site_cni/index.php?controller=categorie&action=catégories");}
        }else{header("location:http://localhost/site_cni/index.php?controller=categorie&action=modifiercat"); }
    }else{
    $reponse=modelCatégorie::détailscategorie($_REQUEST['cat']);
	require ("{$ROOT}{$DS}views{$DS}view.php");   
    }
break;

     }