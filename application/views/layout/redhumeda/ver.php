 <div class="d-sm-flex align-items-center justify-content-between mb-4">

     <h1 class="h3 mb-0 text-gray-800">
        Redes Húmedas
     </h1>

     <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
         Nueva Red húmeda
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