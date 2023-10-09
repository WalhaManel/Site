<?php
require_once ("model.php");
Class modelFormation extends model{
private  $id_f;					
private $nom;	
private $description;	
private $image;
private $prix;
protected static $table = 'formation';
public function __construct($id_f= NULL,$nom = NULL,$description= NULL,$image = NULL,$prix = NULL) {}
public function getid_f() {}
public function getnom() {}
public function getdescription() {}
public function getimage() {}
public function getprix($c) {
            $t3="formation";
            $sql1="select * from $t3 where $t3.id_f=$c";
            $r= model::$bdd->query($sql1) or die (model::$bdd->errorinfo()[2]) ;
            return $r;

}
/* Affichage des formation pour les visiteur *******************************************/
public function formation_client()
{
$table='formation';
 $table2='affectation';
	$sql="SELECT DISTINCT * FROM $table,$table2 where $table2.id_cat NOT LIKE '1' ";
	$reponse1 = model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]) ;
	return $reponse1;}

/* Affichage des formations ***************************************************************/
public function read()
{
	$table='formation';
	$sql="SELECT DISTINCT * FROM $table ";
	$reponse1 = model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]) ;
	return $reponse1;}
public function listeformation()
{	 $table='formation';
	 $table2='catégorie';
	 $table3='affectation';

	$sql="SELECT distinct * FROM $table ,$table2,$table3 where $table3.id_f=$table2.id_cat and $table2.id_cat=$table3.id_cat";
	$reponse1 = model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]) ;
	return $reponse1;
}

/* Affichages des nouvelles formations ******************************************************/
	public function noveaute(){

		model::Init();
	 $t1='formation';
     $t2='avis';

	$sql="SELECT AVG(nbr_etoile) as moy,$t1.id_f,$t1.nom_f,$t1.prix,$t1.image FROM $t1,$t2 where $t1.id_f=$t2.id_f group by $t1.id_f  ";
	$reponse1 = model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]) ;
	return $reponse1;
	}


/* Affichage des détails d'une formation *********************************************************/
	public function consulterdetailform($id_f){
		
		$table='formation';
		$table2='utilisateur';
		$id=model::$bdd->quote($id_f);
		$sql="SELECT DISTINCT * FROM $table,$table2 where $table.id_f=$id and $table2.id_u=$table.id_u ";
	$rep = model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]) ;
	return $rep;

	}

/* Affichage des formations par catégorie ********************************************************/
	public function formcat($id_c){
		$table='formation';
		$table3='affectation';
		$id=model::$bdd->quote($id_c);
		$sql="SELECT distinct $table.id_f,$table.nom_f,$table.prix,$table.id_f,$table.image FROM $table ,$table3 where $table.id_f=$table3.id_f and $table3.id_cat NOT LIKE 1";
	$rep = model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]) ;
	return $rep;
    
	}

/* Affichage des formations pour un tuteur *******************************************************/
	public function formtut($id){
			$table='formation';
			$table2='utilisateur';
			$id=model::$bdd->quote($id);
			$sql="SELECT distinct *FROM $table ,$table2 where $table.id_u=$table2.id_u and $id=$table.id_u";
			$rep = model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]) ;
			return $rep;

	}

/* Modifier une formation **************************************************************************/
	public function modifier($id,$n,$d,$p,$img){

			$n=model::$bdd->quote($n); $d=model::$bdd->quote($d);$img=model::$bdd->quote($img); 
				$sql="UPDATE `formation` SET `nom_f`=$n,`description`=$d,`image`=$img,`prix`=$p WHERE id_f=$id";
			$rep=model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]);
			if($rep!=0){
			return "validation";}else{return "echec";}
	}

/* Ajouter une formation ***************************************************************************/
public function ajouter($img,$n,$des,$px)
{
		if(isset($_SESSION['idtuteur'])){$id=$_SESSION['idtuteur'];}else{$id=$_SESSION['idadmin'];}
		$d=date("Y-m-d");
		$img=model::$bdd->quote($img);
		$n=model::$bdd->quote($n);
		$des=model::$bdd->quote($des);
		$d=model::$bdd->quote($d);
		$sql="INSERT INTO `formation` VALUES (NULL,$n,$des,$img,$px,$d,$id)";
		$rep=model::$bdd->exec($sql) or die (model::$bdd->errorinfo()[2]);
		if($rep!=0){
	$sql1="select * from `formation` where nom_f=$n ";
	$reponse = model::$bdd->query($sql1) or die (model::$bdd->errorinfo()[2]) ;
	while ($ligne = $reponse->fetchObject()){
		return $ligne->id_f;exit;}
	}return "echec";
}

