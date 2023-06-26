<?php
include './connexion.php';

if ($_POST["password"] !== $_POST["confirm_password"]) {
    header("Location: ../register.php?message=Les mots de passe ne correspondent pas.");
}

$req = $connexion->prepare("SELECT * FROM user WHERE nom = :nom");
$req->bindParam(":nom", $_POST["nom"]);
$req->execute();

$result = $req->fetch(PDO::FETCH_ASSOC);

if ($result) {

    header("Location: ../register.php?message=Ce Compte existe déjà");
}

if (!$result) {

    $passwordToHash = ":password" . $config["SECRET_KEY"];
    $hash = md5($passwordToHash);

    $role = "client";

    $req = $connexion->prepare("INSERT INTO user (nom, prenom, telephone, adresse, password, role) VALUE (:nom, :prenom, :telephone, :adresse, :password, :role)");
    $req->bindParam(":nom", $_POST["nom"]);
    $req->bindParam(":prenom", $_POST["prenom"]);
    $req->bindParam(":telephone", $_POST["telephone"]);
    $req->bindParam(":adresse", $_POST["adresse"]);
    $req->bindParam(":password", $hash);
    $req->bindParam(":role", $role);
    $req->execute();

    header("Location: ../login.php");
}
