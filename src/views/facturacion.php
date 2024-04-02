<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta charset="UTF-16">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modulo Facturacion</title>
  <link rel="icon" type="image/x-icon" href="../img/icon.png">

  <link rel="stylesheet" href=".././css/output.css">
  <link rel="stylesheet" href=".././css/nfIcons.css">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

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
                              <a href="../../index.php" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-blue-600 ">
                                    <i class="fas fa-home pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 hover:text-blue-600  md:text-gray-200 block md:inline-block">Inicio</span>
                              </a>
                        </li>
                        <li class="mr-3 flex-1">
                              <a href="clientes.php" class="block py-1 md:py-3 pl-1 align-middle text-white hover:text-blue-600 border-gray-800">
                                    <i class="fa fa-user pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 hover:text-blue-600 md:text-gray-200 block md:inline-block">Clientes</span>
                              </a>
                        </li>
                        <li class="mr-3 flex-1">
                              <a href="facturacion.php" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-blue-600">
                                    <i class="fa fa-file pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 hover:text-blue-600 md:text-gray-200 block md:inline-block">Facturación</span>
                              </a>
                        </li>
                        <li class="mr-3 flex-1">
                              <a href="reportes.php" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-white no-underline hover:text-blue-600">
                                    <i class="fa fa-chart-bar pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 hover:text-blue-600 md:text-gray-200 block md:inline-block">Reportes</span>
                              </a>
                        </li>
                        <li class="mr-3 flex-1 relative">
                            <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-blue-600" onclick="toggleSubMenu('administrar')">
                                <i class="fas fa-cogs pr-0 md:pr-3"></i>
                                <span class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white hover:text-blue-600 block md:inline-block">Administración</span>
                            </a>
                            <div id="administrar" class="absolute bg-gray-400 py-2 rounded shadow-md hidden mt-2 z-10">
                                <a href="clientes.php" class="block px-9 py-2 text-gray-800 hover:bg-gray-200">Clientes</a>
                                <a href="empleados.php" class="block px-9 py-2 text-gray-800 hover:bg-gray-200">Empleados</a>
                                <a href="usuarios.php" class="block px-9 py-2 text-gray-800 hover:bg-gray-200">Usuarios</a>
                            </div>
                        </li>
                  </ul>
            </div>
            </div>
      </nav>
   
        <div id="main" class="main-content flex-1 bg-white  mt-12 md:mt-2 pb-24 md:pb-5 " >
            <div id="main" class="main-content flex-1 bg-white mt-12 md:mt-2 pb-24 md:pb-5">
                <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white ">
                    <h1 class="text-3xl font-bold text-center"> Facturación </h1>    
                </div>
            <div>
            <div id="main" class="main-content flex-1 mt-12 md:mt-2 pb-24 md:pb-5">
    <!-- Inicio Maquetacion Sitio -->
    <section class="grid grid-cols-3 gap-3 p-2.5 rounded-md bg-slate-50">

    <!-- Inicio Encabezado Factura --->
    <section class="col-span-2 rounded-md bg-gray-300 p-2 shadow">
      <h3 class="text-2xl text-center font-bold">Cabecera de Factura</h3>
      <p>N° Factura: </p>
      <p>Empleado: </p>
      <p>Fecha de Facturación: </p>
    </section>
    <!-- Fin Encabezado Factura --->

    <!-- Inicio Pie Factura --->
    <section class="grid grid-cols-2 justify-items-start rounded-md bg-gray-300 p-2 shadow">
      <section class="col-span-2 justify-center">
        <h3 class="text-2xl font-bold text-center">Detalle Deuda</h3>
      </section>
      <section class="text-xl">
        <p>Subtotal: </p>
        <p>Descuento: </p>
        <p>Sobrecargo: </p>
      </section>
      <section class="text-xl">
        <p>Total: </p>
        <p>Monto: </p>
        <p>Cambio: </p>
      </section>
    </section>
    <!-- Fin Pie Factura --->

    <!-- Inicio Detalle Factura -->
    <section class="col-span-3 rounded-md bg-gray-300 p-2 shadow">
      <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm dark:divide-gray-700 dark:bg-gray-900 rounded-md">
        <thead class="items-center">
          <tr>
            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 dark:text-white">ID MEMBRESIA</th>
            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 dark:text-white">ID CLIENTE</th>
            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 dark:text-white">Concepto</th>
            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 dark:text-white">Precio</th>
            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 dark:text-white">Sobrecargo</th>
            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 dark:text-white">Descuento</th>
            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 dark:text-white">Sub-Total</th>
            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 dark:text-white">Acciones</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 dark:divide-gray-700 text-center">
          <tr class="odd:bg-gray-800">

            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 dark:text-gray-800">
              <section class="relative">
                <input type="text" class="w-full rounded-md border-gray-200 pe-10 shadow-sm sm:text-sm">
              </section>
            </td>
            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 dark:text-gray-800">
              <section class="relative">
                <input type="text" class="w-full rounded-md border-gray-200 pe-10 shadow-sm sm:text-sm">
              </section>
            </td>
            <td class="whitespace-nowrap px-4 py-2 text-gray-700 dark:text-gray-800">
              <section class="relative">
                <select name="" id="" class="w-full rounded-md border-gray-200 pe-10 shadow-sm sm:text-sm">
                  <option value="1">Mensualidad</option>
                  <option value="2">Matricula</option>
                </select>
              </section>
            </td>
            <td class="whitespace-nowrap px-4 py-2 text-gray-700 dark:text-gray-200">12000</td>
            <td class="whitespace-nowrap px-4 py-2 text-gray-700 dark:text-gray-200">0</td>
            <td class="whitespace-nowrap px-4 py-2 text-gray-700 dark:text-gray-200">1000</td>
            <td class="whitespace-nowrap px-4 py-2 text-gray-700 dark:text-gray-200">11000</td>
            <td>
              <button class="inline-block rounded-full border border-red-600 bg-transparent p-2.5 text-white hover:text-red-600 focus:outline-none focus:ring active:text-red-500"><i class="nf nf-oct-trash"></i></button>
            </td>
          </tr>
        </tbody>
      </table>
    </section>
    <!-- Fin Detalle Factura -->
  </section>
</div>
         </div>
      </div>
</div>
</main>


<script src="../../js/detalles.js"></script>
</body>
</html>
  
</body>
</html>