<br><br><h1 style="text-align:center;color:black">Modifier une abonnement</h1><br>
<center>
<table >
<tr>
<th>Abonnement</th>
<th>Durée</th>
<th>Prix</th>
</tr>

<?php
while ($ligne = $rep->fetchObject()){
	?><form action="index.php?controller=abonnement&action=modifab&id_ab=<?=$ligne->id_ab?>" method="post">
<tr><td><?=$ligne->id_ab?></td>
	           <td><input type="text" name="duree" value="<?=$ligne->duree?>"></td>
			   	<td><input type="text" name="prix" value="<?=$ligne->prix ?>"></td>
			<td><input type="submit" value="Modifier"></td>
               <td><a href="index.php?controller=abonnement&action=abonnements" onclick="confirme()">Annuler</a></td>
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
