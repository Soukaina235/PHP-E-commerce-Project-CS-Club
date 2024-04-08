<?php
include("inc/functions.php");
$categories = getAllCategories();

if (isset($_GET['id'])) {
    $produit = getProduitById($_GET['id']);
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
</head>

<body>

    <?php include("inc/header.php"); ?>

    <div class="row col-12 mt-4"> <!-- mt-4 means margin-top, it goes from 1 to 5 -->

        <div class="card col-8 offset-2"> <!-- offset-2 centers the div -->
            <img src="images/<?php echo $produit['image']; ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $produit['nom']; ?></h5>
                <p class="card-text"><?php echo $produit['description'] ?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?php echo $produit['prix']; ?> MAD</li>
                <li class="list-group-item">
                    <?php
                    // OR, WE CAN DO THIS TO GET THE CATEGORIE'S NAME
                    // foreach ($categories as $index => $c){
                    //     if ($c['id'] == $produit['categorie']){
                    //         echo $c['nom'];
                    //     }
                    // }
                    $categorie = getCategorie($produit['categorie']);
                    echo $categorie['nom'];
                    ?>
                </li>
            </ul>

            <div>
                <form class="d-flex m-3" action="actions/commander.php" method="post">
                    <input type="hidden" name="produit" value="<?php echo $produit['id']; ?>">
                    <input type="number" step="1" min="1" name="quantite" class="form-control" placeholder="Quantite du produit">
                    <button type="submit" class="btn btn-primary">Commander</button>
                </form>
            </div>
        </div>

    </div>


    <?php include "inc/footer.php"; ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>