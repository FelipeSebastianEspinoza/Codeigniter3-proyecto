 <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>



 <?php foreach ($historial as $obj) { ?>

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
 				<h6 class="m-0 font-weight-bold text-primary">Editar Historial</h6>
 			</a>
 			<!-- Card Content - Collapse -->
 			<div id="collapseCardExample">
 				<div class="card-body">
 					<div>
 						This is a collapsable card example using Bootstrap's built in collapse functionality. <strong>Click on the card header</strong> to see the card body collapse and expand!
 						</br> </br>
 						<div class="form-group row" id="titulo">

 							<input type="hidden" id="inputIdHistorial" name="id_historialyarchivos" class="form-control form-control-user" value="<?php echo $obj->id_historialyarchivos ?>">
 							<input type="hidden" id="inputIdEnfermedadReportada" name="id_enfermedadreportada" class="form-control form-control-user" value="<?php echo $obj->id_enfermedadreportada ?>">
 							<div class="col-sm-6 mb-3 mb-sm-0">
 								<label for="exampleFormControlTextarea1"><b>Titulo</b></label>
 								<input type="text" id="inputTitulo" name="titulo" class="form-control form-control-user" value="<?php echo  $obj->titulo ?>">
 								<div class="invalid-feedback" id="inputTituloText">
 								</div>
 							</div>
 							<div class="col-sm-3 mb-3 mb-sm-0">
 								<label for="exampleFormControlTextarea1"><b>Fecha historial</b></label>
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
 					</br>
 					This is a collapsable card example using Bootstrap's built in collapse functionality. <strong>Click on the card header</strong> to see the card body collapse and expand!
 					</br></br>


 					<?php
						$attributes = array('id' => 'uploadfile_form', 'name' => 'pointform');
						echo Form_open_multipart('', $attributes);
						?>
 					<div class="form-group row" id="nombre">

 						<div class="col-sm-4 mb-1 mb-sm-0">
 							<label for="exampleFormControlTextarea1"><b>Nombre Archivo</b></label>
 							<input type="text" id="inputNArchivo" name="narchivo" class="form-control form-control-user">
 							<div class="invalid-feedback" id="inputNArchivoText">
 							</div>
 						</div>

 						<div class="col-sm-6 mb-3 mb-sm-0">
 							 </br>
 							<label for="exampleFormControlTextarea1"><b>Archivo</b></label>
 							<input type="file" name="file" id="file" />
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
 					</form>

 				</div>
 			</div>
 		</div>
 	<?php } ?>
 	<!--..............................................................................................-->



 	<script>
 		$(document).ready(function() {
 			$('#uploadfile_form').on('submit', function(e) {
 				e.preventDefault();
 				if ($('#file').val() == '') {
 					$.ajax({
 						type: 'POST',
 						url: "<?php echo site_url() . '/redhumeda/crearRedHumedaajax' ?>",
 						data: $(this).serialize(),
 						success: function(data) {
 							document.getElementById("inputNombre").classList.remove("is-invalid");

 							window.location.href = "<?php echo site_url('redhumeda/success') ?>";
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
 			});
 		});
 	</script>
















 	<script>
 		$(document).ready(function() {
 			$('#upload_form').on('submit', function(e) {
 				e.preventDefault();

 				$.ajax({
 					type: 'POST',
 					url: "<?php echo site_url() . '/reporte/modificarhistorialajax_upload' ?>",
 					data: $(this).serialize(),
 					success: function(data) {
 						document.getElementById("inputTitulo").classList.remove("is-invalid");
 						var $idH = document.getElementById("inputIdEnfermedadReportada").value;
 						window.location.href = '<?php echo site_url('reporte/successhistorialmodificar/') ?>' + $idH;
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
