<?php
session_start();
$title = 'Acceuil';
$requete = $maDB->prepare("SELECT * FROM hotel");
$requete->execute();

$resultat = $requete->fetchAll();
