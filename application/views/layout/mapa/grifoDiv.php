<link rel="stylesheet" href="<?php echo base_url() ?>assets/marker/scalize.css" />

<div class="scalize w-100">
    <img src="<?php echo base_url() ?>assets/images/mapa.jpg" alt="" class="target">

    <?php
    foreach ($grifos as $grifo) {
    ?>
        <?php if($grifo->estado_grifo =='Pendiente'){   ?>
        <div>
            <!--   <a  href="<?php echo site_url('grifo/editar/' . $grifo->id_grifo) ?>">  -->
            <div class='item-point' data-top='<?php echo $grifo->posx_grifo ?>' data-left='<?php echo $grifo->posy_grifo ?>' style=' background: #e70000; border: solid 3px #bf000a;'  onmouseout='imagenNormal()' onmouseover="javascript:document.getElementById('myImage').src= '<?php echo base_url() . 'assets/upload/' .  $grifo->imagen_grifo ?>' ,document.getElementById('fotoTitulo').innerHTML = '<?php echo $grifo->nombre_grifo ?>'  ">
            </div>
            <!--    </a>  -->
        </div>
    <?php  }else{  ?>
        <div>
            <!--   <a  href="<?php echo site_url('grifo/editar/' . $grifo->id_grifo) ?>">  -->
            <div class='item-point' data-top='<?php echo $grifo->posx_grifo ?>' data-left='<?php echo $grifo->posy_grifo ?>' style=' background: #006400; border: solid 3px #006400;'  onmouseout='imagenNormal()' onmouseover="javascript:document.getElementById('myImage').src= '<?php echo base_url() . 'assets/upload/' .  $grifo->imagen_grifo ?>' ,document.getElementById('fotoTitulo').innerHTML = '<?php echo $grifo->nombre_grifo ?>'  ">
            </div>
            <!--    </a>  -->
        </div>
        <?php  } ?>
    <?php
    }
    ?>

    <script src="<?php echo base_url() ?>assets/marker/scalize.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.scalize').scalize();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            document.getElementById("sidebarToggle").style.display = "none";
        });
    </script>
    <script>
        function imagenNormal() {
            document.getElementById('myImage').src = '<?php echo base_url() ?>assets/images/Edificios/edificioNormal.jpg';
            document.getElementById('fotoTitulo').innerHTML = "Universidad del Bío-Bío";
        }
    </script>