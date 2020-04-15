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



 <!--..............................................................................................-->

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
                <div class="form-group row" id="nombre_grifo">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <label for="exampleFormControlTextarea1">Nombre</label>
                      <input type="text" id="inputNombre" name="nombre_grifo" class="form-control form-control-user"   placeholder="Escriba el nombre...">
                      <div class="invalid-feedback" id="inputNombreText">
                      </div>
                    </div>
                    <div class="col-sm-6" id="estado_grifo">
                      <label for="exampleFormControlTextarea1">Estado</label>
                      <input type="text" id="inputEstado" name="estado_grifo" class="form-control form-control-user"   placeholder="Escriba el estado...">
                      <div class="invalid-feedback" id="inputEstadoText">
                      </div>
                    </div>
                </div>
                <div class="form-group row" id="nombre_usuario">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <label for="exampleFormControlTextarea1">Descripción</label>
                      <textarea class="form-control" name="descripcion_grifo" id="descripcion_grifo" rows="3"></textarea>
                      <div class="invalid-feedback" id="inputDescripcionText">
                      </div>
                    </div>
                    <div class="col-sm-6" id="comentario_grifo">
                    <label for="exampleFormControlTextarea1">Comentario</label>
                      <textarea class="form-control" name="comentario_grifo" id="comentario_grifo" rows="3"></textarea>
                      <div class="invalid-feedback" id="inputComentarioText">
                      </div>
                    </div>
                </div>
                <div class="form-group row" id="nombre_grifo">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <label for="exampleFormControlTextarea1">Foto</label>
                      <input type="file" id="inputImagen" name="imagen_grifo" class="form-control form-control-user"   placeholder="Escriba el nombre...">
                      <div class="invalid-feedback" id="inputImagenText">
                      </div>
                    </div>
                </div>
                </br> 
                <p>De clic en el mapa para elegir la ubicación del grifo.</p>
                <div class="form-group row" id="nombre_usuario">
                     <div class="col-sm-12 mb-6 mb-sm-0">

                    <form name="pointform" method="post">
                        <div>
                         
                        </div>
                        <div style="clear:both;height:5px;">
                        </div>
                        <div id="pointer_div" onclick="point_it(event)" style="background-image: url('<?php echo base_url()?>assets/images/mapa.jpg');
                               	background-repeat: no-repeat; width: 678px; height: 506px;" >
                        </div>
 





                    </div> 
                  
                </div>
                <div class="col-sm-12 mb-6 mb-sm-0">
                    <div> 
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
                    <span class="text">Registrar</span>
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
<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>

<script>
(function($){
  $("#form_register").submit(function(ev){ 
    ev.preventDefault();
      $.ajax({ 
        type:'POST',
        url: "<?php echo site_url().'/grifo/crearGrifoajax' ?>",
        data: $(this).serialize(),
        success: function(data){
           document.getElementById("inputNombre").classList.remove("is-invalid"); 
           document.getElementById("inputEstado").classList.remove("is-invalid");  
            var json = JSON.parse(data);   
            window.location = "<?php  echo site_url('dashboard'); ?>";  
      },
     statusCode: {
           400: function(xhr){
               document.getElementById("inputNombre").classList.remove("is-invalid"); 
               document.getElementById("inputEstado").classList.remove("is-invalid");  
             var json = JSON.parse(xhr.responseText);
             if(json.nombre_usuario.length !=0){  
                 document.getElementById("inputNombre").classList.add("is-invalid");
                 document.getElementById("inputNombreText").innerHTML = json.nombre_usuario;   
             }
             if(json.apellido_usuario.length !=0){
                 document.getElementById("inputEstado").classList.add("is-invalid");
                 document.getElementById("inputEstadoText").innerHTML = json.apellido_usuario;   
             }
 
           } 
      },
    });
    ev.preventDefault();
  });
})(jQuery)
</script>


 