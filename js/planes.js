$(document).ready( function () {

    document.title="Planes";

    $('#tablaPlanes').DataTable({
        dom: 'Bfrtip',
        language: {
            "url": "../../js/Spanish.json",
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
                extend: 'excelHtml5',
                text: 'Exportar a Excel',
                className: 'bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded',
                exportOptions: {
                    columns: ':not(:last)' 
                }
            },
            {
                extend: 'pdfHtml5',
                
                orientation: 'landscape',
                text: 'Exportar a PDF',
                className: 'bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded',
                customize: function (doc) {
                  
                    doc.content.unshift({
                        text: 'Reporte de Empleados',
                        fontSize: 16,
                        alignment: 'center',
                        margin: [0, 0, 0, 12] 
                    });
                },
                exportOptions: {
                    columns: ':not(:last)' 
                }
            }
        ]
    });
});

function toggleDD(myDropMenu) {
    document.getElementById(myDropMenu).classList.toggle("invisible");
}

function toggleSubMenu(id) {
    var submenu = document.getElementById(id);
    submenu.classList.toggle("hidden");
}