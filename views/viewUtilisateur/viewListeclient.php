
<br><br>
<h1 style="text-align:center;color:black">Liste des clients</h1>

<form method="post" action="index.php?controller=utilisateur&action=listeclient">
<input type="text" class="form-control " style="color:black; width: 100%" name="cle" style="width: 100%;color:white;height:50px;" required="required" placeholder="Recherche ..." />
                           </form>
<form name="f" method="post" action="index.php?controller=utilisateur&action=listeclient">
                <select  name="choix" onchange="submit();" style="width: 200px;" class="form-control " >
                                      <option  >Trier Par ...</option>
						<option value="FE" >Fonctionnaire de l'état</option>
                   			<option value="c" >Client</option>
                   		</select></form>
<br><br>
<?php if(isset($_REQUEST['msg'])&&$_REQUEST['msg']=="sup"){
	echo"<p style=\"color:green\" > Le client est supprimée </p>";
}?>
<center>
<table >
<tr>
<th>Identifiant Client</th>
<th>Nom & Prenom</th>
<th>mail</th>
<th>Modifier</th>
<th>Supprimer</th>
</tr>
<?php
while ($ligne = $rep->fetchObject()){
	?><tr>			<td><?=$ligne->id_u?></td>
	           <td><?=$ligne->nom?>    <?=$ligne->prenom?></td>
			<td><?=$ligne->mail?></td>
			   <td><a class="btn btn-info" href="index.php?controller=utilisateur&action=modifier&id_u=<?=$ligne->id_u ?>">modifier</a></td>
               <td><form name="f" method="post" onsubmit="return confirme()" action="index.php?controller=utilisateur&action=supprimerclient&id_u=<?=$ligne->id_u ?>" >
               <input class="btn btn-danger" type="submit" name="but"  value="Supprimer"></form></td>
	  </tr><?php }?>
      
</table></center>


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
<script type="text/javascript">
	function confirme( ){
if( confirm( "Voulez vous vraiment supprimer cet enregistrement ?" )){
document.location.href = "index.php?controller=formation&action=listeformations" ;}
else{alert("Opération annuler");
             return false;}
}
</script>
