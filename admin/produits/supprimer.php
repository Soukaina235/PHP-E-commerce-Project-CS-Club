<?php

$id_produit = $_GET["idp"];

include("../../inc/functions.php");
$conn = connect();

$requette = "DELETE FROM `produits` WHERE `id`=" . $id_produit;

$resultat = $conn->query($requette);

if ($resultat) {
    header("location:liste.php?delete=ok");
}
