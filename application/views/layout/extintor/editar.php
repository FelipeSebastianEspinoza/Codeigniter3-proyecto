<h1>Modificar Red Húmeda</h1>



<?php foreach ($extintor as $red) { ?>

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
                <h6 class="m-0 font-weight-bold text-primary">Modificar Extintor</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div id="collapseCardExample">
                <div class="card-body">
                    <div>
                        This is a collapsable card example using Bootstrap's built in collapse functionality. <strong>Click on the card header</strong> to see the card body collapse and expand!
                        </br> </br>
                        <div class="form-group row" id="nombre">
                            <input type="hidden" id="inputId" name="id_extintor" class="form-control form-control-user" value="<?php echo $red->id_extintor ?>">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="exampleFormControlTextarea1">Nombre</label>
                                <input type="text" id="inputNombre" name="nombre" class="form-control form-control-user" value="<?php echo $red->nombre ?>">
                                <div class="invalid-feedback" id="inputNombreText">
                                </div>
                            </div> 
                            <div class="col-sm-6" id="estado">
                                <label for="exampleFormControlTextarea1">Seleccione un estado</label>
                                </br>
                                <?php if ($red->estado != 'Pendiente') {
                                ?>
                                    <input type="radio" id="Funcionando" name="estado" value="Funcionando" checked>
                                    <label for="Funcionando">Funcionando</label><br>
                                    <input type="radio" id="Pendiente" name="estado" value="Pendiente">
                                    <label for="Pendiente">Pendiente</label><br>
                                <?php  } else {   ?>
                                    <input type="radio" id="Funcionando" name="estado" value="Funcionando">
                                    <label for="Funcionando">Funcionando</label><br>
                                    <input type="radio" id="Pendiente" name="estado" value="Pendiente" checked>
                                    <label for="Pendiente">Pendiente</label><br>
                                <?php   }   ?>
                                <div class="invalid-feedback" id="inputEstadoText">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row" id="nombre_usuario">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="exampleFormControlTextarea1"><b>Ubicación (Opcional)</b></label>
                            <textarea class="form-control" name="ubicacion" id="ubicacion" rows="4"></textarea>
                            <div class="invalid-feedback" id="inputUbicacionText">
                            </div>
                        </div>
                        <div class="col-sm-6" id="estado">
                            <label for="exampleFormControlTextarea1"><b>Seleccione el edificio en el cual se encuentra</b></label>
                            </br>
                            <select multiple class="form-control" id="exampleFormControlSelect2" name="id_edificio" required>
                                <?php foreach ($edificio as $edi) { ?>
                                    <?php if ($edi->id_edificio == $red->id_edificio) { ?>
                                        <option value="<?php echo $edi->id_edificio ?>" selected><?php echo $edi->nombre_edificio ?></option>
                                    <?php } else { ?>
                                        <option value="<?php echo $edi->id_edificio ?>"  ><?php echo $edi->nombre_edificio ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
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
                        url: "<?php echo site_url() . '/extintor/modificarExtintorajax' ?>",
                        data: $(this).serialize(),
                        success: function(data) {
                            document.getElementById("inputNombre").classList.remove("is-invalid");
                  


                            window.location.href = "<?php echo site_url('extintor/success') ?>";
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
                        url: "<?php echo site_url() . '/extintor/modificarajax_upload' ?>",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            document.getElementById("inputNombre").classList.remove("is-invalid");
                         
                            // var json = JSON.parse(data);  
                            $('#uploaded_image').html(data);
                            window.location.href = "<?php echo site_url('extintor/successupdate') ?>";
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