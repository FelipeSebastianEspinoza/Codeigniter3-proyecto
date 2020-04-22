<?php foreach ($edificio as $edi) { ?>
    <!--..............................................................................................-->
    <?php
    $attributes = array('id' => 'upload_form', 'name' => 'pointform');
    echo Form_open_multipart('', $attributes);
    ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $edi->nombre_edificio ?></h1>
    </div>

    </br>

    <div class="row">
        <div class="col-lg-4 mb-6">
            <div class="card bg-primary text-white shadow">
                <div class="text-center">
                    <?php echo '<img src="' . base_url() . 'assets/upload/' . $edi->imagen_edificio . '"  style="display: block; width: 100%; ">';  ?>
                </div>
                <label for="exampleFormControlTextarea1">Foto (Opcional)</label>
                <label for="exampleFormControlTextarea1">Formatos permitidos-> jpg | jpeg | png | gif.</label>
                <input type="file" name="image_file" id="image_file" />
            </div>
        </div>
        <div class="col-lg-5 mb-6">
            <div class="card text-black shadow" style="height:100%;">
                <div class="container">
                    <div class="row">
                        <input type="hidden" id="inputId" name="id_edificio" class="form-control form-control-user" value="<?php echo $edi->id_edificio ?>">
                        <div class="col">Nombre: </div>
                        <input type="text" id="inputNombre" name="nombre_edificio" class="form-control form-control-user" value="<?php echo $edi->nombre_edificio ?>">
                        <div class="invalid-feedback" id="inputNombreText">
                        </div>
                        <div class="col">Estado: </div>
                        <input type="text" id="inputEstado" name="estado_edificio" class="form-control form-control-user" value="<?php echo $edi->estado_edificio ?>">
                        <div class="invalid-feedback" id="inputEstadoText">
                        </div>
                        <div class="col">Hacinamiento:</div>
                        <input type="text" id="inputHacinamiento" name="hacinamiento_edificio" class="form-control form-control-user" value="<?php echo $edi->hacinamiento_edificio ?>">
                        <div class="w-100"></div>
                        <div class="col">Elementos entregados:</div>
                        <input type="text" id="inputElementos" name="elementos_edificio" class="form-control form-control-user" value="<?php echo $edi->elementos_edificio ?>">
                    </div>
                    <div class="row">
                        <div class="col">Número de departamentos:</div>
                        <input type="text" id="inputDepartamento" name="departamento_edificio" class="form-control form-control-user" value="<?php echo $edi->departamento_edificio ?>">
                        <div class="col">Área total m²: </div>
                        <input type="text" id="inputArea" name="area_edificio" class="form-control form-control-user" value="<?php echo $edi->area_edificio ?>">
                        <div class="w-100"></div>
                        <div class="col">Cantidad de funcionarios:</div>
                        <input type="text" id="inputFuncionarios" name="funcionarios_edificio" class="form-control form-control-user" value="<?php echo $edi->funcionarios_edificio ?>">
                        <div class="col">Cantidad de estudiantes: </div>
                        <input type="text" id="inputEstudiantes" name="estudiantes_edificio" class="form-control form-control-user" value="<?php echo $edi->estudiantes_edificio ?>">
                        <div class="col">Cantidad de docentes:</div>
                        <input type="text" id="inputDocentes" name="docentes_edificio" class="form-control form-control-user" value="<?php echo $edi->docentes_edificio ?>">
                    </div>
                    </br>
                    <div class="d-flex flex-row">
                        <input type="submit" name="upload" id="upload" value="Guardar" class="btn btn-info" />

                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-3">
            <div class="card bg-info text-white shadow">
                <div class="card-body">
                    Info
                    <div class="text-white-50 small">#36b9cc</div>
                </div>
            </div>
        </div>
    </div>

    </br></br>

    <div class="row">
        <div class="col-lg-12 mb-6">
            <div class="card bg-primary text-white shadow">
                <div class="card-body">

                    <div class="text-white-50 small"> </div>
                </div>
            </div>
        </div>
    </div>
    </form>
<?php } ?>



<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#upload_form').on('submit', function(e) {
            e.preventDefault();
            if ($('#image_file').val() == '') {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url() . '/edificio/modificarEdificioajax' ?>",
                    data: $(this).serialize(),

                    success: function(data) {
                        document.getElementById("inputNombre").classList.remove("is-invalid");
                        document.getElementById("inputEstado").classList.remove("is-invalid");
                        var $id = document.getElementById("inputId").value;
                        window.location.href = '<?php echo site_url('edificio/success/') ?>' + $id;
                    },
                    statusCode: {
                        400: function(xhr) {
                            document.getElementById("inputNombre").classList.remove("is-invalid");
                            document.getElementById("inputEstado").classList.remove("is-invalid");
                            var json = JSON.parse(xhr.responseText);
                            if (json.nombre_edificio.length != 0) {
                                document.getElementById("inputNombre").classList.add("is-invalid");
                                document.getElementById("inputNombreText").innerHTML = json.nombre_edificio;
                            }
                            if (json.estado_edificio.length != 0) {
                                document.getElementById("inputEstado").classList.add("is-invalid");
                                document.getElementById("inputEstadoText").innerHTML = json.estado_edificio;
                            }
                        }
                    },
                });
            } else {
                $.ajax({
                    url: "<?php echo site_url() . '/edificio/modificarajax_upload' ?>",
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
                        var $id = document.getElementById("inputId").value;
                        window.location.href = '<?php echo site_url('edificio/successupdate/') ?>' + $id;
                    },
                    statusCode: {
                        400: function(xhr) {
                            document.getElementById("inputNombre").classList.remove("is-invalid");
                            document.getElementById("inputEstado").classList.remove("is-invalid");
                            var json = JSON.parse(xhr.responseText);
                            if (json.nombre_edificio.length != 0) {
                                document.getElementById("inputNombre").classList.add("is-invalid");
                                document.getElementById("inputNombreText").innerHTML = json.nombre_edificio;
                            }
                            if (json.estado_edificio.length != 0) {
                                document.getElementById("inputEstado").classList.add("is-invalid");
                                document.getElementById("inputEstadoText").innerHTML = json.estado_edificio;
                            }
                        }
                    },
                });
            }
        });
    });
</script>