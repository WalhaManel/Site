										
<?php
require_once ("model.php");
Class modelChapitre extends model{
private  $id_chap;					
private $nom;	
private $description;
private $video;
private $id_f;
protected static $table ='chapitre';
public function __construct( $id_chap= NULL,$nom= NULL,	$description= NULL,$video= NULL, $id_f= NULL) {}

public function getid_chap() {}
public function getnom() {}
public function getdescription() {}
public function getvideo() {}
public function getid_f() {}

/* Affichage des chapitres d'une formation ***************************************/
public function consulterchapform($id_f){
		$table='formation';
		$table2='chapitre';
		$id=model::$bdd->quote($id_f);
		$sql="SELECT DISTINCT $table2.id_chap,$table2.nom,$table2.description,$table2.video FROM $table ,$table2  where $table.id_f=$table2.id_f and $table.id_f=$id ";
	$rep = model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]) ;
    $nb=$rep->rowcount();
    if($nb!=0){
    	return $rep;
    }else {return "aucun";}
}

/* Affichage des détails d'un chapitre d'une formation ****************************/
public function détailchapitre($id)
{
$sql="SELECT * FROM chapitre  where id_chap=$id ";
	$rep = model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]) ;
	return $rep;
}

/* Ajouter un chapitre *******************************************************/
public function ajouter($nom,$des,$file,$id)

{       $d=date("Y-m-d");
		$file=model::$bdd->quote($file);
		$nom=model::$bdd->quote($nom);
		$des=model::$bdd->quote($des);
		$d=model::$bdd->quote($d);
		$sql="INSERT INTO `chapitre`(`id_chap`, `nom`, `description`, `video`, `date-chapitre`, `id_f`) VALUES (NULL,$nom,$des,$file,$d,$id)";
		$rep = model::$bdd->exec($sql) or die (model::$bdd->errorinfo()[2]) ;
			if($rep!=0){
		return "validation";}else{return "echecajoute";}
}

/* Modifier un chapitre *************************************************************/
public function modifier($id,$nom,$des,$file)
{		$d=date("Y-m-d");
		$file=model::$bdd->quote($file);
		$nom=model::$bdd->quote($nom);
		$des=model::$bdd->quote($des);
		$d=model::$bdd->quote($d);
		$sql="UPDATE `chapitre` SET `nom`=$nom,`description`=$des,`video`=$file,`date-chapitre`=$d WHERE `id_chap`=$id";
		$rep = model::$bdd->exec($sql) or die (model::$bdd->errorinfo()[2]) ;
			
			if($rep!=0){
		return "validation";}else{return "echecmodification";}
}

/* Supprimer un chapitre *******************************************************/
public function supprimer($id){ 
		$sql2="DELETE FROM `chapitre` WHERE id_chap=$id";
		
		$rep2=model::$bdd->query($sql2)or die (model::$bdd->errorinfo()[2]) ;

		if($rep2!=0){
		return "validation";}else{return "echec";}
}

} 