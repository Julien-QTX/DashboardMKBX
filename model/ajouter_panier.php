<?php
// inclure la page de connexion
include "./connexion.php";

// démarrer la session si elle n'existe pas
if (!isset($_SESSION)) {
    session_start();
}

// créer la session si elle n'existe pas
if (!isset($_SESSION['article'])) {
    $_SESSION['article'] = array();
}

// récupération de l'id dans le lien
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM article WHERE id = :id";
    $stmt = $connexion->prepare($query);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Utilisez les données récupérées
    foreach ($result as $row) {
        // Faites quelque chose avec chaque ligne de résultat
        echo $row['titre'] . "<br>";

        // ajouter le produit dans le panier (le tableau)
        if (isset($_SESSION['article'][$id])) {
            // si le produit est déjà dans le panier
            $_SESSION['article'][$id]++;
        } else {
            // sinon, on ajoute le produit
            $_SESSION['article'][$id] = 1;
        }

        // redirection vers la page index.php
        header("Location: ../panier.php");
    }
}

header("Location: ../panier.php");
