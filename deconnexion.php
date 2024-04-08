<?php
session_start();

session_unset(); // Supprime les variables de session
session_destroy();

header('location:index.php');
