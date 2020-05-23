<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#delete_formreporte').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url() . '/reporte/eliminarReporte' ?>",
                data: $(this).serialize(),
                success: function(data) {
                    window.location.href = "<?php echo site_url('reporte/successdelete') ?>";
                },
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#upload_form').on('submit', function(e) {
            e.preventDefault();

            var dateOne = new Date(document.getElementById("inputFecha").value);
            var dateTwo = new Date(document.getElementById("inputFechaTerm").value);

            if (dateTwo == 'Invalid Date' || dateTwo == '0000-00-00') {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url() . '/reporte/ajax_upload_sinfecha' ?>",
                    data: $(this).serialize(),
                    success: function(data) {
                        document.getElementById("inputPersona").classList.remove("is-invalid");

                        window.location.href = "<?php echo site_url('reporte/success') ?>";
                    },
                    statusCode: {
                        400: function(xhr) {
                            document.getElementById("inputPersona").classList.remove("is-invalid");

                            var json = JSON.parse(xhr.responseText);
                            if (json.persona.length != 0) {
                                document.getElementById("inputPersona").classList.add("is-invalid");
                                document.getElementById("inputPersonaText").innerHTML = json.persona;
                            }

                        }
                    },
                });
            } else if (dateOne < dateTwo) {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url() . '/reporte/ajax_upload' ?>",
                    data: $(this).serialize(),
                    success: function(data) {
                        document.getElementById("inputPersona").classList.remove("is-invalid");

                        window.location.href = "<?php echo site_url('reporte/success') ?>";
                    },
                    statusCode: {
                        400: function(xhr) {
                            document.getElementById("inputPersona").classList.remove("is-invalid");

                            var json = JSON.parse(xhr.responseText);
                            if (json.persona.length != 0) {
                                document.getElementById("inputPersona").classList.add("is-invalid");
                                document.getElementById("inputPersonaText").innerHTML = json.persona;
                            }

                        }
                    },
                });


            } else {
                document.getElementById("inputFechaTerm").classList.remove("is-invalid");
                document.getElementById("inputFechaTerm").classList.add("is-invalid");
                document.getElementById("inputFechaTermText").innerHTML = 'La fecha de termino es anterior al reporte';
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