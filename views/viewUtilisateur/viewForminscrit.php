<br><br><br>
<div class="container">
  <div class="signin-form" style="height: 100%; ">
    <h1 data-scroll-reveal="enter from the bottom after 0.1s" class="header-line" style="text-align: center;">S'inscrire</h1>
<?php if(isset($_REQUEST['msg']) &&$_REQUEST['msg']=="erreurajout"){
echo "<p style=\"color:red;text-align:center;font-size:20px;\" >Mail  déja utilisée</p>";
}
if(isset($_REQUEST['msg']) &&$_REQUEST['msg']=="erreurCNRPS"){
echo "<p style=\"color:red; text-align:center;font-size:20px;\" >CNRPS ou CIN invalide</p>";
}?>
<div class="row">
  <div class="col-md-6" style="text-align: right;padding-right: 40px;"><a class="btn btn-secondary btn-lg" href="index.php?controller=utilisateur&action=forminscrit">Client</a></div>
<div class="col-md-6" style="text-align: left;"><a class="btn btn-secondary btn-lg " class="btn btn-info btn-set btn-lg" href="index.php?controller=utilisateur&action=forminscrit&form=FE">Fonctionnaire de l'état </a></div></div>


    <?php if(isset($_REQUEST['form'])){?>
<center>
<form name="f" method="post" action="index.php?controller=utilisateur&action=forminscrit" onsubmit="return controle()">
 <label class="form-group" for='nom'>  CNRPS</label>
 <input class="form-control" type="text" name="CNRPS" id='nom'><br>
  <label class="form-group" for='nom'>  CIN</label>
 <input class="form-control" type="text" name="cin" id='nom'><br>
  <label class="form-group" for='nom'>  Nom</label>
 <input class="form-control" type="text" name="nom" id='nom'><br>
  <label class="form-group" for='prenom'> Prenom </label>
 <input class="form-control" type="text" name="prenom" id="pre" ><br>
   <label class="form-group" for='mail'> Email</label>
 <input class="form-control" type="mail" name="email" id="mail" ><br>  
 <div class="form-group"><label for='mdp'> Mot de passe</label>
 <input class="form-control " type="password" name="mdp" id="psw"  required>
 <br></div>
 <div class="form-group"><label for='mdp'> Comfirmer le mot de passe</label>
 <input class="form-control " type="password" name="mdp2" id="psw"  required>
 <br></div>
 <input class="btn btn-success  btn-lg btn-set" type="submit" name="btn2" value='Valider' >  
</form>  
</center>
<?php }else{?>
<center>

<form name="f" method="post" action="index.php?controller=utilisateur&action=forminscrit" onsubmit="return controle()">
 
  <label class="form-group" for='nom'>  Nom</label>
 <input class="form-control" type="text" name="nom" id='nom'><br>
    <label class="form-group" for='prenom'> Prenom </label>
 <input class="form-control" type="text" name="prenom" id="pre" ><br>

   <label class="form-group" for='mail'> Email</label>
 <input class="form-control" type="mail" name="email" id="mail" ><br>

 <div class="form-group"><label for='mdp'> Mot de passe</label> 
 <input class="form-control " type="password" name="mdp" id="psw"  required>
 <br></div>
 <div class="form-group"><label for='mdp'> Comfirmer le mot de passe</label>
 <input class="form-control " type="password" name="mdp2" id="psw"  required>
 <br></div>
 <input class="btn btn-success btn-lg btn-set" type="submit" name="btn2" value='Valider' >	
</form><?php }?>
</center></form></center></div>
<style>





hr {
  border: 1px solid #C5B12D;
  margin-bottom: 5px;
}
input{font-family:"Microsoft YaHei UI";font-size: 15px;}


</style>
<script type="text/javascript">
  function controle(){  
nom=document.f.nom.value;
pre=document.f.prenom.value;
email=document.f.email.value;
mdp=document.f.mdp.value;
mdp2=document.f.mdp2.value;
  for (i=0;i<nom.length;i++){
    if(nom.charAt(i).toUpperCase()<'A' ||nom.charAt(i).toUpperCase()>'Z'){alert ("Nom non valide ");return false;}
  }
  for (i=0;i<pre.length;i++){
    if(pre.charAt(i).toUpperCase()<'A' ||pre.charAt(i).toUpperCase()>'Z'){alert ("Prenom non valide");return false;}
    }
if(mdp!=mdp2){alert ("Mot de passe de confirmation non valide ");return false;}

}

</script>