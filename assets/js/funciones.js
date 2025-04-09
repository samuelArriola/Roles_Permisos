console.log('conectado a funciones.js');
const url = base_url; 

$(document).ready(function () {
    TblUsuario =  $('#TblUsuario').DataTable( {
        ajax: {
            url: base_url + "/Usuario/GetUsuario",
            method : 'POST',
            dataSrc: ''
        },
        columns: [
         {"data": 'id'},
         {"data": 'Nombre'},
         {"data": 'Rol'},
         {"data": 'GenCaja'},
         {"data": 'Estado'},
         {"data": 'Opciones'},
        ]
    });

    TblCliente =  $('#TblCliente').DataTable( {
        ajax: {
            url: base_url + "/Cliente/GetClientes",
            method : 'POST',
            dataSrc: ''
        },
        columns: [
         {"data": 'id'},
         {"data": 'GeNumDniCli'},
         {"data": 'GeNomCli'},
         {"data": 'GeTelefonoCli'},
         {"data": 'Estado'},
         {"data": 'Opciones'},
        ]
    });
    
    TblProducto =  $('#TblProducto').DataTable( {
        ajax: {
            url: base_url + "/Producto/GetProductos",
            method : 'POST',
            dataSrc: ''
        },
        columns: [
         {"data": 'genproductoId'},
         {"data": 'GeProCod'},
         {"data": 'GeProDesc'},
         {"data": 'GeProPreven'},
         {"data": 'GeProStock'},
         {"data": 'GeMedDes'},
         {"data": 'GeCatDes'},
         {"data": 'Estado'},
         {"data": 'Opciones'},
        ]
    });

});



$('#OpenModCrea').click(function (e) {
    $('#CrearUsuModalLabel').html('Crear Usuario');
    $('#GeRegUser').html('Crear');
    $('#DivGeClave').removeClass('d-none');
    $('#DivGeConClave').removeClass('d-none');
    $('#GeUsuId').val("");
    $('#FrmRegUsu')[0].reset();

});

