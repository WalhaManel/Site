 <br><br><br>
 <h1 style="text-align:center;color:black">Mes abonnements</h1>
  <div class="container">
    <div class="row">
        <div class="col-2" ></div>
        <div class="col-8" style="background-color:#f5f6f7; border-radius:10px; height:800px; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;"><center><br><br>
  <?php 
    if(isset($_REQUEST['msg'])&&$_REQUEST['msg']=="erreurab"){echo "<p style=\"color:red; \">Vous avez déja un abonnement</p>";}
    if($rep=="aucun"){echo "<p style=\"color:green; text-align:center\">Aucun abonnement disponible</p>";exit;}else{
    while ($ligne = $rep->fetchObject()){
	echo "<strong>Abonnement</strong> ".$ligne->duree."<br>";
	echo "<strong>Date d'expiration :</strong> ".$ligne->date_dexpiration."<br>";
	echo "<strong>Etat :</strong>".$ligne->etat."<br><hr>";}}?>
</center></div>
        <div class="col-2" ></div>
</div></div>