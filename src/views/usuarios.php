<?php
session_start();
if (isset($_SESSION['GYM']['nombre'])) {
    include($_SERVER['DOCUMENT_ROOT'] . '/GymTech-Manager/src/controllers/ctrlUsuarios.php');
    $controller = new CtrlUsuarios();
    $usuarios = $controller->getUsuarios();
    $usuarios = $usuarios[2];
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
        <?php include("../components/header.php"); ?>
        <main style="margin-top: 60px; align-content: center;">
            <div class="flex flex-col md:flex-row">
                <?php include("../components/navOutContent.php") ?>
                <section id='main' class='main-content flex-1 bg-white mt-12 md:mt-2 pb-24 md:pb-5'>
                    <section id='main' class='maint-content flex-1 bg-white mt-12 md:mt-2 pb-24 md:pb-5'>
                        <section class="rounded-tl 3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                            <h1 class="text-3xl font-bold text-center">Administración de Usuarios</h1>
                        </section>
                        <section class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4 mr-4">
                            <section class="flex justify-between items-center mb-4">
                                <section class="flex-grow">
                                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white">TABLA USUARIOS</h2>
                                </section>
                                <button class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-2 rounded inline-flex items-center" onclick="abrirModal()">
                                    <i class="fa fa-plus pr-0 md:pr-3"></i> Agregar Usuario
                                </button>
                            </section>
                            <table id="tableUsers" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 mt-4">
                                    <tr>
                                        <td scope="col" class="px-6 py-3">ID</td>
                                        <td scope="col" class="px-6 py-3">Alias</td>
                                        <td scope="col" class="px-6 py-3">Empleado</td>
                                        <td scope="col" class="px-6 py-3">Permiso Cliente</td>
                                        <td scope="col" class="px-6 py-3">Permiso Facturacion</td>
                                        <td scope="col" class="px-6 py-3">Permiso Reporteria</td>
                                        <td scope="col" class="px-6 py-3">Permiso Administracion</td>
                                        <td scope="col" class="px-6 py-3">Accion</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i < count($usuarios); $i++) { ?>
                                        <tr>
                                            <td><?= $usuarios[$i]['ID_EMPLEADO'] ?></td>
                                            <td><?= $usuarios[$i]['alias'] ?></td>
                                            <td><?= $usuarios[$i]['Empleado'] ?></td>
                                            <td><?= $usuarios[$i]['clientes'] ?></td>
                                            <td><?= $usuarios[$i]['facturacion'] ?></td>
                                            <td><?= $usuarios[$i]['reporteria'] ?></td>
                                            <td><?= $usuarios[$i]['administracion'] ?></td>
                                            <td class="px-6 py-4">
                                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                                    <span class="inline-flex overflow-hidden rounded-md border bg-white shadow-sm">
                                                        <button class="inline-block border-e p-3 text-gray-700  hover:bg-green-600 hover:text-white focus:relative" title="Editar" onclick="updateUsuario(<?= $usuarios[$i]['ID_EMPLEADO'] ?>)">
                                                            <i class="fa fa-edit pr-0 md:pr-3"></i>
                                                        </button>
                                                        <button class="inline-block p-3 text-gray-700 hover:bg-red-500 hover:text-white focus:relative" title="Delete" id="deleteButton" onclick="deleteUsuario(<?= $usuarios[$i]['ID_EMPLEADO'] ?>)">
                                                            <i class="fa fa-trash pr-0 md:pr-1"></i>
                                                        </button>
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </section>
                    </section>
                </section>

            </div>
        </main>
    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="../../js/usuarios.js"></script>

    </html>

<?php
} else {
    header('location: ../../index.php');
}
?>