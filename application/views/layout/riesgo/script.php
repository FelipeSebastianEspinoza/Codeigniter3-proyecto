 <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>

 <script>
     $(document).ready(function() {
         $('#upload_form').on('submit', function(e) {
             e.preventDefault();
             if ($('#image_file').val() == '') {
                 $.ajax({
                     type: 'POST',
                     url: "<?php echo site_url() . '/riesgo/registrar' ?>",
                     data: $(this).serialize(),
                     success: function(data) {
                         document.getElementById("inputNombre").classList.remove("is-invalid");
                         window.location.href = "<?php echo site_url('riesgo/success') ?>";
                     },
                     statusCode: {
                         400: function(xhr) {
                             document.getElementById("inputNombre").classList.remove("is-invalid");
                             var json = JSON.parse(xhr.responseText);
                             if (json.nombre.length != 0) {
                                 document.getElementById("inputNombre").classList.add("is-invalid");
                                 document.getElementById("inputNombreText").innerHTML = json.nombre;
                             }

                         }
                     },
                 });
             } else {
                 $.ajax({
                     url: "<?php echo site_url() . '/riesgo/registrar' ?>",
                     method: "POST",
                     data: new FormData(this),
                     contentType: false,
                     cache: false,
                     processData: false,
                     success: function(data) {
                         document.getElementById("inputNombre").classList.remove("is-invalid");
                         // var json = JSON.parse(data);  
                         $('#uploaded_image').html(data);
                         window.location.href = "<?php echo site_url('riesgo/success') ?>";
                     },
                     statusCode: {
                         400: function(xhr) {
                             document.getElementById("inputNombre").classList.remove("is-invalid");

                             var json = JSON.parse(xhr.responseText);
                             if (json.nombre.length != 0) {
                                 document.getElementById("inputNombre").classList.add("is-invalid");
                                 document.getElementById("inputNombreText").innerHTML = json.nombre;
                             }

                         }
                     },
                 });
             }
         });
     });
 </script>


 <script>
     $(document).ready(function() {
         $('#dataTable1').DataTable({
             "order": [
                 [1, "desc"]
             ],
             dom: 'Bfrtip',
             buttons: [{
                     extend: 'csv',
                     footer: true,
                     exportOptions: {
                         columns: [1, 2]
                     }
                 },
                 {
                     extend: 'pdf',
                     footer: true,
                     exportOptions: {
                         columns: [1, 2]
                     }
                 },
                 {
                     extend: 'excel',
                     footer: true,
                     exportOptions: {
                         columns: [1, 2]
                     }
                 }
             ]
         });
     });
 </script>
 <script>
     $(document).ready(function() {
         $('#delete_form').on('submit', function(e) {
             e.preventDefault();
             $.ajax({
                 type: 'POST',
                 url: "<?php echo site_url() . '/riesgo/eliminar' ?>",
                 data: $(this).serialize(),
                 success: function(data) {
                     window.location.href = "<?php echo site_url('riesgo/successdelete') ?>";
                 },
             });
         });
     });
 </script>

 <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
 <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
 <script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>
 <script src="<?php echo base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
 <script src="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

 <script src="<?php echo base_url() ?>assets/vendor/datatables/dataTables.buttons.min.js"></script>
 <script src="<?php echo base_url() ?>assets/vendor/datatables/buttons.flash.min.js"></script>
 <script src="<?php echo base_url() ?>assets/vendor/datatables/jszip.min.js"></script>
 <script src="<?php echo base_url() ?>assets/vendor/datatables/pdfmake.min.js"></script>
 <script src="<?php echo base_url() ?>assets/vendor/datatables/vfs_fonts.js"></script>
 <script src="<?php echo base_url() ?>assets/vendor/datatables/buttons.html5.min.js"></script>
 <script src="<?php echo base_url() ?>assets/vendor/datatables/buttons.print.min.js"></script>


 