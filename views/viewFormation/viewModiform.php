
<br><br><h1 style="text-align:center;color:black">Modifier la formation</h1>
<br><br>
<?php 
if(isset($_REQUEST['msg'])&&$_REQUEST['msg']=="erreurimg")
{
	echo"<p style=\"color:red\" > ce type d'image n'est pas pris en charge</p>";
}
?>
<center>
<table >
<tr>
<th>Image</th>
<th>Date</th>
<th>Nom</th>
<th>Description</th>
<th>Prix</th>
<th>Annuler</th>
</tr>

<?php
while ($ligne = $rep2->fetchObject()){
	?><form enctype="multipart/form-data" action="index.php?controller=formation&action=modiform&id_f=<?=$ligne->id_f?>" method="post">
<tr><td><input type="file" name="img" ></td>
	 <td><?=$ligne->date_f ?></td>
	           <td><input type="text" name="nom" value="<?=$ligne->nom_f?>"></td>
			   	<td><textarea id="w3review" name="w3review" rows="4" cols="50"><?=$ligne->description ?></textarea></td>
			<td><input type="text" name="px" value="<?=$ligne->prix ?>"></td>
			<td><input class="btn btn-info" type="submit" value="Modifier"></td>
               <td><a href="index.php?controller=formation&action=listeformations" onclick="confirme()">Annuler</a></td>
	  </tr></form><?php }
     ?>
</table></center>
<style>
th{background-color:#f5f5f5;}
tr:hover {background-color: #f5f5f5;}
table {
  border-collapse: collapse;
  width: 100%;
}
</style>
