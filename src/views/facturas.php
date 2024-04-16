<?php
session_start();
if (isset($_SESSION['GYM']['nombre'])) {
    include $_SERVER['DOCUMENT_ROOT'] . '/GymTech-Manager/src/controllers/ctrlFacturas.php';
    $controlador = new ctrlFacturas();
    $result = $controlador->getFacturas();
   
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
                            <h1 class="text-3xl font-bold text-center"> Consulta de Facturas</h1>
                        </div>
                        <section>
                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4 ml-4 mr-4">
                                <div class="flex justify-between items-center mb-4">
                                    <div class="flex-grow">
                                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white">TABLA FACTURAS</h2>
                                    </div>
                                </div>
                                <table id="tablaFacturas" class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 mt-4">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">Nº Factura</th>
                                            <th scope="col" class="px-6 py-3">ID Detalle</th>
                                            <th scope="col" class="px-6 py-3">Fecha Facturación</th>
                                            <th scope="col" class="px-6 py-3">Empleado</th>
                                            <th scope="col" class="px-6 py-3">Cliente</th>
                                            <th scope="col" class="px-6 py-3">Membresía</th>
                                            <th scope="col" class="px-6 py-3">Concepto Pago</th>
                                            <th scope="col" class="px-6 py-3">Precio</th>
                                            <th scope="col" class="px-6 py-3">Descuento</th>
                                            <th scope="col" class="px-6 py-3">Sobrecargo</th>
                                            <th scope="col" class="px-6 py-3">Subtotal</th>
                                            <th scope="col" class="px-6 py-3">Monto a Pagar</th>
                                            <th scope="col" class="px-6 py-3">Monto Dado</th>
                                            <th scope="col" class="px-6 py-3">Cambio</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        for ($i = 0; $i < count($data); $i++) {
                                        ?>
                                            <tr>
                                                <td><?= $data[$i]['N Factura'] ?></td>
                                                <td><?= $data[$i]['ID Detalle Factura'] ?></td>
                                                <td><?= $data[$i]['Fecha Facturacion'] ?></td>
                                                <td><?= $data[$i]['Empleado'] ?></td>
                                                <td><?= $data[$i]['Cliente'] ?></td>
                                                <td><?= $data[$i]['Nombre Membresia'] ?></td>
                                                <td><?= $data[$i]['Concepto Pago'] ?></td>
                                                <td><?= $data[$i]['Precio'] ?></td>
                                                <td><?= $data[$i]['Descuento'] ?></td>
                                                <td><?= $data[$i]['Sobrecargo'] ?></td>
                                                <td><?= $data[$i]['Subtotal'] ?></td>
                                                <td><?= $data[$i]['Monto a Pagar'] ?></td>
                                                <td><?= $data[$i]['Monto Dado'] ?></td>
                                                <td><?= $data[$i]['Cambio'] ?></td>                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    </section>
                </div>
            </div>
        </main>


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
       
        <script src="../../js/jszip.min.js"></script>
        <script src="../../js/pdfmake.min.js"></script>
        <script src="../../js/vfs_fonts.js"></script>
        <script src="../../js/dataTables.buttons.min.js"></script>
        <script src="../../js/buttons.html5.min.js"></script>
        <script src="../../js/facturas.js"></script>
    
    </body>
    </html>
<?php
} else {
    header('location: ../../index.php');
}
?>