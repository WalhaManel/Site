<br><br><h1 style="text-align:center;color:black">liste des abonnements</h1>
<center>
<table >
<tr>
<th>Abonnement</th>
<th>Durée</th>
<th>Prix</th>
<th>Modifier</th>
<th>Supprimer</th>
</tr>
<?php
while ($ligne = $rep->fetchObject()){
	?><tr>			<td><?=$ligne->id_ab?></td>
	           <td><?=$ligne->duree?></td>
			<td><?=$ligne->prix?> DNT</td>
			   <td><a class="btn btn-info" href="index.php?controller=abonnement&action=modifab&id_ab=<?=$ligne->id_ab ?>">modifier</a></td>
               <td><form name="f" method="post" onsubmit="return confirme()" action="index.php?controller=abonnement&action=supprimer&id_ab=<?=$ligne->id_ab ?>" >
               <input class="btn btn-danger" type="submit" name="but"  value="Supprimer"></form></td>
	  </tr><?php }
      ?>
</table></center>
<form method="post" action="index.php?controller=abonnement&action=ajoutab">
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
<script type="text/javascript">
	function confirme( ){
if( confirm( "Voulez vous vraiment supprimer cet abonnement ?" )){
document.location.href = "index.php?controller=formation&action=listeformations" ;}
else{alert("Opération annuler");
             return false;}
}
</script>