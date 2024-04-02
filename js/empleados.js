$(document).ready( function () {
    $('#tablaEmpleados').DataTable({
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

const modal = document.getElementById('modalEmpleados');
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
  
function limite(evento, maximoCaracteres){
    let elemento = document.getElementById("simple-search");
    let eventoClon = evento || window.event;

    let codigoCaracter = eventoClon.charCode || eventoClon.key;
    if(elemento.value.length >= maximoCaracteres){
        return false;
    }else{
        return true;
    }
}
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

function registrarEmpleados(e) {
    e.preventDefault();

    let url = "../controladores/emp_controller.php";
  
    let nombres = document.getElementById('nombres').value;
    let primer_apellido = document.getElementById('primer_apellido').value;
    let segundo_apellido = document.getElementById('segundo_apellido').value;
    let dni = document.getElementById('dni').value;
    let fechaNacimiento = document.getElementById('nac').value;
    let genero = document.getElementById('genero').value;
    let cargos = document.getElementById('cargos').value;
    let horarios = document.getElementById('horarios').value;
    let telefono = document.getElementById('telefono').value;
    let email = document.getElementById('email').value;
    let domicilio = document.getElementById('domicilio').value;
    let IniLabores = document.getElementById('IniLab').value;

    const body = { 
            nombres: nombres,
            primer_apellido:primer_apellido,
            segundo_apellido:segundo_apellido,
            dni:dni,
            nac:fechaNacimiento,
            genero:genero,
            cargos:cargos,
            horarios:horarios,
            telefono:telefono,
            email:email,
            domicilio:domicilio,
            IniLab:IniLabores,
        };
    console.log('test body',body);
    
    
    /// Hace petición http al servidor
    fetch(url, {
        method: "POST",
        body: JSON.stringify(body)
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                swal({
                    title: "Éxito",
                    text: data.msg,
                    icon: "success",
                    button: "OK",
                }).then((value) => {
                    if (value) {
                        limpiarCampos();
                        window.location.href = '../../src/views/empleados.php';
                    }
                });
            } else {
                swal({
                    text: 'Error, No se ha podidio registrar el Empleado',
                    icon: 'error',
                    title: 'Error'
                });
               /* alert('[Error] ' + data.msg);
                return;*/
            }
        })
        .catch(error => {
            console.error("registrarEmpleados: [Error]", error);
        });
}

function limpiarCampos(){
    document.getElementById('nombres').value="";
    document.getElementById('primer_apellido').value="";
    document.getElementById('segundo_apellido').value="";
    document.getElementById('dni').value="";
    document.getElementById('nac').value="";
    document.getElementById('genero').value="";
    document.getElementById('cargos').value="";
    document.getElementById('horarios').value="";
    document.getElementById('telefono').value="";
    document.getElementById('email').value="";
    document.getElementById('domicilio').value="";
    document.getElementById('IniLab').value="";
    
}
