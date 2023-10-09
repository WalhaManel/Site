<?php
require_once ("model.php");
Class modelLcommande extends model{
private $id_c;			
private $id_f;
protected static $table = 'ligne_commande';
public function __construct($id_c = NULL,$id_f = NULL) {}
public function getid_c() {}
public function getid_f() {}

/* Affichage des lignes d'une commande ***********************************/
public function consulter($id)
{$t1="ligne_commande" ;
	$t2="commande";
	$t3="formation";
	$sql="select DISTINCT * from $t1,$t2,$t3  where $t1.id_f=$t3.id_f and $t1.id_c=$t2.id_c and $t1.id_c=$id";
$reponse = model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]) ;
        return $reponse;
}

/* Ajouter une commande **************************************************/
public function ajouter($choix,$id_c)
{		
foreach ($choix as $key => $c) {
	if(isset($_SESSION['panier'])){
		$id_f=$c['id'];
	}else{
		$id_f=$c;

	}
    $t2="ligne_commande" ;	
    $t3="formation";
    $sql1="select id_f,prix from $t3 where $t3.id_f=$id_f";
    $r= model::$bdd->query($sql1) or die (model::$bdd->errorinfo()[2]) ;
		while ($ligne = $r->fetchObject()){
		$id=$ligne->id_f;
		$p=$ligne->prix;}
	$sql="INSERT INTO $t2 VALUES ($id,$id_c,$p)";
	$a=model::$bdd->exec($sql) or die (model::$bdd->errorinfo()[2]);}
	if($a!=0){return "validation";}else{ return "echec";}
}

/* Affichages des formations achetée par un client **************************/
public function formations_achetée($id)
{
$t2="ligne_commande" ;	
    $t3="formation";
    $t="commande";
$sql="SELECT DISTINCT $t3.id_f,$t3.nom_f,$t3.description,$t3.image,$t3.prix FROM ligne_commande $t2,commande $t,formation $t3 WHERE $t.id_u=$id and $t3.id_f=$t2.id_f and $t.id_c=$t2.id_c";
$reponse = model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]) ;
$nb=$reponse->rowcount();
if($nb!=0){return $reponse;}else{ return "aucun";}
}

public function test_form($id,$f)
{
$t2="ligne_commande" ;	
    $t3="formation";
    $t="commande";
$sql="SELECT * FROM ligne_commande $t2,commande $t WHERE $t.id_u=$id and $t.id_c=$t2.id_c and $t2.id_f=$f";
$reponse = model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]) ;
$nb=$reponse->rowcount();
if($nb!=0){return $reponse;}else{ return "aucun";}
}

/* Supprimer une ligne de commande ****************************************/
public function supprimer($id)
{
$sql="DELETE FROM `ligne_commande` WHERE id_c=$id";
$rep=model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]);}
}