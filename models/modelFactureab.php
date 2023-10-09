						
<?php
require_once ("model.php");
Class modelFactureab extends model{
private  $id_u;					
private $id_ab;	
private $etat;
private $date_dexpiration;
protected static $table ='factureab';
public function __construct($id_u= NULL,$id_ab = NULL,$etat= NULL,$date_dexpiration = NULL) {}
public function getid_u() {}
public function getid_ab() {}
public function getetat() {}
public function getdate_dexpiration() {}
 
/* Ajouter une facture d'abonnement *******************************/
public function ajouterabonnement($idc,$idab,$d)
{ 
		$date=date("Y-m-d");

$date=date($date,strtotime('+2 month',strtotime($date)));
		$d=model::$bdd->quote($date);

	$sql="INSERT INTO `facture_ab`(`id_u`, `id_ab`, `etat`, `date_dexpiration`) VALUES ($idc,$idab,'Active',$d)"; 
$rep=model::$bdd->exec($sql) ;
return $rep;
}

/* Affichage des factures d'abonnement d'un client ********************/
public function abonnement_client($id)
{   $t1="facture_ab";
	$t2="abonnement";
$sql="SELECT * FROM $t1,$t2 WHERE $t1.id_u=$id and $t2.id_ab=$t1.id_ab";
$rep=model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]);
$nb=$rep->rowcount();
if($nb!=0){return $rep;}else{ return "aucun";}}
public function detail_abonnement($rep)
{
$tab=array();
          while ($ligne = $rep->fetchObject()){    
          $rep1=modelAbonnement::detailab($ligne->id_ab);
while ($ligne = $rep1->fetchObject()){    
 array_push($tab,$ligne->duree);}}
 return $tab;}

 /* Affichage des factures des abonnements **************************/
 public function factures()
{
	$t1="facture_ab";
	$t2="abonnement";
	$t3="utilisateur";

	$sql="SELECT distinct $t3.nom,$t3.prenom,$t3.mail,$t1.etat,$t1.date_dexpiration FROM $t1,$t2,$t3 ";
	$rep=model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]);
	return $rep;
}

/* Modifier une facture d'abonnement ************************************/
public function modifier($id)
{
$sql="SELECT * FROM $t1,$t2 ";
	$rep=model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]);
	return $rep;
}

/* Supprimer une facture d'abonnement *********************************/
public function supprimer($id)
{
$sql="SELECT * FROM $t1,$t2 ";
	$rep=model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]);
	return $rep;
}
}