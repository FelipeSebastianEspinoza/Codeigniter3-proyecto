<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Zonas de Seguridad</h1>
</div>
<?php if ($this->session->flashdata('category_success')) { ?>
    <div class="alert alert-success"> <?= $this->session->flashdata('category_success') ?> </div>
<?php } ?>
<table class="table table-striped table-bordered table-sm" id="dataTable1" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th width="50">Foto</th>
            <th width="50">Modificar</th>
            <th width="50">Eliminar</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th width="50">Foto</th>
            <th width="50">Modificar</th>
            <th width="50">Eliminar</th>
        </tr>
    </tfoot>
    <tbody>
        <?php foreach ($zonadeseguridad as $red) { ?>
            <tr>
                <td> <?php echo $red->nombre ?> </td>

                <td> <?php echo $red->descripcion  ?> </td>

                <?php if ($red->imagen != null) {  ?>
                    <td>
                        <center>
                            <a class="btn btn-success btn-circle" data-toggle="modal" data-target="#imagenModalZonaDeSeguridad" style="cursor: pointer;" onclick="javascript:document.getElementById('imagenDeZonaDeSeguridad').src= '<?php echo base_url() . 'assets/upload/' .  $red->imagen ?>'  ">
                                <i class="fas fa-image" style="color: #fff;"></i>
                            </a>
                        </center>
                    </td>
                <?php } else { ?>
                    <td>
                        <center>
                            <a class="btn btn-warning btn-circle">
                                <i class="fas fa-times" style="color: #fff;"></i>
                            </a>
                        </center>
                    </td>
                <?php } ?>
                <td>
                    <center>
                        <a href="<?php echo site_url('zonadeseguridad/editar/' . $red->id_zonadeseguridad) ?>" class="btn btn-info btn-circle">
                            <i class="fas fa-pen"></i>
                        </a>
                    </center>
                </td>
                <td>
                    <a class="btn btn-danger btn-circle" data-toggle="modal" data-target="#deleteModal" style="cursor: pointer;" onclick="javascript:document.getElementById('delete_zonadeseguridad').value=<?php echo $red->id_zonadeseguridad ?>">
                        <i class="fas fa-trash" style="color: #fff;"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<form id="delete_form">
    <input type="hidden" id="delete_zonadeseguridad" name="id_zonadeseguridad" value="">
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmar Eliminación</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">¿Seguro que quiere eliminar este elemento?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <input type="submit" name="delete" id="delete" value="Eliminar" class="btn btn-info" />
                </div>
            </div>
        </div>
    </div>
</form>

<div class="modal fade" id="imagenModalZonaDeSeguridad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="text-center">
                <img id="imagenDeZonaDeSeguridad" class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="" alt="">
            </div>
        </div>
    </div>
</div>
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
