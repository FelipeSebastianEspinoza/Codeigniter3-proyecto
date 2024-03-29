<div id="wrapper">


  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" style="color: #fff;">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="<?php echo site_url('dashboard'); ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Página Principal</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Interface
    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pages</span>
      </a>
      <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Herramientas</h6>
          <?php if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {    ?>
            <a class="collapse-item" href="<?php echo site_url('riesgo/ver'); ?>">Riesgos</a>
          <?php } ?>
          <?php if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {    ?>
            <a class="collapse-item" href="<?php echo site_url('protocolo/ver'); ?>">Protocolos</a>
          <?php } ?>
          <?php if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {    ?>
            <a class="collapse-item" href="<?php echo site_url('historial/verSeremi'); ?>">Historial Seremi</a>
          <?php } ?>
          <?php if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {    ?>
            <a class="collapse-item" href="<?php echo site_url('historial/verMutual'); ?>">Historial Mutual</a>
          <?php } ?>
        </div>
      </div>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Gestionar Herramientas</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Herramientas</h6>
          <?php if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {    ?>
            <a class="collapse-item" href="<?php echo site_url('grifo/menugrifo'); ?>">Grifos</a>
          <?php   }   ?>
          <?php if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {    ?>
            <a class="collapse-item" href="<?php echo site_url('redhumeda/ver'); ?>">Redes Húmedas</a>
          <?php   }   ?>
          <?php if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {    ?>
            <a class="collapse-item" href="<?php echo site_url('zonadeseguridad/ver'); ?>">Zonas de Seguridad</a>
          <?php   }   ?>
          <?php if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {    ?>
            <a class="collapse-item" href="<?php echo site_url('extintor/ver'); ?>">Extintores</a>
          <?php   }   ?>

        </div>
      </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Personas</span>
      </a>
      <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Custom Utilities:</h6>
          <?php if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {    ?>
            <a class="collapse-item" href="<?php echo site_url('enfermedadprofesional/ver'); ?>">E.Profesionales</a>
          <?php   }   ?>
          <?php if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {    ?>
            <a class="collapse-item" href="<?php echo site_url('reporte/ver'); ?>">E.Reportes</a>
          <?php   }   ?>
          <?php if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {    ?>
            <a class="collapse-item" href="<?php echo site_url('accidente/ver'); ?>">Accidentes</a>
          <?php   }   ?>
        </div>
      </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Addons
    </div>



    <!-- Nav Item - Charts -->
    <li class="nav-item">
      <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
      <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <div id="content-wrapper" class="d-flex flex-column">


    <div id="content">