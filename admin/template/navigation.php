<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#">
                    <span data-feather="home"></span>
                    Home <!--<span class="sr-only">(currently)</span>-->
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="categories/liste.php">
                    <a class="nav-link" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/PRGS/E-commerce website training/admin/categories/liste.php">
                        <span data-feather="file"></span>
                        Categories
                    </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/PRGS/E-commerce website training/admin/produits/liste.php">
                    <span data-feather="shopping-cart"></span>
                    Products
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/PRGS/E-commerce website training/admin/visiteurs/liste.php">
                    <span data-feather="users"></span>
                    Customers
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/PRGS/E-commerce website training/admin/stock/liste.php">
                    <span data-feather="box"></span>
                    Stock
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="bar-chart-2"></span>
                    Reports
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/PRGS/E-commerce website training/admin/profile.php"> <!-- The class active makes profil blue because it's the one active for now-->
                    <span data-feather="layers"></span>
                    Profile
                </a>
            </li>
        </ul>

    </div>
</nav>