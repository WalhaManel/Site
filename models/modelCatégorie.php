										
<?php
require_once ("model.php");
Class modelCatégorie extends model{
private  $id_cat;					
private $nom;
protected static $table ='catégorie';
public function __construct( $id_cat= NULL,$nom= NULL) {}

public function getid_cat() {}
public function getnom() {}

/* Affichage des catégories *****************************************************/
public function categories(){

			model::Init();
		$table='catégorie';
		$u='utilisateur';
		$f='fonctionnaire';
		$fonctionnaire=false;
		if(isset($_SESSION["idclient"])){
			$id=$_SESSION["idclient"];
			$sql="SELECT * FROM $u,$f where $f.id_u=$u.id_u and $f.id_u=$id ";
		$r = model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]) ;
		$nb=$r->rowcount();
		if ($nb!=0){$fonctionnaire=true;}
		}
		if(isset($_SESSION["idtuteur"])||isset($_SESSION["idadmin"])||$fonctionnaire==true){
		$sql="SELECT * FROM $table ";}else{$sql="SELECT * FROM $table where not id_cat='1' ";}
		$reponse1 = model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]) ;
		return $reponse1;
}

public function tcatégories()
		{$table='catégorie';

		$sql="SELECT * FROM $table ";
		$reponse1 = model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]) ;
		return $reponse1;}

/* Ajouter une catégorie ****************************************************************/
public function ajouter($n,$img)
{
		$n= model::$bdd->quote($n);
		$img= model::$bdd->quote($img);
		$sql="INSERT INTO `catégorie` VALUES (NULL,$n,$img)";
		$reponse = model::$bdd->exec($sql) or die (model::$bdd->errorinfo()[2]) ;
		 if($reponse!=0){
		return "validation";}else{return "echec";}}
public function supprimer($id){
		$sql="DELETE FROM `catégorie` WHERE `id_cat`=$id";
		$reponse = model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]) ;
		if($reponse!=0){
		return "validation";}else{return "echec";}
}

/* Modifier une catégorie ******************************************************************/
public function modifier($id,$n,$img)
{		$img= model::$bdd->quote($img);
		$n= model::$bdd->quote($n);
		$sql="UPDATE `catégorie` SET `nom`=$n,`image`=$img WHERE `id_cat`=$id";
		$reponse = model::$bdd->exec($sql) or die (model::$bdd->errorinfo()[2]) ;
        if($reponse!=0){
		return "validation";}else{return "echec";}
}

/* Affichage des d'étails d'une catégorie **************************************************/
public function détailscategorie($id)
{
		$sql="SELECT * FROM `catégorie` WHERE `id_cat`=$id";
		$r = model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]) ;
		return $r;
}
}