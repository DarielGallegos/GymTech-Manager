

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
window.onclick = function (event) {
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

//-------------------------------------------------------------------------

function funHandleVentanaModal(e) {
    let selectedValue = e.target.value;
    var deliveryOptionsFieldset = document.getElementById('deliveryOptions');

    if (selectedValue === "1") {
        
        tipo_membresia=membresia_individual;
        toggleVenCrearCodigoIndividual();
        
    } else if (selectedValue === "2") {

        /* registerPlanModal.classList.remove('hidden'); */
        tipo_membresia = membresia_duo;
        toggleVenIngresarCodigoDuo();

    } else {(selectedValue === "3")
    
        /* registerPlanModal.classList.remove('hidden'); */
        tipo_membresia = membresia_familiar;
        toggleVenIngresarCodigoFamiliar();
    }

}

let tipo_membresia = 1;
const membresia_individual = 1;
const membresia_duo = 2;
const membresia_familiar = 3;

function registrarNuevoPlan(e, prm_tip_membresia) {
    e.preventDefault();
    /* const frm_mem_id = document.getElementById("frm_mem_id"); */
    const frm_tip_id =  document.getElementById("frm_mem_tip_id");
    
    if(prm_tip_membresia == membresia_individual) {
        const val_mem_nombre = document.getElementById("nombre_plan_individual_nuevo").value;
        document.getElementById("frm_mem_nombre").value = val_mem_nombre;
        frm_tip_id.value = 1;
        console.log('crear plan individual');
        toggleVenCrearCodigoIndividual();
    }

    else if(prm_tip_membresia == membresia_duo) {
        const val_mem_nombre = document.getElementById("nombre_plan_duo_nuevo").value;
        document.getElementById("frm_mem_nombre").value = val_mem_nombre;
        frm_tip_id.value = 2;
        console.log('crear plan dual');
        toggleVenCrearCodigoDuo();
        toggleVenIngresarCodigoDuo();
    }

    else if(prm_tip_membresia == membresia_familiar) {
        const val_mem_nombre = document.getElementById("nombre_plan_familiar_nuevo").value;
        document.getElementById("frm_mem_nombre").value = val_mem_nombre;
        frm_tip_id.value = 3;
        console.log('crear plan familiar');
        toggleVenCrearCodigoFamiliar();
        toggleVenIngresarCodigoFamiliar();
    }

    console.log(document.getElementById("frm_mem_nombre").value, document.getElementById("frm_mem_tip_id").value);
}



//---------------------------------------------------------------------------
//Ingresar
 function toggleVenCrearCodigoIndividual(e) {
    if(e) e.preventDefault();

    let ventana = document.getElementById("venIngresarCodigoIndividual");
    ventana.classList.toggle("hidden") 
} 

function toggleVenIngresarCodigoDuo(e) {
    if(e) e.preventDefault();
    let ventana = document.getElementById("venIngresarCodigoDuo");
    ventana.classList.toggle("hidden")
}

function toggleVenIngresarCodigoFamiliar(e) {
    if(e) e.preventDefault();
    let ventana = document.getElementById("venIngresarCodigoFamiliar");
    ventana.classList.toggle("hidden")
}
//----------------------------------------------------------------------------------------------------
//Ingresar Existente
function toggleVenIngresarCodigoDuoExistente(e){
    if(e) e.preventDefault();
    toggleVenIngresarCodigoDuo(e);

    let ventana = document.getElementById("venIngresarCodigoDuoExistente");
    ventana.classList.toggle("hidden") 
}

function toggleVenIngresarCodigoFamiliarExistente(e){
    if(e) e.preventDefault();
    toggleVenIngresarCodigoFamiliar(e);
    
    let ventana = document.getElementById("venIngresarCodigoFamiliarExistente");
    ventana.classList.toggle("hidden") 
}
//----------------------------------------------------------------------
//Crear
function toggleVenCrearCodigoDuo(e){
    if(e) e.preventDefault();
    
    let ventana = document.getElementById("venCrearCodigoDuo");
    ventana.classList.toggle("hidden") 
}

function toggleVenCrearCodigoFamiliar(e){
    if(e) e.preventDefault();
    
    let ventana = document.getElementById("venCrearCodigoFamiliar");
    ventana.classList.toggle("hidden") 
}



function limpiarCampos() {
    document.getElementById('nombres').value = "";
    document.getElementById('primer_apellido').value = "";
    document.getElementById('segundo_apellido').value = "";
    document.getElementById('dni').value = "";
    document.getElementById('edad').value = "";
    document.getElementById('email').value = "";
    document.getElementById('telefono').value = "";
    document.getElementById('genero').value = "";
    document.getElementById('planes').value = "";
    deliveryOptionsFieldset.classList.add('hidden');
}
//----------------------------------------------------------------------------------------------------------

function registrarCliente(e) {
    e.preventDefault();

    /* let url = "../controladores/regicli_controller.php"; */
    let url = ".././controllers/ctrlClientes.php";

    let nombres = document.getElementById('nombres').value;
    let primer_apellido = document.getElementById('primer_apellido').value;
    let segundo_apellido = document.getElementById('segundo_apellido').value;
    let dni = document.getElementById('dni').value;
    let edad = document.getElementById('edad').value;
    let email = document.getElementById('email').value;
    let telefono = document.getElementById('telefono').value;
    let genero = document.getElementById('genero').value;
    let planes = document.getElementById('planes').value;
    let deliveryOptions = obtenerValorPeriodicidad() || "Mensual";
    let plan_id = document.getElementById("frm_mem_id").value;
    let plan_nombre = document.getElementById("frm_mem_nombre").value;
    let empleado_id= document.getElementById("frm_emp_id").value;
    let mem_tip_id = document.getElementById("frm_mem_tip_id").value;

    let fetch_body = {
        cliente: "insertCliente",
        nombres: nombres,
        primer_apellido: primer_apellido,
        segundo_apellido: segundo_apellido,
        dni: dni,
        fec_nacimiento: edad,
        email: email,
        telefono: telefono,
        genero: genero,
        planes: planes,
        deliveryOptions: deliveryOptions,
        plan_id: plan_id.length > 0? plan_id : null,
        plan_nombre: plan_nombre,
        empleado_id: empleado_id,
        mem_tip_id: mem_tip_id
    };

    console.log('test body', fetch_body);


    /// Hace petición http al servidor
    fetch(url, {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(fetch_body)
    })
        .then(response => response.json())
        .then(data => {
            if (!data.data.success) {
                swal({
                    title: "Error",
                    text: data.data.msg,
                    icon: "error",
                    button: "Aceptar",
                })
                return;
            }
            
            swal({
                title: "Éxito",
                text: data.data.msg,
                icon: "success",
                button: "OK",
            }).then((value) => {
                // Limpiar campos
                limpiarCampos();
                console.log(data)
            })

            
        })
        .catch(error => {
            console.log("registrarCliente: [Error]", error);
        })
}


//----------------------------------------------------------------------------------------------------------- 

function obtenerValorPeriodicidad() {
    // Obtener referencia al fieldset
    var fieldset = document.getElementById("deliveryOptions");

    // Obtener todos los inputs dentro del fieldset
    var opciones = fieldset.querySelectorAll('input[name="opcion"]');

    // Iterar sobre los inputs para encontrar el seleccionado
    var valorSeleccionado;
    opciones.forEach(function (opcion) {
        if (opcion.checked) {
            valorSeleccionado = opcion.value;
        }
    });

    if (!valorSeleccionado)
        return "Diario";

    return valorSeleccionado;
}


function ingresarCodigoDuo() {r
    let url = "../controladores/codiduo_controller.php";
    let ing_cod_id = document.getElementById('ing_cod_duo_id').value;


    /// Valida que se ingrse el código
    if (ing_cod_id.length == 0) {
        alert('Debe ingresar el código');
        return;
    }

    /// Hace petición http al servidor
    fetch(url, {
        method: "POST",
        body: JSON.stringify({ ing_cod_id: ing_cod_id })
    })
        .then(response => response.json())
        .then(data => {

            if (data.error) {
                swal({
                    title: "Error",
                    text: data.msg,
                    icon: "error",
                    button: "Aceptar",
                })
                return;
            }
            if (data.success) {
                swal({
                    title: "Éxito",
                    text: data.msg,
                    icon: "success",
                    button: "OK",
                }).then((value) => {

                    toggleVenIngresarCodigoDuo();
                    closeModal()
                })

                console.log(data)
            }
        }).catch(error => {
            console.log("ingresarCodigoDuo: [Error]", error.toString());
        })
}

function ingresarCodigoFamiliar() {
    let url = "../controladores/codifamiliar_controller.php";
    let ing_cod_id = document.getElementById('ing_cod_fam_id').value;


    /// Valida que se ingrse el código
    if (ing_cod_id.length == 0) {
        alert('Debe ingresar el código');
        return;
    }

    /// Hace petición http al servidor
    fetch(url, {
        method: "POST",
        body: JSON.stringify({ ing_cod_id: ing_cod_id })
    })
        .then(response => response.json())
        .then(data => {
            
            if (data.error) {
                swal({
                    title: "Error",
                    text: data.msg,
                    icon: "error",
                    button: "Aceptar",
                })
                return;
            }

            if (data.success) {
                swal({
                    title: "Éxito",
                    text: data.msg,
                    icon: "success",
                    button: "OK",
                }).then((value) => {
                    toggleVenIngresarCodigoFamiliar();
                    closeModal()
                })
                console.log(data)
            }
        }).catch(error => {
            console.error("ingresarCodigoFamiliar: [Error]", error);
        })
}