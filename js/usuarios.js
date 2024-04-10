$(document).ready(() => {
    document.title = "Administracion de Usuarios";
    $('#tableUsers').DataTable({
        dom: 'Bfrtip',
        language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
        buttons: [
            {
                extend: 'copy',
                text: 'Copiar',
                className: 'btn btn-info'
            },
            {
                extend: 'excel',
                text: 'Exportar a Excel',
                className: 'btn btn-success'
            },
            {
                extend: 'pdf',
                text: 'Exportar a PDF',
                className: 'btn btn-danger'
            },
            {
                extend: 'print',
                text: 'Imprimir',
                className: 'btn btn-primary'
            }
        ]
    });
});

const modal = document.getElementById('modalUsuarios');
function abrirModal() {
    modal.classList.remove('hidden');

    // Agrega una clase para centrar el modal
    modal.classList.add('flex');
    modal.classList.add('justify-center');
    modal.classList.add('items-center');
}
function cerrarModal() {
    modal.classList.add('hidden');
}

function toggleSubMenu(id) {
    var submenu = document.getElementById(id);
    submenu.classList.toggle("hidden");
}

const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
    }
});

$('#formularioUsuarios').on('submit', (e) => {
    e.preventDefault();
    var peticion = $('#txtRequest').val();
    var id = parseInt($('#idEmpleado').val().trim());
    var alias = $('#alias').val().trim();
    var passwd = $('#password').val().trim();
    var passwdC = $('#passwordC').val().trim();
    var pClientes = parseInt($('#pCliente').val().trim());
    var pFacturacion = parseInt($('#pFacturacion').val().trim());
    var pReporteria = parseInt($('#pReporteria').val().trim());
    var pAdministracion = parseInt($('#pAdministracion').val().trim());

    if(id != 0 && alias != "" && passwd != "" && passwdC != "" && (passwd === passwdC)){
        var register = {
            'ID' : id,
            'Alias' : alias,
            'Password' : passwd,
            'pClientes' : pClientes,
            'pFacturacion' : pFacturacion,
            'pReporteria' : pReporteria,
            'pAdministracion' : pAdministracion
        };
        $.ajax({
            url: '../controllers/ctrlUsuarios.php',
            method: 'POST',
            data: [peticion, register],
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: (success) => {
                if(success.status === 'success'){
                    Toast.fire({
                        icon: 'success',
                        text: 'Exito al insertar registro'
                    }).then(() => {
                        location.reload();
                    })
                }
            }
        })
    }else{
        Toast.fire({
            icon: 'info',
            text: 'Favor asegurese de llenar todos los campos'
        })
    }
})

function updateUsuario(id) {
    $.post('../controllers/ctrlUsuarios.php', {
        peticion: 'getUsuario',
        id: id
    }).done((response) => {
        if (response.status === 'success') {
            Swal.fire({
                title: 'Actualizacion de Usuario',
                html:
                    `<form class="p-3 md:p-3 max-w-xl mx-auto" id="formularioUsuariosUp">
                    <div class="grid gap-8">
                        <div>
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="alias">Ingrese el Alias: </label>
                            <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Alias" type="text" id="aliasUp" name="alias" value="${response.data[0]['alias']}">

                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Ingrese la nueva contraseña: </label>
                            <input class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required="" autocomplete="current-password" type="password" name="password" id="passwordUp">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Confirme la contraseña: </label>
                            <input class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required="" autocomplete="current-password" type="password" name="password" id="passwordCUp">

                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="alias">Niveles de Permiso:</label>
                            <div class="flex flex-wrap justify-between">
                                <div class="w-full sm:w-1/3 mt-4">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="pClienteUp">Clientes:</label>
                                    <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" type="number" id="pClienteUp" name="pClienteUp" value='${response.data[0]['clientes']}' required="" />
                                </div>
                                <div class="w-full sm:w-1/3 mt-4">
                                   <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="pClienteUp">Facturacion:</label>
                                    <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" type="number" id="pFacturacionUp" name="pFacturacionUp" value='${response.data[0]['facturacion']}' required="" />
                                </div>
                                <div class="w-full sm:w-1/3 mt-4">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="pClienteUp">Reporteria:</label>
                                    <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" type="number" id="pReporteriaUp" name="pReporteriaUp" value='${response.data[0]['reporteria']}' required="" />
                                </div>
                                <div class="w-full sm:w-1/3 mt-4">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="pClienteUp">Administracion:</label>
                                    <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" type="number" id="pAdministracionUp" name="pAdministracionUp" value='${response.data[0]['administracion']}' required="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>`,
                showCancelButton: true,
                confirmButtonText: 'Modificar',
                cancelButtonText: 'Cancelar'
            }).then((e) => {
                if(e.isConfirmed){
                    var alias = $('#aliasUp').val().trim();
                    var passwd = $('#passwordUp').val().trim();
                    var passwdC = $('#passwordCUp').val().trim();
                    var pClientes = $('#pClienteUp').val();
                    var pFacturacion = $('#pFacturacionUp').val();
                    var pReporteria = $('#pReporteriaUp').val();
                    var pAdmin = $('#pAdministracionUp').val();
                    if(alias != "" && pClientes != "" && pFacturacion != "" && pReporteria != "" && pAdmin != ""){
                        passwd = "";
                        if(passwd != "" && passwd === passwdC){
                            passwdC = passwd;
                        }
                        $.post('../controllers/ctrlUsuarios.php', {
                            peticion: 'updateUsuario',
                            alias: alias,
                            passwd: passwdC,
                            pCliente: pClientes,
                            pFact: pFacturacion,
                            pRep: pReporteria,
                            pAdmin: pAdmin,
                            id: id
                        }).done((resolve) => {
                            if(resolve.status === 'success'){
                                Toast.fire({
                                    icon: 'success',
                                    text: 'Registro modificado correctamente'
                                }).then(() => {
                                    location.reload();
                                })
                            }else{
                                Toast.fire({
                                    icon: 'error',
                                    text: 'Error al modificar empleado'
                                })
                            }
                        })
                    }else{
                        Toast.fire({
                            icon: 'warning',
                            text: 'No se permite enviar campos vacios'
                        })
                    }
                }
            })
        }
    })
}

function deleteUsuario(id) {
    Swal.fire({
        icon: 'warning',
        title: 'Eliminacion de Usuario',
        text: '¿Está seguro de eliminar este registro?',
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar'
    }).then((e) => {
        if (e.isConfirmed) {
            $.post('../controllers/ctrlUsuarios.php', {
                peticion: 'deleteUsuario',
                id: id
            }).done((resolve) => {
                if (resolve.status === 'success') {
                    Toast.fire({
                        icon: 'success',
                        text: 'Registro eliminado correctamente'
                    }).then(() => {
                        location.reload();
                    })
                }
            })
        } else {
            Toast.fire({
                icon: 'info',
                text: 'Se cancelo la operacion'
            })
        }
    })
}