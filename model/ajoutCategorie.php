<?php
include_once './connexion.php';

if (!empty($_POST['libelle_categorie'])) {

    $sql = "INSERT INTO categorie_article(libelle_categorie) VALUES(?)";

    $req = $connexion->prepare($sql);

    $req->execute(array(
        $_POST['libelle_categorie']
    ));

    if ($req->rowCount() != 0) {
        $_SESSION['message']['text'] = "Categorie ajouté avec succès";
        $_SESSION['message']['type'] = "sucess";
    } else {
        $_SESSION['message']['text'] = "Une erreur s'est produite lors de l'ajout de la categorie";
        $_SESSION['message']['type'] = "danger";
    }
} else {
    $_SESSION['message']['text'] = "Une ou plusieurs informations sont manquantes";
    $_SESSION['message']['type'] = "danger";
}

header('Location: ../vue/categorie.php');
