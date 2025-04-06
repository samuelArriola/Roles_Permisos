console.log('Conetado a login.js');

$('#btnformLogin').click(function (e) {
    e.preventDefault();

    const usuario = $('#Username');
    const clave = $('#Password');


    if(isEmpty(usuario.val())){
        clave.removeClass("is-invalid");
        usuario.addClass("is-invalid");
        usuario.focus();
    }else if (isEmpty(clave.val())){
        usuario.removeClass("is-invalid");
        clave.addClass("is-invalid");
        clave.focus();
    }else{
        $.ajax({
            type: "POST",
            url: base_url+"/Usuario/Validar",
            datatype:"json", 
            data: {
                usuario: usuario.val(),
                clave: clave.val() 
            },
            success: function(res) {
            console.log(res);
            res = JSON.parse(res);
                if(res.status === "Ok"){
                    window.location = base_url + "Usuario";
                }else{
                   let divAlerta = $('#alerta');
                   divAlerta.removeClass('d-none');
                   divAlerta.html(res.mensaje);
                }
            }
        });

    }
});

function isEmpty(dato) {
    return (!dato || 0 === dato.length);
}