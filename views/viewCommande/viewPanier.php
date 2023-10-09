<br><br><br>
<div id="features-sec" class="container set-pad">
             <div class="row text-center">
                 <div class="col-lg-8 col-lg-offset-2 col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
                     <h1 data-scroll-reveal="enter from the bottom after 0.2s" class="header-line" data-scroll-reveal-id="2" data-scroll-reveal-initialized="true" data-scroll-reveal-complete="true">Votre panier</h1>
                    
                 </div></div><br><br>

   <div class="row"  >
   <div class="col-lg-9" >

<div id="con1">
    <?php 
if(!isset($_SESSION['panier'])&& empty($_SESSION['panier'])){echo '<p>Le panier est vide</p>';}
else{
 
      $total=0;
foreach($_SESSION['panier'] as $cle => $element){
   $id=$element["id"];
   $nom=$element["nom"];
   $img=$element["img"];
   $prix=$element["px"];
      $total=$total+$prix;
      $_SESSION['total']=$total;
  ?>     
  <div class="row" >
  
  
<div class="col-lg-4"style="margin-top: 30px;margin-bottom: 30px">

    <img class="rounded-circle" src="img/<?=$img?>" width="130" height="70"  alt="Generic placeholder image" id="img-card">
    </div>
    
    <div class="col-lg-4" >
       <h5 style=""><b>  <?=$nom?>  </b> </h5>
       <h6>Prix:  <?=$prix?> DT</h6>
  </div>
 <div class="col-lg-4" style="margin-top: 30px;margin-bottom: 30px">
          <a href="index.php?controller=commande&action=supanier&id=<?=$id?>" onclick="return confirme()">
        <img width="40" height="50" src="img/delete.png"></a>
      </div>
  
  </div>
  <hr>
      <?php } ?>
    
 <br>
    <center><div style="text-align:center;width: 200px" 
>
   <form action="index.php?controller=formation&action=formcat" method="post" >
    <input type="submit" class="btn btn-info btn-lg"  value="Continuez mes achats">
   </form></div></center>
  </div> </div>  

<div class="col-lg-2" id="prix" >
 <center><p style="margin-top:60px;font-size: 20px; " ><strong>TOTAL:&nbsp;&nbsp;&nbsp;&nbsp;</strong> 
  <?=$total?> DT</p>
<br>
<?php 
if(isset($_SESSION['idclient'])){?>
  <form action="index.php?controller=commande&action=paiement&total=<?=$total?>" method="post" style="display: flex;justify-content: center;">
    <input type="submit" class="btn btn-info btn-lg" style="width: 200px;" value="Valider">
   </form><?php } 
else { 
  ?><form action="index.php?controller=utilisateur&action=connect" method="post" style="display: flex;justify-content: center;">
    <input type="submit" class="btn btn-info btn-lg" style="width: 200px;" value="Valider">
   </form><?php } ?>
</div>
 <?php } ?>   
</center> </div>
  
  

   </div >   </div >

</section>

<br><br><br>
<style type="text/css">
  hr{

    border: 2px;
  background-color: #598AA9;
    margin-top: 8px;
  margin-bottom:15px;
  height:1px;}
  
/*details du panier*/ 
#prix{margin-left:5px; }
#descri{ margin-left:20px;}
#butdes{ margin-left:260px;}


p{font-size:12px;}
#con1{border: 1px solid #598AA9 ; width:70%;   border-radius:10px; margin-left:90px; padding:10px;}

 #img-card{width:50%;  margin-left:20px;


}
</style>
<script type="text/javascript">
  function confirme( ){
if( confirm( "Voulez vous vraiment supprimer cette formation ?" )){
document.location.href = "index.php?controller=commande&action=afficherpanier" ;}
else{alert("Opération annuler");
             return false;}
}
</script>