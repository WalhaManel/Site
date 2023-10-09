										
<?php
require_once ("model.php");
Class modelAvis extends model{
private  $id_u;					
private $id_f;
private $nbr_etoile;
protected static $table ='avis';
public function __construct( $id_u= NULL,$id_f= NULL,$nbr_etoile= NULL) {}

public function getid_cat() {}
public function getid_f() {}
/* Calcule de moyenne des avis des clients ***************************/
public function moy_avis($id)
{
$sql="select avg(nbr_etoile) from avis where id_f=$id";
	$rep=model::$bdd->query($sql)or die (model::$bdd->errorinfo()[2]) ;
	$rep=$rep->fetch();
	return $rep[0];}

/* Ajouter un avis *************************************************/
public function ajouter($nbr,$id)
{
$id_u=$_SESSION["idclient"];
$sql="INSERT INTO  `avis` VALUES ($id_u,$id,$nbr)";
	$a=model::$bdd->exec($sql) or die (model::$bdd->errorinfo()[2]);
	if($a!=0){return "validation";}else{ return "echec";}
}

/*Tester si un client a donner un avis ou non **********************/
public function test_avis($id,$f)
{

$sql="select * from avis where id_u=$id and id_f=$f";
	$rep=model::$bdd->query($sql)or die (model::$bdd->errorinfo()[2]) ;
	$nb=$rep->rowcount();
	if($nb!=0){return "oui";}else{ return "non";}

}


public function avis_formation($id)
{
	$t1='avis';
	$t2='formation';
$sql="SELECT AVG(nbr_etoile) as moy FROM $t1,$t2 where $t1.id_f=$t2.id_f and $t2.id_f=$id group by $t1.id_f  ";
	$reponse1 = model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]) ;
	return $reponse1;}
public function avis_client($id_f,$id)
{
	$t1='avis';
$sql="SELECT nbr_etoile  FROM $t1 where id_u=$id and id_f=$id_f ";
	$reponse1 = model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]) ;
	return $reponse1;}

}