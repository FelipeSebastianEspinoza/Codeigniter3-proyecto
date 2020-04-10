 
	<p>
		<img name="usaMap" src="<?php echo base_url() ?>assets/images/mapa.jpg" usemap="#m_usaMap" width="100%" border="0" draggable="false">
	</p>

	<map name="m_usaMap">
 
       <area style="cursor: pointer;"  shape="rect" coords="199,167,322,194" 
       href="http://en.wikipedia.org/wiki/Montana" title="EdificioGantes"
       onclick="GantesOnClick()" onmouseover="bigImg()" onmouseout="normalImg()">
 
    </map>
 


















 
<script src="<?php echo base_url() ?>assets/marker/imageMapResizer.min.js"></script>

      
<script>
    
 $('#sidebarToggle').click(function(){ 
    $('map').imageMapResize();
});
 
$('map').imageMapResize();
</script>
 


 