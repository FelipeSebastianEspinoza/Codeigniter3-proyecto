 <div class="d-sm-flex align-items-center justify-content-between mb-4">

     <h1 class="h3 mb-0 text-gray-800">
         Enfermedades Profesionales
     </h1>

     <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
         Nueva enfermedad
     </button>

 </div>
 <?php if ($this->session->flashdata('category_success')) { ?>
     <div class="alert alert-success"> <?= $this->session->flashdata('category_success') ?> </div>
 <?php } ?>
 <table class="table table-striped table-bordered table-sm" id="dataTable1" width="100%" cellspacing="0">
     <thead>
         <tr>
             <th>Nombre</th>
             <th>Descripción</th>
             <th width="50">Modificar</th>
             <th width="50">Eliminar</th>
         </tr>
     </thead>
     <tfoot>
         <tr>
             <th>Nombre</th>
             <th>Descripción</th>
             <th width="50">Modificar</th>
             <th width="50">Eliminar</th>
         </tr>
     </tfoot>
     <tbody>
         <?php foreach ($enfermedadProfesional as $obj) { ?>
             <tr>

                 <td> <?php echo $obj->nombre ?> </td>
                 <td> <?php echo $obj->descripcion ?> </td>
                 <td>
                     <center>
                         <a href="<?php echo site_url('enfermedadProfesional/editar/' . $obj->id_enfermedad) ?>" class="btn btn-info btn-circle">
                             <i class="fas fa-pen"></i>
                         </a>
                     </center>
                 </td>
                 <td>
                     <a class="btn btn-danger btn-circle" data-toggle="modal" data-target="#deleteModal" style="cursor: pointer;" onclick="javascript:document.getElementById('delete_enfermedadProfesional').value=<?php echo $obj->id_enfermedad ?>">
                         <i class="fas fa-trash" style="color: #fff;"></i>
                     </a>
                 </td>
             </tr>
         <?php } ?>
     </tbody>
 </table>