
<br><br><br><br>   
<?php 
 while ($li = $rep->fetchObject()){
	$img=$li->image;
  ?>
  <h2 style="margin-left:30px;color:#1c2b4b "><?=$li->nom_f?></h2>
<p style="color: gray;margin-left:30px;">Le <?=$li->date_f?></p>
<?php } if($rep2=="aucun"){
  echo "<p> Aucun chapitre à afficher</p>";
}else{
  $l=$rep2->fetchObject();?>

<figure id="video_player">
 <table style="margin-left: 30px">
      <tr style="background-color:white;margin-left:30px;margin-right: 30px;"><td style="width:500px;padding-top: 20px;">
      <video   poster="img/<?=$img?>" controls>
        <source src="mp4/<?=$l->video?>" type="video/mp4">
        <source src="mp4/<?=$l->video?>" type="video/webm">
      </video></td>
<td style="width:800px;
"> <div style=" border-color:#919191; border:1px solid gray; margin-left: 30px; padding-left: 20px;  padding: 20px 20px 20px 20px;
">   <h3 style="color:#1c2b4b"> <strong><?=$l->nom?> </strong> </h3>
<h6><?=$l->description?></h6></div>
</td></tr> 			
</table>
 <div class="row"> <figcaption >
   <table  style="margin-left: 50px; margin-top:30px;"><?php  while ($ligne = $rep2->fetchObject()){?>
      <tr><td style="padding-bottom: 10px;width:300px;"><a href="mp4/<?=$ligne->video?>"><img width="90" height="60" src="img/<?=$img?>" alt="ch1"></a><br></d>
    <td style="padding-bottom: 10px;width:700px" ><div style=" border-color:#919191; border:1px solid gray; margin-left: 10px; padding-left: 20px;  padding: 20px 20px 20px 20px  ;"> <h3 style="color:#1c2b4b"> <strong><?=$ligne->nom?></strong> </h3>
<h6><?=$ligne->description?></h6></div></td>
</tr> <br>
<?php }} ?>
    </table></figcaption></div>
</figure><br><br>
<script type="text/javascript">
  var video_player = document.getElementById("video_player"),
links = video_player.getElementsByTagName('a');
for (var i=0; i<links.length; i++) {
  links[i].onclick = handler;
}
  function handler(e) {
  e.preventDefault();
  videotarget = this.getAttribute("href");
  filename = videotarget.substr(0, videotarget.lastIndexOf('.')) || videotarget;
  video = document.querySelector("#video_player video");
  video.removeAttribute("controls");
  video.removeAttribute("poster");
  source = document.querySelectorAll("#video_player video source");
  source[0].src = filename + ".mp4";
  source[1].src = filename + ".webm";
  video.load();
  video.play();    
}
</script>
<style type="text/css">
#video_player {
  display: table;
  line-height: 0;
  font-size: 0;
  background: white
;
}

#video_player video,
  #video_player figcaption {
    display: table-cell;
    vertical-align: top;
}
video{
  text-align: center;
}
#video_player figcaption {
  width: 25%;
}
#video_player figcaption a {
  display: block;
  opacity: .5;
  transition: 1s opacity;
}
#video_player figcaption a img,
  figure video {
    width: 100%;
    height: auto;
}
#video_player figcaption a:hover {
  opacity: 1;
}
@media (max-width: 700px) {
  #video_player video,
    #video_player figcaption {
      display: table-row;
    }
#video_player figcaption a {
  display: inline-block;
  width: 33.33%;
}
}
</style>