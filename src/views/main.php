<?php
session_start();
if (isset($_SESSION['GYM']['nombre']) && $_SESSION['GYM']['nombre'] != "") {
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
            <link rel="icon" type="image/x-icon" href="../../src/img/icon.png">
            <meta name="keywords" content="keywords,here">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
            <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" /> <!--Replace with your tailwind.css once created-->
            <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> <!--Totally optional :) -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>
      </head>

      <body class="bg-gray-800 font-sans leading-normal tracking-normal mt-12">
            <?php include("../components/header.php");?>

            <main style="margin-top: 60px; align-content: center;">
                  <?php include("../components/nav.php");?>
                  
            </main>

            <script>
                  /*Toggle dropdown list*/
                  function toggleDD(myDropMenu) {
                        document.getElementById(myDropMenu).classList.toggle("invisible");
                  }
                  /*Filter dropdown options*/
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
                  // Close the dropdown menu if the user clicks outside of it
                  window.onclick = function(event) {
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
            </script>
      </body>

      </html>
<?php
} else {
      header('location: ../../index.php');
}
?>