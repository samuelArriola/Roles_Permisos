<?php include "Views/Templates/header.php"; ?>
<main id="main" class="main">

<div class="pagetitle">
  <h1>Producto 
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="Producto">Home</a></li>
      <li class="breadcrumb-item active">Producto</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<div class="btn-group mb-2" role="group" aria-label="">
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#CrearProModal" id="OpenModCreaPro"><i class="bi bi-person-plus-fill"></i></button>
</div>

<table class="table table-striped " id="TblProducto">
    <thead class="table-dark">
        <tr>
            <th>id</th>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Precio venta</th>
            <th>Stock</th>
            <th>Unidad</th>
            <th>Categoria</th>
            <th>Activo</th> 
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<!-- Modal Crear Producto -->
<div class="modal fade" id="CrearProModal" tabindex="-1" aria-labelledby="CrearProModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="CrearProModalLabel">Crear Producto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="FrmRegPro">
          <div class="row">
            <input type="hidden"  id="GeProId"></input>
            <div class="mb-3 col-md-6">
              <label for="GeCodPro">Código</label>
              <input type="text" class="form-control" id="GeCodPro" aria-describedby="" placeholder="">
            </div>
            <div class="mb-3 col-md-6">
              <label for="GeNomPro">Nombre</label>
              <input type="text" class="form-control" id="GeNomPro"></input>
            </div>
            <div class="mb-3 col-md-6">
              <label for="GePreCom">Precio Compra</label>
              <input type="text" class="form-control" id="GePreCom" placeholder=""></input>
            </div>
            <div class="mb-3 col-md-6">
              <label for="GePreVen">Precio venta</label>
              <input type="text" class="form-control" id="GePreVen" placeholder=""></input>
            </div>
            <div class="mb-3 col-md-6">
              <label for="GeProStock">Stock</label>
              <input type="number" class="form-control" id="GeProStock" placeholder=""></input>
            </div>
            <div class="mb-3 col-md-6">
              <label for="GeProCant">Cantidad</label>
              <input type="text" class="form-control" id="GeProCant"></input>
            </div>
            <div class="mb-3 col-md-6">
              <div class="form-group">
                <label for="GeMedPro">Medida</label>
                <select class="form-control" name="" id="GeMedPro">
                  <option value="">Seleccione una opción</option>
                   <?php  for ($i=0; $i < count($data['Medidas']) ; $i++) {  ?>
                       <option value="<?php echo $data['Medidas'][$i]['id']; ?>"><?php echo $data['Medidas'][$i]['GeMedDes']; ?></option>
                  <?php   } ?>
                </select>
              </div>             
            </div>
            <div class="mb-3 col-md-6">
              <div class="form-group">
                <label for="GeCatePro">Categoria</label>
                <select class="form-control" name="" id="GeCatePro">
                  <option value="">Seleccione una opción</option>
                   <?php  for ($i=0; $i < count($data['Categoria']) ; $i++) {  ?>
                       <option value="<?php echo $data['Categoria'][$i]['id']; ?>"><?php echo $data['Categoria'][$i]['GeCatDes']; ?></option>
                  <?php   } ?>
                 
                </select>
              </div>              
      
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="GeRegPro">Crear</button>
      </div>
    </div>
  </div>
</div>


<section class="section dashboard">
  <div class="row">
  </div>

<?php include "Views/Templates/footer.php"; ?>

