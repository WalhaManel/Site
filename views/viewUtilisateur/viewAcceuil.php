 
 <div class="home-sec" id="home" >
           <div class="overlay">
 <div class="container">
           <div class="row text-center " >
           
               <div class="col-lg-12  col-md-12 col-sm-12">
               
                <div class="flexslider set-flexi" id="main-section" >
                    <ul class="slides move-me">
                        <!-- Slider 01 -->
                        <li>
                              <h3>La première place du marché national pour l'apprentissage et la formation</h3>
                           <h1>Formation sur les applications nationales hébergées au CNI</h1>
                            <a  href="#faculty-sec" class="btn btn-info btn-lg" >
                                EN SAVOIR PLUS 
                            </a>
                             <a  href="#course-sec" class="btn btn-success btn-lg" >
                                INSCRIVEZ-VOUS MAINTENANT

                            </a>
                        </li>
                        <!-- End Slider 01 -->
                        
                        <!-- Slider 03 -->
                        <li>
                            <h3>La première place du marché national pour l'apprentissage et la formation</h3>
                           <h1>Où que vous soyez</h1>
                             <a  href="#faculty-sec" class="btn btn-default btn-lg" >
                                EN SAVOIR PLUS 
                            </a>
                             <a  href="#ab" class="btn btn-info btn-lg" >
                                ABONNEZ-VOUS MAINTENANT
                            </a>
                        </li>
                        <!-- End Slider 03 -->
                    </ul>
                </div>
                   
     
              
              
            </div>
                
               </div>
                </div>
           </div>
           
       </div>
       <!--HOME SECTION END-->   
    <div  class="tag-line" >
         <div class="container">
           <div class="row  text-center" >
           
               <div class="col-lg-12  col-md-12 col-sm-12">
               
        <h2 data-scroll-reveal="enter from the bottom after 0.1s" ><i class="fa fa-circle-o-notch"></i>Bienvenue dans nos rubriques<i class="fa fa-circle-o-notch"></i> </h2>
                   </div>
               </div>
             </div>
        
    </div>
    <!--HOME SECTION TAG LINE END-->  
<div id="features-sec">
    <br><br>
<?php require_once("views/viewCategorie/viewcatégories.php");?>
</div>
             <br><br><br><br><br><hr>
<div id="features-sec" class="container set-pad">
             <div class="row text-center">
                 <div class="col-lg-8 col-lg-offset-2 col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
                     <h1 data-scroll-reveal="enter from the bottom after 0.2s" class="header-line" data-scroll-reveal-id="2" data-scroll-reveal-initialized="true" data-scroll-reveal-complete="true">NOS FORMATIONS</h1>
                    
                 </div>

             </div>
             <!--/.HEADER LINE END-->


           <div class="row">
           <?php 
           for ($i=0; $i <3 ; $i++) { 
            $l=$reponse1->fetchObject();  ?>         
               
                 <div class="col-lg-4  col-md-4 col-sm-4" data-scroll-reveal="enter from the bottom after 0.4s" data-scroll-reveal-id="4" data-scroll-reveal-initialized="true" data-scroll-reveal-complete="true">
                     <div class="about-div">
                     <center> <img width="80" height="90"   style="  width:140px;
   clip-path:ellipse(50% 50%);" src="img/<?=$l->image?>"  alt="Generic placeholder image" id="img-card">
<div style="margin-right: 95px;margin-bottom:10px;margin-top:10px; height:20px; width: <?=$l->moy?>%; background:#E0E001;">
    <div id="glob" >
      <img id="tde_1" src="img/star.png" class="tde"/>
      <img id="tde_2" src="img/star.png" class="tde"/>
      <img id="tde_3" src="img/star.png" class="tde"/>
      <img id="tde_4" src="img/star.png" class="tde"/>
      <img id="tde_5" src="img/star.png" class="tde"/>    
    </div>
    </div>
  </center>
     <center>              <h3><?=$l->nom_f?></h3>
                 <hr>
                       <hr>
                   <p>
<strong><?=$l->prix?> DNT</strong>                
                   </p>
                   <a class="btn btn-info btn-set" class="but" href="index.php?controller=commande&action=ajouterpanier&id_f=<?=$l->id_f?>&prix=<?=$l->prix?>&nom=<?=$l->nom_f?>&img=<?=$l->image?>" role="button">Ajouter au panier</a><br>
               <a href="index.php?controller=formation&action=consulterdetailform&id_f=<?=$l->id_f?>" class="btn btn-info btn-set">EN SAVOIR PLUS</a></center>
            </div>  </div>   <?php } ?>
                  
            
                  <center><a href="index.php?controller=formation&action=formcat" class="btn btn-success btn-lg " width="200">Voir plus</a>
