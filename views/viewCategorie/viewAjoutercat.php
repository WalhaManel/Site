
<br><br><h1 style="text-align:center;color:black">Ajouter une catégorie</h1><br>
<center>
<form enctype="multipart/form-data" method="post" action="index.php?controller=categorie&action=ajoutercat">
<table >
<tr>
<th>Nom</th><td><input type="text" name="nom"></td></tr>
<tr><th>Image</th>
	
	<td> <input type="hidden" name="MAX_FILE_SIZE" value="30000" /> 
         <input type="file" name="img" size=50 />
	     
</td></tr></table><br> <input class="btn btn-info" type="submit" value="Ajouter"></form></center>
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
	    