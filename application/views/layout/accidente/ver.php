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
 			<h6 class="m-0 font-weight-bold text-primary">Nuevo Reporte Accidente</h6>
 		</a>
 		<!-- Card Content - Collapse -->
 		<div class="collapse" id="collapseCardExample">
 			<div class="card-body">
 				<div>
 					This is a collapsable card example using Bootstrap's built in collapse functionality. <strong>Click on the card header</strong> to see the card body collapse and expand!
 					</br> </br>
 					<div class="form-group row" id="persona">
 						<div class="col-sm-6 mb-3 mb-sm-0">
 							<label for="exampleFormControlTextarea1"><b>Persona</b></label>
 							<input type="text" id="inputPersona" name="persona" class="form-control form-control-user" placeholder="Escriba el nombre de la persona...">
 							<div class="invalid-feedback" id="inputPersonaText">
 							</div>
 						</div>
 						<div class="col-sm-6 mb-3 mb-sm-0">
 							<label for="exampleFormControlTextarea1"><b>Código</b></label>
 							<input type="text" id="inputNumero" name="numero" class="form-control form-control-user" placeholder="Escriba el nombre de la persona...">
 							<div class="invalid-feedback" id="inputNumeroText">
 							</div>
 						</div>

 						<div class="col-sm-6" id="tipo">
 							<label for="exampleFormControlTextarea1"><b>Seleccione el tipo de accidente</b></label>
 							</br>
 							<input type="radio" id="Leve" name="tipo" value="Leve" checked>
 							<label for="Leve">Leve</label><br>
 							<input type="radio" id="Grave" name="tipo" value="Grave">
 							<label for="Grave">Grave</label><br>
 						</div>
 						<div class="col-sm-3 mb-3 mb-sm-0">
 							<label for="exampleFormControlTextarea1"><b>Fecha de reporte</b></label>
 							<input type="date" id="inputFecha" name="fecha" class="form-control form-control-user" required>
 							<div class="invalid-feedback" id="inputFechaText">
 							</div>
 						</div>

 					</div>

 					<div class="form-group row" id="nombre_usuario">
 						<div class="col-sm-6 mb-3 mb-sm-0">
 							<label for="exampleFormControlTextarea1"><b>Descripción (Opcional)</b></label>
 							<textarea class="form-control" name="descripcion" id="descripcion" rows="4"></textarea>
 							<div class="invalid-feedback" id="inputDescripcionText">
 							</div>
 						</div>
 						<div class="col-sm-6" id="estado">
 							<label for="exampleFormControlTextarea2"><b>Seleccione el edificio en el que sucedió (Exterior o Interior)</b></label>
 							</br>
 							<select multiple class="form-control" id="exampleFormControlSelect3" name="id_edificio" required>
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
 					url: "<?php echo site_url() . '/accidente/ajax_upload' ?>",
 					data: $(this).serialize(),
 					success: function(data) {
 						document.getElementById("inputPersona").classList.remove("is-invalid");

 						window.location.href = "<?php echo site_url('accidente/success') ?>";
 					},
 					statusCode: {
 						400: function(xhr) {
 							document.getElementById("inputPersona").classList.remove("is-invalid");

 							var json = JSON.parse(xhr.responseText);
 							if (json.persona.length != 0) {
 								document.getElementById("inputPersona").classList.add("is-invalid");
 								document.getElementById("inputPersonaText").innerHTML = json.persona;
 							}

 						}
 					},
 				});
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
