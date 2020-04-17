 
	<p>
		<img name="usaMap" src="<?php echo base_url() ?>assets/images/mapa.jpg" usemap="#m_usaMap" width="678px" height= "506px" border="0" draggable="false">
	</p>                                                                        

	<map name="m_usaMap">

       <area style="cursor: pointer;"  shape="rect" coords="199,167,322,194" id="demo"
       href="http://en.wikipedia.org/wiki/Montana" title="EdificioGantes"
       onclick="GantesOnClick()" onmouseover="EdificioGantes()"
       onmouseout="imagenNormal()" >



    </map>
 
    
 
 
<script src="<?php echo base_url() ?>assets/marker/imageMapResizer.min.js"></script>

      
<script>
$(document).ready(function(){
          document.getElementById("sidebarToggle").style.display = "none";
        }); 
$('#sidebarToggle').click(function(){ 
    $('map').imageMapResize();
});
$('map').imageMapResize();
 
</script>
 

 
 