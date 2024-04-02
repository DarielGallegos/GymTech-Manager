<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GYM</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
    <link rel="icon" type="image/x-icon" href="../img/icon.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/> <!--Replace with your tailwind.css once created-->
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> <!--Totally optional :) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>
</head>

<body class="bg-gray-800 font-sans leading-normal tracking-normal mt-12">
      <header>
            <nav aria-label="menu nav" class="bg-gray-800  pt-2 md:pt-1 pb-1 px-1 mt-0 h-auto fixed w-full z-20 top-0">
                  <div class="fixed top-0 right-0 w-full bg-gray-800  flex items-center justify-between px-4 py-2 z-5000"> <!-- Contenedor del icono y el logotipo -->
                        <div class="flex flex-shrink md:w-1/3 justify-center md:justify-start text-white"> <!-- Contenedor del logotipo -->
                              <a href="../../index.php" aria-label="Home">
                                    <img src="../img/logo1.png" class="h-12 me-2 sm:h-13 text-xl pl-2" id="logo"> <!-- Logotipo -->
                              </a>
                        </div>
                  </div>
                  <div class="fixed top-0 right-0 flex items-center justify-between px-4 py-2 z-5000"><!-- Contenedor principal fijo -->
                        <ul class="list-reset flex items-center"><!-- Lista de elementos -->
                              <li>
                                    <div class="relative inline-block"><!-- Contenedor del botón desplegable -->
                                          <button onclick="toggleDD('myDropdown')" class="drop-button text-white py-2 px-2"><!-- Botón desplegable -->
                                                <span class="pr-2"><i class="em em-robot_face"></i></span> Hi, User <!-- Icono y texto de usuario -->
                                                      <svg class="h-3 fill-current inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"> <!-- Icono de flecha hacia abajo -->
                                                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                      </svg>
                                          </button>
                                          <!-- Contenido del menú desplegable -->
                                          <div id="myDropdown" class="dropdownlist absolute bg-gray-800 text-white right-0 mt-3 p-3 overflow-auto z-30 invisible">
                                                <!-- Opción del menú -->
                                                <a href="#" class="p-2 bg-gray-800 text-white text-sm no-underline hover:no-underline block">
                                                      <!-- Icono y texto de la opción -->
                                                      <i class="fas fa-sign-out-alt fa-fw"></i> Salir
                                                </a>
                                          </div>
                                    </div>
                              </li>
                        </ul>
                  </div>
            </nav>
      </header>
      
