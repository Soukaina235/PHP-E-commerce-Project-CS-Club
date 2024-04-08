<?php

$idvisiteur  = $_GET['id'];

include "../../inc/functions.php";
$conn = connect();

// 3 - Creation de la requette
$requette = "UPDATE `visiteur` SET `etat`=1 WHERE `id`=" . $idvisiteur;

// 4 - Execution de la requette
$resultat = $conn->query($requette);
if ($resultat) {
    header('location:liste.php?valider=ok'); //TAKES YOU BACK TO THE PAGE liste.php AS WE ARE NOW IN ajout.php
} else {
    echo "Erreur de validation";
}
