<br><br><h1 style="text-align:center;color:black">Liste des formations</h1>
<br><br>
<form method="post" action="index.php?controller=formation&action=listeformations">
<input type="text" class="form-control " style="color:black; width: 100%" name="cle" style="width: 100%;color:white;height:50px;" required="required" placeholder="Recherche ..." />
                           </form>
                          <br>
                          <div class="row "  >
                          <div class="col-md-9"></div><div class="col-md-3"> 
                    Trier par:
                
                <form name="f" method="post" action="index.php?controller=formation&action=listeformations">
                <select  name="choix" onchange="submit();" style="width: 200px;" class="form-control " >
                   <option  >Trier Par ...</option>
                  <?php while ($ligne = $cat->fetchObject()){?>

                   <option value="<?=$ligne->id_cat?>" ><?=$ligne->nom?></option>
                   <?php }?>
                 </select></form><br></div> </div>
<center>
<table >
	<?php if(isset($_REQUEST['msg'])&&$_REQUEST['msg']=="echecsup"){
	echo "<p>erreur sup</p>";}
	if(isset($_REQUEST['msg'])&&$_REQUEST['msg']=="sup"){
	echo"<p style=\"color:green\" > La formation est supprimée </p>";
}
	if(isset($_REQUEST['msg'])&&$_REQUEST['msg']=="modif"){
			echo"<p style=\"color:green\" > Modification effectue avec succés </p>";
 
	}
?>
<tr>
<th>Image</th>
<th>Date</th>
<th>Nom</th>
<th>Description</th>
<th>Prix</th>
<th>Chapitres</th> 
<th>Modifier</th>
<th>Supprimer</th>
</tr>
<?php
while ($ligne = $rep->fetchObject()){
	?><tr><td><img width="60" height="40" src="img/<?=$ligne->image?>"></td>
	 <td><?=$ligne->date_f ?></td>
	           <td><?=$ligne->nom_f?></td>
			   	<td style="width:400px;"><?=$ligne->description ?></td>
			<td><?=$ligne->prix ?></td>
			<td><a class="btn btn-info" href="index.php?controller=chapitre&action=voirchapitres&id_f=<?=$ligne->id_f ?>">Voir chapitres</a></td>
			   <td><a class="btn btn-info" href="index.php?controller=formation&action=modiform&id_f=<?=$ligne->id_f ?>">modifier</a></td>
               <td><form name="f" method="post" onsubmit="return confirme()" action="index.php?controller=formation&action=supprimer&id_f=<?=$ligne->id_f ?> " >
               	<input class="btn btn-danger" type="submit" name="but"  value="Supprimer"></form></td>
	  </tr><?php }
      ?>
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
document.location.href = "index.php?controller=formation&action=mesformation" ;}
else{alert("Opération annuler");
             return false;}
}
</script>