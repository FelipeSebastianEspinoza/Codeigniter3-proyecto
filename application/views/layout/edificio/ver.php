<?php foreach ($edificio as $edi) { ?>
    <?php if ($this->session->flashdata('category_success')) { ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('category_success') ?> </div>
    <?php } ?>

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
                    </br>
                    <div class="row">
                        <div class="col"><b>Estado:</b> <?php echo $edi->estado_edificio ?></div>
                        <div class="col"><b>Hacinamiento:</b> <?php echo $edi->hacinamiento_edificio ?> %</div>
                        <div class="w-100"></div>
                        </br>
                        <div class="col"><b>Elementos ya entregados:</b> <?php echo $edi->elementos_edificio ?></div>
                        <div class="col"><b>Elementos por entregar:</b> <?php echo $edi->elementos_edificio ?> </div>
                    </div>
                    </br>
                    <div class="row">
                        <div class="col"><b>Número de departamentos:</b> <?php echo $edi->departamento_edificio ?></div>
                        <div class="col"><b>Área total:</b> <?php echo $edi->area_edificio ?>m²</div>
                        <div class="w-100"></div>
                        </br>
                        <div class="col"><b>Cantidad de funcionarios:</b> <?php echo $edi->funcionarios_edificio ?></div>
                        <div class="col"><b>Cantidad de estudiantes:</b> <?php echo $edi->estudiantes_edificio ?></div>
                        <div class="col"><b>Cantidad de docentes:</b> <?php echo $edi->docentes_edificio ?></div>
                    </div>
                    </br>
                    <div class="d-flex flex-row-reverse">
                        <?php if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {    ?>
                            <a href="<?php echo site_url('edificio/editar/' . $edi->id_edificio) ?>" class="btn btn-info btn-circle">
                                <i class="fas fa-pen"></i>
                            </a>
                        <?php  } ?>
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
            placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="redes-tab" data-toggle="tab" href="#redes" role="tab" aria-controls="redes" aria-selected="true">Redes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="extintores-tab" data-toggle="tab" href="#extintores" role="tab" aria-controls="extintores" aria-selected="false">Extintores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="accidentes-tab" data-toggle="tab" href="#accidentes" role="tab" aria-controls="accidentes" aria-selected="false">Accidentes</a>
                </li>
            </ul>



            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="redes" role="tabpanel" aria-labelledby="redes-tab">
                    <h5>Redes húmedas en este edificio</h5>
                    <table class="table table-striped table-bordered table-sm" id="dataTable1" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Estado</th>
                                <th>Ubicación</th>
                                <th>Edificio</th>
                                <th width="50">Foto</th>
                                <th width="50">Modificar</th>
                                <th width="50">Eliminar</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Estado</th>
                                <th>Ubicación</th>
                                <th>Edificio</th>
                                <th width="50">Foto</th>
                                <th width="50">Modificar</th>
                                <th width="50">Eliminar</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($redhumeda as $red) { ?>
                                <tr>
                                    <td> <?php echo $red->nombre ?> </td>
                                    <td>
                                        <?php
                                        if ($red->estado == 'Pendiente') { ?>
                                            <p class="text-danger"> <?php echo $red->estado;   ?> </p>
                                        <?php     } else { ?>
                                            <p class="text-success"> <?php echo $red->estado;   ?> </p>
                                        <?php    } ?>
                                    </td>
                                    <td> <?php echo $red->ubicacion  ?> </td>
                                    <td>
                                        <?php foreach ($edificio as $edi) { ?>
                                            <?php if ($edi->id_edificio == $red->id_edificio) { ?>
                                                <?php echo $edi->nombre_edificio ?>
                                            <?php } ?>
                                        <?php } ?>
                                    </td>
                                    <?php if ($red->imagen != null) {  ?>
                                        <td>
                                            <center>
                                                <a class="btn btn-success btn-circle" data-toggle="modal" data-target="#imagenModalRedHumeda" style="cursor: pointer;" onclick="javascript:document.getElementById('imagenDeRedHumeda').src= '<?php echo base_url() . 'assets/upload/' .  $red->imagen ?>'  ">
                                                    <i class="fas fa-image" style="color: #fff;"></i>
                                                </a>
                                            </center>
                                        </td>
                                    <?php } else { ?>
                                        <td>
                                            <center>
                                                <a class="btn btn-warning btn-circle">
                                                    <i class="fas fa-times" style="color: #fff;"></i>
                                                </a>
                                            </center>
                                        </td>
                                    <?php } ?>
                                    <td>
                                        <center>
                                            <a href="<?php echo site_url('redhumeda/editar/' . $red->id_redhumeda) ?>" class="btn btn-info btn-circle">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <a class="btn btn-danger btn-circle" data-toggle="modal" data-target="#deleteModal" style="cursor: pointer;" onclick="javascript:document.getElementById('delete_redhumeda').value=<?php echo $red->id_redhumeda ?>">
                                                <i class="fas fa-trash" style="color: #fff;"></i>
                                            </a>
                                            <center>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane fade" id="extintores" role="tabpanel" aria-labelledby="extintores-tab">
                    <h5>Extintores en este edificio</h5>
                    <table class="table table-striped table-bordered table-sm" id="dataTable1" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>F.Carga</th>
                                <th>F.vencimiento</th>
                                <th>Ubicación</th>
                                <th>Edificio</th>
                                <th>Comentario</th>
                                <th>Estado</th>
                                <th width="50">Foto</th>
                                <th width="50">Modificar</th>
                                <th width="50">Eliminar</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>F.Carga</th>
                                <th>F.vencimiento</th>
                                <th>Ubicación</th>
                                <th>Edificio</th>
                                <th>Comentario</th>
                                <th>Estado</th>
                                <th width="50">Foto</th>
                                <th width="50">Modificar</th>
                                <th width="50">Eliminar</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($extintor as $red) { ?>
                                <tr>
                                    <td> <?php echo $red->nombre ?> </td>
                                    <?php $date = date_create($red->fechacarga); ?>
                                    <td> <?php echo date_format($date, "d/m/Y"); ?> </td>
                                    <?php $date = date_create($red->fechavenc); ?>
                                    <?php $date2 =  date("Y/m/d"); ?>
                                    <?php $date2 = date_create_from_format('Y/m/d', $date2); ?>
                                    <?php if ($date2 > $date) {  ?>
                                        <td>
                                            <p class="text-danger"> <?php echo date_format($date, "d/m/Y"); ?> </p>
                                        </td>
                                    <?php } else { ?>
                                        <td> <?php echo date_format($date, "d/m/Y"); ?> </td>
                                    <?php } ?>
                                    <td> <?php echo $red->ubicacion ?> </td>
                                    <td>
                                        <?php foreach ($edificio as $edi) { ?>
                                            <?php if ($edi->id_edificio == $red->id_edificio) { ?>
                                                <?php echo $edi->nombre_edificio ?>
                                            <?php } ?>
                                        <?php } ?>
                                    </td>
                                    <td> <?php echo $red->comentario ?> </td>
                                    <td>
                                        <?php
                                        if ($red->estado == 'Pendiente') { ?>
                                            <p class="text-danger"> <?php echo $red->estado;   ?> </p>
                                        <?php     } else { ?>
                                            <p class="text-success"> <?php echo $red->estado;   ?> </p>
                                        <?php    } ?>
                                    </td>
                                    <?php if ($red->imagen != null) {  ?>
                                        <td>
                                            <center>
                                                <a class="btn btn-success btn-circle" data-toggle="modal" data-target="#imagenModalExtintor" style="cursor: pointer;" onclick="javascript:document.getElementById('imagenDeExtintor').src= '<?php echo base_url() . 'assets/upload/' .  $red->imagen ?>'  ">
                                                    <i class="fas fa-image" style="color: #fff;"></i>
                                                </a>
                                            </center>
                                        </td>
                                    <?php } else { ?>
                                        <td>
                                            <center>
                                                <a class="btn btn-warning btn-circle">
                                                    <i class="fas fa-times" style="color: #fff;"></i>
                                                </a>
                                            </center>
                                        </td>
                                    <?php } ?>
                                    <td>
                                        <center>
                                            <a href="<?php echo site_url('extintor/editar/' . $red->id_extintor) ?>" class="btn btn-info btn-circle">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                        </center>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger btn-circle" data-toggle="modal" data-target="#deleteModal" style="cursor: pointer;" onclick="javascript:document.getElementById('delete_extintor').value=<?php echo $red->id_extintor ?>">
                                            <i class="fas fa-trash" style="color: #fff;"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>


                <div class="tab-pane fade" id="accidentes" role="tabpanel" aria-labelledby="accidentes-tab">
                    <table class=" table-sm table-striped table-bordered " id="dataTable1" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Persona</th>
                                <th>Fecha</th>
                                <th>Tipo</th>
                                <th>Código</th>
                                <th>Descripción</th>
                                <th>Edificio</th>
                                <th width="50">Diat</th>
                                <th width="50">Investigación</th>
                                <th width="50">InformeP</th>
                                <th width="50">InformeC</th>
                                <th width="50">Modificar</th>
                                <th width="50">Eliminar</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Persona</th>
                                <th>Fecha</th>
                                <th>Tipo</th>
                                <th>Código</th>
                                <th>Descripción</th>
                                <th>Edificio</th>
                                <th width="50">Diat</th>
                                <th width="50">Investigación</th>
                                <th width="50">InformeP</th>
                                <th width="50">InformeC</th>
                                <th width="50">Modificar</th>
                                <th width="50">Eliminar</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($accidente as $obj) { ?>
                                <tr>
                                    <td> <?php echo $obj->persona ?> </td>
                                    <?php $date = date_create($obj->fecha); ?>
                                    <td> <?php echo date_format($date, "d/m/Y"); ?> </td>

                                    <td> <?php echo $obj->tipo ?> </td>
                                    <td> <?php echo $obj->numero ?> </td>
                                    <td> <?php echo $obj->descripcion ?> </td>
                                    <td>
                                        <?php foreach ($edificio as $edi) { ?>
                                            <?php if ($edi->id_edificio == $obj->id_edificio) { ?>
                                                <?php echo $edi->nombre_edificio ?>
                                            <?php } ?>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <center>
                                            <?php if ($obj->archivo1 != '') { ?>
                                                <a class="btn btn-warning btn-circle" href="<?php echo base_url() . 'assets/upload/' . $obj->archivo4 ?>" target="_blank" style="cursor: pointer;width:30px; height:30px;  ">
                                                    <i class="fas fa-file" style="color: #fff;"></i>
                                                </a>
                                            <?php } else { ?>
                                                <a class="btn btn-danger btn-circle" style="cursor: pointer;width:30px; height:30px;  ">
                                                    <i class="fas fa-times" style="color: #fff;"></i>
                                                </a>
                                            <?php } ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php if ($obj->archivo2 != '') { ?>
                                                <a class="btn btn-warning btn-circle" href="<?php echo base_url() . 'assets/upload/' . $obj->archivo4 ?>" target="_blank" style="cursor: pointer;width:30px; height:30px;  ">
                                                    <i class="fas fa-file" style="color: #fff;"></i>
                                                </a>
                                            <?php } else { ?>
                                                <a class="btn btn-danger btn-circle" style="cursor: pointer;width:30px; height:30px; ">
                                                    <i class="fas fa-times" style="color: #fff;"></i>
                                                </a>
                                            <?php } ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php if ($obj->archivo3 != '') { ?>
                                                <a class="btn btn-warning btn-circle" href="<?php echo base_url() . 'assets/upload/' . $obj->archivo4 ?>" target="_blank" style="cursor: pointer;width:30px; height:30px;  ">
                                                    <i class="fas fa-file" style="color: #fff;"></i>
                                                </a>
                                            <?php } else { ?>
                                                <a class="btn btn-danger btn-circle" style="cursor: pointer;width:30px; height:30px; ">
                                                    <i class="fas fa-times" style="color: #fff;"></i>
                                                </a>
                                            <?php } ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php if ($obj->archivo4 != '') { ?>
                                                <a class="btn btn-warning btn-circle" href="<?php echo base_url() . 'assets/upload/' . $obj->archivo4 ?>" target="_blank" style="cursor: pointer;width:30px; height:30px;  ">
                                                    <i class="fas fa-file" style="color: #fff;"></i>
                                                </a>
                                            <?php } else { ?>
                                                <a class="btn btn-danger btn-circle" style="cursor: pointer;width:30px; height:30px; ">
                                                    <i class="fas fa-times" style="color: #fff;"></i>
                                                </a>
                                            <?php } ?>
                                        </center>
                                    </td>

                                    <td>
                                        <center>
                                            <a href="<?php echo site_url('accidente/editar/' . $obj->id_accidente) ?>" class="btn btn-info btn-circle">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <a class="btn btn-danger btn-circle" data-toggle="modal" data-target="#deleteAccidenteModal" style="cursor: pointer;" onclick="javascript:document.getElementById('delete_accidente').value=<?php echo $obj->id_accidente ?>">
                                                <i class="fas fa-trash" style="color: #fff;"></i>
                                            </a>
                                        </center>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>




            </div>


        </div>
    </div>
    </br></br></br></br>
<?php } ?>