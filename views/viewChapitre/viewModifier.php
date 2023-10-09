
<br><br><h1 style="text-align:center;color:black">Modifier un chapitre</h1><br><br>
<?php 
    $id_f=$_REQUEST['id_f']; 
if(isset($_REQUEST['msg'])&&$_REQUEST['msg']=="erreurvid")
{
	echo"<p style=\"color:red\" > ce type de video n'est pas pris en charge</p>";
}
if(isset($rep)&&$rep=="echecmodification")
{
	echo"<p style=\"color:red\" > Réssayez plus tard</p>";
}?>
<center>
<table >
<tr> 
<th>Video</th>
<th>Nom</th>
<th>Description</th>
</tr>

<?php
while ($ligne = $rep2->fetchObject()){
	?><form action="index.php?controller=chapitre&action=modifier&id_chap=<?=$ligne->id_chap?>&vid=<?=$ligne->video?>&id_f=<?=$id_f?>" method="post" enctype="multipart/form-data">
<tr><td><input type="file" name="file" /></td>
	           <td><input type="text" name="nom" value="<?=$ligne->nom?>"/></td>
			   	<td><textarea id="w3review" name="des" rows="4" cols="50"><?=$ligne->description?></textarea></td>
			<td><input class="btn btn-info" type="submit" value="Modifier"/></form></td>
               
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
