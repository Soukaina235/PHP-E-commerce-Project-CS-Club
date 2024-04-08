<?php

$id_categorie = $_GET["idc"];

include("../../inc/functions.php");
$conn = connect();

$requette = "DELETE FROM `categories` WHERE `id`=" . $id_categorie;

$resultat = $conn->query($requette);

if ($resultat) {
    header("location:liste.php?delete=ok");
}
