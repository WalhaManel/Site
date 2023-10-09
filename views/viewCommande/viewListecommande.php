
<br><br><h1 style="text-align:center;color:black">liste des commandes</h1><br><br>
<center>
	<?php if(isset($_REQUEST['msg'])&&$_REQUEST['msg']=="sup"){
	echo"<p style=\"color:green\" > La commande est supprimée </p>";
}
if(isset($_REQUEST['msg'])&&$_REQUEST['msg']=="validajout"){
	echo"<p style=\"color:green\" > La commande ajoutée avec succés </p>";
}
?>
<table >
<tr>
<th>Commande</th>
<th>Date</th>
<th>Total</th>
<th>Client</th>
<th>Voir détail</th>
<th>Supprimer</th>
</tr>
<?php


while ($ligne = $rep->fetchObject()){
	$idc=$ligne->id_u;
	?><tr>			
	           <td>C<?=$ligne->id_c?></td><td><?=$ligne->date_operation?></td>
			<td><?=$ligne->total?></td>
			<td><a href="index.php?controller=utilisateur&action=listeclient"><?=$idc?></a></td>
			   <td><a class="btn btn-info" href="index.php?controller=lc&action=listelcommande&id_c=<?=$ligne->id_c ?>">Voir détail</a></td>
               <td><form name="f" method="post" onsubmit="return confirme()" action="index.php?controller=commande&action=supprimer&id_c=<?=$ligne->id_c?>" >
               	<input class="btn btn-danger" type="submit" name="but"  value="Supprimer"></form>
               </td>
	  </tr><?php }?>
</table></center>

 
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
if( confirm( "Voulez vous vraiment supprimer cette commande ?" )){
document.location.href = "index.php?controller=formation&action=listeformations" ;}
else{alert("Opération annuler");
             return false;}
}
</script>