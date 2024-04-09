<?php
session_start();
if (isset($_SESSION['GYM']['nombre'])) {
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
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/sweetalert/dist/sweetalert.css">

    </head>

    <body class="bg-gray-800 font-sans leading-normal tracking-normal mt-12">
        <?php include('../components/header.php'); ?>
        <main style="margin-top: 60px; align-content: center;">
            <div class="flex flex-col md:flex-row">
                <?php include("../components/navOutContent.php"); ?>
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
                                        <form class="p-3 md:p-3 max-w-xl mx-auto" id="formularioEmpleados">
                                            <div class="grid gap-8">
                                                <div>
                                                    <input type="hidden" name="id" id="txtID" value="">
                                                    <input type="hidden" name="reg" id="txtRequest" value="insertEmpleados">
                                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nombres">Nombres:</label>
                                                    <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Primer y segundo nombre" type="text" id="nombres" name="nombres" required="" />
                                                    <div class="flex flex-wrap justify-between">
                                                        <div class="w-full sm:w-1/3 mt-4">
                                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="primer_apellido">Primer Apellido:</label>
                                                            <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Primer apellido" type="text" id="primer_apellido" name="apellidoP" required="" />
                                                        </div>
                                                        <div class="w-full sm:w-1/3 mt-4">
                                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="segundo_apellido">Segundo Apellido:</label>
                                                            <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Segundo apellido" type="text" id="segundo_apellido" name="apellidoM" required=" " />
                                                        </div>
                                                        <div class="w-full sm:w-1/3 mt-4">
                                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="primer_apellido">DNI:</label>
                                                            <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="DNI" type="text" id="dni" name="dni" required=" " />
                                                        </div>
                                                    </div>
                                                    <div class="flex flex-wrap justify-between">
                                                        <div class="w-full sm:w-1/3 mt-4">
                                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nac">Fecha de Nacimiento:</label>
                                                            <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" type="date" id="nac" name="fechaNac" required="" />
                                                        </div>
                                                        <div class="w-full sm:w-1/3 mt-4">
                                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="primer_apellido">Email:</label>
                                                            <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Email" type="email" id="email" name="email" required="" />
                                                        </div>
                                                        <div class="w-full sm:w-1/3 mt-4">
                                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="segundo_apellido">Teléfono:</label>
                                                            <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Teléfono" type="tel" id="telefono" name="telefono" required="" />
                                                        </div>
                                                    </div>
                                                    <div class="flex flex-wrap justify-between">
                                                        <div class="w-full sm:w-1/3 mt-4">
                                                            <label for="genero" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Género:</label>
                                                            <select id="genero" name="genero" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                <option selected>Seleccione:</option>
                                                                <option value="F">Femenino</option>
                                                                <option value="M">Masculino</option>
                                                            </select>
                                                        </div>
                                                        <div class="w-full sm:w-1/3 mt-4">
                                                            <label for="cargos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cargo:</label>
                                                            <select id="cargos" name="id_cargo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                                                                <option selected disabled>Seleccione:</option>
                                                                <?php for ($i = 0; $i < count($cargos); $i++) { ?>
                                                                    <option value="<?= $cargos[$i]['ID'] ?>"><?= $cargos[$i]['nombre'] ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="w-full sm:w-1/3 mt-4">
                                                            <label for="horarios" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Horario:</label>
                                                            <select id="horarios" name="id_horario" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
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
                                                        <textarea id="domicilio" name="domicilio" rows="1" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""></textarea>
                                                    </div>
                                                    <div class="w-full mt-4">
                                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="segundo_apellido">Inicio de labores:</label>
                                                        <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Inicio Labores" type="date" id="IniLab" name="fechaIniLabores" required />
                                                    </div>
                                                    <div class="mt-6 flex justify-center">
                                                        <button type="submit" id="btnGuardar" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-bold rounded-lg text-sm px-20 py-3 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                                            Registrar
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <!--FIN MODAL-->
                    </section>
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
            function updateEmpleado(id) {
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
                $.post('.././controllers/ctrlEmpleados.php', {
                    reg: 'getOneEmpleado',
                    id: id
                }).done((response) => {
                    Swal.fire({
                        title: "Formulario de Modificacion de Empleado",
                        html: `
                        <form class="p-3 md:p-3 max-w-xl mx-auto" id="formularioEmpleados">
                                            <div class="grid gap-8">
                                                <div>
                                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nombres">Nombres:</label>
                                                    <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Primer y segundo nombre" type="text" id="nombresUp" name="nombres" value='${response.data[0]['nombres']}' required="" />
                                                    <div class="flex flex-wrap justify-between">
                                                        <div class="w-full sm:w-1/3 mt-4">
                                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="primer_apellido">Primer Apellido:</label>
                                                            <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Primer apellido" type="text" id="primer_apellidoUp" name="apellidoP" value='${response.data[0]['apellido-paterno']}' required="" />
                                                        </div>
                                                        <div class="w-full sm:w-1/3 mt-4">
                                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="segundo_apellido">Segundo Apellido:</label>
                                                            <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Segundo apellido" type="text" id="segundo_apellidoUp" name="apellidoM" value='${response.data[0]['apellido-materno']}' required=" " />
                                                        </div>
                                                        <div class="w-full sm:w-1/3 mt-4">
                                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="primer_apellido">DNI:</label>
                                                            <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="DNI" type="text" id="dniUp" name="dni" value='${response.data[0]['dni']}' required=" " />
                                                        </div>
                                                    </div>
                                                    <div class="flex flex-wrap justify-between">
                                                        <div class="w-full sm:w-1/3 mt-4">
                                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nac">Fecha de Nacimiento:</label>
                                                            <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" type="date" id="nacUp" name="fechaNac" value='${response.data[0]['fecha-nac']}' required="" />
                                                        </div>
                                                        <div class="w-full sm:w-1/3 mt-4">
                                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="primer_apellido">Email:</label>
                                                            <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Email" type="email" id="emailUp" name="email" value='${response.data[0]['email']}' required="" />
                                                        </div>
                                                        <div class="w-full sm:w-1/3 mt-4">
                                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="segundo_apellido">Teléfono:</label>
                                                            <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Teléfono" type="tel" id="telefonoUp" name="telefono" value='${response.data[0]['telefono']}' required="" />
                                                        </div>
                                                    </div>
                                                    <div class="flex flex-wrap justify-between">
                                                        <div class="w-full sm:w-1/3 mt-4">
                                                            <label for="genero" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Género:</label>
                                                            <select id="generoUp" name="genero" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                <option selected>Seleccione:</option>
                                                                <option value="F">Femenino</option>
                                                                <option value="M">Masculino</option>
                                                            </select>
                                                        </div>
                                                        <div class="w-full sm:w-1/3 mt-4">
                                                            <label for="cargos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cargo:</label>
                                                            <select id="cargosUp" name="id_cargo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                                                                <option selected disabled>Seleccione:</option>
                                                                <?php for ($i = 0; $i < count($cargos); $i++) { ?>
                                                                    <option value="<?= $cargos[$i]['ID'] ?>"><?= $cargos[$i]['nombre'] ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="w-full sm:w-1/3 mt-4">
                                                            <label for="horarios" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Horario:</label>
                                                            <select id="horariosUp" name="id_horario" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
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
                                                        <textarea id="domicilioUp" name="domicilio" rows="1" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="">${response.data[0]['domicilio']}</textarea>
                                                    </div>
                                                    <div class="w-full mt-4">
                                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="segundo_apellido">Inicio de labores:</label>
                                                        <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Inicio Labores" type="date" id="IniLabUp" name="fechaIniLabores" value='${response.data[0]['fecha-inicio-labores']}' required />
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                        `,
                        showCancelButton: true,
                        confirmButtonText: 'Aceptar',
                        cancelButtonText: 'Cancelar',
                        didOpen: () => {
                            document.getElementById('generoUp').value = response.data[0]['genero'];
                            document.getElementById('cargosUp').value = response.data[0]['ID_CARGO'];
                            document.getElementById('horariosUp').value = response.data[0]['ID_HORARIO'];
                        }
                    }).then((flag) => {
                        if (flag.isConfirmed) {
                            let nombres = document.getElementById('nombresUp').value;
                            let primer_apellido = document.getElementById('primer_apellidoUp').value;
                            let segundo_apellido = document.getElementById('segundo_apellidoUp').value;
                            let dni = document.getElementById('dniUp').value;
                            let fechaNacimiento = document.getElementById('nacUp').value;
                            let genero = document.getElementById('generoUp').value;
                            let cargos = document.getElementById('cargosUp').value;
                            let horarios = document.getElementById('horariosUp').value;
                            let telefono = document.getElementById('telefonoUp').value;
                            let email = document.getElementById('emailUp').value;
                            let domicilio = document.getElementById('domicilioUp').value;
                            let IniLabores = document.getElementById('IniLabUp').value;
                            $.post('.././controllers/ctrlEmpleados.php', {
                                reg: 'updateEmpleados',
                                nombres: nombres,
                                apellidoP: primer_apellido,
                                apellidoM: segundo_apellido,
                                dni: dni,
                                fechaNac: fechaNacimiento,
                                genero: genero,
                                id_cargo: cargos,
                                id_horario: horarios,
                                telefono: telefono,
                                email: email,
                                domicilio: domicilio,
                                fechaIniLabores: IniLabores,
                                id: id
                            }).done((result) => {
                                if (result.status === 'success') {
                                    Toast.fire({
                                        icon: 'success',
                                        text: 'Exito al registrar empleado'
                                    }).then((res) => {
                                        location.reload();
                                    })
                                } else {
                                    Toast.fire({
                                        icon: 'error',
                                        text: 'Error al registrar empleado'
                                    })
                                }
                            })
                        } else {
                            Toast.fire({
                                icon: 'info',
                                text: "Se cancelo la operacion de modifiacion de empleado"
                            })
                        }
                    })
                })
            }
        </script>
    </body>

    </html>
<?php
} else {
    header('location: ../../index.php');
}
?>