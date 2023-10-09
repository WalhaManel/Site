<?php 
require_once ("{$ROOT}{$DS}models{$DS}modelUtilisateur.php");
require_once ("{$ROOT}{$DS}models{$DS}modelFormation.php"); 
 require_once ("{$ROOT}{$DS}models{$DS}modelCatégorie.php");
 require_once ("{$ROOT}{$DS}models{$DS}modelAbonnement.php");

if(isset($_REQUEST['action']))	
	$action = $_REQUEST['action'];
else $action="acceuil";	

switch ($action) {
/* Affichage de l'espace du tuteur ********************************************/
case "espacetuteur":
        require ("{$ROOT}{$DS}views{$DS}view.php");
break;
case "espaceadmin":
        require ("{$ROOT}{$DS}views{$DS}view.php");
break;
/* Affichage d'acceuil ******************************************************/
	
case "acceuil":
        $action = "acceuil";
        $reponse=modelCatégorie::categories();
        $ab=modelAbonnement::abonnements();
        $reponse1=modelFormation::noveaute();
        require ("{$ROOT}{$DS}views{$DS}view.php");
break;
/* Se Connecter *************************************************************/

case "connect" :
		if (isset($_REQUEST["mail"])and isset($_REQUEST["mdp"]))
		{	$mail=$_REQUEST["mail"];	
			$mdp=md5($_REQUEST["mdp"]);  
			$action=modelUtilisateur::login_check($mail,$mdp);
				if ($action=="retour"){
                $msg="erreurcnx";
				header("location:http://localhost/site_cni/index.php?msg=msg#course-sec");}else 
				if($action=="espacetuteur"){
																	$action="espacetuteur";
																	require ("{$ROOT}{$DS}views{$DS}view.php");} else 
																	if($action=="espaceadmin"){$action="espaceadmin";
																		require ("{$ROOT}{$DS}views{$DS}view.php");}
				else{   if(isset($_SESSION['total'])){ 
					    $total=$_SESSION['total'];
					    unset($_SESSION['total']); 
						header("location:http://localhost/site_cni/index.php?controller=commande&action=paiement&total=$total");}
					    else if(isset($_SESSION['demandeab'])&&isset($_SESSION['duree'])){ 
					    $id_ab=$_SESSION['demandeab'];$d=$_SESSION['duree'];
					    unset($_SESSION['demandeab']);
					    unset($_SESSION['duree']);
						header("location:http://localhost/site_cni/index.php?controller=commande&action=paiement&id_ab=$id_ab&duree=$d");}
		 			else{header("location:http://localhost/site_cni/index.php");}
					   
				}
        }else{header("location:http://localhost/site_cni/index.php#course-sec");}
	break;

/* Se deconnecter *********************************************************************************/
case "deconnect":
	   $action=modelUtilisateur::deconnect();
	      header("location:http://localhost/site_cni/index.php");
        break;

/* Incription ************************************************************************************/
case "forminscrit" :
    if(isset($_REQUEST["nom"])and isset($_REQUEST["prenom"])and isset($_REQUEST["email"])and isset($_REQUEST["mdp"]) and isset($_REQUEST["cin"]) and isset($_REQUEST["CNRPS"])){
		$n=$_REQUEST["nom"];
		$CNRPS=$_REQUEST["CNRPS"];
		$cin=$_REQUEST["cin"];
		$p=$_REQUEST["prenom"];
		$e=$_REQUEST["email"];
		$mdp=$_REQUEST["mdp"];
		$test=modelUtilisateur::test_CNRPS($CNRPS,$cin);
		if($test=="false"){
        header("location:http://localhost/site_cni/index.php?controller=utilisateur&action=forminscrit&msg=erreurCNRPS");
        exit;
		}
		$t=modelUtilisateur::recherche($e);

	     if($t=="oui"){
		 header("location:http://localhost/site_cni/index.php?controller=utilisateur&action=forminscrit&msg=erreurajout");exit;}
		$id_u=modelUtilisateur::inscrir($n,$p,$e,$mdp);
		$reponse=modelUtilisateur::ajoutFE($test,$cin,$id_u);
		if($reponse=="validation"){
	 header("location:http://localhost/site_cni/index.php");exit;
	    }else{
		require ("{$ROOT}{$DS}views{$DS}view.php");} 
		exit;
    }
    if(isset($_REQUEST["nom"])and isset($_REQUEST["prenom"])and isset($_REQUEST["email"])and isset($_REQUEST["mdp"])){
		$n=$_REQUEST["nom"];
		$p=$_REQUEST["prenom"];
		$e=$_REQUEST["email"];
		$mdp=$_REQUEST["mdp"];
		$t=modelUtilisateur::recherche($e);
	     if($t=="oui"){
		 header("location:http://localhost/site_cni/index.php?controller=utilisateur&action=forminscrit&msg=erreurajout");exit;}
		$reponse=modelUtilisateur::inscrir($n,$p,$e,$mdp);
		
		if($reponse!="echec"){
			        if(isset($_SESSION['total'])){ 
					    $total=$_SESSION['total'];
					    unset($_SESSION['total']); 
						header("location:http://localhost/site_cni/index.php?controller=commande&action=paiement&total=$total");}
					else if(isset($_SESSION['demandeab'])&&isset($_SESSION['duree'])){ 
					    $id_ab=$_SESSION['demandeab'];$d=$_SESSION['duree'];
					    unset($_SESSION['demandeab']);
					    unset($_SESSION['duree']);
						header("location:http://localhost/site_cni/index.php?controller=commande&action=paiement&id_ab=$id_ab&duree=$d");}
        else{
	 	header("location:http://localhost/site_cni/index.php");exit;}}
	}else{
		require ("{$ROOT}{$DS}views{$DS}view.php");} 

break;
/* Affichage de liste des clients **********************************************************/
case "listeclient" :
     if(isset($_REQUEST['cle'])){
      $rep=modelUtilisateur::recherche_simple($_REQUEST['cle']); 
      }else if(isset($_REQUEST['choix'])){
            $rep=modelUtilisateur::recherche_avancée($_REQUEST['choix']);
      }else{
	$rep=modelUtilisateur::liste_client();}
    require ("{$ROOT}{$DS}views{$DS}view.php");
    break;

/* Affichage de liste des tuteurs **********************************************************/
case "listetuteur" :
	$rep=modelUtilisateur::liste_tuteur();
    require ("{$ROOT}{$DS}views{$DS}view.php");
    break;

/* Modifier les informations personnels du compte ***************************************/
case "modifier" : 
	if(isset($_REQUEST["id"])&&isset($_REQUEST["nom"])and isset($_REQUEST["prenom"])and isset($_REQUEST["email"])and isset($_REQUEST["mdp"])){
			$id=$_REQUEST["id"];
			$n=$_REQUEST["nom"];
			$p=$_REQUEST["prenom"];
			$e=$_REQUEST["email"];
			$mdp=$_REQUEST["mdp"];
			$rep=modelUtilisateur::modifier($id,$n,$p,$e,$mdp);
			if(isset($_SESSION['idclient'])){
				header("location:http://localhost/site_cni/index.php?controller=utilisateur&action=infocompte");
			}else if(isset($_REQUEST['tut']))
				{header("location:http://localhost/site_cni/index.php?controller=utilisateur&action=listetuteur");}
				else{header("location:http://localhost/site_cni/index.php?controller=utilisateur&action=listeclient");}	
 
			}else{
					$rep=modelUtilisateur::infocompte($_REQUEST['id_u']);
					$action="Modifierclient";
					require ("{$ROOT}{$DS}views{$DS}view.php");
	}break;

/* Supprimer un compte du client *************************************************************/
case "supprimerclient":
	$id_u=$_REQUEST["id_u"];
	$rep=modelUtilisateur::supprimer($id_u);
	if($rep!=0){
		$msg="sup";
	}
	header("location:http://localhost/site_cni/index.php?controller=utilisateur&action=listeclient&msg=sup");
break;

/* Supprimer un compte du tuteur *************************************************************/
case "supprimertut":
	$id_u=$_REQUEST["id_u"];
	$rep=modelUtilisateur::supprimer($id_u);
	if($rep!=0){
		$msg="sup";
	}
	header("location:http://localhost/site_cni/index.php?controller=utilisateur&action=listetuteur&msg=sup");
break;

/* Affichage des informations personnels du compte *********************************************/
case "infocompte": 
    if(isset($_SESSION['idclient'])){$id=$_SESSION['idclient'];}
    if(isset($_SESSION['idtuteur'])){$id=$_SESSION['idtuteur'];}
    if(isset($_SESSION['idadmin'])){$id=$_SESSION['idadmin'];}
	$rep=modelUtilisateur::infocompte($id);
	require ("{$ROOT}{$DS}views{$DS}view.php");
break;

/* Affichage de profil du client *************************************************************/
case "profil":
	require ("{$ROOT}{$DS}views{$DS}view.php");
break;

/* Ajouter un compte du tuteur **************************************************************/
case "ajoutertut":
    if(isset($_REQUEST["nom"])and isset($_REQUEST["prenom"])and isset($_REQUEST["email"])and isset($_REQUEST["mdp"])){
		$n=$_REQUEST["nom"];
		$p=$_REQUEST["prenom"];
		$e=$_REQUEST["email"];
		$mdp=$_REQUEST["mdp"];
		$test=modelUtilisateur::recherche($e);
		if($test=="oui"){
		 header("location:http://localhost/site_cni/index.php?controller=utilisateur&action=ajoutertut&msg=erreurajout");exit;}
		 $reponse=modelUtilisateur::ajoutertut($n,$p,$e,$mdp);
	 header("location:http://localhost/site_cni/index.php?controller=utilisateur&action=listetuteur");
	 }else{
		require ("{$ROOT}{$DS}views{$DS}view.php");} 
	
break;


} 