<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta charset="UTF-16">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modulo Facturacion</title>
  <link rel="stylesheet" href=".././css/output.css">
  <link rel="stylesheet" href=".././css/nfIcons.css">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
</head>

<body class="Xl:container mx-auto px-4">

  <!-- Inicio Maquetacion Sitio -->
  <section class="grid grid-cols-3 gap-3 p-2.5 rounded-md bg-slate-50">
    <section class="col-span-3">
      <h1 class="text-3xl font-bold text-center">
        FACTURACIÓN
      </h1>
    </section>

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
  <!-- Fin Maquetacion Sitio -->

</body>

</html>