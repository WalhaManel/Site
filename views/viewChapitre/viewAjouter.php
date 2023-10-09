		
<br><br><h1 style="text-align:center;color:black">Ajouter un chapitre</h1><br>
<center>
<?php 
if(isset($_REQUEST['msg'])&&$_REQUEST['msg']=="erreurvid")
{
	echo"<p style=\"color:red\" > ce type de video n'est pas pris en charge</p>";
}
if(isset($rep)&&$rep=="echecajoute")
{
	echo"<p style=\"color:red\" > Réssayez plus tard</p>";
}?>
<table >
<tr>
<th>Nom</th>
<th>Description</th>
<th>video</th>
</tr>
<form  enctype="multipart/form-data" class="form-horizontal"method="POST" action="index.php?controller=chapitre&action=ajouter&id_f=<?=$id?>" enctype="multipart/form-data" id="kt_form">
											
<form action="index.php?controller=abonnement&action=ajouter" method="post">
	           <td><input type="text" name="nom" value=""></td>
			   	<td><textarea id="w3review" name="des" rows="4" cols="50"></textarea></td>
			<td><input type="file"   name='file'>
						<span class="form-text text-muted"></span></td>													
			<td><input class="btn btn-info" type="submit"  value="Ajouter"></td>
               <td><a class="btn btn-danger" href="index.php?controller=abonnement&action=abonnements" onclick="confirme()">Annuler</a></td>
	  </tr></form>
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
