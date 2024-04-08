<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">E-SHOP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        categories
                    </a>
                    <ul class="dropdown-menu">

                        <?php
                        foreach ($categories as $categorie) {
                            print '<li><a class="dropdown-item" href="#">' . $categorie['nom'] . '</a></li><li>';
                        }
                        ?>

                    </ul>
                </li>

                <?php
                if (isset($_SESSION['email'])) { // WE CAN CHOOSE ANY SESSION VARIABLE
                    print '
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="profile.php">Profile</a>
                        </li>
                        ';
                } else {
                    print '
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="connexion.php">Connexion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="registre.php">Registre</a>
                        </li>
                        ';
                }
                ?>
            </ul>

            <form class="d-flex" role="search" action="index.php" method="POST">
                <input class="form-control me-2" type="search" placeholder="Nom du produit" aria-label="Search" name="search">
                <button class="btn " type="submit">Chercher</button>
            </form>

            <?php
            if (isset($_SESSION['nom'])) {
                print '
                <a href="deconnexion.php" class="btn btn-primary">Deconnexion</a>
                ';
            }
            ?>
        </div>
    </div>
</nav>