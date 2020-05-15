<link rel="stylesheet" href="<?php echo base_url() ?>assets/marker/scalize.css" />

<div class="scalize w-100">
    <img src="<?php echo base_url() ?>assets/images/mapa.jpg" alt="" class="target">

    <?php
    foreach ($zona as $obj) {
    ?>
        <div>
            <!--   <a  href="<?php echo site_url('zona/editar/' . $obj->id_grifo) ?>">  -->
            <div class='item-point' data-top='<?php echo $obj->posx ?>' data-left='<?php echo $obj->posy ?>' style=' background: #006400; border: solid 3px #006400;' onmouseout='imagenNormal()' onmouseover="javascript:document.getElementById('myImage').src= '<?php echo base_url() . 'assets/upload/' .  $obj->imagen ?>' ,document.getElementById('fotoTitulo').innerHTML = '<?php echo $obj->nombre ?>'  ">
            </div>
            <!--    </a>  -->
        </div>
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