
<br><br><h1 style="text-align:center;color:black">Ajouter une commande</h1><br><br>
<center>
<table >
<tr>
<th></th>
<th>Image</th>
<th>Date</th>
<th>Formation</th>
<th>Description</th>
<th>Prix</th>

</tr><form method="post" action="index.php?controller=commande&action=ajoutercommande">
<?php

while ($ligne = $rep->fetchObject()){
	?>

	<tr><td><input name="listeid[]" type="checkbox"  value="<?=$ligne->id_f?>">
</td>
		<td><img width="60" height="40" src="img/<?=$ligne->image?>"></td>
	           <td><?=$ligne->date_f?></td>
			<td><?=$ligne->nom_f?></td>
			<td><?=$ligne->description?></td>
			<td><?=$ligne->prix?>DNT</td>
             
               
	  </tr><?php }
      $rep->closeCursor();
	  $bdd=null;?>
</table></center>
	<input class="btn btn-info" type="submit" value="Ajouter"  style="width: 100%">
</form>

<style>
th{padding-left:20px;
	padding-right:20px;
	background-color:#f5f5f5;
}
td{ margin-top:5px;
	padding-top:5px; 
	padding-left:20px;
	padding-right:20px;
	padding-bottom:30px;
}
tr:hover {background-color: #f5f5f5;}
table {
border: 1px solid gray;
  border-collapse: collapse;	
  margin-left: 10px;
	width:1300px;
}
</style>
