<div  class="container set-pad">
             <div class="row text-center">
                 <div class="col-lg-8 col-lg-offset-2 col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
                     <h1 data-scroll-reveal="enter from the bottom after 0.2s" class="header-line" data-scroll-reveal-id="2" data-scroll-reveal-initialized="true" data-scroll-reveal-complete="true">LES CATEGORIES</h1>
                     
                 </div>
<div class="col-lg-1  col-md-4 col-sm-4 col-md-offset-1 "> </div>
             </div>
             <!--/.HEADER LINE END-->


           <div class="row">
<?php while ($ligne = $reponse->fetchObject()){
?>
                  <a style="color:black;text-decoration:none;" href="index.php?controller=formation&action=formcat&id_c=<?=$ligne->id_cat?>"><div class="col-lg-4  col-md-4 col-sm-4" data-scroll-reveal="enter from the bottom after 0.4s" data-scroll-reveal-id="4" data-scroll-reveal-initialized="true" data-scroll-reveal-complete="true">
                     <div class="about-div">
                     <img style="margin-left: auto;
    margin-right: auto ;    display: block;
" width="80" height="70" src="img/<?=$ligne->image?>">
               <center><h3><?=$ligne->nom?></h3>    </a>
         <?php if(isset($_SESSION['idadmin'])||isset($_SESSION['idtuteur'])){?><a class="btn btn-success btn-set" href="index.php?controller=categorie&action=modifiercat&cat=<?=$ligne->id_cat?>">Modifier</a>
                 </a>
          <form name="f" method="post" onsubmit="return confirme()" action="index.php?controller=categorie&action=supprimer&cat=<?=$ligne->id_cat?>" ><input type="submit" name="but" class="btn btn-danger btn-set"  value="Supprimer"></form>
        <?php } ?>
</center>
                                       
                </div>
                   </div>
                  <?php } ?>
               <?php if(isset($_SESSION['idadmin'])||isset($_SESSION['idtuteur'])){?>  
                 <a style="width: 100%" class="btn btn-info btn-set" href="index.php?controller=categorie&action=ajoutercat">Ajouter une catégorie</a>
                 <?php } ?>
               </div>
             </div>
<script type="text/javascript">
  function confirme( ){
if( confirm( "Voulez vous vraiment supprimer cette catégorie ?" )){
document.location.href = "index.php?controller=categorie&action=catégories" ;}
else{alert("Opération annuler");
             return false;}
}
</script>