<?php foreach ($usuario as $usu) { ?>
    <!--..............................................................................................-->
    <?php
    $attributes = array('id' => 'upload_form', 'name' => 'pointform');
    echo Form_open_multipart('', $attributes);
    ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $usu->nombre_usuario ?></h1>
    </div>

    </br>

    <div class="row">
        <div class="col-lg-4 mb-6">
            <div class="card bg-primary text-white shadow">
                <div class="text-center">
                    <?php echo '<img src="' . base_url() . 'assets/upload/' . $usu->imagen_usuario . '"  style="display: block; width: 100%; ">';  ?>
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
                        <input type="hidden" id="inputId" name="id_usuario" class="form-control form-control-user" value="<?php echo $usu->id_usuario ?>">
                        <div class="col">Nombre: </div>
                        <input type="text" id="inputNombre" name="nombre_usuario" class="form-control form-control-user" value="<?php echo $usu->nombre_usuario ?>">
                        <div class="invalid-feedback" id="inputNombreText">
                        </div>
                        <div class="col">Apellido: </div>
                        <input type="text" id="inputEstado" name="apellido_usuario" class="form-control form-control-user" value="<?php echo $usu->apellido_usuario ?>">
                        <div class="invalid-feedback" id="inputEstadoText">
                        </div>
                        <div class="col">Correo:</div>
                        <input type="text" id="inputHacinamiento" name="correo_usuario" class="form-control form-control-user" value="<?php echo $usu->correo_usuario ?>">
                        <div class="w-100"></div>
                        <div class="col">Contraseña entregados:</div>
                        <input type="text" id="inputElementos" name="password_usuario" class="form-control form-control-user" value="<?php echo $usu->password_usuario ?>">
                        <div class="col">Confirmar Contraseña:</div>
                        <input type="text" id="inputElementos" name="password_usuario" class="form-control form-control-user" value="<?php echo $usu->password_usuario ?>">
                    </div>
                    </br>
                    <div class="d-flex flex-row">
                        <input type="submit" name="upload" id="upload" value="Guardar" class="btn btn-info" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </br></br>
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
                    url: "<?php echo site_url() . '/usuario/modificarUsuarioajax' ?>",
                    data: $(this).serialize(),
                    success: function(data) {
                        document.getElementById("inputNombre").classList.remove("is-invalid");
                        var $id = document.getElementById("inputId").value;
                        window.location.href = '<?php echo site_url('usuario/success/') ?>' + $id;
                    },
                    statusCode: {
                        400: function(xhr) {
                            document.getElementById("inputNombre").classList.remove("is-invalid");
                            var json = JSON.parse(xhr.responseText);
                            if (json.nombre_usuario.length != 0) {
                                document.getElementById("inputNombre").classList.add("is-invalid");
                                document.getElementById("inputNombreText").innerHTML = json.nombre_usuario;
                            }

                        }
                    },
                });
            } else {
                $.ajax({
                    url: "<?php echo site_url() . '/usuario/modificarajax_upload' ?>",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        document.getElementById("inputNombre").classList.remove("is-invalid");
                        $('#uploaded_image').html(data);
                        var $id = document.getElementById("inputId").value;
                        window.location.href = '<?php echo site_url('usuario/successupdate/') ?>' + $id;
                    },
                    statusCode: {
                        400: function(xhr) {
                            document.getElementById("inputNombre").classList.remove("is-invalid");
                            var json = JSON.parse(xhr.responseText);
                            if (json.nombre_usuario.length != 0) {
                                document.getElementById("inputNombre").classList.add("is-invalid");
                                document.getElementById("inputNombreText").innerHTML = json.nombre_usuario;
                            }
                        }
                    },
                });
            }
        });
    });
</script>