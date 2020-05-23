<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#delete_form').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url() . '/extintor/eliminarExtintor' ?>",
                data: $(this).serialize(),
                success: function(data) {
                    window.location.href = "<?php echo site_url('extintor/successdelete') ?>";
                },
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#upload_form').on('submit', function(e) {
            e.preventDefault();

            var dateOne = new Date(document.getElementById("inputFechaCarga").value);
            var dateTwo = new Date(document.getElementById("inputFechaVenc").value);

            if (dateOne < dateTwo) {

                if ($('#image_file').val() == '') {
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo site_url() . '/extintor/ajax_upload' ?>",
                        data: $(this).serialize(),
                        success: function(data) {
                            document.getElementById("inputNombre").classList.remove("is-invalid");

                            window.location.href = "<?php echo site_url('extintor/success') ?>";
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
                        url: "<?php echo site_url() . '/extintor/ajax_upload' ?>",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            document.getElementById("inputNombre").classList.remove("is-invalid");

                            // var json = JSON.parse(data);  
                            $('#uploaded_image').html(data);
                            window.location.href = "<?php echo site_url('extintor/success') ?>";
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
            } else {
                document.getElementById("inputFechaVenc").classList.remove("is-invalid");
                document.getElementById("inputFechaVenc").classList.add("is-invalid");
                document.getElementById("inputFechaVencText").innerHTML = 'La fecha de vencimiento es anterior a la de carga';
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