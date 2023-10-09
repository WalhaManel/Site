
<br><br>
<h1 style="text-align:center;color:black">Déatils de la commande</h1>
<br><br>
<center>
<table >
<tr><th>Date</th>
<th>Formation</th>
<th>prix</th>
</tr>
<?php
while ($ligne = $rep->fetchObject()){
	?><tr>			<td><?=$ligne->date_operation?></td>
	           <td><?=$ligne->nom_f?></td>
			<td><?=$ligne->prix?></td>
              
	  </tr><?php }
      $rep->closeCursor();
	  $bdd=null;?>
</table></center>

<a href="index.php?controller=commande&action=listecommande">Retour</a>
<style>
<style>
th{padding-left:20px;
	padding-right:20px;
	background-color:#f5f5f5;
}
td{ margin-top:0.5px;
	padding-top:0.5px; 
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
</style>
