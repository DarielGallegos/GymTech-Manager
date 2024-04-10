<?php
session_start();
if (isset($_SESSION['GYM']['nombre'])) {
    include($_SERVER['DOCUMENT_ROOT'] . '/GymTech-Manager/src/controllers/ctrlUsuarios.php');
    $controller = new CtrlUsuarios();
    $usuarios = $controller->getUsuarios();
    $usuarios = $usuarios[2];
    $empleados = $controller->getEmpleadosSinUsuarios();
    $empleados = $empleados[2];
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
                <section>
                    <div id="modalUsuarios" tabindex="-1" aria-hidden="true" aria-labelledby="modal" class="fixed inset-0 justify-center items-center hidden overflow-y-auto overflow-x-hidden z-50 w-full md:inset-0 h-[calc(100%-1rem)]">
                        <div class="fixed inset-0 bg-black opacity-50"></div>
                        <div class="mx-auto max-w-screen-xl px-4 py-5 sm:px-6 lg:px-300 lg:max-w-5xl">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 modal-lg">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-5 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white" id="modal">Agregar Usuario</h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-10 h-1 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="modalEmpleados" onclick="cerrarModal()">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <form class="p-3 md:p-3 max-w-xl mx-auto" id="formularioUsuarios">
                                    <div class="grid gap-8">
                                        <div>
                                            <input type="hidden" name="peticion" id="txtRequest" value="insertUsuario">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="">Seleccione el Empleado: </label>
                                            <select name="idEmpleado" id="idEmpleado" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                                                <option value="0">Seleccione</option>
                                                <?php for($x=0; $x<count($empleados);$x++){?>
                                                    <option value="<?= $empleados[$x]['ID']?>"><?= $empleados[$x]['Empleado']. ' - '. $empleados[$x]['Identidad']?></option>
                                                <?php }?>
                                            </select>

                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nombres">Alias:</label>
                                            <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Alias" type="text" id="alias" name="alias" required="" />

                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 py-3" for="nombres">Password:</label>
                                            <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Contraseña" type="password" id="password" name="password" required="" />

                                            
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 py-3" for="nombres">Password:</label>
                                            <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Contraseña" type="password" id="passwordC" name="passwordC" required="" />
                                        </div>
                                        <div>
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 text-center" for="alias">Niveles de Permiso:</label>
                                            <div class="flex flex-wrap justify-between py-2">
                                                <div class="w-full sm:w-1/2 mt-4">
                                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="pClienteUp">Clientes:</label>
                                                    <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" type="number" id="pCliente" name="pCliente" required="" />
                                                </div>
                                                <div class="w-full sm:w-1/2 mt-4">
                                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="pClienteUp">Facturación:</label>
                                                    <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" type="number" id="pFacturacion" name="pFacturacion" required="" />
                                                </div>
                                            </div>
                                            <div class="flex flex-wrap justify-between">
                                                <div class="w-full sm:w-1/2 mt-4">
                                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="pClienteUp">Reporteria:</label>
                                                    <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" type="number" id="pReporteria" name="pReporteria" required="" />
                                                </div>
                                                <div class="w-full sm:w-1/2 mt-4">
                                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="pClienteUp">Administración:</label>
                                                    <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" type="number" id="pAdministracion" name="pAdministracion" required="" />
                                                </div>
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