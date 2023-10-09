<?php 
require_once ("{$ROOT}{$DS}models{$DS}modelUtilisateur.php");
require_once ("{$ROOT}{$DS}models{$DS}modelFormation.php"); 
 require_once ("{$ROOT}{$DS}models{$DS}modelCatégorie.php");
 require_once ("{$ROOT}{$DS}models{$DS}modelChapitre.php");
 require_once ("{$ROOT}{$DS}models{$DS}modelLCommande.php");
 require_once ("{$ROOT}{$DS}models{$DS}modelFactureab.php");
 require_once ("{$ROOT}{$DS}models{$DS}modelAvis.php");
 require_once ("{$ROOT}{$DS}models{$DS}modelAffectation.php");
 require_once ("{$ROOT}{$DS}models{$DS}modelFonctionnaire.php");

if(isset($_REQUEST['action']))	
	$action = $_REQUEST['action'];
else $action="acceuil";	

switch ($action) {
/* Affichage de liste des formations **************************************/
case "listeformations":     
     $cat=modelCatégorie::categories(); 
    if(isset($_SESSION['idtuteur'])){
      if(isset($_REQUEST['cle'])){
      $rep=modelFormation::recherche_simple_tut($_REQUEST['cle'],$_SESSION['idtuteur']);
      }else if(isset($_REQUEST['choix'])){
            $rep=modelFormation::recherche_avancée_tut($_REQUEST['choix'],$_SESSION['idtuteur']);
      }else{$rep=modelFormation::formtut($_SESSION['idtuteur']);}
    }
    if(isset($_SESSION['idadmin'])){
      if(isset($_REQUEST['cle'])){
      $rep=modelFormation::recherche_simple_ad($_REQUEST['cle']);
      }else if(isset($_REQUEST['choix'])){
            $rep=modelFormation::recherche_avancée_ad($_REQUEST['choix']);
      }else{$rep=modelFormation::read();}
    }
      require ("{$ROOT}{$DS}views{$DS}view.php");
break;

/* Affichage des détails de formation *************************************/
case "consulterdetailform":
  if(isset($_SESSION['idclient'])){
          $id=$_SESSION['idclient'];
          
         $reponse=modelLcommande::formations_achetée($id);
         $test="non";
      while ($ligne = $reponse->fetchObject()){
         if($ligne->id_f==$_REQUEST['id_f']){
          $test="oui";
         }
      }
         $reponse2=modelFactureab::abonnement_client($id);
         $testab="non";
         if($reponse2!=0){
        while ($ligne = $reponse2->fetchObject()){
         if($ligne->etat=="Active"){
          $testab="oui";}  
        }}
  }
       
        if(isset($_SESSION["idclient"])){
         $id=$_SESSION["idclient"];
         $repp=modelAvis::test_avis($id,$_REQUEST['id_f']);
        } 
           $rep=modelFormation::consulterdetailform($_REQUEST['id_f']);
           $action="detailf";
            require ("{$ROOT}{$DS}views{$DS}view.php");
break;

/* Affichage des formations par catégorie ***************************************/
case "formcat":
         if(isset($_REQUEST['id_c'])){
        $rep=modelFormation::formcat($_REQUEST['id_c']);}
        if($_REQUEST['id_c']==1){
           $action="formations_AN";
           $rep=modelFormation::read();
          $formation_AN=modelFonctionnaire::formation_AN($_SESSION['idclient']);
         }else{$action="formation";
         $rep=modelFormation::formcat('');}
        require ("{$ROOT}{$DS}views{$DS}view.php");
break;

/* Modifier une formation ********************************************************/
case "modiform": 
  if(isset($_FILES['img'])&&isset($_REQUEST['nom'])&&isset($_REQUEST['des'])&&isset($_REQUEST['px'])&&isset($_REQUEST['id_f'])) {
           $file =$_FILES['img']['name'];
            $file_loc = $_FILES['img']['tmp_name'];  
            $file_size = $_FILES['img']['size'];
            $file_type = $_FILES['img']['type'];
            $folder="img/"; $id=$_REQUEST['id_f'];

      if(move_uploaded_file($file_loc,$folder.$file)){
                    $rep=modelFormation::modifier($_REQUEST['id_f'],$_REQUEST['nom'],$_REQUEST['des'],$_REQUEST['px'],$file);
              if($rep=='validation'){
          		header("location:http://localhost/site_cni/index.php?controller=formation&action=listeformations&msg=modif");
              }else{header("location:http://localhost/site_cni/index.php?controller=formation&action=modiform&id_f=$id");}
      }else{header("location:http://localhost/site_cni/index.php?controller=formation&action=modiform&id_f=$id&msg=erreurimg");}
  }else{
            $rep2=modelFormation::consulterdetailform($_REQUEST['id_f']);
        require ("{$ROOT}{$DS}views{$DS}view.php");}
break;

/* Ajouter une formation **********************************************************/
case "ajouteformation":
      if(isset($_FILES['img'])&&isset($_REQUEST['nom'])&&isset($_REQUEST['des'])&&isset($_REQUEST['px'])&&isset($_REQUEST['listecat'])){
          $file = rand(1000,100000)."-".$_FILES['img']['name'];
          $file_loc = $_FILES['img']['tmp_name'];  
          $file_size = $_FILES['img']['size'];
          $file_type = $_FILES['img']['type'];
          $folder="img/";
          $new_size = $file_size/1024;  
          $new_file_name = strtolower($file);
          $final_file=str_replace(' ','-',$new_file_name);
          if(move_uploaded_file($file_loc,$folder.$final_file))
             {$rep=modelFormation::ajouter($final_file,$_REQUEST['nom'],$_REQUEST['des'],$_REQUEST['px']);
              $choix=$_REQUEST['listecat'];
              $res=modelAffectation::affectation($rep,$choix);
                  if($res=='validation'){
                 header("location:http://localhost/site_cni/index.php?controller=formation&action=listeformations");
                }else{header("location:http://localhost/site_cni/index.php?controller=formation&action=ajouter&msg=erreur"); }
         }else{header("location:http://localhost/site_cni/index.php?controller=formation&action=ajouteformation&msg=erreurimg"); }

      }else{ $rep2=modelCatégorie::tcatégories();
        require ("{$ROOT}{$DS}views{$DS}view.php");}
break;

/* Supprimer une formations *****************************************************/
case "supprimer":
  $rep2=modelFormation::supprimer($_REQUEST['id_f']);
  if($rep2=="echec"){
  header("location:http://localhost/site_cni/index.php?controller=formation&action=listeformations&msg=echecsup");
  }else{  header("location:http://localhost/site_cni/index.php?controller=formation&action=listeformations&msg=sup");}
break;

/* Réalisation d'une recherche simple ******************************************/
case "recherchesimple":

    if(isset($_REQUEST['cle'])){
      $rep=modelFormation::recherchesimple($_REQUEST['cle']);
      $action="formation";
              require ("{$ROOT}{$DS}views{$DS}view.php");

    }
break;

/* Réalisation d'une recherche avancée ******************************************/
case "rechercheavancée":

    if(isset($_REQUEST['choix'])){
      $choix=$_REQUEST['choix'];
      if($choix=="précent"){
      $rep=modelFormation::plus_récent();  
      }
          if($choix=="pbas"){
      $rep=modelFormation::plus_bas();  
      }
          if($choix=="pélevé"){
      $rep=modelFormation::plus_élevé();  
      }
      
      $action="formation";
              require ("{$ROOT}{$DS}views{$DS}view.php");

    }
break;

  }
