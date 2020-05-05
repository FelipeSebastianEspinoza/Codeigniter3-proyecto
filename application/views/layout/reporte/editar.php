<h1>Modificar Red Húmeda</h1>

<?php foreach ($reporte as $obj) { ?>

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
			<a class="d-block card-header py-3" aria-expanded="true" aria-controls="collapseCardExample">
				<h6 class="m-0 font-weight-bold text-primary">Modificar Reporte E.P.</h6>
			</a>
			<!-- Card Content - Collapse -->
			<div id="collapseCardExample">
				<div class="card-body">
					<div>
						This is a collapsable card example using Bootstrap's built in collapse functionality. <strong>Click on the card header</strong> to see the card body collapse and expand!
						</br> </br>
						<div class="form-group row" id="persona">
							<input type="hidden" id="inputId" name="id_enfermedadreportada" class="form-control form-control-user" value="<?php echo $obj->id_enfermedadreportada?>">
							<div class="col-sm-6 mb-3 mb-sm-0">
								<label for="exampleFormControlTextarea1">Persona</label>
								<input type="text" id="inputPersona" name="persona" class="form-control form-control-user" value="<?php echo $obj->persona ?>">
								<div class="invalid-feedback" id="inputPersonaText">
								</div>
							</div>
							<div class="col-sm-3 mb-3 mb-sm-0">
								<label for="exampleFormControlTextarea1"><b>Fecha de reporte</b></label>
								<input type="date" id="inputFecha" name="fecha" class="form-control form-control-user" value="<?php echo $obj->fecha ?>" required>
								<div class="invalid-feedback" id="inputFechaText">
								</div>
							</div>
							<div class="col-sm-3 mb-3 mb-sm-0">
								<label for="exampleFormControlTextarea1"><b>Fecha de termino</b></label>
								<input type="date" id="inputFechaTerm" name="fechatermino" class="form-control form-control-user" value="<?php echo $obj->fechatermino ?>" required>
								<div class="invalid-feedback" id="inputFechaTermText">
								</div>
							</div>
						</div>

						<div class="form-group row" id="nombre_usuario">
							<div class="col-sm-6" id="estado">
								<label for="exampleFormControlTextarea1"><b>Seleccione el edificio en el cual se encuentra</b></label>
								</br>
								<select multiple class="form-control" id="exampleFormControlSelect2" name="id_edificio" required>
									<?php foreach ($edificio as $edi) { ?>
										<?php if ($edi->id_edificio == $obj->id_edificio) { ?>
											<option value="<?php echo $edi->id_edificio ?>" selected><?php echo $edi->nombre_edificio ?></option>
										<?php } else { ?>
											<option value="<?php echo $edi->id_edificio ?>"><?php echo $edi->nombre_edificio ?></option>
										<?php } ?>
									<?php } ?>
								</select>
							</div>
							<div class="col-sm-6" id="estado">
								<label for="exampleFormControlTextarea1"><b>Seleccione el edificio en el cual se encuentra</b></label>
								</br>
								<select multiple class="form-control" id="exampleFormControlSelect3" name="id_enfermedad" required>
									<?php foreach ($enfermedad as $enf) { ?>
										<?php if ($enf->id_enfermedad == $obj->id_enfermedad) { ?>
											<option value="<?php echo $enf->id_enfermedad ?>" selected><?php echo $enf->nombre ?></option>
										<?php } else { ?>
											<option value="<?php echo $enf->id_enfermedad ?>"><?php echo $enf->nombre ?></option>
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
	<?php } ?>

	<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>

	<script>
		$(document).ready(function() {
			$('#upload_form').on('submit', function(e) {
				e.preventDefault();
				var dateOne = new Date(document.getElementById("inputFecha").value);
				var dateTwo = new Date(document.getElementById("inputFechaTerm").value);

				if (dateOne < dateTwo) {

					$.ajax({
						type: 'POST',
						url: "<?php echo site_url() . '/reporte/modificarReporterajax' ?>",
						data: $(this).serialize(),
						success: function(data) {
							document.getElementById("inputPersona").classList.remove("is-invalid");

							window.location.href = "<?php echo site_url('reporte/success') ?>";
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
				} else {
					document.getElementById("inputFechaTerm").classList.remove("is-invalid");
					document.getElementById("inputFechaTerm").classList.add("is-invalid");
					document.getElementById("inputFechaTermText").innerHTML = 'La fecha de termino es anterior a la del reporte';
				}
			});
		});
	</script>
