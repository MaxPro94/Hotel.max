<?php

session_start();

$requete = $maDB->prepare("SELECT * FROM chambre");
$requete->execute();

$resultats_chambres = $requete->fetchAll();
