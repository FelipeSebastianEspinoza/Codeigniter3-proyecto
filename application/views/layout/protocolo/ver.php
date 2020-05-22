<div class="d-sm-flex align-items-center justify-content-between mb-4">

<h1 class="h3 mb-0 text-gray-800">
	Protocolos
</h1>

<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
	Nuevo protocolo
</button>

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
 

 