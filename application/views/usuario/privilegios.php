<?php if ($this->session->flashdata('category_success')) { ?>
    <div class="alert alert-success"> <?= $this->session->flashdata('category_success') ?> </div>
<?php } ?>
<table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Tipo</th>
            <th>Acciones</th>
            <th>Eliminar</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($usuario as $usu) { ?>
            <?php if ($usu->tipo_usuario != '2') { ?>
                <tr>
                    <td>
                        <?php echo $usu->nombre_usuario; ?>
                    </td>
                    <td>
                        <?php echo $usu->apellido_usuario; ?>
                    </td>
                    <td>
                        <?php echo $usu->correo_usuario; ?>
                    </td>
                    <?php if ($usu->tipo_usuario == '1') { ?>
                        <td>
                            <p class="text-success"> Administrador </p>
                        </td>
                    <?php } else { ?>
                        <td>
                            <p class="text-danger"> Usuario </p>
                        </td>
                    <?php  } ?>
                    <td>
                        <?php if ($usu->tipo_usuario == '1') { ?>
                            <a data-toggle="modal" data-target="#bajarModal" style="cursor: pointer;" onclick="javascript:document.getElementById('bajar_id_usuario').value=<?php echo $usu->id_usuario ?>">
                                <button type="button" class="btn btn-warning">Bajar a usuario común </button>
                            </a>
                        <?php } else { ?>
                            <a data-toggle="modal" data-target="#subirModal" style="cursor: pointer;" onclick="javascript:document.getElementById('subir_id_usuario').value=<?php echo $usu->id_usuario ?>">
                                <button type="button" class="btn btn-success">Subir a administrador </button>
                            </a>
                        <?php  } ?>
                    </td>
                    <td>
                        <a class="btn btn-danger btn-circle" data-toggle="modal" data-target="#deleteModal" style="cursor: pointer;" onclick="javascript:document.getElementById('delete_id_usuario').value=<?php echo $usu->id_usuario ?>">
                            <i class="fas fa-trash" style="color: #fff;"></i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        <?php } ?>
    </tbody>
</table>

<form id="delete_form">
    <input type="hidden" id="delete_id_usuario" name="id_usuario" value="">
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmar Eliminación</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">¿Seguro que quiere eliminar este usuario?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <input type="submit" name="delete" id="delete" value="Eliminar" class="btn btn-info" />
                </div>
            </div>
        </div>
    </div>
</form>
<form id="subir_form">
    <input type="hidden" id="subir_id_usuario" name="id_usuario" value="">
    <div class="modal fade" id="subirModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmar Subir de Rango</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">¿Seguro que quiere subir de rango a este usuario?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <input type="submit" name="subir" id="subir" value="Confirmar" class="btn btn-info" />
                </div>
            </div>
        </div>
    </div>
</form>
<form id="bajar_form">
    <input type="hidden" id="bajar_id_usuario" name="id_usuario" value="">
    <div class="modal fade" id="bajarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmar Bajar de Rango</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">¿Seguro que quiere bajar de rango a este usuario?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <input type="submit" name="bajar" id="bajar" value="Confirmar" class="btn btn-info" />
                </div>
            </div>
        </div>
    </div>
</form>
<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
<script language="JavaScript" type="text/javascript">
    $(document).ready(function() {
        $('#delete_form').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url() . '/usuario/eliminarUsuario' ?>",
                data: $(this).serialize(),
                success: function(data) {
                    window.location.href = "<?php echo site_url('usuario/successdelete') ?>";
                },
            });
        });
    });
</script>
<script language="JavaScript" type="text/javascript">
    $(document).ready(function() {
        $('#subir_form').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url() . '/usuario/subirUsuario' ?>",
                data: $(this).serialize(),
                success: function(data) {
                    window.location.href = "<?php echo site_url('usuario/successsubir') ?>";
                },
            });
        });
    });
</script>
<script language="JavaScript" type="text/javascript">
    $(document).ready(function() {
        $('#bajar_form').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url() . '/usuario/bajarUsuario' ?>",
                data: $(this).serialize(),
                success: function(data) {
                    window.location.href = "<?php echo site_url('usuario/successbajar') ?>";
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
            buttons: []
        });
    });
</script>