<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Accidentes</h1>
</div>
<?php if ($this->session->flashdata('category_success')) { ?>
	<div class="alert alert-success"> <?= $this->session->flashdata('category_success') ?> </div>
<?php } ?>
<table class=" table-sm table-striped table-bordered " id="dataTable1" width="100%" cellspacing="0">
	<thead>
		<tr>
			<th>Persona</th>
			<th>Fecha</th>
			<th>Tipo</th>
			<th>Código</th>
			<th>Descripción</th>
			<th>Edificio</th>
			<th width="50">Diat</th>
			<th width="50">Investigación</th>
			<th width="50">InformeP</th>
			<th width="50">InformeC</th>
			<th width="50">Modificar</th>
			<th width="50">Eliminar</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th>Persona</th>
			<th>Fecha</th>
			<th>Tipo</th>
			<th>Código</th>
			<th>Descripción</th>
			<th>Edificio</th>
			<th width="50">Diat</th>
			<th width="50">Investigación</th>
			<th width="50">InformeP</th>
			<th width="50">InformeC</th>
			<th width="50">Modificar</th>
			<th width="50">Eliminar</th>
		</tr>
	</tfoot>
	<tbody>
		<?php foreach ($accidente as $obj) { ?>
			<tr>
				<td> <?php echo $obj->persona ?> </td>
				<?php $date = date_create($obj->fecha); ?>
				<td> <?php echo date_format($date, "d/m/Y"); ?> </td>

				<td> <?php echo $obj->tipo ?> </td>
				<td> <?php echo $obj->numero ?> </td>
				<td> <?php echo $obj->descripcion ?> </td>
				<td>
					<?php foreach ($edificio as $edi) { ?>
						<?php if ($edi->id_edificio == $obj->id_edificio) { ?>
							<?php echo $edi->nombre_edificio ?>
						<?php } ?>
					<?php } ?>
				</td>
				<td>
					<center>
						<?php if ($obj->archivo1 != '') { ?>
							<a class="btn btn-warning btn-circle" href="<?php echo base_url() . 'assets/upload/' . $obj->archivo4 ?>" target="_blank" style="cursor: pointer;width:30px; height:30px;  ">
								<i class="fas fa-file" style="color: #fff;"></i>
							</a>
						<?php } else { ?>
							<a class="btn btn-danger btn-circle" style="cursor: pointer;width:30px; height:30px;  ">
								<i class="fas fa-times" style="color: #fff;"></i>
							</a>
						<?php } ?>
					</center>
				</td>
				<td>
					<center>
						<?php if ($obj->archivo2 != '') { ?>
							<a class="btn btn-warning btn-circle" href="<?php echo base_url() . 'assets/upload/' . $obj->archivo4 ?>" target="_blank" style="cursor: pointer;width:30px; height:30px;  ">
								<i class="fas fa-file" style="color: #fff;"></i>
							</a>
						<?php } else { ?>
							<a class="btn btn-danger btn-circle" style="cursor: pointer;width:30px; height:30px; ">
								<i class="fas fa-times" style="color: #fff;"></i>
							</a>
						<?php } ?>
					</center>
				</td>
				<td>
					<center>
						<?php if ($obj->archivo3 != '') { ?>
							<a class="btn btn-warning btn-circle" href="<?php echo base_url() . 'assets/upload/' . $obj->archivo4 ?>" target="_blank" style="cursor: pointer;width:30px; height:30px;  ">
								<i class="fas fa-file" style="color: #fff;"></i>
							</a>
						<?php } else { ?>
							<a class="btn btn-danger btn-circle" style="cursor: pointer;width:30px; height:30px; ">
								<i class="fas fa-times" style="color: #fff;"></i>
							</a>
						<?php } ?>
					</center>
				</td>
				<td>
					<center>
						<?php if ($obj->archivo4 != '') { ?>
							<a class="btn btn-warning btn-circle" href="<?php echo base_url() . 'assets/upload/' . $obj->archivo4 ?>" target="_blank" style="cursor: pointer;width:30px; height:30px;  ">
								<i class="fas fa-file" style="color: #fff;"></i>
							</a>
						<?php } else { ?>
							<a class="btn btn-danger btn-circle" style="cursor: pointer;width:30px; height:30px; ">
								<i class="fas fa-times" style="color: #fff;"></i>
							</a>
						<?php } ?>
					</center>
				</td>

				<td>
					<center>
						<a href="<?php echo site_url('accidente/editar/' . $obj->id_accidente) ?>" class="btn btn-info btn-circle">
							<i class="fas fa-pen"></i>
						</a>
					</center>
				</td>
				<td>
					<center>
						<a class="btn btn-danger btn-circle" data-toggle="modal" data-target="#deleteAccidenteModal" style="cursor: pointer;" onclick="javascript:document.getElementById('delete_accidente').value=<?php echo $obj->id_accidente ?>">
							<i class="fas fa-trash" style="color: #fff;"></i>
						</a>
					</center>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>

<form id="delete_formaccidente">
	<input type="hidden" id="delete_accidente" name="id_accidente" value="">
	<div class="modal fade" id="deleteAccidenteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
		$('#delete_formaccidente').on('submit', function(e) {
			e.preventDefault();
			$.ajax({
				type: 'POST',
				url: "<?php echo site_url() . '/accidente/eliminarAccidente' ?>",
				data: $(this).serialize(),
				success: function(data) {
					window.location.href = "<?php echo site_url('accidente/successdelete') ?>";
				},
			});
		});
	});
</script>