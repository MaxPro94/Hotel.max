<?php

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'index';
}


$path = "../src/pages/$page.php";

if (file_exists($path)) {
    require '../src/data/db-connect.php';
    require $path;
    require '../templates/layout.html.php';
} else {
    header('HTTP/1.1 500 No Record Found'); // Si aucune page n'existe, renvoyer l'utilisateur vers une page d'erreur
}
