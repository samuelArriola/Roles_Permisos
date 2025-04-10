<?php include "Views/Templates/header.php"; ?>
<main id="main" class="main">

<div class="pagetitle">
  <h1>Usuario 
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="Usuario">Home</a></li>
      <li class="breadcrumb-item active">Usuario</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<div class="btn-group mb-2" role="group" aria-label="">
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#CrearUsuModal" id="OpenModCrea"><i class="bi bi-person-plus-fill"></i></button>
</div>

<table class="table table-striped " id="TblUsuario">
    <thead class="table-dark">
        <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Rol</th>
            <th>Activo</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<!-- Modal Crear Usuario -->
<div class="modal fade" id="CrearUsuModal" tabindex="-1" aria-labelledby="CrearUsuModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="CrearUsuModalLabel">Crear Usuario</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="FrmRegUsu">
          <div class="row">
            <input type="hidden"  id="GeUsuId"></input>
            <div class="mb-3 col-md-6">
              <label for="GePriNom">Primer Nombre</label>
              <input type="text" class="form-control" id="GePriNom" aria-describedby="" placeholder="">
            </div>
            <div class="mb-3 col-md-6">
              <label for="GeSegNom">Segundo Nombre</label>
              <input type="text" class="form-control" id="GeSegNom"></input>
            </div>
            <div class="mb-3 col-md-6">
              <label for="GePriApe">Primer Apellido</label>
              <input type="text" class="form-control" id="GePriApe" placeholder=""></input>
            </div>
            <div class="mb-3 col-md-6">
              <label for="GeSegApe">Segundo Apellido</label>
              <input type="text" class="form-control" id="GeSegApe" placeholder=""></input>
            </div>
            <div class="mb-3 col-md-4">
              <label for="GeTipDoc">Tipo Documento</label>
              <input type="text" class="form-control" id="GeTipDoc" placeholder=""></input>
            </div>
            <div class="mb-3 col-md-8">
              <label for="GeNumDoc">Número Documento</label>
              <input type="text" class="form-control" id="GeNumDoc" placeholder=""></input>
            </div>
            <div class="mb-3 col-md-6">
              <label for="GeTelefono">Telefono</label>
              <input type="text" class="form-control" id="GeTelefono"></input>
            </div>
            <div class="mb-3 col-md-6">
              <label for="GeCorreo">Correo</label>
              <input type="text" class="form-control" id="GeCorreo"></input>
            </div>
            <div class="mb-3 col-md-12">
              <label for="GeUsuario">Usuario</label>
              <input type="text" class="form-control" id="GeUsuario"></input>
            </div>
            <div class="mb-3 col-md-6" id="DivGeClave">
              <label for="GeClave">Clave</label>
              <input type="password" class="form-control" id="GeClave" aria-describedby="passwordHelpInline"></input>
            </div>
            <div class="mb-3 col-md-6" id="DivGeConClave">
              <label for="GeConClave">Confirmar Clave</label>
              <input type="password" class="form-control" id="GeConClave" aria-describedby="passwordHelpInline"></input>
            </div>
            <div class="mb-3 col-md-4">
              <label for="GeSexo">Sexo</label>
              <input type="text" class="form-control" id="GeSexo" placeholder=""></input>
            </div>
            <div class="mb-3 col-md-4">
              <div class="form-group">
                <label for="GeRol">Rol</label>
                <select class="form-control" name="" id="GeRol">
                  <option value="">Seleccione una opción</option>
                  <?php for ($i=0; $i < count($data) ; $i++) {  ?>
                       <option value="<?php echo $data[$i]['id_rol']; ?>"> <?php echo $data[$i]['Nombre_rol']; ?></option>
                  <?php   }?>
                 
                </select>
              </div>             
            </div>
            <div class="mb-3 col-md-4">
              <label for="GeEstado">Estado</label>
              <input type="text" class="form-control" id="GeEstado" placeholder=""></input>
            </div>
            
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="GeRegUser">Crear</button>
      </div>
    </div>
  </div>
</div>

<section class="section dashboard">
  <div class="row">
  </div>

<?php include "Views/Templates/footer.php"; ?>