$('#GeRegUser').click(function (e) {
    e.preventDefault();
    
    let GeUsuId = $('#GeUsuId');
    let GePriNom = $('#GePriNom');
    let GeSegNom = $('#GeSegNom');
    let GePriApe = $('#GePriApe');
    let GeSegApe = $('#GeSegApe');
    let GeTipDoc = $('#GeTipDoc');
    let GeNumDoc = $('#GeNumDoc');
    let GeTelefono = $('#GeTelefono');
    let GeCorreo = $('#GeCorreo');
    let GeUsuario = $('#GeUsuario');
    let GeClave = $('#GeClave');
    let GeConClave = $('#GeConClave');
    let GeSexo = $('#GeSexo');
    let GeCaja = $('#GeCaja');
    let GeEstado = $('#GeEstado');

    const datos = {
        GeUsuId: GeUsuId.val(),
        GePriNom: GePriNom.val(),
        GeSegNom: GeSegNom.val(),
        GePriApe: GePriApe.val(),
        GeSegApe: GeSegApe.val(),
        GeTipDoc: GeTipDoc.val(),
        GeNumDoc: GeNumDoc.val(),
        GeTelefono: GeTelefono.val(),
        GeCorreo: GeCorreo.val(),
        GeUsuario: GeUsuario.val(),
        GeClave: GeClave.val(),
        GeConClave: GeConClave.val(),
        GeSexo: GeSexo.val(),
        GeCaja: GeCaja.val(),
        GeEstado: GeEstado.val(),
        
    }
    
    if (isEmpty( GePriNom.val()) || isEmpty( GePriApe.val()) ||
        isEmpty( GeSegApe.val()) || isEmpty( GeTipDoc.val()) || isEmpty( GeNumDoc.val()) ||
        isEmpty( GeTelefono.val()) || isEmpty( GeCorreo.val()) || isEmpty( GeUsuario.val()) || 
        isEmpty( GeSexo.val()) || isEmpty( GeCaja.val()) || isEmpty( GeEstado.val())) {
        Swal.fire({
            title: "Campos vácios",
            text: "Por favor llene todos los campos",
            icon: "error",
            timer: 3000
            });
    }else{
        console.log(datos);
        $.ajax({
            type: "POST",
            url: base_url+"/Usuario/RegistrarUsuario",
            datatype:"json", 
            data: datos,
            success: function(res) {
            res = JSON.parse(res);
            console.log( res );
            if(res.status === "Ok"){
                Swal.fire({
                    title: "Usuario Exitoso",
                    text: "Usuario Creado Exitosamente",
                    icon: "success",
                    timer: 3000
                });
                $('#FrmRegUsu')[0].reset();
                $('#CrearUsuModal').modal('hide');
                TblUsuario.ajax.reload();
            }else if(res.status == 'Existe'){
                Swal.fire({
                    title: "Usuario Existente",
                    text: "El usuario ya se encuentra registrado",
                    icon: "warning",
                    timer: 3000
                  });
            }else if( res.status == 'Actualizado'){
                Swal.fire({
                    title: "Usuario Actualizado",
                    text: "Usuario Actualizado Exitosamente",
                    icon: "success",
                    timer: 3000
                });
                 $('#FrmRegUsu')[0].reset();
                 $('#CrearUsuModal').modal('hide');
                 TblUsuario.ajax.reload();
            }else if( res.status == 'ErrorActualizado'){
                Swal.fire({
                    title: "Error al Actualizado usuario",
                    text: "Usuario ErrorActualizado Exitosamente",
                    icon: "error",
                    timer: 3000
                  });
            }else if(res.status == 'ErrorClave' ){
                Swal.fire({
                    title: "Error de Claves",
                    text: "Las claves no coinciden",
                    icon: "warning",
                    timer: 3000
                });
            }else{
                Swal.fire({
                    title: "Oops Error!!",
                    text: "Error al Crear el Usuario",
                    icon: "error",
                    timer: 3000
                  });
            }
            
            }
        });
    } 
});

function btnEdiUsu(id) {
    $('#CrearUsuModal').modal('show');
    $('#CrearUsuModalLabel').html('Editar Usuario');
    $('#GeRegUser').html('Actualizar');
    $.ajax({
        type: "GET",
        url: base_url+"/Usuario/Editar/"+id,
        datatype:"json", 
        success: function(res) {
        res = JSON.parse(res);
        
        $('#GeUsuId').val(res.id);
        $('#GePriNom').val(res.Nombre);
        $('#GeSegNom').val(res.Nombre2);
        $('#GePriApe').val(res.Apellido);
        $('#GeSegApe').val(res.Apellido2);
        $('#GeTipDoc').val(res.Tipdoc);
        $('#GeNumDoc').val(res.Numdoc);
        $('#GeTelefono').val(res.Telefono);
        $('#GeCorreo').val(res.Correo);
        $('#GeUsuario').val(res.Usuario);
        $('#DivGeClave').addClass('d-none');
        $('#DivGeConClave').addClass('d-none');
        $('#GeSexo').val(res.Sexo); 
        $('#GeCaja').val(res.Gencaja);
        $('#GeEstado').val(res.Rol);
        }
    });
}
 
function DesactivarUsuario( id) {
    $.ajax({
        type: "GET",
        url: base_url+"/Usuario/Desactivar/"+id,
        datatype:"json", 
        success: function(res) {
        res = JSON.parse(res);
            if(res == 1){
                Swal.fire({
                    title: "Usuario Desactivado",
                    text: "Usuario Desactivado Exitosamente",
                    icon: "success",
                    timer: 3000
                });
                TblUsuario.ajax.reload();
            }else{
                Swal.fire({
                    title: "Oops Error!!",
                    text: "Error al momento de desactivar el usuario",
                    icon: "error",
                    timer: 3000
                  });
            }
        }
    });
        

}
function ActivarUsuario(id) {
    $.ajax({
        type: "GET",
        url: base_url+"/Usuario/Activar/"+id,
        datatype:"json", 
        success: function(res) {
        res = JSON.parse(res);
            if(res == 1){
                Swal.fire({
                    title: "Usuario Activado",
                    text: "Usuario Activado Exitosamente",
                    icon: "success",
                    timer: 3000
                });
                TblUsuario.ajax.reload();
            }else{
                Swal.fire({
                    title: "Oops Error!!",
                    text: "Error al momento de Activar el usuario",
                    icon: "error",
                    timer: 3000
                  });
            }
        }
    });
        
}
    
