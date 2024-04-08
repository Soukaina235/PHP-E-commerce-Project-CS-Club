<?php
session_start();
//Cette page ne doit pas s'ouvrir tant que l'utilisateur n'est pas connecte

if (!isset($_SESSION['nom'])) { //nom: juste exemple
    header('location:connexion.php'); //If not connected, even when writing the url to access directly to the profile page you cannot access to it thanks to the redirect
}

include("inc/functions.php");
$categories = getAllCategories();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>

<body>
    <?php include "inc/header.php"; ?>
    <div class="container">
        <h1>Bienvenue <span class="text-primary"><?php echo $_SESSION['nom'] . " " . $_SESSION['prenom']; ?></span> </h1>
        <h2>Email: <?php echo $_SESSION['email']; ?></h2>
    </div>

    <?php include "inc/footer.php"; ?>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


</html>