<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#delete_formreporte').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url() . '/protocolo/eliminar' ?>",
                data: $(this).serialize(),
                success: function(data) {
                    window.location.href = "<?php echo site_url('protocolo/successdelete') ?>";
                },
            });
        });
    });
</script>
 
<script>
    $(document).ready(function() {
        $('#upload_form').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url() . '/protocolo/crear' ?>",
                data: $(this).serialize(),
                success: function(data) {
                    document.getElementById("inputNombre").classList.remove("is-invalid");
                    window.location.href = "<?php echo site_url('protocolo/success') ?>";
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
                        columns: [0, 1]
                    }
                },
                {
                    extend: 'pdf',
                    footer: true,
                    exportOptions: {
                        columns: [0, 1]
                    }
                },
                {
                    extend: 'excel',
                    footer: true,
                    exportOptions: {
                        columns: [0, 1]
                    }
                }
            ]
        });
    });
</script>