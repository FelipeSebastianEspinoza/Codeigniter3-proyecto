 

<div class="row">

<!-- Area Chart -->
<div class="col-xl-8 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
      <div class="dropdown no-arrow">
        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(17px, 19px, 0px);">
          <div class="dropdown-header">Acciones</div>

          <a class="dropdown-item" > 
          <button id="edificios" class="button" >Edificios</button>
          </a>
          <a class="dropdown-item"  > 
          <button id="grifos" class="button" >Grifos</button>
          </a>
 
        </div>
      </div>
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <div class="text-center">
    <div id="mapaDiv"></div>
       
    </div>
    <!--   <div class="chart-area"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
      <div class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="" id="mapaDiv"></div>
      <canvas id="myAreaChart" style="display: block; width: 568px; height: 320px;" width="568" height="320" class="chartjs-render-monitor"></canvas>
-->     </div>
    </div>
  </div>
</div>

<!-- Pie Chart -->
<div class="col-xl-4 col-lg-5">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
      <div class="chart-pie pt-4 pb-2"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
      <div id="fotoDiv"></div>
      <canvas id="myPieChart" style="display: block; width: 568px; height: 245px;" width="568" height="245" class="chartjs-render-monitor"></canvas>
      </div>
    </div>
  </div>
</div>
</div>




 