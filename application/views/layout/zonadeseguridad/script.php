<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>

<script language="JavaScript" type="text/javascript">
    function point_it(event) {
        pos_x = event.offsetX ? (event.offsetX) : event.pageX - document.getElementById("pointer_div").offsetLeft;
        pos_y = event.offsetY ? (event.offsetY) : event.pageY - document.getElementById("pointer_div").offsetTop;
        document.pointform.form_x.value = pos_x - 12;
        document.pointform.form_y.value = pos_y - 15;
    }
</script>

<script>
    $(document).ready(function() {
        $('#delete_form').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url() . '/zonadeseguridad/eliminarZonaDeSeguridad' ?>",
                data: $(this).serialize(),
                success: function(data) {
                    window.location.href = "<?php echo site_url('zonadeseguridad/successdelete') ?>";
                },
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#upload_form').on('submit', function(e) {
            e.preventDefault();
            if ($('#image_file').val() == '') {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url() . '/zonadeseguridad/crearZonaDeSeguridadajax' ?>",
                    data: $(this).serialize(),
                    success: function(data) {
                        document.getElementById("inputNombre").classList.remove("is-invalid");

                        window.location.href = "<?php echo site_url('zonadeseguridad/success') ?>";
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
                    url: "<?php echo site_url() . '/zonadeseguridad/ajax_upload' ?>",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        document.getElementById("inputNombre").classList.remove("is-invalid");

                        // var json = JSON.parse(data);  
                        $('#uploaded_image').html(data);
                        window.location.href = "<?php echo site_url('zonadeseguridad/success') ?>";
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
                        columns: [0, 1, 2]
                    }
                },
                {
                    extend: 'pdf',
                    footer: true,
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                },
                {
                    extend: 'excel',
                    footer: true,
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                }
            ]
        });
    });
</script>