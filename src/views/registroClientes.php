<?php
session_start();
if (isset($_SESSION['GYM']['nombre'])) {
      include $_SERVER['DOCUMENT_ROOT'] . '/GymTech-Manager/src/controllers/ctrlClientes.php';
      // Instanciar el controlador de empleados
      $controlador = new ctrlClientes();

      //Obtener horarios
      $membresias = $controlador->getMembresias();
      $membresias = $membresias[2];
}
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
    <!--Replace with your tailwind.css once created-->
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> <!--Totally optional :) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"
        integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/sweetalert/dist/sweetalert.css">
</head>

<body class="bg-gray-800 font-sans leading-normal tracking-normal mt-12">
<?php include("../components/header.php"); ?>

    <main style="margin-top: 60px; align-content: center;">
        <div class="flex flex-col md:flex-row">
            <?php include('../components/navOutContent.php')?>
            <div id="main" class="main-content flex-1 bg-white  mt-12 md:mt-2 pb-24 md:pb-5 ">
                <div id="main" class="main-content flex-1 bg-white mt-12 md:mt-2 pb-24 md:pb-5">
                    <div
                        class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white ">
                        <h1 class="text-3xl font-bold text-center"> Administración de Clientes </h1>
                    </div>
                    <div>
                        <section class="bg-gray-100 flex justify-center items-center">
                            <div class="mx-auto max-w-screen-xl px-4 py-5 sm:px-6 lg:px-100 ">
                                <div class="grid grid-cols-1 gap-x-10 gap-y-8 lg:grid-cols-5 ">
                                    <div class="rounded-lg bg-white p-8 shadow-lg lg:col-span-3 lg:p-12 py-5">
                                        <form id="form_reg_cliente" class="space-y-4">
                                            <h2 class="text-2xl font-bold text-gray-900 dark:text-white text-center">
                                                FORMULARIO DE REGISTRO DE CLIENTES</H2>
                                            <div>
                                                <input type="text" id="frm_mem_id" class="hidden" required>
                                                <input type="text" id="frm_mem_nombre" class="hidden" required>
                                                <input type="text" id="frm_mem_tip_id" class="hidden" required>
                                                <input type="text" id="frm_emp_id" value="<?= $_SESSION['GYM']['id'] ?>" class="hidden" required>
                                                <label
                                                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                    for="name">Nombres:</label>
                                                <input name="nombres"
                                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                                    placeholder="Primer y segundo nombre" type="text" id="nombres"
                                                    required />
                                                <div class="flex flex-wrap justify-between">
                                                    <div class="w-full sm:w-5/12 mt-4">
                                                        <label
                                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                            for="primer_apellido">Primer Apellido:</label>
                                                        <input name="primer_apellido"
                                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                                            placeholder="Primer apellido" type="text"
                                                            id="primer_apellido" required />
                                                    </div>
                                                    <div class="w-full sm:w-5/12 mt-4">
                                                        <label
                                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                            for="segundo_apellido">Segundo Apellido:</label>
                                                        <input name="segundo_apellido"
                                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                                            placeholder="Segundo apellido" type="text"
                                                            id="segundo_apellido" required />
                                                    </div>
                                                </div>
                                                <div class="flex flex-wrap justify-between">
                                                    <div class="w-full sm:w-5/12 mt-4">
                                                        <label
                                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                            for="primer_apellido">DNI:</label>
                                                        <input name="dni"
                                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                                            placeholder="DNI" type="number" id="dni" required />
                                                    </div>
                                                    <div class="w-full sm:w-5/12 mt-4">
                                                        <label
                                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                            for="segundo_apellido">Fecha de Nacimiento:</label>
                                                        <input name="edad"
                                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                                            placeholder="Edad" type="date" id="edad" required />
                                                    </div>
                                                </div>
                                                <div class="flex flex-wrap justify-between">
                                                    <div class="w-full sm:w-5/12 mt-4">
                                                        <label
                                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                            for="primer_apellido">Email:</label>
                                                        <input name="email"
                                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                                            placeholder="Email" type="email" id="email" required />
                                                    </div>
                                                    <div class="w-full sm:w-5/12 mt-4">
                                                        <label
                                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                            for="segundo_apellido">Teléfono:</label>
                                                        <input name="telefono"
                                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                                            placeholder="Teléfono" type="tel" id="telefono" required />
                                                    </div>
                                                </div>
                                                <div class="flex flex-wrap justify-between">
                                                    <div class="w-full sm:w-5/12 mt-4">
                                                        <label for="genero"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Género:</label>
                                                        <select id="genero" name="genero"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            required>
                                                            <option selected>Seleccione:</option>
                                                            <option value="femenino">Femenino</option>
                                                            <option value="masculino">Masculino</option>
                                                        </select>
                                                    </div>
                                                    <div class="w-full sm:w-5/12 mt-4">
                                                        <label for="planes"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo
                                                            de membresía:</label>
                                                        <select id="planes" name="planes"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            onchange="funHandleVentanaModal(event)" required>
                                                            <option selected disabled>Seleccione:</option>
                                                            
                                                                <?php for ($i = 0; $i < count($membresias); $i++) { ?>
                                                                    <option value="<?= $membresias[$i]['ID'] ?>"><?= $membresias[$i]['nombre'] ?></option>
                                                                <?php } ?>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <fieldset id="deliveryOptions"
                                                    class="grid grid-cols-3 gap-4 py-4 hidden">
                                                    <legend class="sr-only">Delivery</legend>
                                                    <div>
                                                        <label for="Diario"
                                                            class="flex cursor-pointer justify-between gap-4 rounded-lg border border-fuchsia-600 bg-white p-4 text-sm font-medium shadow-sm hover:border-x-sky-700 has-[:checked]:border-blue-500 has-[:checked]:ring-1 has-[:checked]:ring-blue-500">
                                                            <div>
                                                                <p class="text-gray-700">Diario</p>
                                                                <p class="mt-1 text-gray-900">L.50</p>
                                                            </div>
                                                            <input type="radio" name="opcion" value="Diario" id="Diario"
                                                                class="size-8 border-gray-300 text-blue-500" checked />
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label for="Semanal"
                                                            class="flex cursor-pointer justify-between gap-4 rounded-lg border border-gray-100 bg-white p-4 text-sm font-medium shadow-sm hover:border-gray-200 has-[:checked]:border-blue-500 has-[:checked]:ring-1 has-[:checked]:ring-blue-500">
                                                            <div>
                                                                <p class="text-gray-700">Semanal</p>
                                                                <p class="mt-1 text-gray-900">L.300</p>
                                                            </div>
                                                            <input type="radio" name="opcion" value="Semanal"
                                                                id="Semanal"
                                                                class="size-8 border-gray-300 text-blue-500" />
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label for="Mensual"
                                                            class="flex cursor-pointer justify-between gap-4 rounded-lg border border-gray-100 bg-white p-4 text-sm font-medium shadow-sm hover:border-gray-200 has-[:checked]:border-blue-500 has-[:checked]:ring-1 has-[:checked]:ring-blue-500">
                                                            <div>
                                                                <p class="text-gray-700">Mensual</p>
                                                                <p class="mt-1 text-gray-900">L.900</p>
                                                            </div>
                                                            <input type="radio" name="opcion" value="Mensual"
                                                                id="Mensual"
                                                                class="size-8 border-gray-300 text-blue-500" />
                                                        </label>
                                                    </div>
                                                </fieldset>

                                                <div class="mt-6 flex justify-center">
                                                    <button onclick="registrarCliente(event)"
                                                        class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-bold rounded-lg text-sm px-20 py-3 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                                        Registrar
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
    </main>

    <!-- Modal de registro de plan -->
    <div id="venIngresarCodigoIndividual" class="fixed inset-0 flex items-center justify-center z-10  overflow-y-auto bg-gray-500 bg-opacity-75 hidden bg-gray-50">
        <div class="z-10 bg-white w-1/2 h-1/4 text-center rounded bg-blue-50">
            <h1 class="font-bold p-6">Crear Plan Individual</h1>
            <form class="max-w-sm mx-auto ">
                <div class="mb-5">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre
                        del Plan</label>
                    <input type="text" id="nombre_plan_individual_nuevo"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        required />
                </div>
                <button onclick="registrarNuevoPlan(event, 1)"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 mb-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrar
                    Plan</button>
                <button onclick="toggleVenCrearCodigoIndividual(event)"
                    class="text-white bg-gray-400 hover:bg-gray-500 focus:ring-4 mb-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cancelar</button>
            </form>
        </div>
    </div>

    <div id="venIngresarCodigoDuo" class="fixed inset-0 flex items-center justify-center z-10  overflow-y-auto bg-gray-500 bg-opacity-75 hidden  bg-gray-50">
        <div class="z-10 bg-white w-1/2 h-1/4 text-center rounded bg-blue-50">
            <h3 class="font-bold p-6" >Registrar Nuevo Plan Duo</h3>
            <div class="mt-2">
                <p class="text-sm text-gray-500" id="texto">¿Tiene un código de plan o desea registrar uno nuevo?</p>
            </div>
            <div class="m-6">
                <button id="tengoCodigo" type="button" onclick="toggleVenIngresarCodigoDuoExistente(event)" class="m-1 focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Tengo un código</button>
                <button id="crearCod" type="button" onclick="toggleVenCrearCodigoDuo(event)" class="m-1 focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Crear uno</button>
                <button onclick="toggleVenIngresarCodigoDuo(event)"
                    class="text-white bg-gray-400 hover:bg-gray-500 focus:ring-4 mb-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cancelar</button>
            </div>
            
        </div>
    </div>

    <div id="venIngresarCodigoFamiliar" class="fixed inset-0 flex items-center justify-center z-10  overflow-y-auto bg-gray-500 bg-opacity-75 hidden  bg-gray-50">
        <div class="z-10 bg-white w-1/2 h-1/4 text-center rounded  bg-blue-50">
        <h3 class="font-bold p-6" >Registrar Nuevo Plan Familiar</h3>
            <div class="mt-2">
                <p class="text-sm text-gray-500" id="texto">¿Tiene un código de plan o desea registrar uno nuevo?</p>
            </div>
            <div class="m-6">
                <button id="tengoCodigo" type="button" onclick="toggleVenIngresarCodigoFamiliarExistente(event)" class="m-1 focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Tengo un código</button>
                <button id="crearCod" type="button" onclick="toggleVenCrearCodigoFamiliar(event)" class="m-1 focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Crear uno</button>
                <button onclick="toggleVenIngresarCodigoFamiliar(event)"
                    class="text-white bg-gray-400 hover:bg-gray-500 focus:ring-4 mb-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cancelar</button>
            </div>

        </div>
    </div>
    
    <div id="venCrearCodigoDuo" class="fixed inset-0 flex items-center justify-center z-10  overflow-y-auto bg-gray-500 bg-opacity-75 hidden  bg-gray-50">
        <div class="z-10 bg-white w-1/2 h-1/4 text-center rounded bg-blue-50">
        <h1 class="font-bold p-6">Crear Plan Duo</h1>
            <form class="max-w-sm mx-auto ">
                <div class="mb-5">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre
                        del Plan</label>
                    <input type="text" id="nombre_plan_duo_nuevo"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        required />
                </div>
                <button onclick="registrarNuevoPlan(event, 2)"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 mb-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrar
                    Plan</button>
                <button onclick="toggleVenCrearCodigoDuo(event)"
                    class="text-white bg-gray-400 hover:bg-gray-500 focus:ring-4 mb-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cancelar</button>
            </form>

        </div>
    </div>

    <div id="venCrearCodigoFamiliar" class="fixed inset-0 flex items-center justify-center z-10  overflow-y-auto bg-gray-500 bg-opacity-75 hidden  bg-gray-50">
        <div class="z-10 bg-white w-1/2 h-1/4 text-center rounded  bg-blue-50">
        <h1 class="font-bold p-6">Crear Plan Familiar</h1>
            <form class="max-w-sm mx-auto ">
                <div class="mb-5">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre
                        del Plan</label>
                    <input type="text" id="nombre_plan_familiar_nuevo"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        required />
                </div>
                <button onclick="registrarNuevoPlan(event, 3)"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 mb-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrar
                    Plan</button>
                <button onclick="toggleVenCrearCodigoFamiliar(event)"
                    class="text-white bg-gray-400 hover:bg-gray-500 focus:ring-4 mb-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cancelar</button>
            </form>

        </div>
    </div>

    <div id="venIngresarCodigoDuoExistente" class="fixed inset-0 flex items-center justify-center z-10  overflow-y-auto bg-gray-500 bg-opacity-75 hidden  bg-gray-50">
        <div class="z-10 bg-blue-50 w-1/2 text-center rounded">
        <h3 class="font-bold p-6">Ingresar Codigo del Plan Duo</h3>
        <input type="text" id="ing_cod_duo_id" oninput="funGetMembresiaIntegrantes(event)"
                class="py-2 px-8" required /><br/><br>

                            <div class="mx-auto inline-block">
                                 <table class="table-auto border">
                                    <thead >
                                        <tr>
                                        <th>Plan</th>
                                        <th>Tipo Membresia</th>
                                        <th>Integrantes</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody_membresia_duo_integrantes">
                                        
                                    </tbody>
                                </table>
                            </div> <br/>                

            <!-- <button type="button" class="m-1 focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Aceptar</button> -->
            <button onclick="toggleVenIngresarCodigoDuoExistente(event)" class="text-white bg-gray-400 hover:bg-gray-500 focus:ring-4 mb-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cancelar</button>
           
        </div>
    </div>

    <div id="venIngresarCodigoFamiliarExistente" class="fixed inset-0 flex items-center justify-center z-10  overflow-y-auto bg-gray-500 bg-opacity-75 hidden  bg-gray-50">
    <div class="z-10 bg-blue-50 w-1/2 text-center rounded">
        <h3 class="font-bold p-6">Ingresar Codigo del Plan Familiar</h3>
        <input type="text" id="ing_cod_familiar_id" oninput="funGetMembresiaIntegrantes(event)"
                class="py-2 px-8" required /><br/><br>

                            <div class="mx-auto inline-block">
                                 <table class="table-auto border">
                                    <thead >
                                        <tr>
                                        <th>Plan</th>
                                        <th>Tipo Membresia</th>
                                        <th>Integrantes</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody_membresia_familiar_integrantes">
                                        
                                    </tbody>
                                </table>
                            </div> <br/>                

           <!--  <button type="button" class="m-1 focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Aceptar</button> -->
            <button onclick="toggleVenIngresarCodigoFamiliarExistente(event)" class="text-white bg-gray-400 hover:bg-gray-500 focus:ring-4 mb-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cancelar</button>
        </div>
    </div>


    <!--FIN MODAL-->

    <script>

        function funGetMembresiaIntegrantes(e) {
            let nombre_plan = e.target.value;
            let tbody_integrantes={};

            if(tipo_membresia == membresia_duo)
                tbody_integrantes = document.getElementById('tbody_membresia_duo_integrantes');
            else if(tipo_membresia == membresia_familiar)
                tbody_integrantes = document.getElementById('tbody_membresia_familiar_integrantes');
            else {
                return;
            }

            const get_mem_int_url = "../controllers/ctrlClientes.php?metodo=getMembresiaIntegrantes&nombre_plan=" + nombre_plan;

            if ( nombre_plan.length < 3 ){
                return;
            }

            fetch(get_mem_int_url,{
                method: "GET"
            }).then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert('[Error] ' + data.msg);
                    return;
                }
                const lista = data.data;
                tbody_integrantes.innerHTML = "";

                lista.forEach( integrante => {
                    const fila = document.createElement('tr');

                    const col1 = document.createElement('td');
                    col1.innerText = integrante.plan_nombre;

                    const col2 = document.createElement('td');
                    col2.innerText = integrante.mem_tip_nombre;

                    const col3 = document.createElement('td');
                    col3.innerText = integrante.cli_nombre;

                    fila.addEventListener('click', ()=> {
                        agregarAlPlan(integrante.mem_id, integrante.plan_nombre);
                        if(tipo_membresia == membresia_duo) {
                            toggleVenIngresarCodigoDuoExistente(null);
                            toggleVenIngresarCodigoDuo(null);
                        } else if(tipo_membresia == membresia_familiar) {
                            toggleVenIngresarCodigoFamiliarExistente(null);
                            toggleVenIngresarCodigoFamiliar(null);
                        }
                    })

                    fila.append(col1);
                    fila.append(col2);
                    fila.append(col3);
                    tbody_integrantes.append(fila);
                })

                
            })
            .catch(error => {
                console.error("registrarCliente: [Error]", error);
            })
        }

        function agregarAlPlan(mem_id, mem_nombre) {
            let campo_mem_id = document.getElementById("frm_mem_id");
            campo_mem_id.value = mem_id;
            let campo_mem_nombre = document.getElementById("frm_mem_nombre");
            campo_mem_nombre.value = mem_nombre;

            document.getElementById("frm_mem_tip_id").value = tipo_membresia;

            swal({
                    title: "Éxito",
                    text: "Se agregó al plan",
                    icon: "success",
                    button: "OK",
                }).then((value) => {

                    /* toggleVenIngresarCodigoDuo(); */
                    /* closeModal(); */
                    /* deliveryOptionsFieldset.classList.remove('hidden'); */
                })
        }

       
        function toggleDD(myDropMenu) {
            document.getElementById(myDropMenu).classList.toggle("invisible");
        }
        
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
      
        window.onclick = function (event) {
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


        function closeModal() {
            var registerPlanModal = document.getElementById('registerPlanModal');
            registerPlanModal.classList.toggle("hidden");
        }

        /* function mostrarFormulario() {
            
            document.getElementById("formularioCrear").style.display = "block";
            // Ocultar los botones "Crear uno" y "Tengo un código"
            document.getElementById("botonesInicio").style.display = "none";
            document.getElementById("texto").classList.toggle("hidden");
        } */

    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="../../js/registroClientes.js"></script>
</body>

</html>