//-------------------------------------------------------------- Fim Usuario --------------------------------------------------

$('#GeRegCli').click(function (e) {
    e.preventDefault();
    
    let GeCliId = $('#GeCliId');
    let GeNumDniCli = $('#GeNumDniCli');
    let GePriNomCli = $('#GePriNomCli');
    let GeTelefonoCli = $('#GeTelefonoCli');

    const datos = {
        GeCliId: GeCliId.val(),
        GeNumDniCli: GeNumDniCli.val(),
        GePriNomCli: GePriNomCli.val(),
        GeTelefonoCli: GeTelefonoCli.val(),
    }
    if (isEmpty( GePriNomCli.val() ) || isEmpty( GeTelefonoCli.val()) || isEmpty( GeNumDniCli.val()) ) {
        Swal.fire({
            title: "Campos vácios",
            text: "Por favor llene todos los campos",
            icon: "error",
            timer: 3000
            });
    }else{
        $.ajax({
            type: "POST",
            url: base_url+"/Cliente/RegistrarCli",
            datatype:"json", 
            data: datos,
            success: function(res) {
            res = JSON.parse(res);
            console.log( res );
            if(res.status === "Ok"){
                Swal.fire({
                    title: "Cliente Exitoso",
                    text: "Cliente Creado Exitosamente",
                    icon: "success",
                    timer: 3000
                });
                 $('#FrmRegCli')[0].reset();
                 $('#CrearCliModal').modal('hide');
                 TblCliente.ajax.reload();
            }else if(res.status == 'Existe'){
                Swal.fire({
                    title: "Cliente Existente",
                    text: "El Cliente ya se encuentra registrado",
                    icon: "warning",
                    timer: 3000
                  });
            }else if( res.status == 'Actualizado'){
                Swal.fire({
                    title: "Cliente Actualizado",
                    text: "Cliente Actualizado Exitosamente",
                    icon: "success",
                    timer: 3000
                });
                  $('#FrmRegCli')[0].reset();
                  $('#CrearCliModal').modal('hide');
                  TblCliente.ajax.reload();
            }else if( res.status == 'ErrorActualizado'){
                Swal.fire({
                    title: "Error al Actualizado Cliente",
                    text: "Cliente ErrorActualizado Exitosamente",
                    icon: "error",
                    timer: 3000
                  });
            }else if(res.status == 'ErrorClave' ){
                Swal.fire({
                    title: "Error de Claves",
                    text: "Las claves no coinciden",
                    icon: "warning",
                    timer: 3000
                });
            }else if(res.status == 'ErroPerCreCli' ){
                Swal.fire({
                    title: "Error de Permiso",
                    text: "No Tiene permisos para crear cliente",
                    icon: "warning",
                    timer: 3000
                });
            }else{
                Swal.fire({
                    title: "Oops Error!!",
                    text: "Error al Crear el Cliente",
                    icon: "error",
                    timer: 3000
                  });
            }
            
            }
        });
    } 
}); 

$('#OpenModCreaCli').click(function (e) {
    $('#CrearCliModalLabel').html('Crear Cliente');
    $('#GeRegCli').html('Crear');
    $('#GeCliId').val("");
    $('#FrmRegCli')[0].reset();

});

