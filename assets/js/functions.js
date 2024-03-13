
function confirmarEliminar($id) {
    swal({
        title: "¿Estás seguro?",
        text: "Una vez eliminado, no podrás recuperar este producto",
        icon: "warning",
        buttons: ["Cancelar", "Eliminar"],
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            // Si el usuario confirma la eliminación, realiza la petición AJAX
            $.ajax({
                type: "GET",
                url: "?c=productos&a=Borrar&id=" + $id,
                success: function (data) {
                    // Actualiza la vista o realiza las acciones necesarias en caso de éxito
                    swal("¡El producto ha sido eliminado correctamente!", {
                        icon: "success",
                    });
                  // Recarga la página después de tres segundos
                 setTimeout(function() {
                 location.reload();
                 }, 2000); // 3000 milisegundos = 3 segundos

                },
                error: function () {
                    // En caso de error en la petición AJAX
                    swal("¡Error!", "Hubo un problema al intentar eliminar el producto", "error");
                }
            });
        } else {
            // Si el usuario cancela la eliminación, muestra un mensaje de cancelación
            swal("La eliminación ha sido cancelada", {
                icon: "info",
            });
        }
    });
}
//HOLA PERRO





   
  

