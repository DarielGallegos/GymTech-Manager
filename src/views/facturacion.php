<?php
session_start();
if (isset($_SESSION['GYM']['nombre'])) {
      include($_SERVER['DOCUMENT_ROOT'].'/GymTech-Manager/src/controllers/ctrlFacturacion.php');
      $controller = new CtrlFacturacion();
      $membresias = $controller->getMembresiasDisponibles();
      $membresias = $membresias[2];
?>
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
            <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" /> <!--Replace with your tailwind.css once created-->
            <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> <!--Totally optional :) -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>

      </head>
      <body class="bg-gray-800 font-sans leading-normal tracking-normal mt-12">
            <?php include("../components/header.php"); ?>
            <main style="margin-top: 60px; align-content: center;">
                  <div class="flex flex-col md:flex-row">
                        <?php include("../components/navOutContent.php"); ?>


                        <div id="main" class="main-content flex-1 bg-white  mt-12 md:mt-2 pb-24 md:pb-5 ">
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
                                                            <section class="flex flex-wrap justify-between">
                                                                  <section class="order-first">
                                                                        <p>N° Factura: </p>
                                                                        <p>Empleado: <?= $_SESSION['GYM']['nombre'] ?></p>
                                                                        <p>Fecha de Facturación: </p>
                                                                  </section>
                                                                  <section class="w-64">
                                                                        <button class="group relative inline-block text-sm font-medium text-blue-600 focus:outline-none focus:ring active:text-blue-500 w-full" id="addItem">
                                                                              <span class="absolute inset-0 translate-x-0.5 translate-y-0.5 bg-blue-600 transition-transform group-hover:translate-x-0 group-hover:translate-y-0"></span>
                                                                              <span class="relative block border border-current bg-white px-6 py-2">Agregar Nuevo Elemento 📑</span>
                                                                        </button>
                                                                        <br>
                                                                        <button class="group relative inline-block text-sm font-medium text-green-600 focus:outline-none focus:ring active:text-green-500 w-full">
                                                                              <span class="absolute inset-0 translate-x-0.5 translate-y-0.5 bg-green-600 transition-transform group-hover:translate-x-0 group-hover:translate-y-0"></span>      
                                                                              <span class="relative block border border-current bg-white px-6 py-2">Guardar 💾</span>      
                                                                        </button>
                                                                        <br>
                                                                        <button class="group relative inline-block text-sm font-medium text-red-600 focus:outline-none focus:ring active:text-red-500 w-full" id="btnFlush">
                                                                              <span class="absolute inset-0 translate-x-0.5 translate-y-0.5 bg-red-600 transition-transform group-hover:translate-x-0 group-hover:translate-y-0"></span>
                                                                              <span class="relative block border border-current bg-white px-6 py-2">Limpiar 🗑️</span>
                                                                        </button>
                                                                  </section>
                                                            </section>
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
                                                            <table class="min-w-full divide-y-2 divide-gray-800 bg-white text-sm dark:divide-gray-700 dark:bg-gray-900 rounded-md">
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
                                                                  <tbody id="contentTable" class="divide-y divide-gray-200 dark:divide-gray-700 text-center">
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
            <script src="../../js/jquery-3.7.1.min.js"></script>
            <script src="../../js/vwFacturacion.js"></script>
            <script>
                  document.getElementById('addItem').addEventListener('click', () => {
                        var row = document.createElement('tr');
                        row.classList.add('bg-gray-800');
                        row.innerHTML = 
                        `     <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 dark:text-gray-800">
                                    <section class="relative">
                                          <select id="idMembresia" class="w-full rounded-md border-gray-200 pe-10 shadow-sm sm:text-sm">
                                                <option value="0">Seleccione</option>
                                                <?php for($i=0; $i<count($membresias); $i++){?>
                                                      <option value="<?= $membresias[$i]['ID']?>"><?= $membresias[$i]['nombres-membresia']?></option>
                                                <?php }?>
                                          </select>
                                    </section>
                              </td>
                              <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 dark:text-gray-800">
                                    <section class="relative">
                                          <select id="idCliente" class="w-full rounded-md border-gray-200 pe-10 shadow-sm sm:text-sm">
                                          </select>
                                    </section>
                              </td>
                              <td class="whitespace-nowrap px-4 py-2 text-gray-900 dark:text-gray-800">
                                    <section class="relative">
                                          <select name="" id="idConcepto" class="w-full rounded-md border-gray-200 pe-10 shadow-sm sm:text-sm">
                                                <option value="2">Mensualidad</option>
                                                <option value="1">Matricula</option>
                                          </select>
                                    </section>
                              </td>
                              <td id="cellPrecio" class="whitespace-nowrap px-4 py-2 text-gray-200 dark:text-gray-200"></td>
                              <td id="cellSobrecargo" class="whitespace-nowrap px-4 py-2 text-gray-200 dark:text-gray-200"></td>
                              <td id="cellDescuento" class="whitespace-nowrap px-4 py-2 text-gray-200 dark:text-gray-200"></td>
                              <td id="cellSubTotal" class="whitespace-nowrap px-4 py-2 text-gray-200 dark:text-gray-200"></td>
                              <td>
                                    <button class="inline-block rounded-full border border-red-600 bg-transparent p-2.5 text-white hover:text-red-600 focus:outline-none focus:ring active:text-red-500" onclick="deleteElement(this);"><i class="nf nf-oct-trash"></i></button>
                              </td>`;
                        document.getElementById('contentTable').prepend(row);
                        row.querySelector('#idMembresia').addEventListener('change', () => {
                              var id = parseInt(row.querySelector('#idMembresia').value);
                              $.post('../controllers/ctrlFacturacion.php', {
                                    peticion: 'getClientesAsociados',
                                    id: id
                              }).done((response) => {
                                    if(response.status === 'success'){
                                          var nodeCBO  = row.querySelector('#idCliente');
                                          while(nodeCBO.firstChild){
                                                nodeCBO.removeChild(nodeCBO.firstChild);
                                          }
                                          var defaultElement =document.createElement('option');
                                          defaultElement.value = 0;
                                          defaultElement.textContent = "Seleccione";
                                          row.querySelector('#idCliente').append(defaultElement);
                                          for(i=0; i<response.data.length; i++){
                                                var element =document.createElement('option');
                                                element.value = response.data[i]['ID_CLIENTE'];
                                                element.textContent = response.data[i]['Cliente'];
                                                row.querySelector('#idCliente').append(element);
                                          }
                                    }
                              });
                        });
                        row.querySelector('#idCliente').addEventListener('change', () => {
                              var idMembresia = parseInt(row.querySelector('#idMembresia').value);
                              var idCliente = parseInt(row.querySelector('#idCliente').value);
                              var concepto = parseInt(row.querySelector('#idConcepto').value);
                              data = {
                                    'membresia' : idMembresia,
                                    'cliente' : idCliente,
                                    'concepto' : concepto
                              }
                              console.log(data);
                              $.post('../controllers/ctrlFacturacion.php', {
                                    peticion: 'getDataContable',
                                    data: data
                              }).done((response) => {
                                    row.querySelector('#cellPrecio').textContent = response.data['precio'];
                              })
                        });
                        row.querySelector('#idConcepto').addEventListener('change', () => {
                              var idMembresia = parseInt(row.querySelector('#idMembresia').value);
                              var idCliente = parseInt(row.querySelector('#idCliente').value);
                              var concepto = parseInt(row.querySelector('#idConcepto').value);
                              data = {
                                    'membresia' : idMembresia,
                                    'cliente' : idCliente,
                                    'concepto' : concepto
                              }
                              console.log(data);
                              $.post('../controllers/ctrlFacturacion.php', {

                              })
                        });
                  })
            </script>
      </body>
      </html>
<?php
} else {
      header('location: ../../index.php');
}
?>