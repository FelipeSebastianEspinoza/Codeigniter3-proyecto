<?php foreach ($edificio as $edi) { ?>

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
            </div>
        </div>
        <div class="col-lg-5 mb-6">
            <div class="card text-black shadow" style="height:100%;">
                <div class="container">
                    </br> </br>
                    <div class="row">
                        <div class="col">Column: <?php echo $edi->estado_edificio ?></div>
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
                    <div class="d-flex flex-row-reverse">
                        <a href="<?php echo site_url('edificio/editar/' . $edi->id_edificio) ?>" class="btn btn-info btn-circle">
                            <i class="fas fa-pen"></i>
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
                    Primary
                    <div class="text-white-50 small">#4e73df</div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>