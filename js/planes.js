$(document).ready(function () {
    document.title = "Planes";

    function getCurrentTime() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12;
        hours = hours ? hours : 12;
        minutes = minutes < 10 ? '0' + minutes : minutes; 
        var timeString = hours + ':' + minutes + ' ' + ampm;
        return timeString;
    }

    var tablaPlanes = $('#tablaPlanes').DataTable({
        dom: 'Bfrtip',
        
        language: {
            "url": "js/Spanish.json",
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
                className: 'bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded'

            },
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                text: 'Exportar a PDF',
                className: 'bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded',
                customize: function (doc) {

                    doc.styles.title = {
                        fontSize: '22',
                        bold: true,
                        alignment: 'center',
                        color: '#0c1c32 '
                    };

                    doc.styles.tableHeader = {
                        fillColor: '#242c37',
                        color: '#ffffff',
                        alignment: 'center',
                        bold: true
                    };

                    doc.styles.tableBodyEven = {
                        fillColor: '#f2f2f2'
                    };

                    doc.styles.tableBodyOdd = {
                        fillColor: '#e5e5e5'
                    };

                    doc.content.unshift({
                        text: 'Reporte de Planes',
                        style: 'title',
                        alignment: 'center',
                        margin: [0, 0, 0, 12]
                    });

                    doc.content.push({
                        text: 'Hora de Generación: ' + getCurrentTime(),
                        fontSize: 10,
                        alignment: 'left',
                        margin: [0, 0, 40, 0],
                        color: '#7f8c8d'
                    });
                    
                    doc.content.splice(1, 0, {
                        margin: [0, 0, 0, 12],
                        alignment: 'center',
                        image:
                                'data:image/png;base64,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'
                    });
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