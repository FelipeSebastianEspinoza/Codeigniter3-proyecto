<h1>Modificar Red Húmeda</h1>



<?php foreach ($redhumeda as $red) { ?>

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
                <h6 class="m-0 font-weight-bold text-primary">Modificar Red Húmeda</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div id="collapseCardExample">
                <div class="card-body">
                    <div>
                        This is a collapsable card example using Bootstrap's built in collapse functionality. <strong>Click on the card header</strong> to see the card body collapse and expand!
                        </br> </br>
                        <div class="form-group row" id="nombre_redhumeda">
                            <input type="hidden" id="inputId" name="id_redhumeda" class="form-control form-control-user" value="<?php echo $red->id_redhumeda ?>">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="exampleFormControlTextarea1">Nombre</label>
                                <input type="text" id="inputNombre" name="nombre_redhumeda" class="form-control form-control-user" value="<?php echo $red->nombre_redhumeda ?>">
                                <div class="invalid-feedback" id="inputNombreText">
                                </div>
                            </div> 
                            <div class="col-sm-6" id="estado_redhumeda">
                                <label for="exampleFormControlTextarea1">Seleccione un estado</label>
                                </br>
                                <?php if ($red->estado_redhumeda != 'Pendiente') {
                                ?>
                                    <input type="radio" id="Funcionando" name="estado_redhumeda" value="Funcionando" checked>
                                    <label for="Funcionando">Funcionando</label><br>
                                    <input type="radio" id="Pendiente" name="estado_redhumeda" value="Pendiente">
                                    <label for="Pendiente">Pendiente</label><br>
                                <?php  } else {   ?>
                                    <input type="radio" id="Funcionando" name="estado_redhumeda" value="Funcionando">
                                    <label for="Funcionando">Funcionando</label><br>
                                    <input type="radio" id="Pendiente" name="estado_redhumeda" value="Pendiente" checked>
                                    <label for="Pendiente">Pendiente</label><br>
                                <?php   }   ?>
                                <div class="invalid-feedback" id="inputEstadoText">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row" id="nombre_usuario">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="exampleFormControlTextarea1">Ubicación (Opcional)</label>
                                <textarea class="form-control" name="ubicacion_redhumeda" id="ubicacion_redhumeda" rows="3"><?php echo $red->ubicacion_redhumeda ?></textarea>
                                <div class="invalid-feedback" id="inputDescripcionText">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row" id="nombre_redhumeda">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="exampleFormControlTextarea1">Foto (Opcional)</label>
                                <label for="exampleFormControlTextarea1">Formatos permitidos-> jpg | jpeg | png | gif.</label>
                                <input type="file" name="image_file" id="image_file" />

                                <div class="invalid-feedback" id="inputImagenText">
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <?php if ($red->imagen_redhumeda == null) { ?>
                                    <label for="exampleFormControlTextarea1">Sin imagen</label>

                                <?php  } else {    ?>
                                    <label for="exampleFormControlTextarea1">Imagen actual</label>
                                    <?php echo '<img src="' . base_url() . 'assets/upload/' . $red->imagen_redhumeda . '"
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
                                <input type="text" name="form_x" size="4" value="<?php echo $red->posy_redhumeda ?>" />
                                Posición Y->
                                <input type="text" name="form_y" size="4" value="<?php echo $red->posx_redhumeda ?>" />
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
                        url: "<?php echo site_url() . '/redhumeda/modificarRedHumedaajax' ?>",
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
                        url: "<?php echo site_url() . '/rehumeda/modificarajax_upload' ?>",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            document.getElementById("inputNombre").classList.remove("is-invalid");
                         
                            // var json = JSON.parse(data);  
                            $('#uploaded_image').html(data);
                            window.location.href = "<?php echo site_url('redhumeda/successupdate') ?>";
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