function btnEdiCli(id) {
    $('#CrearCliModal').modal('show');
    $('#CrearCliModalLabel').html('Editar Cliente');
    $('#GeRegCli').html('Actualizar');
    $.ajax({
        type: "GET",
        url: base_url+"/Cliente/EditarCli/"+id,
        datatype:"json", 
        success: function(res) {
        res = JSON.parse(res);

        $('#GeCliId').val(res.id);
        $('#GeNumDniCli').val(res.GeNumDniCli);
        $('#GePriNomCli').val(res.GeNomCli);
        $('#GeTelefonoCli').val(res.GeTelefonoCli);
        
        }
    });
}
 
function DesactivarCliente( id) {
    $.ajax({
        type: "GET",
        url: base_url+"/Cliente/DesactivarCli/"+id,
        datatype:"json", 
        success: function(res) {
        res = JSON.parse(res);
            if(res == 1){
                Swal.fire({
                    title: "Cliente Desactivado",
                    text: "Cliente Desactivado Exitosamente",
                    icon: "success",
                    timer: 3000
                });
                TblCliente.ajax.reload();
            }else{
                Swal.fire({
                    title: "Oops Error!!",
                    text: "Error al momento de desactivar el Cliente",
                    icon: "error",
                    timer: 3000
                  });
            }
        }
    });
        

}
function ActivarCliente(id) {
    $.ajax({
        type: "GET",
        url: base_url+"/Cliente/ActivarCli/"+id,
        datatype:"json", 
        success: function(res) {
        res = JSON.parse(res);
            if(res == 1){
                Swal.fire({
                    title: "Cliente Activado",
                    text: "Cliente Activado Exitosamente",
                    icon: "success",
                    timer: 3000
                });
                TblCliente.ajax.reload();
            }else{
                Swal.fire({
                    title: "Oops Error!!",
                    text: "Error al momento de Activar el Cliente",
                    icon: "error",
                    timer: 3000
                  });
            }
        }
    });
        
}


//-------------------------------------------------------------- Fim Cliente  --------------------------------------------------
$('#GeRegPro').click(function (e) {
    e.preventDefault();
    
    let GeProId = $('#GeProId');
    let GeCodPro = $('#GeCodPro');
    let GeNomPro =  $('#GeNomPro');
    let GePreCom = $('#GePreCom');
    let GePreVen = $('#GePreVen');
    let GeProStock = $('#GeProStock');
    let GeMedPro = $('#GeMedPro');
    let GeCatePro = $('#GeCatePro');
    let GeProCant = $('#GeProCant');

    const datos = {
        GeProId: GeProId.val(),
        GeCodPro: GeCodPro.val(),
        GeNomPro: GeNomPro.val(),
        GePreCom: GePreCom.val(),
        GePreVen: GePreVen.val(),
        GeProStock: GeProStock.val(),
        GeMedPro: GeMedPro.val(),
        GeCatePro: GeCatePro.val(),
        GeProCant: GeProCant.val()
    }
    if (isEmpty( GeNomPro.val() || isEmpty( GeCodPro.val()) ||  GeCatePro.val() ) || isEmpty( GeMedPro.val() ) || isEmpty( GeProStock.val() ) || isEmpty( GePreCom.val() ) || isEmpty( GePreVen.val())  || isEmpty( GeProCant.val()) ){
        Swal.fire({
            title: "Campos vácios",
            text: "Por favor llene todos los campos",
            icon: "error",
            timer: 3000
            });
    }else{
        console.log(datos);
         $.ajax({
             type: "POST",
             url: base_url+"/Producto/RegistrarPro",
             datatype:"json", 
             data: datos,
            success: function(res) {
             res = JSON.parse(res);
             console.log( res );
            if(res.status === "Ok"){
                Swal.fire({
                    title: "Producto Exitoso",
                    text: "Producto Creado Exitosamente",
                    icon: "success",
                    timer: 3000
                });
                 $('#FrmRegPro')[0].reset();
                 $('#CrearProModal').modal('hide');
                 TblProducto.ajax.reload();
            }else if(res.status == 'Existe'){
                Swal.fire({
                    title: "Producto Existente",
                    text: "El Producto ya se encuentra registrado",
                    icon: "warning",
                    timer: 3000
                  });
            }else if( res.status == 'Actualizado'){
                Swal.fire({
                    title: "Producto Actualizado",
                    text: "Producto Actualizado Exitosamente",
                    icon: "success",
                    timer: 3000
                });
                  $('#FrmRegPro')[0].reset();
                  $('#CrearProModal').modal('hide');
                  TblProducto.ajax.reload();
            }else if( res.status == 'ErrorActualizado'){
                Swal.fire({
                    title: "Error al Actualizado Producto",
                    text: "Producto ErrorActualizado Exitosamente",
                    icon: "error",
                    timer: 3000
                  });
            }else if(res.status == 'ErrorClave' ){
                Swal.fire({
                    title: "Error de Claves",
                    text: "Las claves no coinciden",
                    icon: "warning",
                    timer: 3000
                });
            }else{
                Swal.fire({
                    title: "Oops Error!!",
                    text: "Error al Crear el Producto",
                    icon: "error",
                    timer: 3000
                  });
            }
            
            }
        });
    } 
}); 

