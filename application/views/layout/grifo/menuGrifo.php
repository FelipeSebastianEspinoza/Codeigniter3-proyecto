<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Grifos</h1>
</div>
<?php if ($this->session->flashdata('category_success')) { ?>
    <div class="alert alert-success"> <?= $this->session->flashdata('category_success') ?> </div>
<?php } ?>
<table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Estado</th>
            <th>Descripción</th>
            <th>Comentario</th>
            <th>Foto</th>
            <th>Modificar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Nombre</th>
            <th>Estado</th>
            <th>Descripción</th>
            <th>Comentario</th>
            <th>Foto</th>
            <th>Modificar</th>
            <th>Eliminar</th>
        </tr>
    </tfoot>
    <tbody>
        <?php foreach ($grifos as $grifo) { ?>
            <tr>
                <td> <?php echo $grifo->nombre_grifo       ?> </td>
                <td> <?php echo $grifo->estado_grifo       ?> </td>
                <td> <?php echo $grifo->descripcion_grifo  ?> </td>
                <td> <?php echo $grifo->comentario_grifo   ?> </td>
                <?php if ($grifo->imagen_grifo != null) {  ?>
                    <td>
                        <center>
                            <a class="btn btn-success btn-circle" data-toggle="modal" data-target="#logoutModal4" style="cursor: pointer;" onclick="javascript:document.getElementById('imagenDelGrifo').src= '<?php echo base_url() . 'assets/upload/' .  $grifo->imagen_grifo ?>'  ">
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
                        <a href="<?php echo site_url('grifo/editar/' . $grifo->id_grifo) ?>" class="btn btn-info btn-circle">
                            <i class="fas fa-pen"></i>
                        </a>
                    </center>
                </td>
                <td>
                    <a class="btn btn-danger btn-circle" data-toggle="modal" data-target="#logoutModal3" style="cursor: pointer;" onclick="javascript:document.getElementById('delete_id_grifo').value=<?php echo $grifo->id_grifo ?>">
                        <i class="fas fa-trash" style="color: #fff;"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<form id="delete_form">
    <input type="hidden" id="delete_id_grifo" name="id_grifo" value="">
    <div class="modal fade" id="logoutModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

<div class="modal fade" id="logoutModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="text-center">
                <img id="imagenDelGrifo" class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="" alt="">
            </div>
        </div>
    </div>
</div>












<!--..............................................................................................-->
<?php
$attributes = array('id' => 'upload_form', 'name' => 'pointform');
echo Form_open_multipart('', $attributes);
?>
</br>
<div class="col-lg-12">
    <!-- Collapsable Card Example -->
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Nuevo Grifo</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse" id="collapseCardExample">
            <div class="card-body">
                <div>
                    This is a collapsable card example using Bootstrap's built in collapse functionality. <strong>Click on the card header</strong> to see the card body collapse and expand!
                    </br> </br>
                    <div class="form-group row" id="nombre_grifo">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="exampleFormControlTextarea1">Nombre</label>
                            <input type="text" id="inputNombre" name="nombre_grifo" class="form-control form-control-user" placeholder="Escriba el nombre...">
                            <div class="invalid-feedback" id="inputNombreText">
                            </div>
                        </div>
                        <div class="col-sm-6" id="estado_grifo">
                            <label for="exampleFormControlTextarea1">Estado</label>
                            <input type="text" id="inputEstado" name="estado_grifo" class="form-control form-control-user" placeholder="Escriba el estado...">
                            <div class="invalid-feedback" id="inputEstadoText">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" id="nombre_usuario">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="exampleFormControlTextarea1">Descripción (Opcional)</label>
                            <textarea class="form-control" name="descripcion_grifo" id="descripcion_grifo" rows="3"></textarea>
                            <div class="invalid-feedback" id="inputDescripcionText">
                            </div>
                        </div>
                        <div class="col-sm-6" id="comentario_grifo">
                            <label for="exampleFormControlTextarea1">Comentario (Opcional)</label>
                            <textarea class="form-control" name="comentario_grifo" id="comentario_grifo" rows="3"></textarea>
                            <div class="invalid-feedback" id="inputComentarioText">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" id="nombre_grifo">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="exampleFormControlTextarea1">Foto (Opcional)</label>
                            <input type="file" name="image_file" id="image_file" />
                            <div class="invalid-feedback" id="inputImagenText">
                            </div>
                        </div>
                    </div>
                    </br>
                    <p>De clic en el mapa para elegir la ubicación del grifo. (Opcional)</p>

                    <div class="form-group row" id="nombre_usuario">
                        <div class="col-sm-12 mb-6 mb-sm-0">
                            <div>
                            </div>
                            <div style="clear:both;height:5px;">
                            </div>
                            <div id="pointer_div" onclick="point_it(event)" style="background-image: url('<?php echo base_url() ?>assets/images/mapa.jpg');
                               	background-repeat: no-repeat; width: 678px; height: 506px;">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-6 mb-sm-0">
                        <div>
                            Posición X->
                            <input type="text" name="form_x" size="4" />
                            Posición Y->
                            <input type="text" name="form_y" size="4" />
                        </div>
                    </div>
                    </br>
                    <div class="col-sm-12 mb-6 mb-sm-0">
                        <a class="btn btn-success btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <input type="submit" name="upload" id="upload" value="Upload" class="btn btn-info" />
                            </form>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!--..............................................................................................-->

    <script language="JavaScript" type="text/javascript">
        function point_it(event) {
            pos_x = event.offsetX ? (event.offsetX) : event.pageX - document.getElementById("pointer_div").offsetLeft;
            pos_y = event.offsetY ? (event.offsetY) : event.pageY - document.getElementById("pointer_div").offsetTop;
            document.pointform.form_x.value = pos_x - 12;
            document.pointform.form_y.value = pos_y - 15;
        }
    </script>
    <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#upload_form').on('submit', function(e) {
                e.preventDefault();
                if ($('#image_file').val() == '') {
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo site_url() . '/grifo/crearGrifoajax' ?>",
                        data: $(this).serialize(),
                        success: function(data) {
                            document.getElementById("inputNombre").classList.remove("is-invalid");
                            document.getElementById("inputEstado").classList.remove("is-invalid");
                            window.location.href = "<?php echo site_url('grifo/success') ?>";
                        },
                        statusCode: {
                            400: function(xhr) {
                                document.getElementById("inputNombre").classList.remove("is-invalid");
                                document.getElementById("inputEstado").classList.remove("is-invalid");
                                var json = JSON.parse(xhr.responseText);
                                if (json.nombre_grifo.length != 0) {
                                    document.getElementById("inputNombre").classList.add("is-invalid");
                                    document.getElementById("inputNombreText").innerHTML = json.nombre_grifo;
                                }
                                if (json.estado_grifo.length != 0) {
                                    document.getElementById("inputEstado").classList.add("is-invalid");
                                    document.getElementById("inputEstadoText").innerHTML = json.estado_grifo;
                                }
                            }
                        },
                    });
                } else {
                    $.ajax({
                        url: "<?php echo site_url() . '/grifo/ajax_upload' ?>",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            document.getElementById("inputNombre").classList.remove("is-invalid");
                            document.getElementById("inputEstado").classList.remove("is-invalid");
                            // var json = JSON.parse(data);  
                            $('#uploaded_image').html(data);
                            window.location.href = "<?php echo site_url('grifo/success') ?>";
                        },
                        statusCode: {
                            400: function(xhr) {
                                document.getElementById("inputNombre").classList.remove("is-invalid");
                                document.getElementById("inputEstado").classList.remove("is-invalid");
                                var json = JSON.parse(xhr.responseText);
                                if (json.nombre_grifo.length != 0) {
                                    document.getElementById("inputNombre").classList.add("is-invalid");
                                    document.getElementById("inputNombreText").innerHTML = json.nombre_grifo;
                                }
                                if (json.estado_grifo.length != 0) {
                                    document.getElementById("inputEstado").classList.add("is-invalid");
                                    document.getElementById("inputEstadoText").innerHTML = json.estado_grifo;
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
            $('#delete_form').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url() . '/grifo/eliminarGrifo' ?>",
                    data: $(this).serialize(),
                    success: function(data) {
                        window.location.href = "<?php echo site_url('grifo/successdelete') ?>";
                    },
                });
            });
        });
    </script>