/* Supprimer une formation ****************************************************/
public function supprimer($id){ 
	    $sql1="DELETE FROM `ligne_commande` WHERE id_f=$id";
		$sql2="DELETE FROM `chapitre` WHERE id_f=$id";
		$sql3="DELETE FROM `formation` WHERE id_f=$id";
		$sql4="DELETE FROM `affectation` WHERE id_f=$id";
		$sql5="DELETE FROM `avis` WHERE id_f=$id";

		$rep1=model::$bdd->query($sql1) ;
		$rep2=model::$bdd->query($sql2);
		$rep3=model::$bdd->query($sql3) ;
		$rep4=model::$bdd->query($sql4) ;
		$rep5=model::$bdd->query($sql5) ;	
		if($rep1!=0||$rep2!=0||$rep3!=0||$rep4!=0||$rep5!=0){
		return "validation";}else{return "echec";}
}

/* Réaliser une recherche simple ****************************************/
public function recherchesimple($cle)
{
 	$table='formation';
 	$t='affectation';
	
                   $sql="SELECT DISTINCT $table.id_f,$table.nom_f,$table.description,$table.image,$table.prix FROM  $table,$t
				   where 
				   $table.nom_f like ' %$cle% '
				   or $table.description like '%$cle%' 
				   and $table.id_f=$t.id_f and 
				   $t.id_cat NOT LIKE 1
				   "; 
	$reponse = model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]) ;
	return $reponse;
}

/* Afficher les formations les plus récents ********************************/
public function plus_récent()
{
 	$table='formation';
	 	$t='affectation';

                   $sql="SELECT DISTINCT $table.id_f,$table.nom_f,$table.description,$table.image,$table.prix FROM  $table,$t
                   where $table.id_f=$t.id_f and 
				   $t.id_cat NOT LIKE 1
				   order by date_f DESC ;
				   "; 
	$reponse = model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]) ;
	return $reponse;
}

/* Afficher les formations de plus bas prix au plus élevé prix ********************************/

public function plus_bas()
{
 	$table='formation';
		 	$t='affectation';

                   $sql="SELECT DISTINCT $table.id_f,$table.nom_f,$table.description,$table.image,$table.prix FROM  $table,$t
                   where $table.id_f=$t.id_f and 
				   $t.id_cat NOT LIKE 1
				   order by prix ASC ;
				   "; 
	$reponse = model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]) ;
	return $reponse;
}

/* Afficher les formations de plus élevé prix au plus bas prix ********************************/
public function plus_élevé()
{
 	$table='formation';
 	 	$t='affectation';
	
                   $sql="SELECT DISTINCT $table.id_f,$table.nom_f,$table.description,$table.image,$table.prix FROM  $table
				   order by prix DESC ;
				   "; 
	$reponse = model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]) ;
	return $reponse;
}

public function recherche_simple_tut($cle,$tut)
{$table='formation';
 	$t='affectation';

	
                   $sql="SELECT * FROM  $table
				   where 
				   id_u=$tut and 
				   $table.nom_f like ' %$cle% '
				   or $table.description like '%$cle%' 
				   "; 
	$reponse = model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]) ;
	return $reponse;
	
}

public function recherche_avancée_tut($choix,$tut)
{
$table='formation';
$t2='catégorie';
$t3='affectation';
	
                   $sql="SELECT $table.id_f,$table.nom_f,$table.description,$table.image,$table.date_f,$table.prix FROM  $table,$t2,$t3
				   where 
				   $table.id_u=$tut and 
				   $t2.id_cat=$t3.id_cat and 
				   $table.id_f=$t3.id_f and 
				   $t2.id_cat=$choix"; 
	$reponse = model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]) ;
	return $reponse;}
public function recherche_simple_ad($cle)
{$table='formation';
	
                   $sql="SELECT * FROM  $table
				   where 
				   $table.nom_f like ' %$cle% '
				   or $table.description like '%$cle%' 
				   "; 
	$reponse = model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]) ;
	return $reponse;
	
}

public function recherche_avancée_ad($choix)
{
$table='formation';
$t2='catégorie';
$t3='affectation';
	
                   $sql="SELECT $table.id_f,$table.nom_f,$table.description,$table.image,$table.date_f,$table.prix FROM  $table,$t2,$t3
				   where 
				   $t2.id_cat=$t3.id_cat and 
				   $table.id_f=$t3.id_f and 
				   $t2.id_cat=$choix"; 
	$reponse = model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]) ;
	return $reponse;}
}