$('#OpenModCreaPro').click(function (e) {
    $('#CrearProModalLabel').html('Crear Producto');
    $('#GeRegPro').html('Crear');
    $('#GeProId').val("");
    $('#FrmRegPro')[0].reset();

});

function btnEdiPro(id) {
    $('#CrearProModal').modal('show');
    $('#CrearProModalLabel').html('Editar Producto');
    $('#GeRegPro').html('Actualizar');
    $.ajax({
        type: "GET",
        url: base_url+"/Producto/EditarPro/"+id,
        datatype:"json", 
        success: function(res) {
        res = JSON.parse(res);
            console.log(res);
            
        $('#GeProId').val(res.id);
        $('#GeCodPro').val(res.GeProCod);
        $('#GeNomPro').val(res.GeProDesc);
        $('#GePreCom').val(res.GeProPreCom);
        $('#GePreVen').val(res.GeProPreven);
        $('#GeProStock').val(res.GeProStock);
        $('#GeProCant').val(res.GeProCan);
        $('#GeMedPro').val(res.GeMedId);
        $('#GeCatePro').val(res.GeCatID);
        
        }
    });
}
 
function DesactivarProducto( id) {
    $.ajax({
        type: "GET",
        url: base_url+"/Producto/DesactivarPro/"+id,
        datatype:"json", 
        success: function(res) {
        res = JSON.parse(res);
            if(res == 1){
                Swal.fire({
                    title: "Producto Desactivado",
                    text: "Producto Desactivado Exitosamente",
                    icon: "success",
                    timer: 3000
                });
                TblProducto.ajax.reload();
            }else{
                Swal.fire({
                    title: "Oops Error!!",
                    text: "Error al momento de desactivar el Producto",
                    icon: "error",
                    timer: 3000
                  });
            }
        }
    });
        

}
function ActivarProducto(id) {
    $.ajax({
        type: "GET",
        url: base_url+"/Producto/ActivarPro/"+id,
        datatype:"json", 
        success: function(res) {
        res = JSON.parse(res);
            if(res == 1){
                Swal.fire({
                    title: "Producto Activado",
                    text: "Producto Activado Exitosamente",
                    icon: "success",
                    timer: 3000
                });
                TblProducto.ajax.reload();
            }else{
                Swal.fire({
                    title: "Oops Error!!",
                    text: "Error al momento de Activar el Producto",
                    icon: "error",
                    timer: 3000
                  });
            }
        }
    });
        
}



//--------------------------------------------------------------  --------------------------------------------------

