<?php
session_start();
if (isset($_SESSION['GYM']['nombre'])) {
      include $_SERVER['DOCUMENT_ROOT'] . '/GymTech-Manager/src/controllers/ctrlPlanes.php';
      // Instanciar el controlador de planes
      $controlador = new ctrlPlanes();
      // Obtener los planes
      $result = $controlador->getMembresias();
      // Obtener los datos de los planes
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
            <?php include("../components/header.php"); ?>


            <main style="margin-top: 60px; align-content: center;">
                  <div class="flex flex-col md:flex-row">
                        <?php include("../components/navOutContent.php"); ?>

                        <div id="main" class="main-content flex-1 bg-white  mt-12 md:mt-2 pb-24 md:pb-5 ">
                              <div id="main" class="main-content flex-1 bg-white mt-12 md:mt-2 pb-24 md:pb-5">
                                    <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white ">
                                          <h1 class="text-3xl font-bold text-center"> Consulta de Planes </h1>
                                    </div>
                                    <section>
                                          <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4 ml-4 mr-4">
                                                <div class="flex justify-between items-center mb-4">
                                                      <div class="flex-grow">
                                                            <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Tabla Planes</h2>
                                                      </div>
                                                </div>
                                                <table id="tablaPlanes" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 mt-4">
                                                            <tr>
                                                                  <th scope="col" class="px-6 py-3">Cliente</th>
                                                                  <th scope="col" class="px-6 py-3"> Tipo membresía</th>
                                                                  <th scope="col" class="px-6 py-3">Nombre Plan</th>
                                                                  <th scope="col" class="px-6 py-3">Cod. Plan</th>
                                                                  <th scope="col" class="px-6 py-3">Fecha Inscripción</th>
                                                                  <th scope="col" class="px-6 py-3">Empleado</th>
                                                            </tr>
                                                      </thead>
                                                      <tbody>
                                                            <?php
                                                            for ($i = 0; $i < count($data); $i++) {
                                                            ?>
                                                                  <tr>
                                                                        <td><?= $data[$i]['Cliente'] ?></td>
                                                                        <td><?= $data[$i]['Tipo Plan'] ?></td>
                                                                        <td><?= $data[$i]['Nombre Plan'] ?></td>
                                                                        <td><?= $data[$i]['Codigo de Plan'] ?></td>
                                                                        <td><?= $data[$i]['Fecha Inscripcion'] ?></td>
                                                                        <td><?= $data[$i]['Empleado'] ?></td>
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
                  document.title = "Planes";
            </script>
            <script src="../../js/planes.js"></script>
      </body>

      </html>
<?php
} else {
      header('location: ../../index.php');
}
?>