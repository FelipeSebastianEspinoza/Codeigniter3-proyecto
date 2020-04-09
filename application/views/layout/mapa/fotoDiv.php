 <h4 id="titulo">Universidad del Bío-Bío</h4> 
 
<div class="cell shrink">
    <img class="thumbnail" id="edGantes" src="<?php echo base_url() ?>assets/images/mapa.jpg">
</div>
<form method="POST" action="Edificio.php" id="EdificioGantes">
    <input type="hidden" name="id_edificio" value="1" />
</form>	
  
 
<script>  
 
function bigImg() {
document.getElementById("edGantes").style.display = "block";
document.getElementById('edGantes').src='https://vignette.wikia.nocookie.net/lossimpson/images/b/bd/Homer_Simpson.png/revision/latest/top-crop/width/360/height/450?cb=20100522180809&amp;path-prefix=es';
document.getElementById('titulo').innerHTML = "Edificio Gantes"; 
}

function normalImg() {
 document.getElementById("edGantes").style.display = "block";
 document.getElementById('edGantes').src='https://vignette.wikia.nocookie.net/lossimpson/images/b/bd/Homer_Simpson.png/revision/latest/top-crop/width/360/height/450?cb=20100522180809&amp;path-prefix=es>';
 document.getElementById('titulo').innerHTML = "Universidad del Bío-Bío"; 
}
function GantesOnClick() {
document.getElementById("EdificioGantes").submit();  
}
 
 
 
 
	 </script>

