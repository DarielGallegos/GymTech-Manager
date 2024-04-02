<?php
session_start();
if (isset($_SESSION['GYM']['nombre'])) {
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
            </div>
        </main>
    </body>

    </html>

<?php
} else {
    header('location: ../../index.php');
}
?>