<main style="margin-top: 60px; align-content: center;">
<div class="flex flex-col md:flex-row">
      <nav aria-label="alternative nav">
            <div class="bg-gray-800 shadow-xl h-20 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48 content-center"><!--OPCIONES-->
            <div class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
                  <ul class="list-reset flex flex-row md:flex-col pt-3 md:py-3 px-1 md:px-4 text-center md:text-left">
                        <li class="mr-3 flex-1">
                              <a href="../../index.php" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-blue-600 border-b-2 border-gray-800 hover:border-blue-600">
                                    <i class="fas fa-home pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Inicio</span>
                              </a>
                        </li>
                        <li class="mr-3 flex-1">
                              <a href="clientes.php" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-blue-600 border-b-2 border-gray-800 hover:border-blue-600">
                                    <i class="fa fa-user pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Clientes</span>
                              </a>
                        </li>
                        <li class="mr-3 flex-1">
                              <a href="facturacion.php" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-blue-600 border-b-2 border-gray-800 hover:border-blue-600">
                                    <i class="fa fa-file pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Facturación</span>
                              </a>
                        </li>
                        <li class="mr-3 flex-1">
                              <a href="reportes.php" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-white no-underline hover:text-blue-600 border-b-2 border-gray-800 hover:border-blue-600">
                                    <i class="fa fa-chart-bar pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Reportes</span>
                              </a>
                        </li>
                        <li class="mr-3 flex-1 relative">
                            <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-blue-600 border-b-2 border-gray-800 hover:border-blue-600" onclick="toggleSubMenu('administrar')">
                                <i class="fas fa-cogs pr-0 md:pr-3"></i>
                                <span class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block">Administración</span>
                            </a>
                            <div id="administrar" class="absolute bg-gray-400 py-2 rounded shadow-md hidden mt-2 z-10">
                                <a href="clientes.php" class="block px-9 py-2 text-gray-800 hover:bg-gray-200">Clientes</a>
                                <a href="empleados.php" class="block px-9 py-2 text-gray-800 hover:bg-gray-200">Empleados</a>
                                <a href="#" class="block px-9 py-2 text-gray-800 hover:bg-gray-200">Usuarios</a>
                            </div>
                        </li>
                        
                        
                  </ul>
            </div>
            </div>
      </nav>
   
        <div id="main" class="main-content flex-1 bg-white  mt-12 md:mt-2 pb-24 md:pb-5 " >
            <div id="main" class="main-content flex-1 bg-white mt-12 md:mt-2 pb-24 md:pb-5">
                <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white ">
                    <h1 class="text-3xl font-bold text-center"> Administración de Clientes </h1>    
                </div>
            <div>
                <section class="bg-gray-100 ">
                <div class="mx-auto max-w-screen-xl px-4 py-5 sm:px-6 lg:px-100 ">
                    <div class="grid grid-cols-1 gap-x-10 gap-y-8 lg:grid-cols-5 ">
                        <div class="rounded-lg bg-white p-8 shadow-lg lg:col-span-3 lg:p-12 py-5">
                            <form action="#" class="space-y-4">
                                <h2 class="text-2xl font-bold text-gray-900 dark:text-white text-center">FORMULARIO DE REGISTRO DE CLIENTES</H2>
                                <div>
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">Nombres:</label>
                                    <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" 
                                    placeholder="Primer y segundo nombre" type="text" id="nombres" required/>
                                    <div class="flex flex-wrap justify-between">
                                        <div class="w-full sm:w-5/12 mt-4">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="primer_apellido">Primer Apellido:</label>
                                            <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" 
                                            placeholder="Primer apellido" type="text" id="primer_apellido" required/>
                                        </div>
                                        <div class="w-full sm:w-5/12 mt-4">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="segundo_apellido">Segundo Apellido:</label>
                                            <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" 
                                            placeholder="Segundo apellido" type="text" id="segundo_apellido" required/>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap justify-between">
                                        <div class="w-full sm:w-5/12 mt-4">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="primer_apellido">DNI:</label>
                                            <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" 
                                            placeholder="DNI" type="number" id="dni" required/>
                                        </div>
                                        <div class="w-full sm:w-5/12 mt-4">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="segundo_apellido">Edad:</label>
                                            <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" 
                                            placeholder="Edad" type="date" id="edad" required/>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap justify-between">
                                        <div class="w-full sm:w-5/12 mt-4">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="primer_apellido">Email:</label>
                                            <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" 
                                            placeholder="Email" type="email" id="email" required/>
                                        </div>
                                        <div class="w-full sm:w-5/12 mt-4">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="segundo_apellido">Teléfono:</label>
                                            <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" 
                                            placeholder="Teléfono" type="tel" id="telefono" required/>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap justify-between">
                                        <div class="w-full sm:w-5/12 mt-4">
                                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Género:</label>
                                            <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                <option selected>Seleccione:</option>
                                                <option value="femenino">Femenino</option>
                                                <option value="masculino">Masculino</option>
                                            </select>
                                        </div>
                                        <div class="w-full sm:w-5/12 mt-4">
                                            <label for="planes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de membresía:</label>
                                            <select id="planes" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" onchange="showDeliveryOptions(this.value)" required>
                                                <option selected disabled>Seleccione:</option>
                                                <option value="individual">Plan individual</option>
                                                <option value="duo">Plan duo</option>
                                                <option value="familiar">Plan Familiar</option>
                                            </select>
                                        </div>
                                    </div>
                                    <fieldset id="deliveryOptions" class="grid grid-cols-3 gap-4 py-4" style="display: none;">
                                        <legend class="sr-only">Delivery</legend>
                                        <div>
                                            <label for="Diario" class="flex cursor-pointer justify-between gap-4 rounded-lg border border-fuchsia-600 bg-white p-4 text-sm font-medium shadow-sm hover:border-x-sky-700 has-[:checked]:border-blue-500 has-[:checked]:ring-1 has-[:checked]:ring-blue-500">
                                                <div>
                                                    <p class="text-gray-700">Diario</p>
                                                    <p class="mt-1 text-gray-900">L.50</p>
                                                </div>
                                                <input type="radio" name="DeliveryOption" value="Diario" id="Diario" class="size-8 border-gray-300 text-blue-500" checked/>
                                            </label>
                                        </div>
                                        <div>
                                        <label for="Semanal" class="flex cursor-pointer justify-between gap-4 rounded-lg border border-gray-100 bg-white p-4 text-sm font-medium shadow-sm hover:border-gray-200 has-[:checked]:border-blue-500 has-[:checked]:ring-1 has-[:checked]:ring-blue-500">
                                            <div>
                                                <p class="text-gray-700">Semanal</p>
                                                <p class="mt-1 text-gray-900">L.300</p>
                                            </div>
                                            <input type="radio" name="DeliveryOption" value="Semanal" id="Semanal" class="size-8 border-gray-300 text-blue-500"/>
                                        </label>
                                        </div>
                                        <div>
                                        <label for="Mensual" class="flex cursor-pointer justify-between gap-4 rounded-lg border border-gray-100 bg-white p-4 text-sm font-medium shadow-sm hover:border-gray-200 has-[:checked]:border-blue-500 has-[:checked]:ring-1 has-[:checked]:ring-blue-500">
                                            <div>
                                                <p class="text-gray-700">Mensual</p>
                                                <p class="mt-1 text-gray-900">L.900</p>
                                            </div>
                                            <input type="radio" name="DeliveryOption" value="Mensual" id="Mensual" class="size-8 border-gray-300 text-blue-500"/>
                                        </label>
                                        </div>
                                    </fieldset>

                                    <div class="mt-6 flex justify-center">
                                        <button 
                                            type="submit" 
                                            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-bold rounded-lg text-sm px-20 py-3 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                            Registrar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
