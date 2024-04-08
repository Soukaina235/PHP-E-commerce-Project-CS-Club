<?php

session_start();
# Test user connecter
if (!isset($_SESSION["email"])) { # user non connecté
    header('location:../connexion.php');
    exit;
}

include("../inc/functions.php");

// var_dump($_SESSION);

$conn = connect();
$visiteur = $_SESSION['id'];
$id_produit = $_POST["produit"];
$quantite = $_POST["quantite"];

// SELECTIONEL LE PRODUIT PAR SON ID

$requette = "SELECT `prix` FROM `produits` WHERE `id`=" . $id_produit;

$resultat = $conn->query($requette);

$produit = $resultat->fetch();

$total = $quantite * $produit["prix"];
// echo $total;

$date = date("Y-m-d");

$requette_panier = "INSERT INTO panier(visiteur,total,date_creation) VALUES('$visiteur','$total','$date')";
$resultat = $conn->query($requette_panier);
// echo $conn->lastInsertId();
// var_dump($resultat);
$panier = $conn->lastInsertId();

$requette2 = "INSERT INTO `commande`(`produit`, `quantite`, `total`, `panier`, `date_creation`, `date_modification`) VALUES ('" . $id_produit . "','" . $quantite . "','" . $total . "','" . $panier . "','" . $date . "','" . $date . "')";
$resultat = $conn->query($requette2);
