<?php
include_once './connexion.php';
if (
    !empty($_POST['libelle_categorie'])
    && !empty($_POST['id'])
) {

    $sql = "UPDATE categorie_article SET libelle_categorie=? WHERE id=?";

    $req = $connexion->prepare($sql);

    $req->execute(array(
        $_POST['libelle_categorie'],
        $_POST['id']
    ));

    if ($req->rowCount() != 0) {
        $_SESSION['message']['text'] = "Article modifié avec succès";
        $_SESSION['message']['type'] = "sucess";
    } else {
        $_SESSION['message']['text'] = "Rien n'a été modifié";
        $_SESSION['message']['type'] = "warning";
    }
} else {
    $_SESSION['message']['text'] = "Une ou plusieurs informations sont manquantes";
    $_SESSION['message']['type'] = "danger";
}

header('Location: ../vue/categorie.php');
