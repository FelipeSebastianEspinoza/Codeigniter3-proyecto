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
    <input type="hidden" id="inputId" name="id_grifo" class="form-control form-control-user" value="<?php echo $edi->id_edificio ?>">
    <div class="row">
        <div class="col-lg-4 mb-6">
            <div class="card bg-primary text-white shadow">
                <div class="text-center">
                    <?php echo '<img src="' . base_url() . 'assets/upload/' . $edi->imagen_edificio . '"  style="display: block; width: 100%; ">';  ?>
                </div>
            </div>
        </div>
        <div class="col-lg-5 mb-6">
            <div class="card text-black shadow" style="height:100%;">
                <div class="container">
                    </br> </br>
                    <div class="row">
                    <input type="text" id="inputNombre" name="nombre_grifo" class="form-control form-control-user" value="<?php echo $edi->nombre_edificio ?>">
                        <div class="col">Column: <?php echo $edi->hacinamiento_edificio ?></div>
                        <div class="w-100"></div>
                        </br>
                        <div class="col">Column: <?php echo $edi->elementos_edificio ?></div>
                        <div class="col">Column: elemetons </div>
                    </div>
                    </br>
                    <div class="row">
                        <div class="col">Column: <?php echo $edi->departamentos_edificio ?></div>
                        <div class="col">Column: <?php echo $edi->estudiantes_edificio ?></div>
                        <div class="w-100"></div>
                        </br>
                        <div class="col">Column: <?php echo $edi->funcionarios_edificio ?></div>
                        <div class="col">Column: <?php echo $edi->area_edificio ?></div>
                    </div>
                    </br>
                    <input type="submit" name="upload" id="upload" value="Upload" class="btn btn-info" />
                                </form>
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
                    Primary
                    <div class="text-white-50 small">#4e73df</div>
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
                        window.location.href = "<?php echo site_url('grifo/successupdate') ?>";
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