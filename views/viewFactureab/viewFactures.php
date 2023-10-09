
<br><br><h1 style="text-align:center;color:black">liste des factures des abonnements</h1>
<br><br>
<center>
<table >
<tr>

<th>Nom & Prenom & mail du Client</th>
<th>Etat</th>
<th>Date d'expiration</th>

</tr>
<?php
while ($ligne = $rep->fetchObject()){
	?><tr>			<td><?=$ligne->nom?>&nbsp;<?=$ligne->prenom?>&nbsp;<strong>Email :</strong> &nbsp;<?=$ligne->mail?></td>
	           <td><?=$ligne->etat?></td>
			<td><?=$ligne->date_dexpiration?></td>
              
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

