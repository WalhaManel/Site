<br><br><br>
<div class="container">
<div class="row"><h1 style="text-align:center;color:black">Mes apprentissages</h1>
<?php if (isset($_REQUEST['test'])){
 echo "<p style=\"color:green; text-align:reight \">Vous avez déja acheté la formation</p>";
}?>
   <br>
    <?php 
    if($rep=="aucun"){echo "<p style=\"color:green; text-align:center\">Aucun apprentissage disponible</p>";exit;}else{
   while ($formation = $rep->fetchObject()){
    ?>  <div class="col-md-4 " data-scroll-reveal="enter from the bottom after 0.4s" data-scroll-reveal-id="4" data-scroll-reveal-initialized="true" data-scroll-reveal-complete="true">
                     <div class="about-div">
                     <center> <img width="80" height="90"   style="  width:140px;
   clip-path:ellipse(50% 50%);" src="img/<?=$formation->image?>"  alt="Generic placeholder image" id="img-card">
  </center>
     <center>              <h3><?=$formation->nom_f?></h3>
                 <hr>
                       <hr>
                                
               <a href="index.php?controller=formation&action=consulterdetailform&id_f=<?=$formation->id_f?>" class="btn btn-info btn-set">EN SAVOIR PLUS</a></center> </div></div><?php }}?>
               
                   </div> 
             </div></div>
           </div></div>

 