<table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
<thead>
    <tr>
        <th>Nombre</th>
        <th>Estado</th>
        <th>Descripción</th>
        <th>Comentario</th>
        <th>Foto</th>
        <th>Modificar</th>
        <th>Eliminar</th>
    </tr>
</thead>
<tfoot>
    <tr>
        <th>Nombre</th>
        <th>Estado</th>
        <th>Descripción</th>
        <th>Comentario</th>
        <th>Foto</th>
        <th>Modificar</th>
        <th>Eliminar</th>
    </tr>
</tfoot>
<tbody>
    <?php
    foreach($grifos as $grifo){
        echo "<tr>";
        echo "<td>". $grifo->nombre_grifo ."</td>";
        echo "<td>". $grifo->estado_grifo ."</td>";
        echo "<td>". $grifo->descripcion_grifo ."</td>";
        echo "<td>". $grifo->comentario_grifo ."</td>";

     
        echo "<td>". '<center><a href="#" class="btn btn-success btn-circle">
        <i class="fas fa-image"></i>
        </a></center>' ."</td>";
       
/*
        echo "<td>". '<center><a href="#" class="btn btn-warning btn-circle">
        <i class="fas fa-times"></i>
        </a></center>' ."</td>";
*/     


        echo "<td>". '<center><a href="#" class="btn btn-info btn-circle">
                      <i class="fas fa-pen"></i>
                      </a></center>' ."</td>";
        echo "<td>". '<center><a href="#" class="btn btn-danger btn-circle">
                      <i class="fas fa-trash"></i>
                      </a></center>' ."</td>";
        echo "</tr>";
    }
    ?>
</tbody>
</table>

</br>
<div class="col-lg-12">
    <!-- Collapsable Card Example -->
    <div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Nuevo Grifo</h6>
        </a>
    <!-- Card Content - Collapse -->
        <div class="collapse" id="collapseCardExample" >
            <div class="card-body">
                This is a collapsable card example using Bootstrap's built in collapse functionality. <strong>Click on the card header</strong> to see the card body collapse and expand!
                </br> </br> 
                <div class="form-group row" id="nombre_usuario">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="text" id="inputNombre" name="nombre_grifo" class="form-control form-control-user"   placeholder="Escriba su nombre...">
                      <div class="invalid-feedback" id="inputNombreText">
                      </div>
                    </div>
                    <div class="col-sm-6" id="apellido_usuario">
                      <input type="text" id="inputApellido" name="estado_grifo" class="form-control form-control-user"   placeholder="Escriba su apellido...">
                      <div class="invalid-feedback" id="inputApellidoText">
                      </div>
                    </div>
                </div>
                <div class="form-group row" id="nombre_usuario">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="text" id="inputNombre2" name="nombre_usuario" class="form-control form-control-user"   placeholder="Escriba su nombre...">
                      <div class="invalid-feedback" id="inputNombreText2">
                      </div>
                    </div>
                    <div class="col-sm-6" id="apellido_usuario">
                      <input type="text" id="inputApellido2" name="apellido_usuario" class="form-control form-control-user"   placeholder="Escriba su apellido...">
                      <div class="invalid-feedback" id="inputApellidoText2">
                      </div>
                    </div>
                </div>
                <div class="form-group row" id="nombre_usuario">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="file" id="inputNombre3" name="nombre_usuario" class="form-control form-control-user"   placeholder="Elija una imagen...">
                      <div class="invalid-feedback" id="inputNombreText3">
                      </div>
                    </div>
                </div>
                <div class="form-group row" id="nombre_usuario">
                     <div class="col-sm-12 mb-6 mb-sm-0">

                    <form name="pointform" method="post">
                        <div style="">
                         
                        </div>
                        <div style="clear:both;height:5px;">
                        </div>
                        <div id="pointer_div" onclick="point_it(event)" style="background-image: url('<?php echo base_url()?>assets/images/mapa.jpg');
                               	background-repeat: no-repeat; width: 678px; height: 506px;" >
                        </div>
 





                    </div> 
                  
                </div>
                <div class="col-sm-12 mb-6 mb-sm-0">
                    <div style=""> 
                            Posición X->
	                        <input type="text" name="form_x" size="4" />
	                        Posición Y->
	                        <input type="text" name="form_y" size="4" />
                        </div>
                    </div>
                    </br>
                    <div class="col-sm-12 mb-6 mb-sm-0">
                    <a href="#" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Split Button Success</span>
                  </a>
                    </div>
            </div>
        </div>
    </div>
</div>

   

 




<script language="JavaScript" type="text/javascript">
	function point_it(event) {
		pos_x = event.offsetX ? (event.offsetX) : event.pageX - document.getElementById("pointer_div").offsetLeft;
		pos_y = event.offsetY ? (event.offsetY) : event.pageY - document.getElementById("pointer_div").offsetTop;
		document.pointform.form_x.value = pos_x;
		document.pointform.form_y.value = pos_y;
	}
</script>
