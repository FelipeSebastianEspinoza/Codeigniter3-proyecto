 <p>
     <img name="usaMap" src="<?php echo base_url() ?>assets/images/mapa.jpg" usemap="#m_usaMap" width="100%" border="0" draggable="false">
 </p>
 <map name="m_usaMap">
     <?php
        foreach ($edificio as $edi) {
        ?>
         <?php if ($edi->estado_edificio == 'Pendiente') {  ?>

             <a href="<?php echo site_url('edificio/verEdificio/' . $edi->id_edificio) ?>">
             <img src="<?php echo base_url() ?>assets/edificioImages/<?php echo $edi->id_edificio . '.png' ?>" onmouseover="javascript:document.getElementById('myImage').src= '<?php echo base_url() . 'assets/upload/' .  $edi->imagen_edificio ?>' ,document.getElementById('fotoTitulo').innerHTML = '<?php echo $edi->nombre_edificio ?>'  " onmouseout="imagenNormal()" style="position:absolute; 
 	                 top:  <?php echo $edi->top_edificio ?>; 
	                 left: <?php echo $edi->left_edificio ?>;
	                 cursor:pointer;
	                 z-index: 3;  
                     width: <?php echo $edi->width_edificio ?>;
                  ">
             </a>
         <?php    } else {       ?>
             <area style="cursor: pointer;" shape="rect" coords="<?php echo $edi->cord1_edificio ?>,<?php echo $edi->cord2_edificio ?>,<?php echo $edi->cord3_edificio ?>,<?php echo $edi->cord4_edificio ?>" id="demo" href="<?php echo site_url('edificio/verEdificio/' . $edi->id_edificio) ?>" title="<?php echo $edi->nombre_edificio ?>" onmouseover="javascript:document.getElementById('myImage').src= '<?php echo base_url() . 'assets/upload/' .  $edi->imagen_edificio ?>' ,document.getElementById('fotoTitulo').innerHTML = '<?php echo $edi->nombre_edificio ?>'  " onmouseout="imagenNormal()">
         <?php     }   ?>
     <?php
        }
        ?>
 </map>

 <script src="<?php echo base_url() ?>assets/marker/imageMapResizer.min.js"></script>

 <script>
     $(document).ready(function() {
         document.getElementById("sidebarToggle").style.display = "none";
     });
     $('#sidebarToggle').click(function() {
         $('map').imageMapResize();
     });
     $('map').imageMapResize();
 </script>