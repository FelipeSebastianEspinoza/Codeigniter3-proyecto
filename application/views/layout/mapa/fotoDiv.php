 <div class="cell shrink">
     <img class="thumbnail" id="myImage" src="<?php echo base_url() ?>assets/images/Edificios/edificioNormal.jpg" style="display: block; width: 100%; ">
 </div>



 <script>
     function imagenNormal() {
         document.getElementById('myImage').src = '<?php echo base_url() ?>assets/images/Edificios/edificioNormal.jpg';
         document.getElementById('fotoTitulo').innerHTML = "Universidad del Bío-Bío";
     }

     function EdificioGantes() {
         document.getElementById('myImage').src = '<?php echo base_url() ?>assets/images/Edificios/edificioGantes.jpg';
         document.getElementById('fotoTitulo').innerHTML = "Edificio Gantes";
     }

     function GantesOnClick() {
         document.getElementById("EdificioGantes").submit();
     }
 </script>