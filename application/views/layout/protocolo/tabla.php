<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Protocolos</h1>
</div>
<?php if ($this->session->flashdata('category_success')) { ?>
	<div class="alert alert-success"> <?= $this->session->flashdata('category_success') ?> </div>
<?php } ?>
<table class="table table-striped table-bordered table-sm" id="dataTable1" width="100%" cellspacing="0">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Descripción</th>
			<th width="150">Unidad de análisis</th>
			<th width="50">Modificar</th>
			<th width="50">Eliminar</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th>Nombre</th>
			<th>Descripción</th>
			<th width="150">Unidad de análisis</th>
			<th width="50">Modificar</th>
			<th width="50">Eliminar</th>
		</tr>
	</tfoot>
	<tbody>
		<?php foreach ($protocolo as $obj) { ?>
			<tr>
				<td> <?php echo $obj->nombre ?> </td>
				<td> <?php echo $obj->descripcion ?> </td>

				<td>
					<center>
						<a href="<?php echo site_url('protocolo/verUnidad/' . $obj->id_protocolo) ?>" class="btn btn-success btn-circle">
							<i class="fas fa-book"></i>
						</a>
					</center>
				</td>
				<td>
					<center>
						<a href="<?php echo site_url('protocolo/editar/' . $obj->id_protocolo) ?>" class="btn btn-info btn-circle">
							<i class="fas fa-pen"></i>
						</a>
					</center>
				</td>
				<td>
					<a class="btn btn-danger btn-circle" data-toggle="modal" data-target="#deleteReporteModal" style="cursor: pointer;" onclick="javascript:document.getElementById('delete_reporte').value=<?php echo $obj->id_protocolo ?>">
						<i class="fas fa-trash" style="color: #fff;"></i>
					</a>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>

<form id="delete_formreporte">
	<input type="hidden" id="delete_reporte" name="id_protocolo" value="">
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
				url: "<?php echo site_url() . '/protocolo/eliminarProtocolo' ?>",
				data: $(this).serialize(),
				success: function(data) {
					window.location.href = "<?php echo site_url('protocolo/successdelete') ?>";
				},
			});
		});
	});
</script>