</div>
</main>

<!-- Modal de registro de plan -->
<div id="registerPlanModal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-center overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-7 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Registrar Nuevo Plan</h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500" id="texto">¿Tiene un código de plan o desea registrar uno nuevo?</p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="botonesInicio">
                <button id="crearCod" type="button" onclick="mostrarFormulario()" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Crear uno</button>
                <button id="tengoCodigo" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tengo un código</button>
            </div>
            <div id="formularioCrear" style="display: none;">
            <form class="max-w-sm mx-auto">
                <div class="mb-5">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre del Plan</label>
                    <input type="text" id="" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
                </div>
                <div class="mb-5">
                    <label for="add" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Desea agregar Miembros</label>
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrar Plan</button>
            </form>
        </div>
    </div>
</div>

<!--FIN MODAL-->

      <script>
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

    function showDeliveryOptions(selectedValue) {
        var deliveryOptionsFieldset = document.getElementById('deliveryOptions');
        var registerPlanModal = document.getElementById('registerPlanModal');

        if (selectedValue === 'individual') {
            deliveryOptionsFieldset.style.display = 'grid';
            registerPlanModal.style.display = 'none';
        } else if (selectedValue === 'duo') {
            deliveryOptionsFieldset.style.display = 'none';
            registerPlanModal.style.display = 'block';
        } else {
            deliveryOptionsFieldset.style.display = 'none';
            registerPlanModal.style.display = 'none';
        }
    }

    function closeModal() {
        var registerPlanModal = document.getElementById('registerPlanModal');
        registerPlanModal.style.display = 'none';
    }

    function mostrarFormulario() {
       /* var formularioCrear = document.getElementById('formularioCrear');
        formularioCrear.style.display = 'block'; // Mostrar el formulario*/

        document.getElementById("formularioCrear").style.display = "block";
        // Ocultar los botones "Crear uno" y "Tengo un código"
        document.getElementById("botonesInicio").style.display = "none";
        document.getElementById("texto").style.display = "none";
    }
</script>
</body>
</html>