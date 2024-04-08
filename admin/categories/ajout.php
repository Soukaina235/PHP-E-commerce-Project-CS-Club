<?php
session_start();
?>
<!-- 
    HERE WE WANT THAT FILE (WHEN WE CLICK ON 'ajout') TO 
    POP UP ON THE SAME PAGE WITCH IS THE LISTE PAGE
    WE DON'T WANT TO GO TO ANOTHER PAGE
    THIS POP UP IS CALLED model ON bootstrap
-->

<?php
// 1 - Recuperation des donnees du formulaire
$nom = $_POST['nom'];
$description = $_POST['description'];
$createur = $_SESSION['id'];
$date_creation = date('Y-m-d');  //2023-03-08

// 2 - La chaine de connexion
include "../../inc/functions.php";
$conn = connect();

// 3 - Creation de la requette
try {
    // 3 - Creation de la requette
    $requette = "INSERT INTO categories (`nom`, `description`, `createur`, `date_creation`) VALUES ('$nom','$description','$createur','$date_creation')";

    // 4 - Execution de la requette
    $resultat = $conn->query($requette);

    if ($resultat) {
        header('location:liste.php?ajout=ok'); //TAKES YOU BACK TO THE PAGE liste.php AS WE ARE NOW IN ajout.php
    }
} catch (PDOException $e) {
    // In case the catory exists already, ie. we have two categories who have the same name
    if ($e->getCode() == 23000) {
        header('location:liste.php?erreur=duplicate');
    }
}
?>