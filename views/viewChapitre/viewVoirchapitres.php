<br><br><h1 style="text-align:center;color:black">Chapitres d'une formation</h1>
<center>
<?php if (isset($_REQUEST['msg'])){
	echo "<p style=\"color:green; text-align:reight \">Modification effectuée avec succés</p>";
}?>
	<center><a class="btn btn-info btn-set" href="index.php?controller=chapitre&action=ajouter&id_f=<?=$id_f?>">Ajouter un chapitre</a></center>

<table >
<tr>
<th>Vidéo</th>
<th>Nom</th>
<th>Description</th>
<th>Modifier</th>
<th>Supprimer</th>
</tr>

<?php
while ($ligne = $rep2->fetchObject()){

	?>

<tr><td><video width="400" height="400" wi controls   >
		<source src="mp4/<?=$ligne->video?>" type="video/mp4">
		<source src="mp4/<?=$ligne->video?>" type="video/webm">

	</video></td>
	           <td><?=$ligne->nom ?></td>
			   	<td><?=$ligne->description ?></td>
			   <td><a href="index.php?controller=chapitre&action=modifier&id_chap=<?=$ligne->id_chap?>&id_f=<?=$id_f?>">modifier</a></td>
               <td>
               	<form name="f" method="post"  action="index.php?controller=chapitre&action=supprimer&id_chap=<?=$ligne->id_chap?>" onsubmit="return confirme()" ><input class="btn btn-danger" type="submit" name="but"  value="Supprimer"></form>
               </td>
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
if( confirm( "Voulez vous vraiment supprimer ce chapitre ?" )){
document.location.href = "index.php?controller=formation&action=listeformations" ;}
else{alert("Opération annuler");
             return false;}
}
</script>