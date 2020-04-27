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
                <td> <?php echo $red->nombre_redhumeda ?> </td>
                <td>
                    <?php
                    if ($red->estado_redhumeda == 'Pendiente') { ?>
                        <p class="text-danger"> <?php echo $red->estado_redhumeda;   ?> </p>
                    <?php     } else { ?>
                        <p class="text-success"> <?php echo $red->estado_redhumeda;   ?> </p>
                    <?php    } ?>
                </td>
                <td> <?php echo $red->ubicacion_redhumeda  ?> </td>

                <?php if ($red->imagen_redhumeda != null) {  ?>
                    <td>
                        <center>
                            <a class="btn btn-success btn-circle" data-toggle="modal" data-target="#imagenModal" style="cursor: pointer;" onclick="javascript:document.getElementById('imagenDelGrifo').src= '<?php echo base_url() . 'assets/upload/' .  $red->imagen_redhumeda ?>'  ">
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
                    <a class="btn btn-danger btn-circle" data-toggle="modal" data-target="#deleteModal" style="cursor: pointer;" onclick="javascript:document.getElementById('delete_id_redhumeda').value=<?php echo $red->id_redhumeda ?>">
                        <i class="fas fa-trash" style="color: #fff;"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<form id="delete_form">
    <input type="hidden" id="delete_id_redhumeda" name="id_redhumeda" value="">
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

<div class="modal fade" id="imagenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <h6 class="m-0 font-weight-bold text-primary">Nueva Red Húmeda</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse" id="collapseCardExample">
            <div class="card-body">
                <div>
                    This is a collapsable card example using Bootstrap's built in collapse functionality. <strong>Click on the card header</strong> to see the card body collapse and expand!
                    </br> </br>
                    <div class="form-group row" id="nombre_redhumeda">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="exampleFormControlTextarea1"><b>Nombre</b></label>
                            <input type="text" id="inputNombre" name="nombre_redhumeda" class="form-control form-control-user" placeholder="Escriba el nombre...">
                            <div class="invalid-feedback" id="inputNombreText">
                            </div>
                        </div>
                        <div class="col-sm-6" id="estado_redhumeda">
                            <label for="exampleFormControlTextarea1"><b>Seleccione un estado</b></label>
                            </br>
                            <input type="radio" id="Funcionando" name="estado_redhumeda" value="Funcionando">
                            <label for="Funcionando">Funcionando</label><br>
                            <input type="radio" id="Pendiente" name="estado_redhumeda" value="Pendiente" checked>
                            <label for="Pendiente">Pendiente</label><br>
                        </div>
                    </div>
                    <div class="form-group row" id="nombre_usuario">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="exampleFormControlTextarea1"><b>Ubicación (Opcional)</b></label>
                            <textarea class="form-control" name="ubicacion_redhumeda" id="ubicacion_redhumeda" rows="4"></textarea>
                            <div class="invalid-feedback" id="inputUbicacionText">
                            </div>
                        </div>
                        <div class="col-sm-6" id="estado_redhumeda">
                            <label for="exampleFormControlTextarea1"><b>Seleccione el edificio en el cual se encuentra</b></label>
                            </br>
                            <select multiple class="form-control" id="exampleFormControlSelect2" name="id_edificio" required>
                                <?php foreach ($edificio as $edi) { ?>
                                    <option value="<?php echo $edi->id_edificio ?>"><?php echo $edi->nombre_edificio ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row" id="nombre_redhumeda">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="exampleFormControlTextarea1"><b>Foto (Opcional)</b></label>
                            <input type="file" name="image_file" id="image_file" />
                            <div class="invalid-feedback" id="inputImagenText">
                            </div>
                        </div>
                    </div>
                    </br>
                    <p><b>De clic en el mapa para elegir la ubicación del redhumeda. (Opcional)</b></p>

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
                        url: "<?php echo site_url() . '/redhumeda/crearRedHumedaajax' ?>",
                        data: $(this).serialize(),
                        success: function(data) {
                            document.getElementById("inputNombre").classList.remove("is-invalid");

                            window.location.href = "<?php echo site_url('redhumeda/success') ?>";
                        },
                        statusCode: {
                            400: function(xhr) {
                                document.getElementById("inputNombre").classList.remove("is-invalid");

                                var json = JSON.parse(xhr.responseText);
                                if (json.nombre_redhumeda.length != 0) {
                                    document.getElementById("inputNombre").classList.add("is-invalid");
                                    document.getElementById("inputNombreText").innerHTML = json.nombre_redhumeda;
                                }

                            }
                        },
                    });
                } else {
                    $.ajax({
                        url: "<?php echo site_url() . '/redhumeda/ajax_upload' ?>",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            document.getElementById("inputNombre").classList.remove("is-invalid");

                            // var json = JSON.parse(data);  
                            $('#uploaded_image').html(data);
                            window.location.href = "<?php echo site_url('redhumeda/success') ?>";
                        },
                        statusCode: {
                            400: function(xhr) {
                                document.getElementById("inputNombre").classList.remove("is-invalid");

                                var json = JSON.parse(xhr.responseText);
                                if (json.nombre_redhumeda.length != 0) {
                                    document.getElementById("inputNombre").classList.add("is-invalid");
                                    document.getElementById("inputNombreText").innerHTML = json.nombre_redhumeda;
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
                    url: "<?php echo site_url() . '/redhumeda/eliminarRedHumeda' ?>",
                    data: $(this).serialize(),
                    success: function(data) {
                        window.location.href = "<?php echo site_url('redhumeda/successdelete') ?>";
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