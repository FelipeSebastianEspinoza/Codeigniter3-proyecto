<h1>Modificar Protocolo</h1>

<?php foreach ($protocolo as $obj) { ?>

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
				<h6 class="m-0 font-weight-bold text-primary">Modificar Protocolo</h6>
			</a>
			<!-- Card Content - Collapse -->
			<div id="collapseCardExample">
				<div class="card-body">
					<div>
						This is a collapsable card example using Bootstrap's built in collapse functionality. <strong>Click on the card header</strong> to see the card body collapse and expand!
						</br> </br>
						<div class="form-group row" id="protocolo">
							<input type="hidden" id="inputId" name="id_protocolo" class="form-control form-control-user" value="<?php echo $obj->id_protocolo ?>">
							<div class="col-sm-6 mb-3 mb-sm-0">
								<label for="exampleFormControlTextarea1">Nombre</label>
								<input type="text" id="inputNombre" name="nombre" class="form-control form-control-user" value="<?php echo $obj->nombre ?>">
								<div class="invalid-feedback" id="inputNombreText">
								</div>
							</div>
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
				</div>
			</div>
		</div>
	<?php } ?>

	<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>

	<script>
		$(document).ready(function() {
			$('#upload_form').on('submit', function(e) {
				e.preventDefault();
				$.ajax({ 
					type: 'POST',
					url: "<?php echo site_url() . '/protocolo/modificar' ?>",
					data: $(this).serialize(),
					success: function(data) {
						document.getElementById("inputNombre").classList.remove("is-invalid");
						window.location.href = "<?php echo site_url('protocolo/success') ?>";
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