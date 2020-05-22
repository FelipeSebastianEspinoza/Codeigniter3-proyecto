 <div class="d-sm-flex align-items-center justify-content-between mb-4">

 	<h1 class="h3 mb-0 text-gray-800">
 		Historial
 	</h1>

 	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
 		Nuevo historial
 	</button>

 </div>


 <?php if ($this->session->flashdata('category_success')) { ?>
 	<div class="alert alert-success"> <?= $this->session->flashdata('category_success') ?> </div>
 <?php } ?>

 <div class="row">
 	<?php foreach ($historial as $obj) { ?>
 		<?php if ($tipo == 'seremi' && $obj->tipo == 'seremi') {   ?>
 			<input type="hidden" id="inputIdHistorial" name="id_historial" class="form-control form-control-user" value="<?php echo $obj->id_historial ?>">
 			<div class="col-xl-6 col-md-6 mb-4">
 				<div class="card shadow mb-4">
 					<div class="card-header py-3">
 						<h6 class="m-0 font-weight-bold text-primary"><?php echo $obj->titulo; ?></h6>
 						<div class="d-flex flex-row-reverse">
 							<a class="btn btn-danger btn-circle" data-toggle="modal" data-target="#deleteReporteModal" style="cursor: pointer;width:30px; height:30px;" onclick="javascript:document.getElementById('delete_reporte').value=<?php echo $obj->id_historial ?>">
 								<i class="fas fa-trash" style="color: #fff;"></i>
 							</a>
 							<a href="<?php echo site_url('historial/editar/' . $obj->id_historial) ?>" class="btn btn-info btn-circle" style="width:30px; height:30px;">
 								<i class="fas fa-pen"></i>
 							</a>
 							<div class="p-2"><?php echo $obj->fecha; ?></div>
 						</div>
 					</div>
 					<div class="card-body">
 						<p><?php echo $obj->estado; ?></p>
 						<p><?php echo $obj->descripcion; ?></p>
 						<ul class="list-group list-group-flush">
 							<li class="list-group-item">
 								<?php foreach ($historial_anexos as $arc) { ?>
 									<?php if ($obj->id_historial == $arc->id_historial) { ?>
 										<?php $ext = pathinfo($arc->archivo); ?>
 										<?php if ($ext['extension'] == 'pdf') { ?>
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
 		<?php  } else if ($tipo == 'mutual' && $obj->tipo == 'mutual') { ?>
 			<input type="hidden" id="inputIdHistorial" name="id_historial" class="form-control form-control-user" value="<?php echo $obj->id_historial ?>">
 			<div class="col-xl-6 col-md-6 mb-4">
 				<div class="card shadow mb-4">
 					<div class="card-header py-3">
 						<h6 class="m-0 font-weight-bold text-primary"><?php echo $obj->titulo; ?></h6>
 						<div class="d-flex flex-row-reverse">
 							<a class="btn btn-danger btn-circle" data-toggle="modal" data-target="#deleteReporteModal" style="cursor: pointer;width:30px; height:30px;" onclick="javascript:document.getElementById('delete_reporte').value=<?php echo $obj->id_historial ?>">
 								<i class="fas fa-trash" style="color: #fff;"></i>
 							</a>
 							<a href="<?php echo site_url('historial/editar/' . $obj->id_historial) ?>" class="btn btn-info btn-circle" style="width:30px; height:30px;">
 								<i class="fas fa-pen"></i>
 							</a>
 							<div class="p-2"><?php echo $obj->fecha; ?></div>
 						</div>
 					</div>
 					<div class="card-body">
 						<p><?php echo $obj->estado; ?></p>
 						<p><?php echo $obj->descripcion; ?></p>
 						<ul class="list-group list-group-flush">
 							<li class="list-group-item">
 								<?php foreach ($historial_anexos as $arc) { ?>
 									<?php if ($obj->id_historial == $arc->id_historial) { ?>
 										<?php $ext = pathinfo($arc->archivo); ?>
 										<?php if ($ext['extension'] == 'pdf') { ?>
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
 		<?php	 }  ?>
 	<?php } ?>
 </div>