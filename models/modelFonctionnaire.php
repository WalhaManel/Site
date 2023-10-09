			
<?php
require_once ("model.php");
Class modelFonctionnaire extends model{
private  $id_fon;					
private $list_app;	
private $cin;
private $id_u;
protected static $table ='fonctionnaire';
public function __construct($id_fon= NULL,$list_app = NULL,$cin= NULL,$id_u = NULL) {}
public function getid_fon() {}
public function getlist_app() {}
public function getcin() {}
public function getid_u() {}

/*Affichage des formations coorepondes à un fonctionnaire d'état ***********/
public function formation_AN($id)
{
	$sql="SELECT * FROM `fonctionnaire` WHERE id_u=$id";
	$reponse1 = model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]) ;
	while ($ligne = $reponse1->fetchObject()){
		return $ligne->list_app;exit;}
	return "erreur";
}

}