function RegistrarPermisos(e) {
    e.preventDefault();    
    let permisos = [];
    let id_usuario = $("#id_usuario").val(); // Asegúrate de que este campo existe en tu formulario
    

    // Guardo los Modulos
    $(".modulo").each(function () {
        let id_modulo = $(this).attr("id");
        let tienePermiso = false;
        let id_id_Modulo ;
        $(`.submenu[data-modulo="${id_modulo}"]`).each(function () {
            let nombre = $(this).attr("id").split("_")[1];
             id_id_Modulo =  id_modulo.split("_")[2]; // Usa el ID del permiso
            if (
                $(`#${nombre}Crear`).is(":checked") ||
                $(`#${nombre}Leer`).is(":checked") ||
                $(`#${nombre}Actualizar`).is(":checked") ||
                $(`#${nombre}Eliminar`).is(":checked")
            ) {
                tienePermiso = true;
            }
            
        });
    
        if (tienePermiso) {
            permisos.push({
                id_permiso: id_id_Modulo,
                c: 0,
                r: 0,
                u: 0,
                d: 0
            });
        }

    });

    //Recorre cada opción de submenu
    $(".submenu").each(function () {
        let Nombre_permiso = $(this).attr("id").split("_")[1]; // Usa el ID del permiso
        let Id_permiso = $(this).attr("id").split("_")[2]; // Usa el ID del permiso
      
        let c = $(`#${Nombre_permiso}Crear`).is(":checked") ? 1 : 0;
        let r = $(`#${Nombre_permiso}Leer`).is(":checked") ? 1 : 0;
        let u = $(`#${Nombre_permiso}Actualizar`).is(":checked") ? 1 : 0;
        let d = $(`#${Nombre_permiso}Eliminar`).is(":checked") ? 1 : 0;

        if (c || r || u || d) { // Solo guarda los permisos si  hay al menos un permiso seleccionado
            permisos.push({
                id_permiso: Id_permiso,
                c: c,
                r: r,
                u: u,
                d: d
            });
        }
    });


    if(Array.isArray(permisos) && permisos.length === 0 ){
        Swal.fire({
            title: "Permiso vácio",
            text: "Upss!! Debe seleccionar al menos un permiso.",
            icon: "warning",
            timer: 3000
        });
    }else{
        $.ajax({
            type: "POST",
            url: base_url+"Usuario/RegistrarPermiso",
            data: JSON.stringify({ id_usuario: id_usuario, permisos: permisos }),
            contentType: "application/json",
            dataType: "json",
            success: function(res) {
               // res = JSON.parse(res);
                console.log(res);
                
                if(res['status'] == 'Ok'){
                    Swal.fire({
                        title: "Permisos Cargados",
                        text: "Permisos Cargados Exitosamente",
                        icon: "success",
                        timer: 3000
                    });
                    TblProducto.ajax.reload();
                }else{
                    Swal.fire({
                        title: "Oops Error!!",
                        text: "Error al momento cargar los permisos",
                        icon: "error",
                        timer: 3000
                    });
                }
            }
        });  
    }
    
}

$(".form-check-input").on("click", function(event) {
    event.stopPropagation(); // Detiene la propagación del evento para que no active el colapso
    console.log('Check al modulo');
    
});

 // Cuando el usuario marca una opción principal, marca todas las acciones relacionadas
 $(".submenu").change(function () {
    let group = $(this).data("parent"); // Obtiene el identificador del grupo
    let isChecked = $(this).prop("checked"); // Verifica si está marcado
    $(`.permiso[data-parent="${group}"]`).prop("checked", isChecked); // Marca o desmarca todas las acciones dentro del mismo grupo
});

// Cuando un usuario desmarca todas las acciones, desmarca la opción principal
$(".permiso").change(function () {
    let parent = $(this).data("parent"); // Obtiene el identificador del grupo
    let allUnchecked = $(`.permiso[data-parent="${parent}"]:checked`).length === 0;  // Si todas las acciones están desmarcadas, también desmarcamos la opción principal
    $(`.submenu[data-parent="${parent}"]`).prop("checked", !allUnchecked);
});

//--------------------------------------------------------------  fin permisos--------------------------------------------------

function isEmpty(dato) {
    return (!dato || 0 === dato.length);
}