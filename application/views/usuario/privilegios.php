 <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
     <thead>
         <tr>
             <th>Nombre</th>
             <th>Apellido</th>
             <th>Correo</th>
             <th>Tipo</th>
             <th>Acciones</th>
             <th>Eliminar</th>
         </tr>
     </thead>
 
     <tbody>
         <?php foreach ($usuario as $usu) { ?>
             <?php if ($usu->tipo_usuario != '2') { ?>
                 <tr>
                     <td>
                         <?php echo $usu->nombre_usuario; ?>
                     </td>
                     <td>
                         <?php echo $usu->apellido_usuario; ?>
                     </td>
                     <td>
                         <?php echo $usu->correo_usuario; ?>
                     </td>
                     <?php if ($usu->tipo_usuario == '1') { ?>
                         <td>
                         <p class="text-success"> Administrador </p>
                         </td>

                     <?php } else { ?>
                         <td>
                         <p class="text-danger"> Usuario </p>
                         </td>
                     <?php  } ?>
                     <td>
                     <?php if ($usu->tipo_usuario == '1') { ?>
                        <button type="button" class="btn btn-warning">Bajar a usuario común</button>
                        <?php } else { ?>
                            <button type="button" class="btn btn-success">Subir a  administrador </button>
                            <?php  } ?>
                        

                         


                     </td>


                     <td>
                         <a class="btn btn-danger btn-circle" data-toggle="modal" data-target="#deleteModal" style="cursor: pointer;" onclick="javascript:document.getElementById('delete_id_usuario').value=<?php echo $usu->id_usuario ?>">
                             <i class="fas fa-trash" style="color: #fff;"></i>
                         </a>
                     </td>

                 </tr>
             <?php } ?>
         <?php } ?>
     </tbody>
 </table>

 <form id="delete_form">
     <input type="hidden" id="delete_id_grifo" name="id_grifo" value="">
     <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Confirmar Eliminación</h5>
                     <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">×</span>
                     </button>
                 </div>
                 <div class="modal-body">¿Seguro que quiere eliminar este elemento?</div>
                 <div class="modal-footer">
                     <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                     <input type="submit" name="delete" id="delete" value="Eliminar" class="btn btn-info" />
                 </div>
             </div>
         </div>
     </div>
 </form>

 <script>
     $(document).ready(function() {
         $('#delete_form').on('submit', function(e) {
             e.preventDefault();
             $.ajax({
                 type: 'POST',
                 url: "<?php echo site_url() . '/grifo/eliminarGrifo' ?>",
                 data: $(this).serialize(),
                 success: function(data) {
                     window.location.href = "<?php echo site_url('grifo/successdelete') ?>";
                 },
             });
         });
     });
 </script>
    <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
<script>
        $(document).ready(function() {
            $('#dataTable1').DataTable({
                "order": [[ 1, "desc" ]],
                dom: 'Bfrtip',
                buttons: [
 
           
                 
                ]
            });
        });
    </script>