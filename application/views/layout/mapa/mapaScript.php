 <script>
     $(document).ready(function() {

         $('#mapaDiv').load('map/mapaDiv').fadeIn("slow");
         $('#fotoDiv').load('map/fotoDiv').fadeIn("slow");
     });
     $('#edificios').click(function() {
         $('#mapaDiv').load('map/mapaDiv').fadeIn("slow");
         $('#fotoDiv').load('map/fotoDiv').fadeIn("slow");
     });
     $('#grifos').click(function() {
         $('#mapaDiv').load('map/grifoDiv').fadeIn("slow");
         $('#fotoDiv').load('map/fotoGrifoDiv').fadeIn("slow");
     });
     $('#zonas').click(function() {
         $('#mapaDiv').load('map/zonaDiv').fadeIn("slow");
         $('#fotoDiv').load('map/fotoGrifoDiv').fadeIn("slow");
     });
     $('#edificiosEstado').click(function() {
         $('#mapaDiv').load('map/mapaDivEstado').fadeIn("slow");
         $('#fotoDiv').load('map/fotoDiv').fadeIn("slow");
     });
 </script>