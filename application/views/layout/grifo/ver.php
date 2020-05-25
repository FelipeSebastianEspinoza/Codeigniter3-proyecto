<div class="d-sm-flex align-items-center justify-content-between mb-4">

    <h1 class="h3 mb-0 text-gray-800">
        Grifos
    </h1>

    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
        Nuevo grifo
    </button>

</div>

<?php if ($this->session->flashdata('category_success')) { ?>
    <div class="alert alert-success"> <?= $this->session->flashdata('category_success') ?> </div>
<?php } ?>
<table class="table table-striped table-bordered table-sm" id="dataTable1" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Estado</th>
            <th>Descripción</th>
            <th>Comentario</th>
            <th>Foto</th>
            <th>Modificar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Nombre</th>
            <th>Estado</th>
            <th>Descripción</th>
            <th>Comentario</th>
            <th>Foto</th>
            <th>Modificar</th>
            <th>Eliminar</th>
        </tr>
    </tfoot>
    <tbody>
        <?php foreach ($grifos as $grifo) { ?>
            <tr>
                <td> <?php echo $grifo->nombre_grifo ?> </td>
                <td>
                    <?php if ($grifo->estado_grifo == 'Pendiente') { ?>
                        <p class="text-danger"> <?php echo $grifo->estado_grifo;   ?> </p>
                    <?php     } else { ?>
                        <p class="text-success"> <?php echo $grifo->estado_grifo;   ?> </p>
                    <?php    } ?>
                </td>
                <td> <?php echo $grifo->descripcion_grifo  ?> </td>
                <td> <?php echo $grifo->comentario_grifo   ?> </td>
                <?php if ($grifo->imagen_grifo != null) {  ?>
                    <td>
                        <center>
                            <a class="btn btn-success btn-circle" data-toggle="modal" data-target="#imagenModal" style="cursor: pointer;" onclick="javascript:document.getElementById('imagenDelGrifo').src= '<?php echo base_url() . 'assets/upload/' .  $grifo->imagen_grifo ?>'  ">
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
                        <a href="<?php echo site_url('grifo/editar/' . $grifo->id_grifo) ?>" class="btn btn-info btn-circle">
                            <i class="fas fa-pen"></i>
                        </a>
                    </center>
                </td>
                <td>
                    <a class="btn btn-danger btn-circle" data-toggle="modal" data-target="#deleteModal" style="cursor: pointer;" onclick="javascript:document.getElementById('delete_id_grifo').value=<?php echo $grifo->id_grifo ?>">
                        <i class="fas fa-trash" style="color: #fff;"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>