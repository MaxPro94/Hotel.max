<?php
// Création d'un front controller afin de pouvoir recupérer des resultats sous forme JSON
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
    $path = "../src/action/$action.php";

    if (file_exists($path)) {
        require '../src/data/db-connect.php';
        require $path;

        header('Content-Type: application/json; charset=utf-8'); // Mentionne le type de contenu auquel on auras a faire.

        echo json_encode($data); // Il faut toujours echo un resultat sous forme de json, sinon JS n'arrive pas a le l'attraper/lire
    } else {
        header('HTTP/1.1 500 No Record Found'); // Renvoi d'une page d'erreur si le fichier n'existe pas.
    }
}
