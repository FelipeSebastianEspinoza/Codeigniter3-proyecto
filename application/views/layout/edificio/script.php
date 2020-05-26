<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#upload_form').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: "<?php echo site_url() . '/edificio/asignarRiesgo' ?>",
                data: $(this).serialize(),
                success: function(data) {
                 

                    var $id = document.getElementById("id_edificioModal").value;
                    window.location.href = '<?php echo site_url('edificio/successRiesgo/') ?>' + $id;

                },
     
            });
        });
    });
</script>