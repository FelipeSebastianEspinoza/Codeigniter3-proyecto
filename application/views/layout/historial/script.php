<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>


<script>
    $(document).ready(function() {
        $('#delete_formreporte').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url() . '/historial/eliminarHistorial' ?>",
                data: $(this).serialize(),
                success: function(data) {


                    <?php if ($tipo == 'seremi') { ?>
                        window.location.href = '<?php echo site_url('historial/successdeleteseremi/') ?>';
                    <?php } else { ?>
                        window.location.href = '<?php echo site_url('historial/successdeletemutual/') ?>';
                    <?php } ?>
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
                url: "<?php echo site_url() . '/historial/ajax_upload' ?>",
                data: $(this).serialize(),
                success: function(data) {
                    document.getElementById("inputTitulo").classList.remove("is-invalid");

                    <?php if ($tipo == 'seremi') { ?>
                        window.location.href = '<?php echo site_url('historial/successseremi/') ?>';
                    <?php } else { ?>
                        window.location.href = '<?php echo site_url('historial/successmutual/') ?>';
                    <?php } ?>

                },
                statusCode: {
                    400: function(xhr) {
                        document.getElementById("inputTitulo").classList.remove("is-invalid");
                        var json = JSON.parse(xhr.responseText);
                        if (json.titulo.length != 0) {
                            document.getElementById("inputTitulo").classList.add("is-invalid");
                            document.getElementById("inputTituloText").innerHTML = json.titulo;
                        }
                    }
                },
            });
        });
    });
</script>