console.log('Conetado a Rol JS');
const url = base_url; // base_url es una variable global definida en el archivo header.php
    
$(document).ready(function () {

    TblRol = $('#TblRol').DataTable({
        ajax: {
            url: url+"/Rol/GetRol",
            type: "POST",
            dataSrc: ""
        },
        columns: [
            { "data": "id_rol" },
            { "data": "Nombre_rol" },
            { "data": "Estado" },
            { "data": "Opciones" },
        ]
    });
    
});


$('#GeRegRol').click(function (e) {
    e.preventDefault();
    
    let GeNomRol = $('#GeNomRol').val(); 
    let GeRolId = $('#GeRolId').val(); 
    let data = {
        GeNomRol: GeNomRol,
        GeRolId: GeRolId
    }

    if( isEmpty(GeNomRol)){
        Swal.fire({
            title: "Campos vácios",
            text: "Por favor llene todos los campos",
            icon: "error",
            timer: 3000
            });
    }else{
        $.ajax({
            type: "POST",
            url: base_url+"/Rol/RegistrarRol",
            datatype:"json", 
            data: data,
           success: function(res) {
            res = JSON.parse(res);
            console.log( res );
           if(res.status === "Ok"){
               Swal.fire({
                   title: "Rol Exitoso",
                   text: "Rol Creado Exitosamente",
                   icon: "success",
                   timer: 3000
               });
                $('#FrmRegRol')[0].reset();
                $('#CrearRolModal').modal('hide');
                TblRol.ajax.reload();
           }else if(res.status == 'Existe'){
               Swal.fire({
                   title: "Rol Existente",
                   text: "El Rol ya se encuentra registrado",
                   icon: "warning",
                   timer: 3000
                 });
           }else if( res.status == 'Actualizado'){
               Swal.fire({
                   title: "Rol Actualizado",
                   text: "Rol Actualizado Exitosamente",
                   icon: "success",
                   timer: 3000
               });
                 $('#FrmRegRol')[0].reset();
                 $('#CrearRolModal').modal('hide');
                 TblRol.ajax.reload();
            }else if(res.status == 'ErrorPermisoActualizar'){
               Swal.fire({
                   title: "Oops Error de Permiso!!",
                   text: "No tiene permiso para Actualizar el Rol",
                   icon: "warning",
                   timer: 3000
                 });
            }else if(res.status == 'ErrorPermisoRegistrar'){
               Swal.fire({
                   title: "Oops Error de Permiso!!",
                   text: "No tiene permiso para Registrar Roles",
                   icon: "warning",
                   timer: 3000
                 });
           }else{
               Swal.fire({
                   title: "Oops Error!!",
                   text: "Error al Crear el Rol",
                   icon: "error",
                   timer: 3000
                 });
           }
           
           }
       });
    }
});

$('#OpenModRolCrea').click(function (e) {
    console.log('Abriendo modal de crear rol');
    
    $('#CrearRolModalLabel').html('Crea Rol');
    $('#GeRegRol').html('Crea');
    $('#GeRolId').val("");
    $('#FrmRegRol')[0].reset();

});

function BtnEditarRol(id) {
    $('#CrearRolModal').modal('show');
    $('#CrearRolModalLabel').html('Editar Rol');
    $('#GeRegRol').html('Actualizar');
    $.ajax({
        type: "GET",
        url: base_url+"/Rol/EditarRol/"+id,
        datatype:"json", 
        success: function(res) {
        res = JSON.parse(res);
        $('#GeNomRol').val(res.Nombre_rol);
        $('#GeRolId').val(res.id_rol);
        }
    });
}

function isEmpty(data) {
     return (data.length === 0 || !data)
}

function DesactivarRol(id) {
    $.ajax({
        type: "GET",
        url: base_url+"/Rol/Desactivar/"+id,
        datatype:"json", 
        success: function(res) {
        res = JSON.parse(res);
            if(res == "Ok"){
                Swal.fire({
                    title: "Rol Desactivado",
                    text: "Rol Desactivado Exitosamente",
                    icon: "success",
                    timer: 3000
                });
                TblRol.ajax.reload();
            }else if(res == "ErrorPermisoEliminar"){
                Swal.fire({
                    title: "Oops Error de Permiso!!",
                    text: "No tiene permiso para Desactivar el Rol",
                    icon: "warning",
                    timer: 3000
                  });
            }else{
                Swal.fire({
                    title: "Oops Error!!",
                    text: "Error al momento de desactivar el Rol",
                    icon: "error",
                    timer: 3000
                  });
            }
        }
    });
}
function ActivarRol(id) {
    $.ajax({
        type: "GET",
        url: base_url+"/Rol/Activar/"+id,
        datatype:"json", 
        success: function(res) {
        res = JSON.parse(res);
            if(res == 1){
                Swal.fire({
                    title: "Rol Activado",
                    text: "Rol Activado Exitosamente",
                    icon: "success",
                    timer: 3000
                });
                TblRol.ajax.reload();
            }else{
                Swal.fire({
                    title: "Oops Error!!",
                    text: "Error al momento de Activar el Rol",
                    icon: "error",
                    timer: 3000
                  });
            }
        }
    });
        
}