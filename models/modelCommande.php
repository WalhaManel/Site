<?php
require_once ("model.php");
Class modelCommande extends model{
private $id_c;			
private $date_operation;	
private $total;	
private $id_u;
protected static $table = 'commande';
public function __construct($id_c= NULL,$date_operation = NULL,$total = NULL,$id_u = NULL) {}
public function getid_c() {}
public function getdate_operation() {}
public function gettotal() {}
public function getid_u() {}

/* Ajouter une formation au panier ****************************/
public function ajoutpanier() {
 $p['id']=$_REQUEST['id_f'];
 $p['nom']=$_REQUEST['nom'];
 $p['img']=$_REQUEST['img'];
 $p['px']=$_REQUEST['prix'];
 if(!isset($_SESSION['panier'])||empty($_SESSION['panier']))
{$_SESSION['panier'] = array();
array_push($_SESSION['panier'],$p);return 1;
}
 	$test=true;
foreach($_SESSION['panier'] as $cle => $element){
if($_REQUEST['id_f']==$element['id']){
$test=false;
  }}
  if($test){array_push($_SESSION['panier'],$p);}
}

/* Modifier le panier ******************************************/
public function supanier($id){
	
	foreach($_SESSION['panier'] as $cle => $element){
		if($element['id']==$id){
	 unset($_SESSION['panier'][$cle]);}
	if(count($_SESSION['panier'])==0){
		unset($_SESSION['panier']);
		}
	}
}

/* Affichage de liste des commandes **************************************/
 public function liste_commande()
{
	$sql="select * from commande";
$reponse = model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]) ;
        return $reponse;
}

/* Supprimer une commande *************************************************/
public function supprimer($id)
{
	$rep=modelLcommande::supprimer($id);
$sql="DELETE FROM `commande` WHERE id_c=$id";
$rep=model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]);}

/* Ajouter une commande ***************************************************/
public function ajoutercommande($total)
{		$t1="commande";
		if(isset($_SESSION['idadmin'])){$id=$_SESSION['idadmin'];}
		if(isset($_SESSION['idclient'])){$id=$_SESSION['idclient'];}
		$d=date("Y-m-d H:m:s");
		$d=model::$bdd->quote($d);
		$sql="INSERT INTO $t1  VALUES (NULL,$d,$total,$id)";
		$rep=model::$bdd->exec($sql) or die (model::$bdd->errorinfo()[2]);
		if($rep!=0){
			$sql1="select * from $t1 where date_operation=$d ";
			$reponse = model::$bdd->query($sql1) or die (model::$bdd->errorinfo()[2]) ;
			while ($ligne = $reponse->fetchObject()){
				return $ligne->id_c;exit;}
		}return "echec";
}

/* Affichage des commandes d'un client **************************************/
public function commande_client($id)
	{   $table='commande';
	$sql="SELECT  id_c FROM $table where $table.id_u=$id";
	$rep=model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]);
$id_c=$rep->fetch();
return $id_c;
	}

/*	public function maxcommande()
	{
		$t1="commande";

	$sqll="select max(id_c) from $t1";
$rep= model::$bdd->query($sqll) or die (model::$bdd->errorinfo()[2]) ;
$id_c=$rep->fetch();
return $id_c;	}*/
}