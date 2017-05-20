// Login
$("#login").submit(function(e) {
    e.preventDefault();

    $.ajax({
        type: 'post',
        url: '/transmivyca/controllers/login.php',
        data: $(this).serialize(),
        success: function(data) {
            $("#respuesta").slideDown();
            $("#respuesta").html(data);
        }
    });
    return false;
});


// Registro usuario sistema
$("#registro-usuario").submit(function(e) {
    e.preventDefault();

    $.ajax({
        type: 'post',
        url: '/transmivyca/controllers/registro-usuario.php',
        data: $(this).serialize(),
        success: function(data) {
            $("#respuesta").slideDown();
            $("#respuesta").html(data);
        }
    });
    return false;
});


// Nuevo cliente
$("#nuevo-cliente").submit(function(e) {
    e.preventDefault();

    $.ajax({
        type: 'post',
        url: '/transmivyca/controllers/registro-cliente.php',
        data: $(this).serialize(),
        success: function(data) {
            $("#respuesta").slideDown();
            $("#respuesta").html(data);
        }
    });
    return false;
});


// Obtener cliente
function obtenerCliente(id) {
    var obj = {
        id: id
    }
    
    $.ajax({
        url: '/transmivyca/controllers/obtener-cliente.php',
        data: obj,
        type: 'post',
        dataType: 'json',
        
        // Escribe los datos obtenidos en los campos correspondientes
        success: function (response) {
            $("#id_cliente").val(response.id_cliente);
            $("#rif").val(response.rif);
            $("#razon_social").val(response.razon_social);
            $("#direccion").val(response.direccion);
            $("#telefono").val(response.telefono);
            $("#responsable").val(response.responsable);
            // Lanza la ventana modal
            $('#editarCliente').modal('show');
        }
    });
}


// Editar cliente
$("#editar-cliente").submit(function(e) {
    e.preventDefault();

    $.ajax({
        type: 'post',
        url: '/transmivyca/controllers/editar-cliente.php',
        data: $(this).serialize(),
        success: function(data) {
            $("#respuesta").slideDown();
            $("#respuesta").html(data);
        }
    });
    return false;
});


// Eliminar cliente
function eliminarCliente(id) {    
    swal({
      title: '¿Eliminar Cliente?',
      text: 'Cliente seleccionado será eliminado',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Aceptar',
      closeOnConfirm: false
    },
    function() {
        $.post('/transmivyca/controllers/eliminar-cliente.php', {
            id: id
        });
        swal({
            title: 'Eliminado!',
            text: 'Cliente eliminado satisfactoriamente',
            type: 'success',
            showCancelButton: false,
            confirmButtonText: 'OK',
            closeOnConfirm: false
            },
            function() {
                location.href = '/transmivyca/views/clientes.php';
            });
    });    
}


// Registro chofer
$("#nuevo-chofer").submit(function(e) {
    e.preventDefault();

    $.ajax({
        type: 'post',
        url: '/transmivyca/controllers/registro-chofer.php',
        data: $(this).serialize(),
        success: function(data) {
            $("#respuesta").slideDown();
            $("#respuesta").html(data);
        }
    });
    return false;
});