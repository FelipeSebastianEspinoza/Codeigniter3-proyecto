 <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>



 <?php foreach ($unidad as $obj) { ?>

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
 			<a class="d-block card-header py-3" aria-expanded="true">
 				<h6 class="m-0 font-weight-bold text-primary">Editar unidad de análisis</h6>
 			</a>
 			<!-- Card Content - Collapse -->
 			<div id="collapseCardExample">
 				<div class="card-body">
 					<div>
 						This is a collapsable card example using Bootstrap's built in collapse functionality. <strong>Click on the card header</strong> to see the card body collapse and expand!
 						</br> </br>
 						<div class="form-group row" id="nombre">

 							<input type="hidden" id="inputIdHistorial" name="id_protocolo" class="form-control form-control-user" value="<?php echo $obj->id_protocolo ?>">
 							<input type="hidden" id="inputIdEnfermedadReportada" name="id_unidad" class="form-control form-control-user" value="<?php echo $obj->id_unidad ?>">
 							<div class="col-sm-6 mb-3 mb-sm-0">
 								<label for="exampleFormControlTextarea1"><b>Nombre</b></label>
 								<input type="text" id="inputNombre" name="nombre" class="form-control form-control-user" value="<?php echo  $obj->nombre ?>">
 								<div class="invalid-feedback" id="inputNombreText">
 								</div>
 							</div>
 							<div class="col-sm-3 mb-3 mb-sm-0">
 								<label for="exampleFormControlTextarea1"><b>Fecha actualización</b></label>
 								<input type="date" id="inputFecha" name="fecha" class="form-control form-control-user" value="<?php echo $obj->fecha ?>" required>
 								<div class="invalid-feedback" id="inputFechaText">
 								</div>
 							</div>
 						</div>
 						<div class="form-group row" id="descripcion">
 							<div class="col-sm-6 mb-3 mb-sm-0">
 								<label for="exampleFormControlTextarea1"><b>Descripción (Opcional)</b></label>
 								<textarea class="form-control" name="descripcion" id="descripcion" rows="4"><?php echo $obj->descripcion ?></textarea>
 								<div class="invalid-feedback" id="inputDescripcionText">
 								</div>
							 </div>
							 <div class="col-sm-6" id="estado">
                                <label for="exampleFormControlTextarea1">Seleccione un estado</label>
                                </br>
                                <?php if ($obj->estado != 'Pendiente') {
                                ?>
                                    <input type="radio" id="Revisado" name="estado" value="Revisado" checked>
                                    <label for="Revisado">Revisado</label><br>
                                    <input type="radio" id="Pendiente" name="estado" value="Pendiente">
                                    <label for="Pendiente">Pendiente</label><br>
                                <?php  } else {   ?>
                                    <input type="radio" id="Revisado" name="estado" value="Revisado">
                                    <label for="Revisado">Revisado</label><br>
                                    <input type="radio" id="Pendiente" name="estado" value="Pendiente" checked>
                                    <label for="Pendiente">Pendiente</label><br>
                                <?php   }   ?>
                                <div class="invalid-feedback" id="inputEstadoText">
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

 					</br>

 					<div class="col-sm-12 mb-6 mb-sm-0">
 						<table class=".table-sm table-striped">
 							<thead>
 							</thead>
 							<tbody>
 								<?php foreach ($archivos as $arch) { ?>
 									<tr>
 										<td>
 											<label for="exampleFormControlTextarea1"><b><?php echo $arch->nombre; ?></b></label>
 										</td>
 										<td>

 											<?php $ext = pathinfo($arch->archivo);  ?>
 											<?php if ($ext['extension'] == 'pdf') { ?>


 												<a class="btn btn-warning btn-circle" href="<?php echo base_url() . 'assets/upload/' .  $arch->archivo ?>" target="_blank" style="cursor: pointer;width:30px; height:30px; margin-right: 15px; margin-left: 5px;">
 													<i class="fas fa-file" style="color: #fff;"></i>
 												</a>

 											<?php } else { ?>
 												<a class="btn btn-success btn-circle" data-toggle="modal" data-target="#imagenModalExtintor" style="cursor: pointer;width:30px; height:30px; margin-right: 15px; margin-left: 5px;" onclick="javascript:document.getElementById('imagenDeExtintor').src= '<?php echo base_url() . 'assets/upload/' .  $arch->archivo ?>'  ">
 													<i class="fas fa-image" style="color: #fff;"></i>
 												</a>

 											<?php } ?>
 
 										</td>
 										<td>
 											<a class="btn btn-danger btn-circle" data-toggle="modal" data-target="#deleteReporteModal" style="cursor: pointer;width:30px; height:30px;margin-right: 15px; margin-left: 5px;" onclick="javascript:document.getElementById('delete_reportearchivo').value=<?php echo $arch->id_unidad_anexos ?>">
 												<i class="fas fa-trash" style="color: #fff;"></i>
 											</a>
 										</td>
 									</tr>
 								<?php } ?>
 							</tbody>
 						</table>
 					</div>


 					<form id="delete_formreportearchivo">
 						<input type="hidden" id="delete_reportearchivo" name="id_unidad_anexos" value="">
 						<div class="modal fade" id="deleteReporteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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


 					<div class="modal fade" id="imagenModalExtintor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 						<div class="modal-dialog" role="document">
 							<div class="modal-content">
 								<div class="modal-header">
 									<button class="close" type="button" data-dismiss="modal" aria-label="Close">
 										<span aria-hidden="true">×</span>
 									</button>
 								</div>
 								<div class="text-center">
 									<img id="imagenDeExtintor" class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="" alt="">
 								</div>
 							</div>
 						</div>
 					</div>


 					</br>
 					</br>
 					This is a collapsable card example using Bootstrap's built in collapse functionality. <strong>Click on the card header</strong> to see the card body collapse and expand!
 					</br></br>


 					<?php
						$attributes = array('id' => 'uploadfile_form', 'name' => 'pointform2');
						echo Form_open_multipart('', $attributes);
						?>
 					<div class="form-group row" id="nombre">

 						<input type="hidden" id="inputIdHistorial" name="id_unidad" class="form-control form-control-user" value="<?php echo $obj->id_unidad ?>">
 						<div class="col-sm-4 mb-1 mb-sm-0">
 							<label for="exampleFormControlTextarea1"><b>Nombre Archivo</b></label>
 							<input type="text" id="inputNArchivo" name="narchivo" class="form-control form-control-user">
 							<div class="invalid-feedback" id="inputNArchivoText">
 							</div>
 						</div>

 						<div class="col-sm-6 mb-3 mb-sm-0">
 							<label for="exampleFormControlTextarea1"><b>Archivo</b></label></br>
 							<input type="file" name="image_file" id="image_file" required />
 							<div class="invalid-feedback" id="inputImagenText">
 							</div>
 						</div>
 					</div>
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















 	<?php } ?>
 	<!--..............................................................................................-->
 	<script>
 		$(document).ready(function() {
 			$('#delete_formreportearchivo').on('submit', function(e) {
 				e.preventDefault();
 				$.ajax({
 					type: 'POST',
 					url: "<?php echo site_url() . '/protocolo/eliminarArchivo' ?>",
 					data: $(this).serialize(),
 					success: function(data) {
						var $idH = document.getElementById("inputIdHistorial").value;
 						window.location.href = '<?php echo site_url('protocolo/successdeletehistorial/') ?>' + $idH;
 					},
 				});
 			});
 		});
 	</script>

 	<script>
 		$(document).ready(function() {
 			$('#uploadfile_form').on('submit', function(e) {
 				e.preventDefault();

 				$.ajax({
 					url: "<?php echo site_url() . '/protocolo/uploadfilehistorial' ?>",
 					method: "POST",
 					data: new FormData(this),
 					contentType: false,
 					cache: false,
 					processData: false,
 					success: function(data) {
 						document.getElementById("inputNArchivo").classList.remove("is-invalid");
 						$('#uploaded_image').html(data);
 						var $idH = document.getElementById("inputIdHistorial").value;
 						window.location.href = '<?php echo site_url('protocolo/successhistorialmodificar/') ?>' + $idH;
 					},
 					statusCode: {
 						400: function(xhr) {
 							document.getElementById("inputNArchivo").classList.remove("is-invalid");
 							var json = JSON.parse(xhr.responseText);
 							if (json.narchivo.length != 0) {
 								document.getElementById("inputNArchivo").classList.add("is-invalid");
 								document.getElementById("inputNArchivoText").innerHTML = json.narchivo;
 							}
 						}
 					},
 				});
 			});
 		});
 	</script>















 	<script>
 		$(document).ready(function() {
 			$('#upload_form').on('submit', function(e) {
 				e.preventDefault();

 				$.ajax({
 					type: 'POST',
 					url: "<?php echo site_url() . '/protocolo/modificarhistorialajax_upload' ?>",
 					data: $(this).serialize(),
 					success: function(data) {
 						document.getElementById("inputNombre").classList.remove("is-invalid");
 						var $idH = document.getElementById("inputIdHistorial").value;
 						window.location.href = '<?php echo site_url('protocolo/successhistorialmodificar/') ?>' + $idH;
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
 			});
 		});
 	</script>
