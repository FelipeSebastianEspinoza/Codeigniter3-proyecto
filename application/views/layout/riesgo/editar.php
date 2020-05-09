<h1>Modificar Riesgo</h1>

<?php foreach ($riesgo as $obj) { ?>

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
                <h6 class="m-0 font-weight-bold text-primary">Modificar Riesgo</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div id="collapseCardExample">
                <div class="card-body">
                    <div>
                        This is a collapsable card example using Bootstrap's built in collapse functionality. <strong>Click on the card header</strong> to see the card body collapse and expand!
                        </br> </br>
                        <div class="form-group row" id="nombre">
                            <input type="hidden" id="inputId" name="id_riesgo" class="form-control form-control-user" value="<?php echo $obj->id_riesgo ?>">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="exampleFormControlTextarea1">Nombre</label>
                                <input type="text" id="inputNombre" name="nombre" class="form-control form-control-user" value="<?php echo $obj->nombre ?>">
                                <div class="invalid-feedback" id="inputNombreText">
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="exampleFormControlTextarea1"><b>Descripcion (Opcional)</b></label>
                                <textarea class="form-control" name="descripcion" id="descripcion" rows="4"><?php echo $obj->descripcion ?></textarea>
                                <div class="invalid-feedback" id="inputDescripcionText">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row" id="imagen">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="exampleFormControlTextarea1">Foto (Opcional)</label>
                                <label for="exampleFormControlTextarea1">Formatos permitidos-> jpg | jpeg | png | gif.</label>
                                <input type="file" name="image_file" id="image_file" />
                                <div class="invalid-feedback" id="inputImagenText">
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <?php if ($obj->imagen == null) { ?>
                                    <label for="exampleFormControlTextarea1">Sin imagen</label>
                                <?php } else { ?>
                                    <label for="exampleFormControlTextarea1">Imagen actual</label>
                                    <?php echo '<img src="' . base_url() . 'assets/upload/' . $obj->imagen . '"
					                         style="display: block; width: 300px; ">';  ?>
                                    <div class="invalid-feedback" id="inputImagenText">
                                    </div>
                                <?php } ?>
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
    <?php } ?>




    <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#upload_form').on('submit', function(e) {
                e.preventDefault();

                if ($('#image_file').val() == '') {
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo site_url() . '/riesgo/modificarUpload' ?>",
                        data: $(this).serialize(),
                        success: function(data) {
                            document.getElementById("inputNombre").classList.remove("is-invalid");
                            window.location.href = "<?php echo site_url('riesgo/success') ?>";
                        },
                        statusCode: {
                            400: function(xhr) {
                                document.getElementById("inputNombre").classList.remove("is-invalid");
                                var json = JSON.parse(xhr.responseText);
                                if (json.nombre.length != 0) {
                                    document.getElementById("inputNombre").classList.add("is-invalid");
                                    document.getElementById("inputNombreText").innerHTML = json.nombre;
                                }

                            }
                        },
                    });
                } else {
                    $.ajax({
                        url: "<?php echo site_url() . '/riesgo/modificarUpload' ?>",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            document.getElementById("inputNombre").classList.remove("is-invalid");
                            $('#uploaded_image').html(data);
                            window.location.href = "<?php echo site_url('riesgo/successupdate') ?>";
                        },
                        statusCode: {
                            400: function(xhr) {
                                document.getElementById("inputNombre").classList.remove("is-invalid");

                                var json = JSON.parse(xhr.responseText);
                                if (json.nombre.length != 0) {
                                    document.getElementById("inputNombre").classList.add("is-invalid");
                                    document.getElementById("inputNombreText").innerHTML = json.nombre;
                                }

                            }
                        },
                    });
                }

            });
        });
    </script>