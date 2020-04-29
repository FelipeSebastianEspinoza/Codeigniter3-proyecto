<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Redes Húmedas</h1>
</div>
<?php if ($this->session->flashdata('category_success')) { ?>
    <div class="alert alert-success"> <?= $this->session->flashdata('category_success') ?> </div>
<?php } ?>
<table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Estado</th>
            <th>Ubicación</th>
            <th>Foto</th>
            <th>Modificar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Nombre</th>
            <th>Estado</th>
            <th>Ubicación</th>
            <th>Foto</th>
            <th>Modificar</th>
            <th>Eliminar</th>
        </tr>
    </tfoot>
    <tbody>
        <?php foreach ($redhumeda as $red) { ?>
            <tr>
                <td> <?php echo $red->nombre ?> </td>
                <td>
                    <?php
                    if ($red->estado == 'Pendiente') { ?>
                        <p class="text-danger"> <?php echo $red->estado;   ?> </p>
                    <?php     } else { ?>
                        <p class="text-success"> <?php echo $red->estado;   ?> </p>
                    <?php    } ?>
                </td>
                <td> <?php echo $red->ubicacion  ?> </td>

                <?php if ($red->imagen != null) {  ?>
                    <td>
                        <center>
                            <a class="btn btn-success btn-circle" data-toggle="modal" data-target="#imagenModalRedHumeda" style="cursor: pointer;" onclick="javascript:document.getElementById('imagenDeRedHumeda').src= '<?php echo base_url() . 'assets/upload/' .  $red->imagen ?>'  ">
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
                        <a href="<?php echo site_url('redhumeda/editar/' . $red->id_redhumeda) ?>" class="btn btn-info btn-circle">
                            <i class="fas fa-pen"></i>
                        </a>
                    </center>
                </td>
                <td>
                    <a class="btn btn-danger btn-circle" data-toggle="modal" data-target="#deleteModal" style="cursor: pointer;" onclick="javascript:document.getElementById('delete_redhumeda').value=<?php echo $red->id_redhumeda ?>">
                        <i class="fas fa-trash" style="color: #fff;"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<form id="delete_form">
    <input type="hidden" id="delete_redhumeda" name="id_redhumeda" value="">
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

<div class="modal fade" id="imagenModalRedHumeda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="text-center">
                <img id="imagenDeRedHumeda" class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="" alt="">
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
                    url: "<?php echo site_url() . '/redhumeda/eliminarRedHumeda' ?>",
                    data: $(this).serialize(),
                    success: function(data) {
                        window.location.href = "<?php echo site_url('redhumeda/successdelete') ?>";
                    },
                });
            });
        });
</script>






 