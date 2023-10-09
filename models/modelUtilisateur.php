<?php
require_once ("model.php");
Class modelUtilisateur extends model{
private $id_u;	
private $nom;	
private $prenom;	
private $mail;
private $mdp;
protected static $table = 'utilisateur';
protected static $primary = 'id_u';
public function __construct($id_u = NULL,$nom = NULL, $prenom = NULL,  $mail = NULL, $mdp
= NULL) {}
public function getid_u() {}
public function getnom() {}
public function getprenom() {}
public function getmail() {}
public function getmdp() {}

/* Se connecter *******************************************/
public function login_check($mail,$mdp){		
			model::Init();
			$mail=model::$bdd->quote($mail); 
			$mdp=model::$bdd->quote($mdp); 
			$sql="select * from utilisateur where mail=$mail and mdp=$mdp ";
			$reponse = model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]) ;
		    $nb=$reponse->rowcount();
		if ($nb==0){  return "retour";} else { 
		   			while ($ligne = $reponse->fetchObject()){
				   	 if($ligne->role==1)
						{$_SESSION["nom"]=$ligne->nom;
						$_SESSION["pre"]=$ligne->prenom;
						$_SESSION["idclient"]=$ligne->id_u;
						return "acceuil";
				     }else{if($ligne->role==2){
				    			$_SESSION["nom"]=$ligne->nom;
								$_SESSION["pre"]=$ligne->prenom;
								$_SESSION["idtuteur"]=$ligne->id_u;
								return "espacetuteur";}
							 else{if($ligne->role==3){
								$_SESSION["nom"]=$ligne->nom;
								$_SESSION["pre"]=$ligne->prenom;
								$_SESSION["idadmin"]=$ligne->id_u;
								return "espaceadmin";}
					        }
		             }
		            }
		}
	}

/* Se deconnecter **************************************************/
public function deconnect(){
	if(isset($_SESSION["admin"])||isset($_SESSION['nom'])||isset($_SESSION['pre'])||isset($_SESSION["idclient"])){
		unset($_SESSION["admin"]);
		unset($_SESSION['nom']);
		unset($_SESSION['pre']);
		unset($_SESSION["idclient"]);
		}
		session_destroy();
		return "acceuil";
}

/* Inscription *********************************************************/
public function inscrir($n,$p,$e,$mdp){
	$n=model::$bdd->quote($n); $p=model::$bdd->quote($p); $e=model::$bdd->quote($e); 
$mdp=md5($mdp);$mdp=model::$bdd->quote($mdp); 
	$sql="INSERT INTO `utilisateur` VALUES (null,$n,$p,$e,$mdp,1)";
$rep=model::$bdd->exec($sql) or die (model::$bdd->errorinfo()[2]);

if($rep!=0){
	$sql1="select * from utilisateur where mail=$e ";
	$reponse = model::$bdd->query($sql1) or die (model::$bdd->errorinfo()[2]) ;
	while ($ligne = $reponse->fetchObject()){
			$_SESSION["nom"]=$ligne->nom;
			$_SESSION["pre"]=$ligne->prenom;
			$_SESSION["idclient"]=$ligne->id_u;
			return $ligne->id_u;
	}
	}else{return "echec";}
}

/* Tester le code CNRPS d'un fonctionnaire de l'état *********************************/
public function test_CNRPS($CNRPS,$cin) 
{
$file=file_get_contents('js/CNRP.json');
$file=json_decode($file,true);
$test="false";
for ($i=0; $i < count($file) ; $i++) { 
     if( $file[$i]['code_cnrps']==$CNRPS && $file[$i]['CIN']==$cin ){
     	$test=$file[$i]["applications_utilises"];
      }
     }
    return $test;
}

