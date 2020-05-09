<h1>Modificar Accidente</h1>

<?php foreach ($accidente as $obj) { ?>

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
            <a class="d-block card-header py-3" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Modificar Accidente</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div id="collapseCardExample">
                <div class="card-body">
                    <div>
                        This is a collapsable card example using Bootstrap's built in collapse functionality. <strong>Click
                            on the card header</strong> to see the card body collapse and expand!
                        </br> </br>
                        <div class="form-group row" id="persona">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="hidden" id="inputId" name="id_accidente" class="form-control form-control-user" value="<?php echo $obj->id_accidente ?>">
                                <label for="exampleFormControlTextarea1"><b>Persona</b></label>
                                <input type="text" id="inputPersona" name="persona" class="form-control form-control-user" value="<?php echo $obj->persona ?>">
                                <div class="invalid-feedback" id="inputPersonaText">
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="exampleFormControlTextarea1"><b>Código</b></label>
                                <input type="text" id="inputNumero" name="numero" class="form-control form-control-user" value="<?php echo $obj->numero ?>">
                                <div class="invalid-feedback" id="inputNumeroText">
                                </div>
                            </div>

                            <div class="col-sm-6" id="tipo">
                                <label for="exampleFormControlTextarea1">Seleccione un tipo de accidente</label>
                                </br>
                                <?php if ($obj->tipo != 'Grave') { ?>
                                    <input type="radio" id="Leve" name="tipo" value="Leve" checked>
                                    <label for="Leve">Leve</label><br>
                                    <input type="radio" id="Grave" name="tipo" value="Grave">
                                    <label for="Grave">Grave</label><br>
                                <?php } else { ?>
                                    <input type="radio" id="Leve" name="tipo" value="Leve">
                                    <label for="Leve">Leve</label><br>
                                    <input type="radio" id="Grave" name="tipo" value="Grave" checked>
                                    <label for="Grave">Grave</label><br>
                                <?php } ?>
                                <div class="invalid-feedback" id="inputTipoText">
                                </div>
                            </div>
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                <label for="exampleFormControlTextarea1"><b>Fecha de reporte</b></label>
                                <input type="date" id="inputFecha" name="fecha" class="form-control form-control-user" value="<?php echo $obj->fecha ?>" required>
                                <div class="invalid-feedback" id="inputFechaText">
                                </div>
                            </div>

                        </div>

                        <div class="form-group row" id="nombre_usuario">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="exampleFormControlTextarea1"><b>Descripción (Opcional)</b></label>
                                <textarea class="form-control" name="descripcion" id="descripcion" rows="4"><?php echo $obj->descripcion ?></textarea>
                                <div class="invalid-feedback" id="inputDescripcionText">
                                </div>
                            </div>
                            <div class="col-sm-6" id="estado">
                                <label for="exampleFormControlTextarea1"><b>Seleccione el edificio en el cual se
                                        encuentra</b></label>
                                </br>
                                <select multiple class="form-control" id="exampleFormControlSelect2" name="id_edificio" required>
                                    <?php foreach ($edificio as $edi) { ?>
                                        <?php if ($edi->id_edificio == $obj->id_edificio) { ?>
                                            <option value="<?php echo $edi->id_edificio ?>" selected>
                                                <?php echo $edi->nombre_edificio ?></option>
                                        <?php } else { ?>
                                            <option value="<?php echo $edi->id_edificio ?>"><?php echo $edi->nombre_edificio ?>
                                            </option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
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
            <div class="col-sm-12 mb-6 mb-sm-0">


                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col">Archivos</th>
                            <th scope="col">Ver</th>
                            <th scope="col">Modificar/Subir</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Diat</th>
                            <td>
                                <?php if ($obj->archivo1 != '') { ?>
                                    <a class="btn btn-warning btn-circle" href="<?php echo base_url() . 'assets/upload/' . $obj->archivo1 ?>" target="_blank" style="cursor: pointer;width:30px; height:30px; margin-right: 15px; margin-left: 5px;">
                                        <i class="fas fa-file" style="color: #fff;"></i>
                                    </a>
                                <?php } else { ?>
                                    <a class="btn btn-danger btn-circle" style="cursor: pointer;width:30px; height:30px; margin-right: 15px; margin-left: 5px;">
                                        <i class="fas fa-times" style="color: #fff;"></i>
                                    </a>
                                <?php } ?>
                            </td>
                            <td>
                                <!--   form input file form        -->
                                <?php
                                $attributes = array('id' => 'upload_archivo1', 'name' => 'archivo1');
                                echo Form_open_multipart('', $attributes);
                                ?>
                                <input type="hidden" id="inputId" name="id_accidente" class="form-control form-control-user" value="<?php echo $obj->id_accidente ?>">
                                <input type="file" name="image_file" id="image_file" required />
                                <input type="submit" name="upload" id="upload" value="Subir" class="btn btn-info" />
                                </form>
                            </td>
                            <td>
                                <a class="btn btn-danger btn-circle" data-toggle="modal" data-target="#deleteReporteModal" style="cursor: pointer;width:30px; height:30px; margin-right: 15px; margin-left: 5px;" onclick="javascript:document.getElementById('delete_reportearchivo').value='archivo1'">
                                    <i class="fas fa-trash" style="color: #fff;"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th>Investigación</th>
                            <td>
                                <?php if ($obj->archivo2 != '') { ?>
                                    <a class="btn btn-warning btn-circle" href="<?php echo base_url() . 'assets/upload/' . $obj->archivo2 ?>" target="_blank" style="cursor: pointer;width:30px; height:30px; margin-right: 15px; margin-left: 5px;">
                                        <i class="fas fa-file" style="color: #fff;"></i>
                                    </a>
                                <?php } else { ?>
                                    <a class="btn btn-danger btn-circle" style="cursor: pointer;width:30px; height:30px; margin-right: 15px; margin-left: 5px;">
                                        <i class="fas fa-times" style="color: #fff;"></i>
                                    </a>
                                <?php } ?>
                            </td>
                            <td>
                                <!--   form input file form        -->
                                <?php
                                $attributes = array('id' => 'upload_archivo2', 'name' => 'archivo2');
                                echo Form_open_multipart('', $attributes);
                                ?>
                                <input type="hidden" id="inputId" name="id_accidente" class="form-control form-control-user" value="<?php echo $obj->id_accidente ?>">
                                <input type="file" name="image_file" id="image_file" required />
                                <input type="submit" name="upload" id="upload" value="Subir" class="btn btn-info" />
                                </form>
                            </td>
                            <td>
                                <a class="btn btn-danger btn-circle" data-toggle="modal" data-target="#deleteReporteModal" style="cursor: pointer;width:30px; height:30px; margin-right: 15px; margin-left: 5px;" onclick="javascript:document.getElementById('delete_reportearchivo').value='archivo2'">
                                    <i class="fas fa-trash" style="color: #fff;"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th>InvestigaciónP</th>
                            <td>
                                <?php if ($obj->archivo3 != '') { ?>
                                    <a class="btn btn-warning btn-circle" href="<?php echo base_url() . 'assets/upload/' . $obj->archivo3 ?>" target="_blank" style="cursor: pointer;width:30px; height:30px; margin-right: 15px; margin-left: 5px;">
                                        <i class="fas fa-file" style="color: #fff;"></i>
                                    </a>
                                <?php } else { ?>
                                    <a class="btn btn-danger btn-circle" style="cursor: pointer;width:30px; height:30px; margin-right: 15px; margin-left: 5px;">
                                        <i class="fas fa-times" style="color: #fff;"></i>
                                    </a>
                                <?php } ?>
                            </td>
                            <td>
                                <!--   form input file form        -->
                                <?php
                                $attributes = array('id' => 'upload_archivo3', 'name' => 'archivo3');
                                echo Form_open_multipart('', $attributes);
                                ?>
                                <input type="hidden" id="inputId" name="id_accidente" class="form-control form-control-user" value="<?php echo $obj->id_accidente ?>">
                                <input type="file" name="image_file" id="image_file" required />
                                <input type="submit" name="upload" id="upload" value="Subir" class="btn btn-info" />
                                </form>
                            </td>
                            <td>
                                <a class="btn btn-danger btn-circle" data-toggle="modal" data-target="#deleteReporteModal" style="cursor: pointer;width:30px; height:30px; margin-right: 15px; margin-left: 5px;" onclick="javascript:document.getElementById('delete_reportearchivo').value='archivo3'">
                                    <i class="fas fa-trash" style="color: #fff;"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th>InvestigaciónC</th>
                            <td>
                                <?php if ($obj->archivo4 != '') { ?>
                                    <a class="btn btn-warning btn-circle" href="<?php echo base_url() . 'assets/upload/' . $obj->archivo4 ?>" target="_blank" style="cursor: pointer;width:30px; height:30px; margin-right: 15px; margin-left: 5px;">
                                        <i class="fas fa-file" style="color: #fff;"></i>
                                    </a>
                                <?php } else { ?>
                                    <a class="btn btn-danger btn-circle" style="cursor: pointer;width:30px; height:30px; margin-right: 15px; margin-left: 5px;">
                                        <i class="fas fa-times" style="color: #fff;"></i>
                                    </a>
                                <?php } ?>
                            </td>
                            <td>
                                <!--   form input file form        -->
                                <?php
                                $attributes = array('id' => 'upload_archivo4', 'name' => 'archivo4');
                                echo Form_open_multipart('', $attributes);
                                ?>
                                <input type="hidden" id="inputId" name="id_accidente" class="form-control form-control-user" value="<?php echo $obj->id_accidente ?>">
                                <input type="file" name="image_file" id="image_file" required />
                                <input type="submit" name="upload" id="upload" value="Subir" class="btn btn-info" />
                                </form>
                            </td>
                            <td>
                                <a class="btn btn-danger btn-circle" data-toggle="modal" data-target="#deleteReporteModal" style="cursor: pointer;width:30px; height:30px; margin-right: 15px; margin-left: 5px;" onclick="javascript:document.getElementById('delete_reportearchivo').value='archivo4'">
                                    <i class="fas fa-trash" style="color: #fff;"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>




        <form id="delete_archivo">
            <input type="hidden" id="delete_reportearchivo" name="archivo" value="">
            <input type="hidden" id="inputId" name="id_accidente" class="form-control form-control-user" value="<?php echo $obj->id_accidente ?>">
            <div class="modal fade" id="deleteReporteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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


        <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>



        <script>
            $(document).ready(function() {
                $('#upload_archivo4').on('submit', function(e) {
                    e.preventDefault();
                    $.ajax({
                        url: "<?php echo site_url() . '/accidente/uploadarchivo4' ?>",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            $('#uploaded_image').html(data);
                            var $idH = document.getElementById("inputId").value;
                            window.location.href = "<?php echo site_url('accidente/success') ?>";
                        },
                    });
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#upload_archivo3').on('submit', function(e) {
                    e.preventDefault();
                    $.ajax({
                        url: "<?php echo site_url() . '/accidente/uploadarchivo3' ?>",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            $('#uploaded_image').html(data);
                            var $idH = document.getElementById("inputId").value;
                            window.location.href = "<?php echo site_url('accidente/success') ?>";
                        },
                    });
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#upload_archivo2').on('submit', function(e) {
                    e.preventDefault();
                    $.ajax({
                        url: "<?php echo site_url() . '/accidente/uploadarchivo2' ?>",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            $('#uploaded_image').html(data);
                            var $idH = document.getElementById("inputId").value;
                            window.location.href = "<?php echo site_url('accidente/success') ?>";
                        },
                    });
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#upload_archivo1').on('submit', function(e) {
                    e.preventDefault();
                    $.ajax({
                        url: "<?php echo site_url() . '/accidente/uploadarchivo1' ?>",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            $('#uploaded_image').html(data);
                            var $idH = document.getElementById("inputId").value;
                            window.location.href = "<?php echo site_url('accidente/success') ?>";
                        },
                    });
                });
            });
        </script>


















    <?php } ?>
    <script>
        $(document).ready(function() {
            $('#delete_archivo').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url() . '/accidente/eliminar_archivo' ?>",
                    data: $(this).serialize(),
                    success: function(data) {
                        window.location.href = "<?php echo site_url('accidente/success') ?>";
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
                    url: "<?php echo site_url() . '/accidente/modificarajax_upload' ?>",
                    data: $(this).serialize(),
                    success: function(data) {
                        document.getElementById("inputPersona").classList.remove("is-invalid");

                        window.location.href = "<?php echo site_url('accidente/success') ?>";
                    },
                    statusCode: {
                        400: function(xhr) {
                            document.getElementById("inputPersona").classList.remove(
                                "is-invalid");

                            var json = JSON.parse(xhr.responseText);
                            if (json.persona.length != 0) {
                                document.getElementById("inputPersona").classList.add(
                                    "is-invalid");
                                document.getElementById("inputPersonaText").innerHTML = json
                                    .persona;
                            }
                        }
                    },
                });
            });
        });
    </script>