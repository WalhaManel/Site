<br><br><br><br><?php 
if (isset($_REQUEST['total'])){$total=$_REQUEST['total'];}
if( isset($_REQUEST['idab'])){$id_ab=$_REQUEST['idab'];}
if( isset($_REQUEST['duree'])){$d=$_REQUEST['duree'];}
?><div class="container px-4 py-5 mx-auto">
    <?php 
if (isset($_REQUEST['total'])){?>
    <form method="POST" action="index.php?controller=commande&action=ajoutercommande&total=<?=$total?>">
     <?php }
if (isset($_REQUEST['idab'])&&isset($_REQUEST['duree'])){?>
    <form method="POST" action="index.php?controller=factureab&action=abvous&idab=<?=$id_ab?>&duree=$d">
    <?php }?>
    <div class="row justify-content-center">
        <div class="col-lg-12">
              <div class="row">
                    <div class="col-lg-3 radio-group">
                        <div class="row d-flex px-3 radio"> <img width="40" height="20" src="img/WIAP9Ku.jpg ">
                            <p class="my-auto">Carte de crédit </p>
                        </div>
                        <div class="row d-flex px-3 radio gray"> <img width="40" height="20" src="img/OdxcctP.jpg">
                            <p class="my-auto">Carte de débit</p>
                        </div>
                        <div class="row d-flex px-3 radio gray mb-3"> <img width="40" height="20" src="img/edinar.jpg">
                            <p class="my-auto">e-dinar</p>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="row px-2">
                            <div class="form-group col-md-6"> <label class="form-control-label">Nom de la carte</label> <input type="text" id="cname" name="nom_titulaire" placeholder="Nom de la carte"> </div>
                            <div class="form-group col-md-6"> <label class="form-control-label">Numéro de la carte</label> <input type="text" id="cnum" name="numero_carte" placeholder="Numéro de la carte"> </div>
                        </div>
                        <div class="row px-2">
                            <div class="form-group col-md-6"> <label class="form-control-label">Date d'expiration</label> <input type="text" id="exp" name="date_expiration" placeholder="YYYY/MM/DD"> </div>
                            <div class="form-group col-md-6"> <label class="form-control-label">CVV</label> <input type="text" id="cvv" name="CVV" placeholder="***"> </div>
                        </div><br><br>
                        <input class="btn btn-info" type="submit" class="bott" style="margin-top: 20px;" value="Valider">

                    </div></div></div></div></form></div><br><br><br>