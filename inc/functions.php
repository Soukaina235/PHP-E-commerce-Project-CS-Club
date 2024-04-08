<?php
function connect()
{
    $serverName = "localhost";
    $port = 3307;
    $DBuser = "root";
    $DBpassword = "";
    $DBname = "ecommerce_training";

    try {
        //THE FIST PARAMETER IS CALLED DSN: Data Source Name
        $conn = new PDO("mysql:host=$serverName;port=$port;dbname=$DBname", $DBuser, $DBpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Conncted successfully";
    } catch (PDOException $e) {
        echo "Connexion failed: " . $e->getMessage();
    }
    return $conn;
}

function getAllCategories()
{
    // 1 - Connexion avec la BD
    $conn = connect();
    // 2 - Creation de la requette
    $requette = "SELECT * FROM categories";

    // 3 -  Execution de la requette
    $resultat = $conn->query($requette);

    // 4 - Resultat de la requette
    $categories = $resultat->fetchAll();

    //var_dump($categories);
    return $categories;
}


function getAllProducts()
{
    // 1 - Connexion avec la BD
    $conn = connect();

    // 2 - Creation de la requette
    $requette = "SELECT * FROM produits";

    // 3 -  Execution de la requette
    $resultat = $conn->query($requette);

    // 4 - Resultat de la requette
    $produits = $resultat->fetchAll();

    //var_dump($produits);
    return $produits;
}


function searchProduits($keywords)
{
    // 1 - Connexion avec la BD
    $conn = connect();

    // 2 - Creation de la requette
    $requette = "SELECT * FROM produits WHERE nom LIKE '%$keywords%'";

    // 3 - Execution de la requette
    $resultat = $conn->query($requette);

    //  4 - Resultat
    $produits = $resultat->fetchAll();
    return $produits;
}


function getProduitById($id)
{
    $conn = connect();
    $requette = "SELECT * FROM produits WHERE id=$id";
    $resultat = $conn->query($requette);
    $produit = $resultat->fetch(); //not fetch all because we have a single product
    return $produit;
}

function getCategorie($id)
{
    $conn = connect();
    $requette = "SELECT * FROM categories WHERE id=$id";
    $resultat = $conn->query($requette);
    $categorie = $resultat->fetch();
    return $categorie;
}


function addVisiteur($data)
{
    $conn = connect();

    $mot_de_passe_hash = md5($data['mot_de_passe']);
    $requette = "INSERT INTO visiteur(nom, prenom, email, mot_de_passe, telephone) VALUES('" . $data['nom'] . "','" . $data['prenom'] . "', '" . $data['email'] . "', '" . $mot_de_passe_hash . "', '" . $data['telephone'] . "') ";

    $resultat = $conn->query($requette);

    if ($resultat) {
        return true;
    } else return false;
}

function ConnectVisiteur($data)
{
    $conn = connect();

    //$email = $data['email'];
    //$mot_de_passe = $data['mot_de_passe'];
    $requette = "SELECT * FROM visiteur WHERE email='" . $data['email'] . "' AND mot_de_passe='" . md5($data['mot_de_passe']) . "'";

    $resultat = $conn->query($requette);

    $user = $resultat->fetch();

    return $user;
}



function ConnectAdmin($data)
{
    $conn = connect();

    //$email = $data['email'];
    //$mot_de_passe = $data['mot_de_passe'];
    $requette = "SELECT * FROM administrateur WHERE email='" . $data['email'] . "' AND mot_de_passe='" . md5($data['mot_de_passe']) . "'";

    $resultat = $conn->query($requette);

    $user = $resultat->fetch();

    return $user;
}


function getAllUsers()
{
    $conn = connect();

    //New users, whom accounts are not valid yet
    $requette = "SELECT * FROM `visiteur` WHERE `etat`=0";

    $resultat = $conn->query($requette);

    $users = $resultat->fetchAll();

    return $users;
}


function getStock()
{

    $conn = connect();
    $requette = "SELECT `s`.`id`, `p`.`nom`, `s`.`quantite` FROM `produits` `p`, `stock` `s` WHERE `p`.`id` = `s`.`produit`";
    $resultat = $conn->query($requette);
    $stock = $resultat->fetchAll();

    return $stock;
}
