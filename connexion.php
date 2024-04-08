<?php
session_start();
if (isset($_SESSION['nom'])) {
    header('location:profile.php');
}


include("inc/functions.php");

// To display categories on the navbar
$categories = getAllCategories();

$user = true;
if (!empty($_POST)) {
    $user = ConnectVisiteur($_POST); //Si les donnees ne sont pas valides, le user sera false
    if (is_array($user) && count($user) > 0) { //utilisateur connecte
        //session_start();
        $_SESSION['id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['prenom'] = $user['prenom'];
        $_SESSION['mot_de_passe'] = $user['mot_de_passe'];
        $_SESSION['telephone'] = $user['telephone'];

        header('location:profile.php'); //Redirection vers la page profil
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>E-SHOP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.min.css">

</head>

<body>
    <?php include("inc/header.php"); ?>

    <div class="col-12 p-5">
        <h1 class="text-center">Connexion</h1>
        <form action="connexion.php" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Adresse Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                <input type="password" name="mot_de_passe" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
    </div>

    <!-- Footer -->
    <?php include "inc/footer.php"; ?>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.all.min.js"></script>

<?php
if (!$user) {
    print "
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Erreur',
                text: 'Coordonnnees non valides!',
                confiramtaionButtonText: 'Ok',
                timer : 3500
            })
        </script>
        ";
}
?>

</html>