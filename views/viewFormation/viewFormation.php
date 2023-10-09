
<br> 
<br>
<br>
  <div id="features-sec" class="container set-pad">
  <div class="row "><form method="post" action="index.php?controller=formation&action=recherchesimple">
<input type="text" class="form-control " style="color:black; width: 100%" name="cle" style="width: 100%;color:white;height:50px;" required="required" placeholder="Recherche ..." />
                           </form></div><br>
                          <div class="row "  >
                          <div class="col-md-9"></div><div class="col-md-3"> <table><tr> <td>Trier par:</td>

               <td> <form name="f" method="post" action="index.php?controller=formation&action=rechercheavancée">
                <select  name="choix" onchange="submit();" style="width: 200px;" class="form-control " >
                   <option  >Trier Par ...</option>
                   <option value="précent" >le plus récent</option>
                   <option value="pbas">le prix le plus bas</option>
                   <option value="pélevé">le prix le plus élevé</option>
                 </select>
                </form></td></tr></table></div> </div>
              
              
             <!--/.HEADER LINE END-->


           <div class="row">
           <h1 style="text-align: center;" data-scroll-reveal="enter from the bottom after 0.2s" class="header-line" data-scroll-reveal-id="2" data-scroll-reveal-initialized="true" data-scroll-reveal-complete="true">NOS FORMATIONS</h1>
               <?php 
   /* Affichage des formations correspond à la catégorie choisie*/ 
   while ($formation = $rep->fetchObject()){
    ?>
   
                 <div class="col-lg-4  col-md-4 col-sm-4" data-scroll-reveal="enter from the bottom after 0.4s" data-scroll-reveal-id="4" data-scroll-reveal-initialized="true" data-scroll-reveal-complete="true">
                     <div class="about-div">
                     <center> <img width="80" height="90"   style="  width:140px;
   clip-path:ellipse(50% 50%);" src="img/<?=$formation->image?>"  alt="Generic placeholder image" id="img-card">
<div id="star">
    <div id="glob" >
      <img width="20" height="20" id="tde_1" src="img/star.png" class="tde"/>
      <img width="20" height="20" id="tde_2" src="img/star.png" class="tde"/>
      <img width="20" height="20" id="tde_3" src="img/star.png" class="tde"/>
      <img width="20" height="20" id="tde_4" src="img/star.png" class="tde"/>
      <img width="20" height="20"id="tde_5" src="img/star.png" class="tde"/>    
    </div>
  </div> 
  </center>
     <center>              <h3><?=$formation->nom_f?></h3>
                 <hr>
                       <hr>
                   <p>
<?=$formation->prix?>     DNT               
                   </p>
                   <a class="btn btn-info btn-set" class="but" href="index.php?controller=commande&action=ajouterpanier&id_f=<?=$formation->id_f?>&prix=<?=$formation->prix?>&nom=<?=$formation->nom_f?>&img=<?=$formation->image?>" role="button">Ajouter au panier</a><br>
               <a href="index.php?controller=formation&action=consulterdetailform&id_f=<?=$formation->id_f?>" class="btn btn-info btn-set">EN SAVOIR PLUS</a></center>
                </div>
                   </div> <?php }?>
             </div></div>
             </div> </div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
<script type="text/javascript">
     function soumettre()
     {
     document.forms['f'].submit();
     }
</script>