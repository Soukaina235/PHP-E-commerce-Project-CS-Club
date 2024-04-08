<?php
session_start();

$nom = $_POST["nom"];
$description = $_POST["description"];
$prix = $_POST["prix"];
$createur = $_POST["createur"];
$categorie = $_POST["categorie"];
$quantite = $_POST['quantite'];
$date_creation = date("Y-m-d");


// upload image
$target_dir = "../../images/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    $image = $_FILES["image"]["name"];
    // echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
} else {
    echo "Sorry, there was an error uploading your file.";
}
$date_creation = date('Y-m-d');

include "../../inc/functions.php";
$conn = connect();

try {
    // 3 - Creation de la requette
    $requette = "INSERT INTO `produits` (`nom`, `description`, `prix`, `image`, `createur`, `categorie`, `date_creation`) VALUES ('$nom','$description','$prix','$image','$createur','$categorie','$date_creation')";
    // 4 - Execution de la requette
    $resultat = $conn->query($requette);

    if ($resultat) {

        // THIS PRODUCT'S ID IS THE LAST ID IN THE TABLE PRODUCTS, AS IT IS THE LAST PRODUCT ADDED
        // SO WE USE THE FUCNTION FROM PDO THAT GETS THE LAST INSERT ID
        $produit_id = $conn->lastInsertId();
        $requette2 = "INSERT INTO `stock` (`produit`, `quantite`, `createur`, `date_creation`) VALUES ('$produit_id','$quantite','$createur','$date_creation')";

        if ($conn->query($requette2)) {
            header('location:liste.php?ajout=ok'); //TAKES YOU BACK TO THE PAGE liste.php AS WE ARE NOW IN ajout.php
        } else {
            throw new PDOException;
        }
    }
} catch (PDOException $e) {
    // In case the catory exists already, ie. we have two categories who have the same name
    echo $e->getMessage();
    if ($e->getCode() == 23000) { // This is the code for the message that we get in case it was an error
        header('location:liste.php?erreur=duplicate');
    }
}
