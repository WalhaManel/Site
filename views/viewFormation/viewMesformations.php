<br><br><h1 style="text-align:center;color:black">Mes formations</h1>
<br><br>
<center>
<table >
<tr>
<th>Image</th>
<th>Date</th>
<th>Nom</th>
<th>Description</th>
<th>Prix</th>
<th>Chapitres</th>
<th>Modifier</th>
<th>Supprimer</th>
</tr>
<?php
while ($ligne = $rep->fetchObject()){
	?><tr><td><img width="60" height="40" src="img/<?=$ligne->image?>"></td>
	 <td><?=$ligne->date_f ?></td>
	           <td><?=$ligne->nom_f?></td>
			   	<td style="width:400px;"><?=$ligne->description ?></td>
			<td><?=$ligne->prix ?></td>
			<td><a href="index.php?controller=chapitre&action=voirchapitres&id_f=<?=$ligne->id_f ?>">Voir chapitres</a></td>
			   <td><a href="index.php?controller=formation&action=modiform&id_f=<?=$ligne->id_f ?>">modifier</a></td>
               <td><form name="f" method="post" onsubmit="return confirme()" action="index.php?controller=formation&action=supprimer&id_f=<?=$ligne->id_f ?> " >
               	<input type="submit" name="but"  value="Supprimer"></form></td>
	  </tr><?php }
      $reponse->closeCursor();
	  $bdd=null;?>
</table></center>
<style>
th{background-color:#f5f5f5;}
tr:hover {background-color: #f5f5f5;}
table {
	border: 1px solid gray;
  border-collapse: collapse;
  width: 100%;
}
</style>
<script type="text/javascript">
	function confirme( ){
if( confirm( "Voulez vous vraiment supprimer cet enregistrement ?" )){
document.location.href = "index.php?controller=formation&action=mesformation" ;}
else{alert("Opération annuler");
             return false;}
}
</script>