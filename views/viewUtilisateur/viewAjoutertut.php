	<?php if(isset($_REQUEST['msg']) && $_REQUEST['msg']=="erreurajout")
	{ echo "<p style=\"color:red\" >Mail  déja utilisée</p>"; }?>
<center>
<form method="post" action="index.php?controller=utilisateur&action=ajoutertut">
<div class="form-group" style="margin-left:10px;">
 
  <label for='nom'> Nom</label>
 <input class="form-control" type="text" name="nom" id='nom' required><br><br>
 <div class="form-group" style="margin-right:22px;">
    <label for='prenom'>Prenom </label>
 <input class="form-control" type="text" name="prenom" id="pre" required><br><br>
</div>

<div class="form-group" style="margin-right:5px;">
   <label for='mail'> Email</label>
 <input class="form-control" type="mail" name="email" id="mail" required><br> <br> 
</div>

<div class="form-group" style="margin-right:40px;">
 <label for='mdp'> Mot de passe </label>
 <input class="form-control" type="password" name="mdp" id="psw" required ><br> <br>
</div>
 <br>
</div>
 <input class="btn btn-info btn-set btn-lg"  type="submit" name="btn2" value='Valider' >	
</form>  
</center>