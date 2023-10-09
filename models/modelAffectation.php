										
<?php
require_once ("model.php");
Class modelAffectation extends model{
private  $id_cat;					
private $id_f;
protected static $table ='affectation';
public function __construct( $id_cat= NULL,$id_f= NULL) {}

public function getid_cat() {}
public function getid_f() {}
/* Affectation d'une formulaire à une catégorie **********************/
public function affectation($rep,$choix)
{
foreach ($choix as $key => $c) {
	$sql="INSERT INTO `affectation`(`id_f`, `id_cat`) VALUES ($rep,$c)";
	$a=model::$bdd->exec($sql) or die (model::$bdd->errorinfo()[2]);
	if($a=0){return "erreur";exit;}}
return "validation";

}


}