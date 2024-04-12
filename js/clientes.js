$(document).ready(function () {
    document.title = "Clientes";

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

    var tablaClientes = $('#tablaClientes').DataTable({
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
                className: 'bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded'

            },
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                text: 'Exportar a PDF',
                className: 'bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded',
                exportOptions: {
                    columns: [0, 1, 2, 3, 6, 7, 8] 
                },
                customize: function (doc) {

                    doc.styles.title = {
                        fontSize: '22',
                        bold: true,
                        alignment: 'left',
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
                        text: 'Reporte de Clientes',
                        style: 'title',
                        margin: [0, 0, 0, 12]
                    });

                    doc.content.push({
                        text: 'Hora de Generación: ' + getCurrentTime(),
                        fontSize: 10,
                        alignment: 'right',
                        margin: [0, 0, 40, 0],
                        color: '#7f8c8d'
                    });
                }
            }
        ]
    });
});

  /*Toggle dropdown list*/
  function toggleDD(myDropMenu) {
    document.getElementById(myDropMenu).classList.toggle("invisible");
}
/*Filter dropdown options*/
function filterDD(myDropMenu, myDropMenuSearch) {
    var input, filter, ul, li, a, i;
    input = document.getElementById(myDropMenuSearch);
    filter = input.value.toUpperCase();
    div = document.getElementById(myDropMenu);
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
        if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
            a[i].style.display = "";
        } else {
            a[i].style.display = "none";
        }
    }
}
// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.drop-button') && !event.target.matches('.drop-search')) {
        var dropdowns = document.getElementsByClassName("dropdownlist");
        for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (!openDropdown.classList.contains('invisible')) {
                openDropdown.classList.add('invisible');
            }
        }
    }

}

function toggleSubMenu(id) {
    var submenu = document.getElementById(id);
    submenu.classList.toggle("hidden");
}