</center> 
             </div> <br><br>   <hr> 
                    <div id="ab"></div>
  <div  class="container set-pad" >
             <div class="row text-center">
                 <div class="col-lg-8 col-lg-offset-2 col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
                               <div id="ab_section">
   <h1 data-scroll-reveal="enter from the bottom after 0.2s"  class="header-line">NOS ABONNEMENTS</h1>
                     <p data-scroll-reveal="enter from the bottom after 0.3s" >
                      Choisissez parmi nos abonnements et commencez à relever notre défi dès aujourd'hui
                       </br> De nouveaux cours sont ajoutés tous les mois
                         </p>
                 </div>

             </div>
           </div>
             <!--/.HEADER LINE END-->
 <div class="row" >
           
   <?php while ($abb = $ab->fetchObject()){
               ?>            
                 <div class="col-lg-4  col-md-4 col-sm-4" data-scroll-reveal="enter from the bottom after 0.4s">
                     <div class="about-div">
                  <center><h3 ><?= $abb->prix?> DT
                <br><small class="text-muted"> <?= $abb->duree?></small></h3>
                 <hr />
                       <hr />
                   <p>

                   </p>
                 <?php  if(isset($_SESSION['idclient'])){?>
                        <a href="index.php?controller=factureab&action=paiement&idab=<?=$abb->id_ab?>&duree=<?=$abb->duree?>" class="btn btn-info btn-set"  >Abonnez-vous</a><?php }else{?>
                          <a href="index.php?controller=factureab&action=abvous&idab=<?=$abb->id_ab?>&duree=<?=$abb->duree?>" class="btn btn-info btn-set"  >Abonnez-vous</a><?php }?>
                </div></center> 
                   
               </div>
<?php }?>
             </div></div> 
   <!-- FEATURES SECTION END-->
    <div id="faculty-sec" style="background-color: #3099b2" >
    <div class="container set-pad" >
             <div class="row text-center" >
              <br>
                 <div class="col-lg-8 col-lg-offset-2 col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
                     <h2 data-scroll-reveal="enter from the bottom after 0.1s" class="header-line" style="color:white">&Agrave; propos </h2>
                      
                 </div>

             </div>
             <!--/.HEADER LINE END-->

           <div class="row" >
             <div class="col-lg-12  col-md-12 col-sm-12" data-scroll-reveal="enter from the bottom after 0.4s">
                    
                     <div class="faculty-div">
                     <img src="img/logo.jpeg" height="250" width="200"  class="img-rounded" />
                   <h3 >Présentation du CNI </h3>
                 <hr style="border-color: #1c2b4b">
                    <p data-scroll-reveal="enter from the bottom after 0.3s">

                      Institué le 30 Décembre 1975, le Centre National de l’Informatique est un établissement public à caractère non administratif doté de la personnalité civile et de l’autonomie financière.  
Le CNI est un organisme placé sous la tutelle du Ministre des Technologies de la Communication, et opérant dans les domaines du secteur de l’informatique et des technologies de la communication et certifié ISO 9001version 2015.
                       
                   </p></div>
                   <div class="faculty-div"> <h3 >Formation sur les applications nationales hébergées au CNI</h3>
                 <hr/>
                    <p data-scroll-reveal="enter from the bottom after 0.3s">
                

Le CNI assure des cycles de formation pour les utilisateurs des produits CNI et des applications nationales  tels que : le Système de Gestion du personnel de l’Etat ( INSAF), Suivi des missions à l’étranger, les applications du Schéma Directeur Informatique Commun de l’Administration "SDICA"…

                   </p></div>
                   </div>
                   </div>
                 
               </div>
             </div>
             </div>
    <!-- FACULTY SECTION END-->
    <br><br>
      <div id="course-sec" class="container set-pad">
             <div class="row text-center"><br>
                 <div class="col-lg-8 col-lg-offset-2 col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
                                        <div class="signin-form">
    <h1 data-scroll-reveal="enter from the bottom after 0.1s" class="header-line">Se connecter</h1>
                 <?php if(isset($_REQUEST['msg']) ){?>  
            <p class="exception">Votre mail ou mot de passe est incorrect </p>   <?php }   ?>
    <form  method="POST" action="index.php?controller=utilisateur&action=connect"  >
                               
<center> 
                                    <div class="form-group"><label for="mail" >E-mail :</label>
                                   <input class="form-control"  type="email" name="mail" id="mail" placeholder="nomutilisateur@exemple.com" required>
                                </div>
                                <div class="form-group">

                                    <label for="password">Mot de passe :</label>
                                    <input class="form-control " type="password" name="mdp" id="password" placeholder="Mot de passe.." required>
                                </div>
                                    <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                    <span></span>Se souvenir de moi</label><br>
                                                                          
   <input type="submit" name="signin" id="signin" style="width:300px;border-radius:8px;margin-top:20px;margin-bottom:10px;" class="btn btn-info btn-set btn-lg" value="Se connecter"/></center>
                            </form> 
                                  
                             <hr>    
                             <center>                
  <a style="margin-top:10px; width:300px; text-decoration:none; box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 5px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px; padding:8px; border-radius:8px; " href="index.php?controller=utilisateur&action=forminscrit" class="btn btn-success btn-lg " >Créer un compte</a>
</center>
                        </div>   </div> 

                    </div>
                </div>
            
               </div>
               </div>
             </div>
             <br><br><br><br><br>
      <!-- COURSES SECTION END-->
    <div id="contact-sec"   >
           <div class="overlay">
 <div class="container set-pad">
      <div class="row text-center">
                 <div class="col-lg-8 col-lg-offset-2 col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
                     <h1 data-scroll-reveal="enter from the bottom after 0.1s" class="header-line" >NOUS CONTACTER</h1>
                     <p data-scroll-reveal="enter from the bottom after 0.3s">
                      Vous avez besoin d’aide ?
                      <br>N'hésitez pas à nous contacter 
                         </p>
                 </div>

             </div>
             <!--/.HEADER LINE END-->
           <div class="row set-row-pad"  data-scroll-reveal="enter from the bottom after 0.5s" >
           
               
                 <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control "  required="required" placeholder="Nom" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control " required="required"  placeholder="Email" />
                        </div>
                        <div class="form-group">
                            <textarea name="message" required="required" class="form-control" style="min-height: 150px;" placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-block btn-lg">Envoyer</button>
                        </div>

                    </form>
                </div>

                   
     
              
              
                
               </div>
                </div>
          </div> 
       </div>