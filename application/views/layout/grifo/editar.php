<h1>Modificar grifo</h1>



<?php foreach ($grifos as $grifo) { ?>

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
                <h6 class="m-0 font-weight-bold text-primary">Modificar Grifo</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div id="collapseCardExample">
                <div class="card-body">
                    <div>
                        This is a collapsable card example using Bootstrap's built in collapse functionality. <strong>Click on the card header</strong> to see the card body collapse and expand!
                        </br> </br>
                        <div class="form-group row" id="nombre_grifo">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="exampleFormControlTextarea1">Nombre</label>
                                <input type="text" id="inputNombre" name="nombre_grifo" class="form-control form-control-user" value="<?php echo $grifo->nombre_grifo ?>">
                                <div class="invalid-feedback" id="inputNombreText">
                                </div>
                            </div>
                            <div class="col-sm-6" id="estado_grifo">
                                <label for="exampleFormControlTextarea1">Estado</label>
                                <input type="text" id="inputEstado" name="estado_grifo" class="form-control form-control-user" value="<?php echo $grifo->estado_grifo ?>">
                                <div class="invalid-feedback" id="inputEstadoText">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row" id="nombre_usuario">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="exampleFormControlTextarea1">Descripción (Opcional)</label>
                                <textarea class="form-control" name="descripcion_grifo" id="descripcion_grifo" rows="3"><?php echo $grifo->descripcion_grifo ?></textarea>
                                <div class="invalid-feedback" id="inputDescripcionText">
                                </div>
                            </div>
                            <div class="col-sm-6" id="comentario_grifo">
                                <label for="exampleFormControlTextarea1">Comentario (Opcional)</label>
                                <textarea class="form-control" name="comentario_grifo" id="comentario_grifo" rows="3"><?php echo $grifo->comentario_grifo ?></textarea>
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
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <?php if ($grifo->imagen_grifo == null) { ?>
                                    <label for="exampleFormControlTextarea1">Sin imagen</label>
 
                                <?php  } else {    ?>
                                    <label for="exampleFormControlTextarea1">Imagen actual</label>
                                <?php echo '<img src="' . base_url() . 'assets/upload/' . $grifo->imagen_grifo . '"
					                         style="display: block; width: 300px; ">';  ?>
                                <div class="invalid-feedback" id="inputImagenText">
                                </div>
                                <?php   } ?>
 
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
                                <input type="text" name="form_x" size="4" value="<?php echo $grifo->posx_grifo ?>" />
                                Posición Y->
                                <input type="text" name="form_y" size="4" value="<?php echo $grifo->posy_grifo ?>" />
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
                        url: "<?php echo site_url() . '/grifo/modificarGrifoajax' ?>",
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
                        url: "<?php echo site_url() . '/grifo/modificarajax_upload' ?>",
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