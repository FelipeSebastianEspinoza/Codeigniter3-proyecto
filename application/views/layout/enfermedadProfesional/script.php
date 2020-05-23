<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#deleteenfermedadProfesional_form').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url() . '/enfermedadProfesional/eliminarEnfermedadProfesional' ?>",
                data: $(this).serialize(),
                success: function(data) {
                    window.location.href = "<?php echo site_url('enfermedadProfesional/successdelete') ?>";
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
                    url: "<?php echo site_url() . '/enfermedadProfesional/ajax_upload' ?>",
                    data: $(this).serialize(),
                    success: function(data) {
                        document.getElementById("inputNombre").classList.remove("is-invalid");

                        window.location.href = "<?php echo site_url('enfermedadProfesional/success') ?>";
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
                    url: "<?php echo site_url() . '/enfermedadProfesional/ajax_upload' ?>",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        document.getElementById("inputNombre").classList.remove("is-invalid");

                        // var json = JSON.parse(data);  
                        $('#uploaded_image').html(data);
                        window.location.href = "<?php echo site_url('enfermedadProfesional/success') ?>";
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