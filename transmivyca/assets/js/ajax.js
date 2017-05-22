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
    };
    
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


// Obtener chofer
function obtenerChofer(id) {
    var obj = {
        id: id
    }
    
    $.ajax({
        url: '/transmivyca/controllers/obtener-chofer.php',
        data: obj,
        type: 'post',
        dataType: 'json',
        
        // Escribe los datos obtenidos en los campos correspondientes
        success: function (response) {
            $("#id_chofer").val(response.id_chofer);
            $("#cedula").val(response.cedula);
            $("#nombre").val(response.nombre);
            $("#apellido").val(response.apellido);
            $("#direccion").val(response.direccion);
            $("#telefono").val(response.telefono);
            // Lanza la ventana modal
            $('#editarChofer').modal('show');
        }
    });
}


// Editar chofer
$("#editar-chofer").submit(function(e) {
    e.preventDefault();

    $.ajax({
        type: 'post',
        url: '/transmivyca/controllers/editar-chofer.php',
        data: $(this).serialize(),
        success: function(data) {
            $("#respuesta").slideDown();
            $("#respuesta").html(data);
        }
    });
    return false;
});


// Eliminar chofer
function eliminarChofer(id) {    
    swal({
      title: '¿Eliminar Chofer?',
      text: 'Chofer seleccionado será eliminado',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Aceptar',
      closeOnConfirm: false
    },
    function() {
        $.post('/transmivyca/controllers/eliminar-chofer.php', {
            id: id
        });
        swal({
            title: 'Eliminado!',
            text: 'Chofer eliminado satisfactoriamente',
            type: 'success',
            showCancelButton: false,
            confirmButtonText: 'OK',
            closeOnConfirm: false
            },
            function() {
                location.href = '/transmivyca/views/chofer.php';
            });
    });    
}


// Registro chuto
$("#nuevo-chuto").submit(function(e) {
    e.preventDefault();

    $.ajax({
        type: 'post',
        url: '/transmivyca/controllers/registro-chuto.php',
        data: $(this).serialize(),
        success: function(data) {
            $("#respuesta").slideDown();
            $("#respuesta").html(data);
        }
    });
    return false;
});


// Obtener chuto
function obtenerChuto(id) {
    var obj = {
        id: id
    }
    
    $.ajax({
        url: '/transmivyca/controllers/obtener-chuto.php',
        data: obj,
        type: 'post',
        dataType: 'json',
        
        // Escribe los datos obtenidos en los campos correspondientes
        success: function (response) {
            $("#id_chuto").val(response.id_chuto);
            $("#serial_motor").val(response.serial_motor);
            $("#serial_carroceria").val(response.serial_carroceria);
            // Lanza la ventana modal
            $('#editarChuto').modal('show');
        }
    });
}


// Editar chuto
$("#editar-chuto").submit(function(e) {
    e.preventDefault();

    $.ajax({
        type: 'post',
        url: '/transmivyca/controllers/editar-chuto.php',
        data: $(this).serialize(),
        success: function(data) {
            $("#respuesta").slideDown();
            $("#respuesta").html(data);
        }
    });
    return false;
});


// Eliminar chuto
function eliminarChuto(id) {    
    swal({
      title: '¿Eliminar Chuto?',
      text: 'Chuto seleccionado será eliminado',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Aceptar',
      closeOnConfirm: false
    },
    function() {
        $.post('/transmivyca/controllers/eliminar-chuto.php', {
            id: id
        });
        swal({
            title: 'Eliminado!',
            text: 'Chuto eliminado satisfactoriamente',
            type: 'success',
            showCancelButton: false,
            confirmButtonText: 'OK',
            closeOnConfirm: false
            },
            function() {
                location.href = '/transmivyca/views/chutos.php';
            });
    });    
}


// Registro destino
$("#nuevo-destino").submit(function(e) {
    e.preventDefault();

    $.ajax({
        type: 'post',
        url: '/transmivyca/controllers/registro-destino.php',
        data: $(this).serialize(),
        success: function(data) {
            $("#respuesta").slideDown();
            $("#respuesta").html(data);
        }
    });
    return false;
});


// Obtener destino
function obtenerDestino(id) {
    var obj = {
        id: id
    }
    
    $.ajax({
        url: '/transmivyca/controllers/obtener-destino.php',
        data: obj,
        type: 'post',
        dataType: 'json',
        
        // Escribe los datos obtenidos en los campos correspondientes
        success: function (response) {
            $("#id_destino").val(response.id_destino);
            $("#destino").val(response.destino);
            $("#distancia").val(response.distancia);
            // Lanza la ventana modal
            $('#editarDestino').modal('show');
        }
    });
}


// Editar destino
$("#editar-destino").submit(function(e) {
    e.preventDefault();

    $.ajax({
        type: 'post',
        url: '/transmivyca/controllers/editar-destino.php',
        data: $(this).serialize(),
        success: function(data) {
            $("#respuesta").slideDown();
            $("#respuesta").html(data);
        }
    });
    return false;
});


// Eliminar destino
function eliminarDestino(id) {    
    swal({
      title: '¿Eliminar Destino?',
      text: 'Destino seleccionado será eliminado',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Aceptar',
      closeOnConfirm: false
    },
    function() {
        $.post('/transmivyca/controllers/eliminar-destino.php', {
            id: id
        });
        swal({
            title: 'Eliminado!',
            text: 'Destino eliminado satisfactoriamente',
            type: 'success',
            showCancelButton: false,
            confirmButtonText: 'OK',
            closeOnConfirm: false
            },
            function() {
                location.href = '/transmivyca/views/destinos.php';
            });
    });    
}


// Registro viatico
$("#nuevo-viatico").submit(function(e) {
    e.preventDefault();

    $.ajax({
        type: 'post',
        url: '/transmivyca/controllers/registro-viatico.php',
        data: $(this).serialize(),
        success: function(data) {
            $("#respuesta").slideDown();
            $("#respuesta").html(data);
        }
    });
    return false;
});


// Obtener viatico
function obtenerViatico(id) {
    var obj = {
        id: id
    }
    
    $.ajax({
        url: '/transmivyca/controllers/obtener-viatico.php',
        data: obj,
        type: 'post',
        dataType: 'json',
        
        // Escribe los datos obtenidos en los campos correspondientes
        success: function (response) {
            $("#id_viaticos").val(response.id_viaticos);
            $("#peaje").val(response.peaje);
            $("#comida").val(response.comida);
            $("#combustible").val(response.combustible);
            $("#otros").val(response.otros);
            // Lanza la ventana modal
            $('#editarViatico').modal('show');
        }
    });
}


// Editar viatico
$("#editar-viatico").submit(function(e) {
    e.preventDefault();

    $.ajax({
        type: 'post',
        url: '/transmivyca/controllers/editar-viatico.php',
        data: $(this).serialize(),
        success: function(data) {
            $("#respuesta").slideDown();
            $("#respuesta").html(data);
        }
    });
    return false;
});


// Eliminar viatico
function eliminarViatico(id) {    
    swal({
      title: '¿Eliminar Viático?',
      text: 'Viático seleccionado será eliminado',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Aceptar',
      closeOnConfirm: false
    },
    function() {
        $.post('/transmivyca/controllers/eliminar-viatico.php', {
            id: id
        });
        swal({
            title: 'Eliminado!',
            text: 'Viático eliminado satisfactoriamente',
            type: 'success',
            showCancelButton: false,
            confirmButtonText: 'OK',
            closeOnConfirm: false
            },
            function() {
                location.href = '/transmivyca/views/viaticos.php';
            });
    });    
}