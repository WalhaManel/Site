<?php if(isset($_SESSION['idtuteur'])){
 ?> <div class="navbar navbar-inverse navbar-fixed-top " id="menu">
        <div class="container">
            <div class="navbar-header"><img style="margin-top: 18px" width="60"  src="img/logo.jpeg" alt=""  >

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse move-me">
                <ul class="nav navbar-nav navbar-right">
                    <li ><a class="lienmenu" href="index.php?controller=utilisateur&action=espacetuteur">Accueil</a></li>
                     <li><a class="lienmenu" href="index.php?controller=categorie&action=catégories">Catégories</a></li>
                     <li><a  class="lienmenu" href="index.php?controller=utilisateur&action=infocompte">Mon profil</a></li>
                     <li><a class="lienmenu" href="index.php?controller=utilisateur&action=deconnect">Se déconnecter</a></li>
                    
                </ul>
            </div>
        </div>
    </div>
    <br><br><br>
<?php 
}else if(isset($_SESSION['idadmin'])){
?>    
 <div class="navbar navbar-inverse navbar-fixed-top " id="menu">
        <div class="container">
            <div class="navbar-header"><img style="margin-top: 18px" width="60"  src="img/logo.jpeg" alt=""  >

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse move-me">
                <ul class="nav navbar-nav navbar-right">
                    <li ><a class="lienmenu" href="index.php?controller=utilisateur&action=espaceadmin">Accueil</a></li>
                     <li><a class="lienmenu" href="index.php?controller=categorie&action=catégories">Catégories</a></li>
                    <li><a  class="lienmenu" href="index.php?controller=formation&action=listeformations">Formations</a></li>
                    <li><a  class="lienmenu" href="index.php?controller=abonnement&action=abonnements">Abonnements</a></li>
                     <li><a  class="lienmenu" href="index.php?controller=utilisateur&action=infocompte">Mon profil</a></li>
                     <li><a class="lienmenu" href="index.php?controller=utilisateur&action=deconnect">Se déconnecter</a></li>
                </ul>
            </div>
        </div>
    </div>
    <br><br><br>
    <?php
}else{
  ?>

 <header>
 <div class="navbar navbar-inverse navbar-fixed-top " id="menu">
        <div class="container">
            <div class="navbar-header"><img style="margin-top: 18px" width="60"  src="img/logo.jpeg" alt=""  >

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse move-me">
                <ul class="nav navbar-nav navbar-right">
                    <li ><a class="lienmenu" href="index.php">Accueil</a></li>
                     <li><a class="lienmenu" href="index.php#features-sec">Catégories</a></li>
                    <li><a  class="lienmenu" href="index.php#faculty-sec">&Agrave; propos</a></li>
                     <li><a class="lienmenu" href="index.php#contact-sec">Contact</a></li>
                    <?php  if(isset($_SESSION["idclient"])){?>
                           <li>
                           <a class="lienseconnecter" href="index.php?controller=utilisateur&action=profil"><?=$_SESSION["nom"].$_SESSION["pre"]?></a>
                            <li><a class="lienmenu" href="index.php?controller=utilisateur&action=deconnect">Se déconnecter</a></li>
                           </li>
              <?php }else{?>
                <li><a class="lienseconnecter" href="index.php#course-sec">Se connecter</a></li>
                     <?php }?>
                     <li><a  href="index.php?controller=commande&action=afficherpanier"><img src="img/icone-panier.jpg" alt="panier" style="width:55px;height:auto; margin-bottom:5px; clip-path:ellipse(48% 50%);"></a> </li>
                </ul></div></div>
            </div>
        </div>
    </div>
          
  </header> 
   <?php }?>