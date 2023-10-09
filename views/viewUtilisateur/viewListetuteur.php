
<br><br>
<h1 style="text-align:center;color:black">Liste des tuteurs</h1>
<br><br>

<center>
<table >
<tr>
<th>Tuteur</th>
<th>mail</th>
<th>Modifier</th>
<th>Supprimer</th>
</tr>
<?php
while ($ligne = $rep->fetchObject()){
	?><tr>
	           <td><?=$ligne->nom?>    <?=$ligne->prenom?></td>
			<td><?=$ligne->mail?></td>
			   <td><a class="btn btn-info" href="index.php?controller=utilisateur&action=modifier&id_u=<?=$ligne->id_u ?>&list=tut">modifier</a></td>
               <td><form name="f" method="post" onsubmit="return confirme()" action="index.php?controller=utilisateur&action=supprimertut&id_u=<?=$ligne->id_u ?>&list=tut" >
               <input class="btn btn-danger" type="submit" name="but"  value="Supprimer"></form></td>
	  </tr><?php }
      ?>
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
if( confirm( "Voulez vous vraiment supprimer cet enregistrement ?" )){
document.location.href = "index.php?controller=formation&action=listeformations" ;}
else{alert("Opération annuler");
             return false;}
}
</script>