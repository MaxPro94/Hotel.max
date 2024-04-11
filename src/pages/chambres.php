<?php

session_start();
$title = 'Les chambres';
$requete = $maDB->prepare("SELECT chambre.*, chambre_hotel.*, hotel.id_hotel FROM chambre JOIN chambre_hotel ON chambre.id_chambre = chambre_hotel.id_chambre JOIN hotel ON chambre_hotel.id_hotel = hotel.id_hotel;");
$requete->execute();

$resultats_chambres = $requete->fetchAll();
