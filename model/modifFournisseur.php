<?php
include_once './connexion.php';
if (
    !empty($_POST['nom'])
    && !empty($_POST['prenom'])
    && !empty($_POST['telephone'])
    && !empty($_POST['adresse'])
    && !empty($_POST['id'])
) {

    $sql = "UPDATE fournisseur SET nom=?, prenom=?, telephone=?, adresse=? WHERE id=?";

    $req = $connexion->prepare($sql);

    $req->execute(array(
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['telephone'],
        $_POST['adresse'],
        $_POST['id']
    ));

    if ($req->rowCount() != 0) {
        $_SESSION['message']['text'] = "Le fournisseur modifié avec succès";
        $_SESSION['message']['type'] = "sucess";
    } else {
        $_SESSION['message']['text'] = "Rien n'a été modifié";
        $_SESSION['message']['type'] = "warning";
    }
} else {
    $_SESSION['message']['text'] = "Une ou plusieurs informations sont manquantes";
    $_SESSION['message']['type'] = "danger";
}

header('Location: ../vue/fournisseur.php');
