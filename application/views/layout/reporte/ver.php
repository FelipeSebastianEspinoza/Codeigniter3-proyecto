 
<div class="d-sm-flex align-items-center justify-content-between mb-4">

<h1 class="h3 mb-0 text-gray-800">
	Reportes E.P
</h1>

<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
	Nuevo reporte
</button>

</div>
<?php if ($this->session->flashdata('category_success')) { ?>
	<div class="alert alert-success"> <?= $this->session->flashdata('category_success') ?> </div>
<?php } ?>
<table class="table table-striped table-bordered table-sm" id="dataTable1" width="100%" cellspacing="0">
	<thead>
		<tr>
			<th>Persona</th>
			<th>Fecha Reporte</th>
			<th>Fecha Termino</th>
			<th>Edificio</th>
			<th>Enfermedad</th>
			<th width="50">Historial</th>
			<th width="50">Modificar</th>
			<th width="50">Eliminar</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th>Persona</th>
			<th>Fecha Reporte</th>
			<th>Fecha Termino</th>
			<th>Edificio</th>
			<th>Enfermedad</th>
			<th width="50">Historial</th>
			<th width="50">Modificar</th>
			<th width="50">Eliminar</th>
		</tr>
	</tfoot>
	<tbody>
		<?php foreach ($reporte as $obj) { ?>
			<tr>
				<td> <?php echo $obj->persona ?> </td>


				<?php $date = date_create($obj->fecha); ?>
				<td> <?php echo date_format($date, "d/m/Y"); ?> </td>


				<?php if ($obj->fechatermino != NULL) { ?>
					<?php $date = date_create($obj->fechatermino); ?>
					<td> <?php echo date_format($date, "d/m/Y"); ?> </td>
				<?php } else { ?>
					<td>
						Sin Fecha
					</td>
				<?php } ?>

				<td>
					<?php foreach ($edificio as $edi) { ?>
						<?php if ($edi->id_edificio == $obj->id_edificio) { ?>
							<?php echo $edi->nombre_edificio ?>
						<?php } ?>
					<?php } ?>
				</td>
 
				<td>
					<?php foreach ($enfermedad as $enf) { ?>
						<?php if ($enf->id_enfermedad == $obj->id_enfermedad) { ?>
							<?php echo $enf->nombre?>
						<?php } ?>
					<?php } ?>
				</td>
				<td>
					<center>
						<a href="<?php echo site_url('reporte/verHistorial/' . $obj->id_enfermedadreportada) ?>" class="btn btn-success btn-circle">
							<i class="fas fa-book"></i>
						</a>
					</center>
				</td>
				<td>
					<center>
						<a href="<?php echo site_url('reporte/editar/' . $obj->id_enfermedadreportada) ?>" class="btn btn-info btn-circle">
							<i class="fas fa-pen"></i>
						</a>
					</center>
				</td>
				<td>
					<a class="btn btn-danger btn-circle" data-toggle="modal" data-target="#deleteReporteModal" style="cursor: pointer;" onclick="javascript:document.getElementById('delete_reporte').value=<?php echo $obj->id_enfermedadreportada ?>">
						<i class="fas fa-trash" style="color: #fff;"></i>
					</a>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>

 

 
 
