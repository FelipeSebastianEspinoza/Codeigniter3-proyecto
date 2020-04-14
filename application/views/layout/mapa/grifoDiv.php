<link rel="stylesheet" href="<?php echo base_url() ?>assets/marker/scalize.css" />
 
    <div class="scalize w-100">           
	  <img src="<?php echo base_url() ?>assets/images/mapa.jpg" alt="" class="target">



    <?php
    foreach($grifos as $grifo){
        //echo  $grifo->nombre_grifo;

        echo "<div class='item-point' data-top='$grifo->posx_grifo' data-left='$grifo->posy_grifo' 
        style=' background: #e70000; border: solid 3px #bf000a;' 
        onmouseover='EdificioGantes()'  onclick='GantesOnClick()'
        onmouseout='imagenNormal()'>
       <div><a href='#' class='toggle'></a></div>
       </div> ";

    }

    //hacer el script con el foreach?

    ?>
 
    <script src="<?php echo base_url() ?>assets/marker/scalize.js"></script>
 
 
    <script type="text/javascript">
        $(document).ready(function(){
            $('.scalize').scalize();
        });        
 
    </script>
  
  <script type="text/javascript">
        $(document).ready(function(){
          document.getElementById("sidebarToggle").style.display = "none";
        });        
 
    </script>
 <script>
 
 function imagenNormal() {
 document.getElementById('myImage').src='<?php echo base_url() ?>assets/images/Edificios/edificioNormal.jpg';
 document.getElementById('fotoTitulo').innerHTML = "Universidad del Bío-Bío"; 
 } 
 function EdificioGantes() {
 document.getElementById('myImage').src='<?php echo base_url() ?>assets/images/Edificios/edificioGantes.jpg';
 document.getElementById('fotoTitulo').innerHTML = "Edificio Gantes"; 
 }
 function GantesOnClick() {
  document.getElementById('myImage').src='<?php echo base_url() ?>assets/images/Edificios/aulasAD.jpg'; 
 }
  
  </script>
  
 

 