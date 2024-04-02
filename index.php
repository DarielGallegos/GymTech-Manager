<?php
session_start();
if (isset($_SESSION['GYM']['nombre'])) {
      echo 'Gola Mundo';
} else{
?>
      <!DOCTYPE html>
      <html lang="en">

      <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
            <title>Formulario</title>
            <link rel="stylesheet" href="./src/css/output.css">
      </head>

      <body class="bg-gray-200" data-new-gr-c-s-check-loaded="14.1165.0" data-gr-ext-installed="">
            <!-- Creat By Joker Banny -->
            <div class="min-h-screen bg-gray-900 flex justify-center items-center">
                  <div class="absolute w-60 h-60 rounded-xl bg-orange-300 -top-5 -left-16 z-0 transform rotate-45 hidden md:block"></div>
                  <div class="absolute w-48 h-48 rounded-xl bg-orange-300 -bottom-6 -right-10 transform rotate-12 hidden md:block"></div>
                  <form id="form-log" class="py-12 px-12 bg-white rounded-2xl shadow-xl z-20">
                        <div>
                              <h1 class="text-3xl font-bold text-center mb-4 cursor-pointer">Iniciar Sesión</h1>
                              <img src="./src/img/logo1.png" class="w-1/2 md:w-auto">
                              <br>
                        </div>
                        <div class="space-y-4">
                              <input type="hidden" name="log" value="getAccess">
                              <input type="text" placeholder="Usuario" name="alias" class="block text-sm py-3 px-4 rounded-lg w-full border outline-gray-500" required="">
                              <input class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required="" autocomplete="current-password" type="password" name="passwd" placeholder="Contraseña">
                        </div>
                        <div class="text-center mt-6">
                              <button type="submit" class="w-full py-2 text-xl text-white bg-orange-300 rounded-lg hover:bg-yellow-500 transition-all">Ingresar</button>
                        </div>
                  </form>
                  <div class="w-40 h-40 absolute bg-orange-100 rounded-full top-0 right-12 hidden md:block"></div>
                  <div class="w-20 h-40 absolute bg-orange-200 rounded-full bottom-20 left-10 transform rotate-45 hidden md:block"></div>
            </div>


      </body>
      <grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration>
      <script src="./js/jquery-3.7.1.min.js"></script>
      <script src="./js/login.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      </html>

<?php
}
?>