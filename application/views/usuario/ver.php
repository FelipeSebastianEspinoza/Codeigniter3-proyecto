<?php foreach ($usuario as $usu) { ?>
    <?php if ($this->session->flashdata('category_success')) { ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('category_success') ?> </div>
    <?php } ?>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $usu->nombre_usuario ?></h1>
    </div>
    </br>
    <div class="row">
        <div class="col-lg-4 mb-5">
            <div class="card bg-primary text-white shadow">
                <div class="text-center">
                    <?php echo '<img src="' . base_url() . 'assets/upload/' . $usu->imagen_usuario . '"  style="display: block; width: 100%; ">';  ?>
                </div>
            </div>
        </div>
        <div class="col-lg-8 mb-7">
            <div class="card text-black shadow" style="height:100%;">
                <div class="container">
                    </br>
                    <div class="row">
                        <div class="col"><b>Nombre usuario:</b> <?php echo $usu->nombre_usuario ?></div>
                        <div class="col"><b>Apellido usuario:</b> <?php echo $usu->apellido_usuario ?></div>
                        <div class="w-100"></div>
                        </br>
                        <div class="col"><b>Correo usuario:</b> <?php echo $usu->correo_usuario ?></div>
                       
                 
 
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <a href="<?php echo site_url('usuario/editar/' . $usu->id_usuario) ?>" class="btn btn-info btn-circle">
                            <i class="fas fa-pen"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </br>
    </br>

<?php } ?>