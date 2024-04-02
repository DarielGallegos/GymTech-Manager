<?php
include $_SERVER['DOCUMENT_ROOT'] . '/GymTech-Manager/src/controllers/ctrlClientes.php';

// Instanciar el controlador de empleados
$controlador = new ctrlClientes();

// Obtener los empleados
$result = $controlador->getClientes();

// Obtener los datos de los empleados
$data = $result[2];


?>
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
      <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
      <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" /> <!--Replace with your tailwind.css once created-->
      <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> <!--Totally optional :) -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>
      <!-- Incluye la librería de SweetAlert -->
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <link rel="stylesheet" href="https://unpkg.com/sweetalert/dist/sweetalert.css">

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

                  <div id="main" class="main-content flex-1 bg-white  mt-12 md:mt-2 pb-24 md:pb-5 ">
                        <div id="main" class="main-content flex-1 bg-white mt-12 md:mt-2 pb-24 md:pb-5">
                              <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white ">
                                    <h1 class="text-3xl font-bold text-center"> Administración de Clientes </h1>
                              </div>
                              <section>
                                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4 ml-4 mr-4">
                                          <div class="flex justify-between items-center mb-4">
                                                <div class="flex-grow">
                                                      <h2 class="text-3xl font-bold text-gray-900 dark:text-white">TABLA Clientes</h2>
                                                </div>
                                                <button class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-2 rounded inline-flex items-center" onclick="abrirModal()">
                                                      <i class="fa fa-plus pr-0 md:pr-3"></i>Agregar Cliente</button>
                                          </div>
                                          <table id="tablaClientes" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 mt-4">
                                                      <tr>
                                                            <th scope="col" class="px-6 py-3">Nombres</th>
                                                            <th scope="col" class="px-6 py-3"> Apellidos</th>
                                                            <th scope="col" class="px-6 py-3">DNI</th>
                                                            <th scope="col" class="px-6 py-3">Fecha Inscripción</th>
                                                            <th scope="col" class="px-6 py-3">Fecha Nacimiento</th>
                                                            <th scope="col" class="px-6 py-3">Genero</th>
                                                            <th scope="col" class="px-6 py-3">Teléfono</th>
                                                            <th scope="col" class="px-6 py-3">Email </th>
                                                            <th scope="col" class="px-6 py-3">Empleado</th>
                                                            <th scope="col" class="px-6 py-3">Estado</th>
                                                            <th scope="col" class="px-6 py-3">Acción</th>
                                                      </tr>
                                                </thead>
                                                <tbody>
                                                      <?php
                                                      for ($i = 0; $i < count($data); $i++) {
                                                      ?>
                                                            <tr>
                                                                  <td><?= $data[$i]['nombres'] ?></td>
                                                                  <td><?= $data[$i]['apellidos'] ?></td>
                                                                  <td><?= $data[$i]['dni'] ?></td>

                                                                  <td><?= $data[$i]['fecha-inscripcion'] ?></td>
                                                                  <td><?= $data[$i]['fecha-nac'] ?></td>
                                                                  <td><?= $data[$i]['genero'] ?></td>
                                                                  <td><?= $data[$i]['telefono'] ?></td>
                                                                  <td><?= $data[$i]['email'] ?></td>
                                                                  <td><?= $data[$i]['empleado'] ?></td>
                                                                  <td><?= $data[$i]['estado'] ?></td>
                                                                  <td class="px-6 py-4">
                                                                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                                                              <span class="inline-flex overflow-hidden rounded-md border bg-white shadow-sm">
                                                                                    <button class="inline-block border-e p-3 text-gray-700  hover:bg-green-600 hover:text-white focus:relative" title="Editar">
                                                                                          <i class="fa fa-edit pr-0 md:pr-3"></i>
                                                                                    </button>
                                                                                    <button class="inline-block p-3 text-gray-700 hover:bg-red-500 hover:text-white focus:relative" title="Delete" onclick="deleteCliente(<?= $data[$i]['ID'] ?>)">
                                                                                          <i class="fa fa-trash pr-0 md:pr-1"></i>
                                                                                    </button>
                                                                              </span>
                                                                        </a>
                                                                  </td>
                                                            </tr>
                                                      <?php
                                                      }
                                                      ?>
                                                </tbody>
                                          </table>
                                    </div>

                              </section>
                        </div>
                  </div>
            </div>
      </main>


      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
            document.title = "clientes";
      </script>

      <script src="../../js/clientes.js"></script>
      <script>
            function deleteCliente(id) {
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
                  Swal.fire({
                        icon: 'warning',
                        title: "¿Desea eliminar este empleado?",
                        text: "Si elimina este empleado, no lo podra visualizar",
                        showCancelButton: true,
                        cancelButtonText: 'Cancelar',
                        confirmButtonText: "Eliminar"
                  }).then((result) => {
                        if (result.isConfirmed) {
                              $.post('.././controllers/ctrlClientes.php', {
                                    cliente: 'deleteCliente',
                                    id: id
                              }).done((response) => {
                                    if (response.status === 'success') {
                                          Toast.fire({
                                                icon: 'success',
                                                title: "Cliente eliminado con exito"
                                          })
                                          location.reload();
                                    } else {
                                          Toast.fire({
                                                icon: 'error',
                                                title: "Error al intentar eliminar cliente"
                                          })
                                    }
                              });
                        }
                  });
            }
      </script>

      
</body>

</html>