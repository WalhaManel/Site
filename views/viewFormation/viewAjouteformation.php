<?php 
if(isset($_REQUEST['msg'])&&$_REQUEST['msg']=="erreurimg")
{
	echo"<p style=\"color:red\" > ce type d'image n'est pas pris en charge</p>";
}
if(isset($_REQUEST['msg'])&&$_REQUEST['msg']=="erreur")
{
	echo"<p style=\"color:red\" > Réssayez plus tard</p>";
}?>
<br><br><h1 style="text-align:center;color:black">Ajouter une formation</h1>
<br>
<center>
<table >
<tr>
<th>Catégorie</th><th>Nom</th>

<th>Image</th>
<th>Description</th>
<th>prix</th>
</tr>
<tr><td><form enctype="multipart/form-data" action="index.php?controller=formation&action=ajouteformation" method="post">	       
	           
	           <?php	while ($ligne = $rep2->fetchObject()){?>

	           	<input name="listecat[]" type="checkbox" value="<?=$ligne->id_cat?>"><?=$ligne->nom?><br>
	           <?php } ?>

	           </td>
	       	


	        <td><input type="text" name="nom" value=""></td>

	         <td>   <input type="hidden" name="MAX_FILE_SIZE" value="30000" /> 
         <input type="file" name="img" size=50 /></td>
         			   	<td><input type="textarea" name="des" value=""></td>
			   	<td><input type="number" name="px" value="">DNT</td>
			<td><input class="btn btn-info" type="submit" value="Ajouter"></td>
               <td><a class="btn btn-danger" href="index.php?controller=abonnement&action=abonnements" onclick="confirme()">Annuler</a></td>
	  </tr></form>
</table></center>
<style>
th{background-color:#f5f5f5;}
tr:hover {background-color: #f5f5f5;}
table {
  border-collapse: collapse;
  width: 100%;
}
</style>
