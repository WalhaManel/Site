
<br>
<br>
<br>
 
              
              
             <!--/.HEADER LINE END-->


           <div class="row">
           <h1 style="text-align: center;" data-scroll-reveal="enter from the bottom after 0.2s" class="header-line" data-scroll-reveal-id="2" data-scroll-reveal-initialized="true" data-scroll-reveal-complete="true">NOS FORMATIONS</h1>
               <?php 
   while ($formation = $rep->fetchObject()){
        $tab=explode(',',$formation_AN );
           for ($i=0; $i <count($tab) ; $i++) { 
              if($tab[$i]==$formation->nom_f){  
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
                   </div> <?php }}}?>
             </div></div>
             </div> </div> 