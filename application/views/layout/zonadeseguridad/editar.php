<h1>Modificar Zona de seguridad</h1>



<?php foreach ($zonadeseguridad as $red) { ?>

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
                <h6 class="m-0 font-weight-bold text-primary">Modificar Zona de Seguridad</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div id="collapseCardExample">
                <div class="card-body">
                    <div>
                        This is a collapsable card example using Bootstrap's built in collapse functionality. <strong>Click on the card header</strong> to see the card body collapse and expand!
                        </br> </br>
                        <div class="form-group row" id="nombre">
                            <input type="hidden" id="inputId" name="id_zonadeseguridad" class="form-control form-control-user" value="<?php echo $red->id_zonadeseguridad ?>">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="exampleFormControlTextarea1">Nombre</label>
                                <input type="text" id="inputNombre" name="nombre" class="form-control form-control-user" value="<?php echo $red->nombre ?>">
                                <div class="invalid-feedback" id="inputNombreText">
                                </div>
                            </div>

                        </div>
                        <div class="form-group row" id="nombre_usuario">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="exampleFormControlTextarea1"><b>Ubicación (Opcional)</b></label>
                                <textarea class="form-control" name="descripcion" id="descripcion" rows="4"></textarea>
                                <div class="invalid-feedback" id="inputdescripcionText">
                                </div>
                            </div>

                        </div>
                        <div class="form-group row" id="nombre">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="exampleFormControlTextarea1">Foto (Opcional)</label>
                                <label for="exampleFormControlTextarea1">Formatos permitidos-> jpg | jpeg | png | gif.</label>
                                <input type="file" name="image_file" id="image_file" />

                                <div class="invalid-feedback" id="inputImagenText">
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <?php if ($red->imagen == null) { ?>
                                    <label for="exampleFormControlTextarea1">Sin imagen</label>

                                <?php  } else {    ?>
                                    <label for="exampleFormControlTextarea1">Imagen actual</label>
                                    <?php echo '<img src="' . base_url() . 'assets/upload/' . $red->imagen . '"
					                         style="display: block; width: 300px; ">';  ?>
                                    <div class="invalid-feedback" id="inputImagenText">
                                    </div>
                                <?php   } ?>

                            </div>
                        </div>
                        </br>
                        <p>De clic en el mapa para elegir la ubicación de la red húmeda. (Opcional)</p>

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
                                <input type="text" name="form_x" size="4" value="<?php echo $red->posy ?>" />
                                Posición Y->
                                <input type="text" name="form_y" size="4" value="<?php echo $red->posx ?>" />
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
                        url: "<?php echo site_url() . '/zonadeseguridad/modificarZonaDeSeguridadajax' ?>",
                        data: $(this).serialize(),
                        success: function(data) {
                            document.getElementById("inputNombre").classList.remove("is-invalid");



                            window.location.href = "<?php echo site_url('zonadeseguridad/success') ?>";
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
                        url: "<?php echo site_url() . '/zonadeseguridad/modificarajax_upload' ?>",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            document.getElementById("inputNombre").classList.remove("is-invalid");

                            // var json = JSON.parse(data);  
                            $('#uploaded_image').html(data);
                            window.location.href = "<?php echo site_url('zonadeseguridad/successupdate') ?>";
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