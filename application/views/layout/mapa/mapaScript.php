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
 </script>