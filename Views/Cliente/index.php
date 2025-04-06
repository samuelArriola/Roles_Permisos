<?php include "Views/Templates/header.php"; ?>
<main id="main" class="main">

<div class="pagetitle">
  <h1>Cliente 
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="Cliente">Home</a></li>
      <li class="breadcrumb-item active">Cliente</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<div class="btn-group mb-2" role="group" aria-label="">
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#CrearCliModal" id="OpenModCreaCli"><i class="bi bi-person-plus-fill"></i></button>
</div>

<table class="table table-striped " id="TblCliente">
    <thead class="table-dark">
        <tr>
            <th>id</th>
            <th>Dni</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Estado</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<!-- Modal Crear Cliente -->
<div class="modal fade" id="CrearCliModal" tabindex="-1" aria-labelledby="CrearCliModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="CrearCliModalLabel">Crear Cliente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="FrmRegCli">
          <div class="row">
              <input type="hidden"  id="GeCliId"></input>
              <div class="mb-3 col-md-4">
                <label for="GeNumDniCli">Dni</label>
                <input type="text" class="form-control" id="GeNumDniCli" placeholder=""></input>
              </div>
              <div class="mb-3 col-md-8">
                <label for="GePriNomCli">Nombre</label>
               <input type="text" class="form-control" id="GePriNomCli" aria-describedby="" placeholder="">
              </div>
              <div class="mb-3 ">
               <label for="GeTelefonoCli">Telefono</label>
               <input type="text" class="form-control" id="GeTelefonoCli"></input>
              </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="GeRegCli">Crear</button>
      </div>
    </div>
  </div>
</div>


<section class="section dashboard">
  <div class="row">
  </div>

<?php include "Views/Templates/footer.php"; ?>