/* Ajouter un fonctionnaire de l'état *************************************************/
public function ajoutFE($test,$cin,$id_u)
{
        $formations=implode(",", $test);
    	$formations=model::$bdd->quote($formations);
$sql="INSERT INTO `fonctionnaire` VALUES (null,$formations,$cin,$id_u)";
$rep=model::$bdd->exec($sql) or die (model::$bdd->errorinfo()[2]);
if($rep!=0){
	$sql1="select * from utilisateur where id_u=$id_u ";
	$reponse = model::$bdd->query($sql1) or die (model::$bdd->errorinfo()[2]) ;
	while ($ligne = $reponse->fetchObject()){
			$_SESSION["nom"]=$ligne->nom;
			$_SESSION["pre"]=$ligne->prenom;
			$_SESSION["idclient"]=$ligne->id_u;
			
			return "validation";
	}

}else{return "echec";}

}

/* Affichage de liste des clients **********************************************************/
public function liste_client(){		
			model::Init();
			$sql="select * from utilisateur where role=1 ";
			$reponse = model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]) ;
			return $reponse;
}


/* Affichage de liste des tuteurs ************************************************************/
public function liste_tuteur(){		
		model::Init();
		$sql="select * from utilisateur where role=2 ";
		$reponse = model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]) ;
		return $reponse;
}

/* Affichage des informations personnels du compte *******************************************/
public function infocompte($id)
{
	$sql="select * from utilisateur where id_u=$id ";
	$reponse = model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]) ;
	return $reponse;
}


/* Modification des informations personnels du compte *******************************************/
 public function modifier($id,$n,$p,$e,$mdp){
		$n=model::$bdd->quote($n); $p=model::$bdd->quote($p); $e=model::$bdd->quote($e); 
		$mdp=md5($mdp);$mdp=model::$bdd->quote($mdp); 
		$sql="UPDATE `utilisateur` SET `nom`=$n,`prenom`=$p,`mail`=$e,`mdp`=$mdp WHERE id_u=$id";
		$rep=model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]);
		if($rep!=0){
		return "validation";}else{return "echec";}
}


/* Supprimer un compte *************************************************************************/
public function supprimer($id)
{	$sql="DELETE FROM `utilisateur` WHERE id_u=$id";
    $sql2="DELETE FROM `avis` WHERE id_u=$id";
    $sql3="DELETE FROM `commande` WHERE id_u=$id";
    $sql4="DELETE FROM `facture_ab` WHERE id_u=$id"; 
    $sql5="DELETE FROM `fonctionnaire` WHERE id_u=$id";

	$rep2=model::$bdd->query($sql2) or die (model::$bdd->errorinfo()[2]);
	$rep5=model::$bdd->query($sql5) or die (model::$bdd->errorinfo()[2]);
	$rep3=model::$bdd->query($sql3) or die (model::$bdd->errorinfo()[2]);
	$rep4=model::$bdd->query($sql4) or die (model::$bdd->errorinfo()[2]);
	$rep=model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]);
	$nb=$rep->rowcount();
	return $nb;
}

/* Ajouter un tuteur ******************************************************************************/
public function ajoutertut($n,$p,$e,$mdp)
{	$mdp=md5($mdp);$mdp=model::$bdd->quote($mdp);
	$n=model::$bdd->quote($n); $p=model::$bdd->quote($p); $e=model::$bdd->quote($e); 
	$sql="INSERT INTO `utilisateur` VALUES (NULL,$n,$p,$e,$mdp,2)";
	$rep=model::$bdd->exec($sql) or die (model::$bdd->errorinfo()[2]);
    return $rep;
}
/* Recherche l'existance d'un email ****************************************************************/
public function recherche($e)
{    $e=model::$bdd->quote($e); 
	$sql="select * from utilisateur where mail=$e ";
	$reponse = model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]) ;
	$nb=$reponse->rowcount();
	if($nb!=0){return "oui";}else{return "non";}

}

public function recherche_simple($cle)
{
$sql="select * from utilisateur where mail like '%$cle%' or nom like '%$cle%' or prenom like '%$cle%'   ";
	$reponse = model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]) ;
	return $reponse;
}

public function recherche_avancée($c)
{   $t1='utilisateur';
    $t2='fonctionnaire';
	if($c=="FE"){$sql="select * from $t1 , $t2 where role=1 and $t2.id_u=$t1.id_u ";}
	else{
$sql="select * from $t1 , $t2 where role=1 and $t2.id_u NOT LIKE $t1.id_u ";}
	$reponse = model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]) ;
		return $reponse;
}
}