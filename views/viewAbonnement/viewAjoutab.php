<br><br><h1 style="text-align:center;color:black">Ajouter une abonnement</h1><br>
<center>
<table >
<tr>
<th>Durée</th>
<th>Prix</th>
</tr>
<form action="index.php?controller=abonnement&action=ajoutab" method="post">
	           <td><input type="text" name="duree" value=""></td>
			   	<td><input type="text" name="prix" value=""></td>
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
