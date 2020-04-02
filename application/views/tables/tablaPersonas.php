
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tables</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
  
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Personas</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>RUT</th>
            <th>Fecha de Nacimiento</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Nombre</th>
            <th>RUT</th>
            <th>Fecha de Nacimiento</th>
          </tr>
        </tfoot>
        <tbody>
          
          <?php
              foreach($data as $pers){
                  echo "<tr><td>".$pers->nombre_personas."</td>";
                  echo "<td>".$pers->rut_personas."</td>";
                  echo "<td>".$pers->fechanacimiento_personas."</td></tr>"; 
                  
              }
          ?>

        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->