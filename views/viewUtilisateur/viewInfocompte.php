<br><br><br><br>
 <div id="course-sec" class="container set-pad">
             <div class="row text-center"><br>
                 <div class="col-lg-8 col-lg-offset-2 col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
                                        <div class="signin-form">
    <h1 data-scroll-reveal="enter from the bottom after 0.1s" class="header-line">Informations du compte</h1><br><br>
<table style="margin-left: 100px;font-family: 'Open Sans', sans-serif;font-size: 15px; text-align: center;">
<?php
while ($ligne = $rep->fetchObject()){
	?>
<tr><th>Nom : </th><td class="t"><?=$ligne->nom?><br></td>
</tr>
<tr><th>Prenom : </th><td class="t"><?=$ligne->prenom?><br></td>
</tr>
<tr><th>Mail : </th><td class="t"><?=$ligne->mail?><br></td>
</tr>
<tr><th>Mot de passe : </th><td class="t">***********<br></td>
</tr></table>
<br><br>
<center><a style="margin-right: 10px;" class="btn btn-info btn-set btn-lg" href="index.php?controller=utilisateur&action=modifier&id_u=<?=$ligne->id_u?>">Modifier</a></center>
<?php } ?>


</div></div></div></div>
<style type="text/css">
th{
	padding-right: 150px;
}
</style>