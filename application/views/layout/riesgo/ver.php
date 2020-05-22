 
<div class="d-sm-flex align-items-center justify-content-between mb-4">

	<h1 class="h3 mb-0 text-gray-800">
		Riesgos
	</h1>

	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
		Nuevo riesgo
	</button>

</div>

<?php if ($this->session->flashdata('category_success')) { ?>
	<div class="alert alert-success"> <?= $this->session->flashdata('category_success') ?> </div>
<?php } ?>

<table class="table table-striped table-bordered table-sm" id="dataTable1" width="100%" cellspacing="0">
	<thead>
		<tr>
			<th width="50">Icono</th>
			<th>Nombre</th>
			<th>Descripcion</th>
			<th width="50">Modificar</th>
			<th width="50">Eliminar</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th width="50">Icono</th>
			<th>Nombre</th>
			<th>Descripcion</th>
			<th width="50">Modificar</th>
			<th width="50">Eliminar</th>
		</tr>
	</tfoot>
	<tbody>
		<?php foreach ($riesgo as $obj) { ?>
			<tr>
				<?php if ($obj->imagen != null) {  ?>
					<td>
						<center>
							<a class="btn btn-success btn-circle" data-toggle="modal" data-target="#imagenModalriesgo" style="cursor: pointer;" onclick="javascript:document.getElementById('imagenDeriesgo').src= '<?php echo base_url() . 'assets/upload/' .  $obj->imagen ?>'  ">
								<i class="fas fa-image" style="color: #fff;"></i>
							</a>
						</center>
					</td>
				<?php } else { ?>
					<td>
						<center>
							<a class="btn btn-warning btn-circle">
								<i class="fas fa-times" style="color: #fff;"></i>
							</a>
						</center>
					</td>
				<?php } ?>
				<td> <?php echo $obj->nombre ?> </td>
				<td> <?php echo $obj->descripcion ?> </td>
				<td>
					<center>
						<a href="<?php echo site_url('riesgo/editar/' . $obj->id_riesgo) ?>" class="btn btn-info btn-circle">
							<i class="fas fa-pen"></i>
						</a>
					</center>
				</td>
				<td>
					<a class="btn btn-danger btn-circle" data-toggle="modal" data-target="#deleteModal" style="cursor: pointer;" onclick="javascript:document.getElementById('delete_riesgo').value=<?php echo $obj->id_riesgo ?>">
						<i class="fas fa-trash" style="color: #fff;"></i>
					</a>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>




</br>

</div>
</div>
</div>
</body>

</html>