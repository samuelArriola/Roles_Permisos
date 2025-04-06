<?php include "Views/Templates/header.php"; ?>
<main id="main" class="main">

<div class="pagetitle">
  <h1>Rol 
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="Rol">Rol</a></li>
      <li class="breadcrumb-item active">Rol</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<div class="btn-group mb-2" role="group" aria-label="">
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#CrearRolModal" id="OpenModCreaRol"><i class="bi bi-person-plus-fill"></i></button>
</div>

<table class="table table-striped " id="TblRol">
    <thead class="table-dark">
        <tr>
            <th>id_Rol</th>
            <th>Nombre</th>
            <th>Estado</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<!-- Modal Crear Rol -->
<div class="modal fade" id="CrearRolModal" tabindex="-1" aria-labelledby="CrearRolModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="CrearRolModalLabel">Crear Rol</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="FrmRegRol">
          <div class="row">
              <input type="hidden"  id="GeRolId"></input>
              <div class="mb-3 col-md-12">
                <label for="GePriNomRol">Nombre del Rol</label>
               <input type="text" class="form-control" id="GePriNomRol" aria-describedby="" placeholder="">
              </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="GeRegRol">Crear</button>
      </div>
    </div>
  </div>
</div>


<section class="section dashboard">
  <div class="row">
  </div>

<?php include "Views/Templates/footer.php"; ?>

