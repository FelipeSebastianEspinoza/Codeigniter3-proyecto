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
         <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
             <h6 class="m-0 font-weight-bold text-primary">Nuevo Reporte E.P.</h6>
         </a>
         <!-- Card Content - Collapse -->
         <div class="collapse" id="collapseCardExample">
             <div class="card-body">
                 <div>
                     This is a collapsable card example using Bootstrap's built in collapse functionality. <strong>Click on the card header</strong> to see the card body collapse and expand!
                     </br> </br>
                     <div class="form-group row" id="nombre">
                         <div class="col-sm-6 mb-3 mb-sm-0">
                             <label for="exampleFormControlTextarea1"><b>Nombre</b></label>
                             <input type="text" id="inputNombre" name="nombre" class="form-control form-control-user" placeholder="Escriba el nombre...">
                             <div class="invalid-feedback" id="inputNombreText">
                             </div>
                         </div>
                         <div class="col-sm-6" id="estado">
                             <label for="exampleFormControlTextarea1"><b>Seleccione un estado</b></label>
                             </br>
                             <input type="radio" id="Funcionando" name="estado" value="Funcionando">
                             <label for="Funcionando">Funcionando</label><br>
                             <input type="radio" id="Pendiente" name="estado" value="Pendiente" checked>
                             <label for="Pendiente">Pendiente</label><br>
                         </div>
                     </div>

                     <div class="form-group row" id="fechas">
                         <div class="col-sm-3 mb-3 mb-sm-0">
                             <label for="exampleFormControlTextarea1"><b>Fecha de carga</b></label>
                             <input type="date" id="inputFechaCarga" name="fechacarga" class="form-control form-control-user" required>
                             <div class="invalid-feedback" id="inputFechaCargaText">
                             </div>
                         </div>
                         <div class="col-sm-3 mb-3 mb-sm-0">
                             <label for="exampleFormControlTextarea1"><b>Fecha de vencimiento</b></label>
                             <input type="date" id="inputFechaVenc" name="fechavenc" class="form-control form-control-user" required>
                             <div class="invalid-feedback" id="inputFechaVencText">
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
                                     <?php if ($edi->id_edificio == '1') { ?>
                                         <option value="<?php echo $edi->id_edificio ?>" selected><?php echo $edi->nombre_edificio ?></option>
                                     <?php } else { ?>
                                         <option value="<?php echo $edi->id_edificio ?>"><?php echo $edi->nombre_edificio ?></option>
                                     <?php } ?>
                                 <?php } ?>
                             </select>
                         </div>
                     </div>
                     <div class="form-group row" id="nombre_usuario">
                         <div class="col-sm-6 mb-3 mb-sm-0">
                             <label for="exampleFormControlTextarea1"><b>Comentario (Opcional)</b></label>
                             <textarea class="form-control" name="comentario" id="comentario" rows="4"></textarea>
                             <div class="invalid-feedback" id="inputComentarioText">
                             </div>
                         </div>
                         <div class="col-sm-6 mb-3 mb-sm-0">
                             </br>
                             <label for="exampleFormControlTextarea1"><b>Foto (Opcional)</b></label>
                             <input type="file" name="image_file" id="image_file" />
                             <div class="invalid-feedback" id="inputImagenText">
                             </div>
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


     <!--..............................................................................................-->



     <script>
         $(document).ready(function() {
             $('#upload_form').on('submit', function(e) {
                 e.preventDefault();
 
                 var dateOne = new Date(document.getElementById("inputFechaCarga").value);    
                 var dateTwo = new Date(document.getElementById("inputFechaVenc").value);     
 
                 if (dateOne < dateTwo) {

                     if ($('#image_file').val() == '') {
                         $.ajax({
                             type: 'POST',
                             url: "<?php echo site_url() . '/extintor/ajax_upload' ?>",
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
                             url: "<?php echo site_url() . '/extintor/ajax_upload' ?>",
                             method: "POST",
                             data: new FormData(this),
                             contentType: false,
                             cache: false,
                             processData: false,
                             success: function(data) {
                                 document.getElementById("inputNombre").classList.remove("is-invalid");

                                 // var json = JSON.parse(data);  
                                 $('#uploaded_image').html(data);
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
                     }

                 } else {
                     document.getElementById("inputFechaVenc").classList.remove("is-invalid");
                     document.getElementById("inputFechaVenc").classList.add("is-invalid");
                     document.getElementById("inputFechaVencText").innerHTML = 'La fecha de vencimiento es anterior a la de carga';
                 }


             });
         });
     </script>


     <script>
         $(document).ready(function() {
             $('#dataTable1').DataTable({
                 "order": [
                     [1, "desc"]
                 ],
                 dom: 'Bfrtip',
                 buttons: [{
                         extend: 'csv',
                         footer: true,
                         exportOptions: {
                             columns: [0, 1, 2]
                         }
                     },
                     {
                         extend: 'pdf',
                         footer: true,
                         exportOptions: {
                             columns: [0, 1, 2]
                         }
                     },
                     {
                         extend: 'excel',
                         footer: true,
                         exportOptions: {
                             columns: [0, 1, 2]
                         }
                     }
                 ]
             });
         });
     </script>