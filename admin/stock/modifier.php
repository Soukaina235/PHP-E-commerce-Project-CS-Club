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
$id = $_POST['idstock'];
$quantite = $_POST['quantite'];
//$date_modification = date('Y-m-d');  //2023-03-08

// 2 - La chaine de connexion
include "../../inc/functions.php";
$conn = connect();

// 3 - Creation de la requette
$requette = "UPDATE `stock` SET `quantite`='" . $quantite . "' WHERE `id`=" . $id;

// 4 - Execution de la requette
$resultat = $conn->query($requette);
if ($resultat) {
    header('location:liste.php?modif=ok'); //TAKES YOU BACK TO THE PAGE liste.php AS WE ARE NOW IN ajout.php
}
?>