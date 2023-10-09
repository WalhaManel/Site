<br><br><h1 style="text-align:center;color:black">Modifier une catégorie</h1><br>
<?php while ($ligne = $reponse->fetchObject()){
               ?>
<center>
<form enctype="multipart/form-data" method="post" action="index.php?controller=categorie&action=modifiercat&cat=<?=$ligne->id_cat?>">
<table >
<tr>
<th>Nom</th><td><input type="text" name="nom" value="<?=$ligne->nom?>"></td></tr>
<tr><th>Image</th>
	
	<td> <input type="hidden" name="MAX_FILE_SIZE" value="30000" /> 
         <input type="file" name="img" size=50 />
	    
</td></tr></table>  <br><input class="btn btn-info" type="submit" value="Modifier"></form></center>
	    <?php } ?>
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