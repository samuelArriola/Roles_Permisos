<?php include "Views/Templates/header.php";?>
<main id="main" class="main">

 
  <div class="pagetitle">
    <h1>Usuario Permiso 
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="Usuario/Permiso">Home</a></li>
        <li class="breadcrumb-item active">Usuario Permiso</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section dashboard">
    <div class="row">
      <div class="col-md-10 mx-auto">
        <div class="card">
          <div class="card-header text-center">
            <div class="col-md-6 mx-auto ">
              <h5 class="card-title">Asignar Permisosss</h5>
            </div>
          </div>
          <form action="" id="CargarPermiso" onsubmit="RegistrarPermisos(event)">
           
            <div class="card-body"> <br>
              <div class="row">
                  <div class="accordion " id="accordionExample">
                    <input  type="hidden" id="id_usuario" value="<?php echo $data['id_usuario'];?>">
                      <!-- PINTAR LOS MODULOS -->
                      <?php foreach ($data['MenuAll'] as $MenuAll) { 
                        if ($MenuAll['ruta'] === '#') { ?>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="heading<?php echo "{$MenuAll['id']}{$MenuAll['permiso']}"; ?>">
                          <button class="accordion-button  <?php echo isset($data['PermisoUsu'][$MenuAll['id']]) ? '' : 'collapsed' ; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo "{$MenuAll['id']}{$MenuAll['permiso']}"; ?>" aria-expanded="false" aria-controls="<?php echo "{$MenuAll['id']}{$MenuAll['permiso']}"; ?>">
                            <div class="form-check" style="display:none" >
                                <input class="form-check-input modulo" type="checkbox"  id="modulo_<?php echo "{$MenuAll['permiso']}_{$MenuAll['id']}"; ?>"  data-idmodulo="<?php echo $MenuAll['id']; ?>"  >
                            </div>  
                              <?php echo $MenuAll['permiso'] ?>
                          </button>
                        </h2>
                          <div id="<?php echo "{$MenuAll['id']}{$MenuAll['permiso']}"; ?>" class="accordion-collapse collapse <?php echo isset($data['PermisoUsu'][$MenuAll['id']]) ? 'show' : '' ;?>" aria-labelledby="heading<?php echo "{$MenuAll['id']}{$MenuAll['permiso']}"; ?>" >
                            <div class="accordion-body">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col">Opción</th>
                                  <th scope="col">Crear</th>
                                  <th scope="col">Leer</th>
                                  <th scope="col">Editar</th>
                                  <th scope="col">Delete</th>
                                </tr>
                              </thead>
                              <tbody>
                                <!-- PINTAR LOS SUBMENU -->
                                <?php foreach ($data['SubMenuAll'] as $SubMenuAll ) {
                                  if ($SubMenuAll['menu_id'] === $MenuAll['id']) {?>
                                    <tr>
                                      <!-- <div class="Divsubmenu"> -->
                                        <th scope="row">
                                          <div class="form-check">
                                              <input class="form-check-input submenu" type="checkbox" data-modulo="modulo_<?php echo "{$MenuAll['permiso']}_{$MenuAll['id']}"; ?>" id="submenu_<?php echo "{$SubMenuAll['permiso']}_{$SubMenuAll['id']}";?>" data-parent="submenu_<?php echo $SubMenuAll['permiso'];?>"  <?php echo isset($data['PermisoUsu'][$SubMenuAll['id']]) ? 'checked' : '' ; ?>>
                                              <label class="form-check-label" for="submenu<?php echo $SubMenuAll['permiso'];?>"><?php echo $SubMenuAll['permiso'];?></label>
                                          </div>
                                        </th>
                                        <!-- PINTAR LAS ACCIONES -->
                                        <div class="permisos">
                                  
                                          <td>
                                              <input class="form-check-input permiso" type="checkbox"
                                                  id="<?php echo $SubMenuAll['permiso'];?>Crear"
                                                  data-parent="submenu_<?php echo $SubMenuAll['permiso'];?>"
                                                  <?php echo (!empty($data['PermisoUsu'][$SubMenuAll['id']]) && $data['PermisoUsu'][$SubMenuAll['id']]['c'] == 1) ? 'checked' : ''; ?>>
                                              <label for="<?php echo $SubMenuAll['permiso'];?>Crear"></label>
                                          </td>

                                          <td>
                                              <input class="form-check-input permiso" type="checkbox"
                                                  id="<?php echo $SubMenuAll['permiso'];?>Leer"
                                                  data-parent="submenu_<?php echo $SubMenuAll['permiso'];?>"
                                                  <?php echo (!empty($data['PermisoUsu'][$SubMenuAll['id']]) && $data['PermisoUsu'][$SubMenuAll['id']]['r'] == 1) ? 'checked' : ''; ?>>
                                              <label for="<?php echo $SubMenuAll['permiso'];?>Leer"></label>
                                          </td>

                                          <td>
                                              <input class="form-check-input permiso" type="checkbox"
                                                  id="<?php echo $SubMenuAll['permiso'];?>Actualizar"
                                                  data-parent="submenu_<?php echo $SubMenuAll['permiso'];?>"
                                                  <?php echo (!empty($data['PermisoUsu'][$SubMenuAll['id']]) && $data['PermisoUsu'][$SubMenuAll['id']]['u'] == 1) ? 'checked' : ''; ?>>
                                              <label for="<?php echo $SubMenuAll['permiso'];?>Actualizar"></label>
                                          </td>

                                          <td>
                                              <input class="form-check-input permiso" type="checkbox"
                                                  id="<?php echo $SubMenuAll['permiso'];?>Eliminar"
                                                  data-parent="submenu_<?php echo $SubMenuAll['permiso'];?>"
                                                  <?php echo (!empty($data['PermisoUsu'][$SubMenuAll['id']]) && $data['PermisoUsu'][$SubMenuAll['id']]['d'] == 1) ? 'checked' : ''; ?>>
                                              <label for="<?php echo $SubMenuAll['permiso'];?>Eliminar"></label>
                                          </td>
                                         
                                        </div>
                                      </div>
                                    </tr>
                                <?php }} ?>
                              </tbody>
                            </table>
                            </div>
                          </div>
                      </div>
                      <?php } } ?>
                  </div>
              </div>
            </div>                    
            <div class="card-footer text-center">
              <button type="submit" id="" class="btn btn-primary btn-mg btn-block">Actualizar</button>
              <a href="<?php echo base_url ?>/Usuario" id="" class="btn btn-danger btn-mg btn-block">Cancelar</a>
            </div>
          </form>
        </div>  
      </div>
    </div>

<?php include "Views/Templates/footer.php"; ?>
