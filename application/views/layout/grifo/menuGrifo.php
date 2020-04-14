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
                      <input type="text" id="inputNombre" name="nombre_usuario" class="form-control form-control-user"   placeholder="Escriba su nombre...">
                      <div class="invalid-feedback" id="inputNombreText">
                      </div>
                    </div>
                    <div class="col-sm-6" id="apellido_usuario">
                      <input type="text" id="inputApellido" name="apellido_usuario" class="form-control form-control-user"   placeholder="Escriba su apellido...">
                      <div class="invalid-feedback" id="inputApellidoText">
                      </div>
                    </div>
                </div>
                <div class="form-group row" id="nombre_usuario">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="file" id="inputNombre" name="nombre_usuario" class="form-control form-control-user"   placeholder="Escriba su nombre...">
                      <div class="invalid-feedback" id="inputNombreText">
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 
 


 