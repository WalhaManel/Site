<br><br><br><br> 
	<?php
while ($l = $rep->fetchObject()){
	?>
  <div id="course-sec" class="container set-pad" style="height:100% ;">
             <div class="row text-center"><br>
                 <div class="col-lg-8 col-lg-offset-2 col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
                                        <div class="signin-form" style="height:800px;">
    <h1 data-scroll-reveal="enter from the bottom after 0.1s" class="header-line">Information du compte</h1><br><br>
<form name="f" onsubmit="return controle()" method="post" action="index.php?controller=utilisateur&action=modifier&id=<?=$l->id_u?>">
 <center>
  <div class="form-group"><label for='nom'>Nom</label>
 <input class="form-control " type="text" name="nom" id='nom' value="<?=$l->nom?>" required><br>
<label for='prenom'> prenom </label></div>
 <div class="form-group"><input class="form-control " type="text" name="prenom" id="pre" value="<?=$l->prenom?>" required><br></div>

 <div class="form-group">  <label for='mail'> mail</label>
 <input class="form-control " type="mail" name="email" id="mail" value="<?=$l->mail?>" required><br> 
</div>
 <div class="form-group"><label for='mdp'> Mot de passe</label> 
 <input class="form-control " type="password" name="mdp" id="psw"  required>
 <br></div>
 <div class="form-group"><label for='mdp'> Comfirmer le mot de passe</label>
 <input class="form-control " type="password" name="mdp2" id="psw"  required>
 <br></div>

 <input class="btn btn-success btn-set btn-lg" type="submit" name="btn2" value='Valider' onclick="confirme()" >	
</form></center>  <?php }?>

</center></div></div></div></div>

<style>

 .button{
        color: black;
 padding: 10px 10px;
 text-align: center;
 font-family:Microsoft YaHei UI;
 font-size: 10px;
 margin: 20px 10px;


margin-top: 100px;
width: 120px;
margin-left: 50px;}

	input {
  width: 100%;
  padding: 5px;
  margin:8px 0 8px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
  text-align: center;
  transition: ease .5s;
}


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