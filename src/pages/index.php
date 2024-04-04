<?php
session_start();

$requete = $maDB->prepare("SELECT * FROM hotel");
$requete->execute();

$resultat = $requete->fetchAll();
