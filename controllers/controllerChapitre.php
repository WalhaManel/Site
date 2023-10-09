<?php 
require_once ("{$ROOT}{$DS}models{$DS}modelUtilisateur.php");
require_once ("{$ROOT}{$DS}models{$DS}modelFormation.php"); 
 require_once ("{$ROOT}{$DS}models{$DS}modelCatégorie.php");
 require_once ("{$ROOT}{$DS}models{$DS}modelChapitre.php");
 require_once ("{$ROOT}{$DS}models{$DS}modelLCommande.php");

if(isset($_REQUEST['action']))	
	$action = $_REQUEST['action'];
else $action="acceuil";	

switch ($action) {
/* Affichage des chapitre d'une formation ********************************************/
    case "voirchapitres":
           $id_f=$_REQUEST['id_f'];
           $rep2=modelChapitre::consulterchapform($_REQUEST['id_f']);
            require ("{$ROOT}{$DS}views{$DS}view.php");
        break;

/* Modifier un chapitre ************************************************************/        
    case "modifier":
    $id_f=$_REQUEST['id_f']; 
      if(isset($_REQUEST['nom'])&&isset($_REQUEST['des'])) {
          	$id=$_REQUEST['id_chap'];
            $file =$_FILES['file']['name'];
            $file_loc = $_FILES['file']['tmp_name'];  
            $file_size = $_FILES['file']['size'];
            $file_type = $_FILES['file']['type'];
            $folder="mp4/";
            if(move_uploaded_file($file_loc,$folder.$file)){
            	$rep=modelChapitre::modifier($id,$_REQUEST['nom'],$_REQUEST['des'],$file);
            	if($rep=='validation'){
            		header("location:http://localhost/site_cni/index.php?controller=chapitre&action=voirchapitres&id_f=$id_f&msg=modif");
            	}else{header("location:http://localhost/site_cni/index.php?controller=chapitre&action=modifier&id_chap=$id");}
            }else{           $rep2=modelChapitre::détailchapitre($_REQUEST['id_chap']);  

              require ("{$ROOT}{$DS}views{$DS}view.php");}
      }else{
           $rep2=modelChapitre::détailchapitre($_REQUEST['id_chap']);  
            require ("{$ROOT}{$DS}views{$DS}view.php");}
        break;

/* Ajouter un chapitre **************************************************************/
case "ajouter":
          if(isset($_REQUEST['nom'])&&isset($_REQUEST['des'])) {
            $id=$_REQUEST['id_f'];
            $nom=$_REQUEST['nom'];
            $des=$_REQUEST['des'];
            $file =$_FILES['file']['name'];
            $file_loc = $_FILES['file']['tmp_name'];  
            $file_size = $_FILES['file']['size'];
            $file_type = $_FILES['file']['type'];
            $folder="mp4/";
            if(move_uploaded_file($file_loc,$folder.$file)){
                $rep=modelChapitre::ajouter($nom,$des,$file,$id);
                 if($rep=='validation'){
                  header("location:http://localhost/site_cni/index.php?controller=chapitre&action=voirchapitres&id_f=$id");}else{require ("{$ROOT}{$DS}views{$DS}view.php");}
            }else{header("location:http://localhost/site_cni/index.php?controller=chapitre&action=voirchapitres&id_f=$id&msg=erreurvid");}
          }else{
            $id=$_REQUEST['id_f'];
            require ("{$ROOT}{$DS}views{$DS}view.php");}
break;

/* Affichages des chapitre d'une formation ********************************************/
    case "videoformation":
         $rep=modelFormation::consulterdetailform($_REQUEST['id_f']);
        $rep2=modelChapitre::consulterchapform($_REQUEST['id_f']);
        require ("{$ROOT}{$DS}views{$DS}view.php");
    break;

/* Supprimer un chapitre ************************************************************/
  case "supprimer":
        $f=$_REQUEST['id_f'];
        $chap=$_REQUEST['id_chap'];
         $rep2=modelChapitre::supprimer($chap);
        if($rep2=="echec"){
        header("location:http://localhost/site_cni/index.php?controller=chapitre&action=voirchapitres&msg=echecsup&id_f=$f");
        }else{  header("location:http://localhost/site_cni/index.php?controller=chapitre&action=voirchapitres&id_f=$f");}
    break;
}

