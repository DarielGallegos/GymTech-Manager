<?php
function cargarVista($nombre)
{
    ob_clean();

    $view_PATH = "./views/{$nombre}.php";
    if (file_exists($view_PATH)) {
        // Include the common template or layout file
        include("./views/main.php");
        // Redirect to the specified view file
        header("Location: ./views/{$nombre}.php");
        exit; // Ensure script execution stops after redirection
    }else{
        echo "View '{$nombre}.php' not found.";
        include("./views/main.php");
        header("Location: .././views/{$nombre}.php");
        exit; // Ensure script execution stops after redirection
    }
}
