<link rel="stylesheet" href="<?php echo base_url() ?>assets/marker/scalize.css" />
 
    <div class="scalize w-100">           
	  <img src="<?php echo base_url() ?>assets/images/mapa.jpg" alt="" class="target">


	  <!-- Start Item Point -->
	  <div class="item-point" data-top="250" data-left="100" 
		   style=" background: #e70000; border: solid 3px #bf000a;" 
		   onmouseover="EdificioGantes()"  onclick="GantesOnClick()"
		   onmouseout="imagenNormal()">
	      <div><a href="#" class="toggle"></a></div>
	  </div> 
 


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
 
  
 

 