<?php
include $_SERVER['DOCUMENT_ROOT'] . '/GymTech-Manager/src/controllers/ctrlEmpleados.php';

// Instanciar el controlador de empleados
$controlador = new ctrlEmpleados();

// Obtener los empleados
$result = $controlador->getEmpleados();

// Obtener los datos de los empleados
$data = $result[2];

//Obtener horarios
$horario = $controlador->getHorarios();
$horario = $horario[2];

//Obtener Cargos
$cargos = $controlador->getCargos();
$cargos = $cargos[2];
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
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>-->


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
                                    <a href="#" class="block px-9 py-2 text-gray-800 hover:bg-gray-200">Empleados</a>
                                    <a href="#" class="block px-9 py-2 text-gray-800 hover:bg-gray-200">Usuarios</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div id="main" class="main-content flex-1 bg-white  mt-12 md:mt-2 pb-24 md:pb-5 ">
                <div id="main" class="main-content flex-1 bg-white mt-12 md:mt-2 pb-24 md:pb-5">
                    <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white ">
                        <h1 class="text-3xl font-bold text-center"> Administración de Empleados </h1>
                    </div>
                    <section>
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4 ml-4 mr-4">
                            <div class="flex justify-between items-center mb-4">
                                <div class="flex-grow">
                                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white">TABLA EMPLEADOS</h2>
                                </div>
                                <button class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-2 rounded inline-flex items-center" onclick="abrirModal()">
                                    <i class="fa fa-plus pr-0 md:pr-3"></i>Agregar Empleado</button>
                            </div>
                            <table id="tablaEmpleados" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 mt-4">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">Nombres</th>
                                        <th scope="col" class="px-6 py-3"> Apellidos</th>
                                        <th scope="col" class="px-6 py-3">DNI</th>
                                        <th scope="col" class="px-6 py-3">Fecha Nacimiento</th>
                                        <th scope="col" class="px-6 py-3">Genero</th>
                                        <th scope="col" class="px-6 py-3">Teléfono</th>
                                        <th scope="col" class="px-6 py-3">Email </th>
                                        <th scope="col" class="px-6 py-3">Domicilio</th>
                                        <th scope="col" class="px-6 py-3">Cargo</th>
                                        <th scope="col" class="px-6 py-3">Horario</th>
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
                                            <td><?= $data[$i]['fecha-nac'] ?></td>
                                            <td><?= $data[$i]['genero'] ?></td>
                                            <td><?= $data[$i]['telefono'] ?></td>
                                            <td><?= $data[$i]['email'] ?></td>
                                            <td><?= $data[$i]['domicilio'] ?></td>
                                            <td><?= $data[$i]['cargo'] ?></td>
                                            <td><?= $data[$i]['horario'] ?></td>
                                            <td class="px-6 py-4">
                                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                                    <span class="inline-flex overflow-hidden rounded-md border bg-white shadow-sm">
                                                        <button class="inline-block border-e p-3 text-gray-700  hover:bg-green-600 hover:text-white focus:relative" title="Editar" onclick="updateEmpleado(<?= $data[$i]['ID'] ?>)">
                                                            <i class="fa fa-edit pr-0 md:pr-3"></i>
                                                        </button>
                                                        <button class="inline-block p-3 text-gray-700 hover:bg-red-500 hover:text-white focus:relative" title="Delete" id="deleteButton" onclick="deleteEmpleado(<?= $data[$i]['ID'] ?>)">
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

                        <!--INICIO MODAL-->
                        <div id="modalEmpleados" tabindex="-1" aria-hidden="true" aria-labelledby="modal" class="fixed inset-0 justify-center items-center hidden overflow-y-auto overflow-x-hidden z-50 w-full md:inset-0 h-[calc(100%-1rem)]">
                            <div class="fixed inset-0 bg-black opacity-50"></div>
                            <div class="mx-auto max-w-screen-xl px-4 py-5 sm:px-6 lg:px-300 lg:max-w-5xl">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 modal-lg">
                                    <!-- Modal header -->
                                    <div class="flex items-center justify-between p-5 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white" id="modal">Agregar Empleado</h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-10 h-1 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="modalEmpleados" onclick="cerrarModal()">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <form class="p-3 md:p-3 max-w-xl mx-auto" id="formularioEmpleados" method="post">
                                        <div class="grid gap-8">
                                            <div>
                                                <input type="hidden" name="id" id="txtID" value="">
                                                <input type="hidden" name="request" id="txtRequest" value="agregarEmpleados">
                                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nombres">Nombres:</label>
                                                <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Primer y segundo nombre" type="text" id="nombres" required="" />
                                                <div class="flex flex-wrap justify-between">
                                                    <div class="w-full sm:w-1/3 mt-4">
                                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="primer_apellido">Primer Apellido:</label>
                                                        <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Primer apellido" type="text" id="primer_apellido" required="" />
                                                    </div>
                                                    <div class="w-full sm:w-1/3 mt-4">
                                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="segundo_apellido">Segundo Apellido:</label>
                                                        <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Segundo apellido" type="text" id="segundo_apellido" required=" " />
                                                    </div>
                                                    <div class="w-full sm:w-1/3 mt-4">
                                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="primer_apellido">DNI:</label>
                                                        <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="DNI" type="text" id="dni" required=" " />
                                                    </div>
                                                </div>
                                                <div class="flex flex-wrap justify-between">
                                                    <div class="w-full sm:w-1/3 mt-4">
                                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nac">Fecha de Nacimiento:</label>
                                                        <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" type="date" id="nac" required="" />
                                                    </div>
                                                    <div class="w-full sm:w-1/3 mt-4">
                                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="primer_apellido">Email:</label>
                                                        <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Email" type="email" id="email" required="" />
                                                    </div>
                                                    <div class="w-full sm:w-1/3 mt-4">
                                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="segundo_apellido">Teléfono:</label>
                                                        <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Teléfono" type="tel" id="telefono" required="" />
                                                    </div>
                                                </div>
                                                <div class="flex flex-wrap justify-between">
                                                    <div class="w-full sm:w-1/3 mt-4">
                                                        <label for="genero" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Género:</label>
                                                        <select id="genero" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                            <option selected>Seleccione:</option>
                                                            <option value="F">Femenino</option>
                                                            <option value="M">Masculino</option>
                                                        </select>
                                                    </div>
                                                    <div class="w-full sm:w-1/3 mt-4">
                                                        <label for="cargos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cargo:</label>
                                                        <select id="cargos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                                                            <option selected disabled>Seleccione:</option>
                                                            <?php for ($i = 0; $i < count($cargos); $i++) { ?>
                                                                <option value="<?= $cargos[$i]['ID'] ?>"><?= $cargos[$i]['nombre'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="w-full sm:w-1/3 mt-4">
                                                        <label for="horarios" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Horario:</label>
                                                        <select id="horarios" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                            <option selected disabled>Seleccione:</option>
                                                            <?php
                                                            for ($i = 0; $i < count($horario); $i++) {
                                                            ?>
                                                                <option value="<?= $horario[$i]['ID'] ?>"><?= $horario[$i]['nombre'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="w-full  mt-4">
                                                    <label flor="domicilio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Domicilio:</label>
                                                    <textarea id="domicilio" rows="1" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""></textarea>
                                                </div>
                                                <div class="w-full mt-4">
                                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="segundo_apellido">Inicio de labores:</label>
                                                    <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Inicio Labores" type="date" id="IniLab" required />
                                                </div>
                                                <div class="mt-6 flex justify-center">
                                                    <button onclick="registrarEmpleados(event)" type="submit" id="btnGuardar" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-bold rounded-lg text-sm px-20 py-3 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">

                                                        Registrar
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                </div>

                                </form>
                            </div>
                        </div>
                </div>
                <!--FIN MODAL-->
                </section>
            </div>
        </div>
        </div>
    </main>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.title = "empleados";
    </script>

    <script src="../../js/empleados.js"></script>
    <script>
        function deleteEmpleado(id) {
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
                icon: "warning",
                title: "¿Seguro desea eliminar este empleado?",
                text: 'Si lo hace, el regitro de empleados no estará disponible.',
                showCancelButton: true,
                focusConfirm: false
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post('.././controllers/ctrlEmpleados.php', {
                        reg: 'deleteEmpleado',
                        id: id
                    }).done((response) => {
                        if (response.status === 'success') {
                            Toast.fire({
                                icon: 'success',
                                title: "Empleado eliminado con exito"
                            })
                            location.reload();
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: "Error al intentar eliminar empleado"
                            })
                        }
                    })

                }
            });
        }
    </script>
</body>

</html>