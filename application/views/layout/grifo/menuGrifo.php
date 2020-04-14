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
        echo "<td>". $grifo->imagen_grifo ."</td>";
        echo "<td>". $grifo->imagen_grifo ."</td>";
        echo "<td>". $grifo->imagen_grifo ."</td>";
        echo "</tr>";
    }
    ?>
</tbody>
</table>


  

 