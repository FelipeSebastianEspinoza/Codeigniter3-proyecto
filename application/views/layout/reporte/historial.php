 <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>

 <?php if ($this->session->flashdata('category_success')) { ?>
 	<div class="alert alert-success"> <?= $this->session->flashdata('category_success') ?> </div>
 <?php } ?>


 <div class="row">

 	<?php foreach ($historial as $obj) { ?>
 		<input type="hidden" id="inputIdEnfermedadReportada" name="id_enfermedadreportada" class="form-control form-control-user" value="<?php echo $obj->id_enfermedadreportada ?>">

 		<div class="col-xl-6 col-md-6 mb-4">
 			<div class="card shadow mb-4">
 				<div class="card-header py-3">
 					<h6 class="m-0 font-weight-bold text-primary"><?php echo $obj->titulo; ?></h6>
 					<div class="d-flex flex-row-reverse">
 						<a class="btn btn-danger btn-circle" data-toggle="modal" data-target="#deleteReporteModal" style="cursor: pointer;width:30px; height:30px;" onclick="javascript:document.getElementById('delete_reporte').value=<?php echo $obj->id_historialyarchivos ?>">
 							<i class="fas fa-trash" style="color: #fff;"></i>
 						</a>
 						<a href="<?php echo site_url('reporte/editarHistorial/' . $obj->id_historialyarchivos) ?>" class="btn btn-info btn-circle" style="width:30px; height:30px;">
 							<i class="fas fa-pen"></i>
 						</a>
 						<div class="p-2"><?php echo $obj->fecha; ?></div>
 					</div>
 				</div>
 				<div class="card-body">
 					<p><?php echo $obj->descripcion; ?></p>
 					<ul class="list-group list-group-flush">
 						<li class="list-group-item">
 							<?php foreach ($archivoshistorial as $arc) { ?>
 								<?php if ($obj->id_historialyarchivos == $arc->id_historialyarchivos) { ?>



 									<?php $ext = pathinfo($arc->archivo);  ?>


 									<?php if ($ext['extension'] == 'pdf') {     ?>


 										<?php echo $arc->nombre; ?><a class="btn btn-warning btn-circle" href="<?php echo base_url() . 'assets/upload/' .  $arc->archivo ?>" target="_blank" style="cursor: pointer;width:30px; height:30px; margin-right: 15px; margin-left: 5px;">
 											<i class="fas fa-file" style="color: #fff;"></i>
 										</a>

 									<?php } else { ?>
 										<?php echo $arc->nombre; ?><a class="btn btn-success btn-circle" data-toggle="modal" data-target="#imagenModalExtintor" style="cursor: pointer;width:30px; height:30px; margin-right: 15px; margin-left: 5px;" onclick="javascript:document.getElementById('imagenDeExtintor').src= '<?php echo base_url() . 'assets/upload/' .  $arc->archivo ?>'  ">
 											<i class="fas fa-image" style="color: #fff;"></i>
 										</a>

 									<?php } ?>








 								<?php } ?>
 							<?php } ?>
 						</li>
 					</ul>
 				</div>
 			</div>
 		</div>

 	<?php } ?>

 </div>


















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


 <form id="delete_formreporte">
 	<input type="hidden" id="delete_reporte" name="id_historialyarchivos" value="">
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


 <script>
 	$(document).ready(function() {
 		$('#delete_formreporte').on('submit', function(e) {
 			e.preventDefault();
 			$.ajax({
 				type: 'POST',
 				url: "<?php echo site_url() . '/reporte/eliminarHistorial' ?>",
 				data: $(this).serialize(),
 				success: function(data) {
 					var $idH = document.getElementById("inputIdEnfermedadReportada").value;
 					window.location.href = '<?php echo site_url('reporte/successdeletehistorial/') ?>' + $idH;
 				},
 			});
 		});
 	});
 </script>















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
 			<h6 class="m-0 font-weight-bold text-primary">Nuevo Historial</h6>
 		</a>
 		<!-- Card Content - Collapse -->
 		<div class="collapse" id="collapseCardExample">
 			<div class="card-body">
 				<div>
 					This is a collapsable card example using Bootstrap's built in collapse functionality. <strong>Click on the card header</strong> to see the card body collapse and expand!
 					</br> </br>
 					<div class="form-group row" id="titulo">

 						<input type="hidden" id="inputIdHistorial" name="id_enfermedadreportada" class="form-control form-control-user" value="<?php echo $id_enfermedadreportada ?>">

 						<div class="col-sm-6 mb-3 mb-sm-0">
 							<label for="exampleFormControlTextarea1"><b>Titulo</b></label>
 							<input type="text" id="inputTitulo" name="titulo" class="form-control form-control-user" placeholder="Escriba el titulo...">
 							<div class="invalid-feedback" id="inputTituloText">
 							</div>
 						</div>
 						<div class="col-sm-3 mb-3 mb-sm-0">
 							<label for="exampleFormControlTextarea1"><b>Fecha historial</b></label>
 							<input type="date" id="inputFecha" name="fecha" class="form-control form-control-user" required>
 							<div class="invalid-feedback" id="inputFechaText">
 							</div>
 						</div>
 					</div>
 					<div class="form-group row" id="descripcion">
 						<div class="col-sm-6 mb-3 mb-sm-0">
 							<label for="exampleFormControlTextarea1"><b>Descripción (Opcional)</b></label>
 							<textarea class="form-control" name="descripcion" id="descripcion" rows="4"></textarea>
 							<div class="invalid-feedback" id="inputDescripcionText">
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

 				$.ajax({
 					type: 'POST',
 					url: "<?php echo site_url() . '/reporte/historialajax_upload' ?>",
 					data: $(this).serialize(),
 					success: function(data) {
 						document.getElementById("inputTitulo").classList.remove("is-invalid");
 						var $idH = document.getElementById("inputIdHistorial").value;
 						window.location.href = '<?php echo site_url('reporte/successhistorial/') ?>' + $idH;
 					},
 					statusCode: {
 						400: function(xhr) {
 							document.getElementById("inputTitulo").classList.remove("is-invalid");
 							var json = JSON.parse(xhr.responseText);
 							if (json.titulo.length != 0) {
 								document.getElementById("inputTitulo").classList.add("is-invalid");
 								document.getElementById("inputTituloText").innerHTML = json.titulo;
 							}
 						}
 					},
 				});
 			});
 		});
 	</script>
