<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GYM</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <link rel="icon" type="image/x-icon" href="src/img/icon.png">
    <meta name="keywords" content="keywords,here">
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
                              <a href="index.php" aria-label="Home">
                                    <img src=".././src/img/logo1.png" class="h-12 me-2 sm:h-13 text-xl pl-2" id="logo"> <!-- Logotipo -->
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
                  <ul class="list-reset flex flex-row md:flex-col pt-3 md:py-3 px-1 md:px-2 text-center md:text-left">
                        <li class="mr-3 flex-1">
                              <a href=".././src/index.php" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-blue-600 border-b-2 border-gray-800 hover:border-blue-600">
                                    <i class="fas fa-home pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Inicio</span>
                              </a>
                        </li>
                        <li class="mr-3 flex-1">
                              <a href=".././src/views/registroClientes.php" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-blue-600 border-b-2 border-gray-800 hover:border-blue-600">
                                    <i class="fa fa-user pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Clientes</span>
                              </a>
                        </li>
                        <li class="mr-3 flex-1">
                              <a href=".././src/views/facturacion.php" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-blue-600 border-b-2 border-gray-800 hover:border-blue-600">
                                    <i class="fa fa-file pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Facturación</span>
                              </a>
                        </li>
                        <li class="mr-3 flex-1">
                              <a href=".././src/views/reportes.php" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-white no-underline hover:text-blue-600 border-b-2 border-gray-800 hover:border-blue-600">
                                    <i class="fa fa-chart-bar pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Reportes</span>
                              </a>
                        </li>
                        <li class="mr-3 flex-1 relative">
                            <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-blue-600 border-b-2 border-gray-800 hover:border-blue-600" onclick="toggleSubMenu('administrar')">
                                <i class="fas fa-cogs pr-0 md:pr-3"></i>
                                <span class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block">Administración</span>
                            </a>
                            <div id="administrar" class="absolute bg-gray-400 py-2 rounded shadow-md hidden mt-2 z-10">
                                <a href="src/views/clientes.php" class="block px-9 py-2 text-gray-800 hover:bg-gray-200">Clientes</a>
                                <a href="src/views/empleados.php" class="block px-9 py-2 text-gray-800 hover:bg-gray-200">Empleados</a>
                                <a href="src/views/" class="block px-9 py-2 text-gray-800 hover:bg-gray-200">Usuarios</a>
                            </div>
                        </li>
                  </ul>
            </div>
            </div>
      </nav>
   
      <div id="main" class="main-content flex-1 bg-white  mt-12 md:mt-2 pb-24 md:pb-5 " >
         <div id="main" class="main-content flex-1 bg-white mt-12 md:mt-2 pb-24 md:pb-5">
            <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white ">
                  
            </div>
            <div>
                  <img src=".././src/img/fondo1.png" class="h-auto max-w-full mx-auto">
                  </div>
         </div>
      </div>
</div>
</main>


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
</script>
</body>
</html>