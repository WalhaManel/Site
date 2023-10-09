<?php  while ($ligne = $rep->fetchObject()){
  ?>
<br><br><br><br><br><br>
<section>

<div class="container " >
<div class="row">

<div class="col-lg-4">
<h2><?=$ligne->nom_f?> </h2>
<h5 style="color:gray;">Le &nbsp;&nbsp;<?=$ligne->date_f?> </h5>

<?php
  if(isset($repp) && $repp=="oui"){ 
   
    $value1=5;
?>  <div style="margin-right: 218px;margin-bottom:15px;margin-top:10px;text-align:left; " class="rating">
<?php 
  for ($i=0; $i < $value1 ; $i++) { 
?><a href="#" title="" style="color: #2f9ede;">☆</a>  
    <?php }?> 
   </div>

<?php }else{?>
  <div style="margin-right: 218px;margin-bottom:15px;margin-top:10px; " class="rating"><!--
   --><a href="index.php?controller=avis&action=ajouter&nbr=5&id_f=<?=$ligne->id_f?>" title="Donner 5 étoiles">☆</a><!--
   --><a href="index.php?controller=avis&action=ajouter&nbr=4&id_f=<?=$ligne->id_f?>" title="Donner 4 étoiles">☆</a><!--
   --><a href="index.php?controller=avis&action=ajouter&nbr=3&id_f=<?=$ligne->id_f?>" title="Donner 3 étoiles">☆</a><!--
   --><a href="index.php?controller=avis&action=ajouter&nbr=2&id_f=<?=$ligne->id_f?>" title="Donner 2 étoiles">☆</a><!--
   --><a href="index.php?controller=avis&action=ajouter&nbr=1&id_f=<?=$ligne->id_f?>" title="Donner 1 étoile">☆</a>
</div><?php } ?>
<p style="font-size:15px"> <strong>Description :</strong> <?=$ligne->description?></p>
<h4 style="color:#1c2b4b;">Par &nbsp;<?=$ligne->nom?>&nbsp;<?=$ligne->prenom?> </h4>
<p style="font-size:15px"> <strong>Prix : </strong><?=$ligne->prix?> DNT </p>
</div>
<div class="col-lg-8" style="width:500px;height:400px;margin-left: 200px;">
   <img src="img/<?=$ligne->image?>" class="image" class="image" >

  <div class="middle"> 
    <?php if(isset($_SESSION['idclient']) && ($test=="oui" || $testab=="oui")){?>
<a href="index.php?controller=chapitre&action=videoformation&id_f=<?=$ligne->id_f?>" > <img style="margin-bottom: 90px;" width="200" height="150" src="img/play.svg"></a>
<?php }else {?>
   <a href="#" data-toggle="modal" data-target="#product_view"> <img style="margin-bottom: 90px;" width="200" height="150" src="img/play.svg"></a>
  </div>
  </div>                
</div><?php }?>
  
<div class="modal fade product_view" id="product_view">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                        <div class="btn-ground">
                          <p style="font-size: 30px; text-align:center;margin-top: 30px;">Pour commencer cette formation </p><br>
                        <br>  <center> <table> <tr><td><a href="index.php?controller=commande&action=ajouterpanier&id_f=<?=$ligne->id_f?>&prix=<?=$ligne->prix?>&nom=<?=$ligne->nom_f?>&img=<?=$ligne->image?>" type="button" style="padding-top: 25px; padding-bottom: 25px; " class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span> Ajouter au panier</button></td>  <td>  <span class="vertical-line"></span></td>
                            <td><a href="http://localhost/site_cni/index.php#ab" type="button" style="padding-top: 25px; padding-bottom: 25px;  " class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-heart"></span> Abonnez-vous </button></td></tr></table>  </center><br>
                        </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</section>
<br>

<?php } ?>
<style type="text/css">
  
   .vertical-line{
        border-left: 1px solid gray;
        display: inline-block;
        height: 65px;
        margin: 0 20px;
      }
label
{ text-align: center;
  display: block;
  width: 100px;
  float: left;
}
.image {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.container:hover .image {
  opacity: 0.3;
}

.container:hover .middle {
  opacity: 0.5;
}
 .rating a {
  padding-left: 5px;
  text-align: left;
   float: right;
}
.rating a:hover ~ a,
.rating a:focus ~ a {
   color: #2f9ede;
}.rating a {
   color: #aaa;
   text-decoration: none;
   font-size: 2em;
   transition: color .4s;
}
.rating a:hover,
.rating a:focus {
   color: #2f9ede;
   cursor: pointer;
}
 
</style>