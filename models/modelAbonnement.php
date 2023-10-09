										
<?php
require_once ("model.php");
Class modelAbonnement extends model{
private  $id_ab;							
private $duree;	
private $prix;

protected static $table ='abonnement';
public function __construct( $id_ab= NULL,$duree= NULL, $prix= NULL) {}

public function getid_ab() {}
public function getduree() {}
public function getprix() {}

/* Affichage des offres des abonnements ************************************/
public function abonnements()
{   $sql="SELECT * FROM `abonnement` ";
    $reponse = model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]) ;
    return $reponse;
}

/* Modifier un offre d'abonnement *****************************************/
public function modifier($id,$d,$p)
{
    $d=model::$bdd->quote($d);
    $sql="UPDATE `abonnement` SET `duree`=$d,`prix`=$p WHERE id_ab=$id";
    $rep=model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]);
    if($rep!=0){
      return "validation";}else{return "echec";}
}

/* Affichage des détails d'une offre d'abonnement *************************/
public function detailab($id)
{
    $sql="SELECT * FROM `abonnement` where $id=id_ab ";
    $reponse = model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]) ;
    return $reponse;
}

/* Ajouter une offre d'abonnement ******************************************/
public  function ajouter($d,$p)
{   $d=model::$bdd->quote($d);
    $sql="INSERT INTO `abonnement`(`id_ab`, `duree`, `prix`) VALUES (NULL,$d,$p)";
    $reponse = model::$bdd->exec($sql) or die (model::$bdd->errorinfo()[2]) ;
    return $reponse;
}

/*Supprimer une offre d'abonnement ****************************************/
public  function supprimer($id)
{$sql="DELETE FROM `abonnement` WHERE id_ab=$id";
        $reponse = model::$bdd->query($sql) or die (model::$bdd->errorinfo()[2]) ;
        return $reponse;
}    
}