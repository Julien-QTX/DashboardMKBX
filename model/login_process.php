<?php

require './connexion.php';

$passwordToHash = ":password" . $config["SECRET_KEY"];
$hash = md5($passwordToHash);


$req = $connexion->prepare("SELECT * FROM user WHERE nom = :nom AND password = :password");
$req->bindParam(":nom", $_POST["nom"]);
$req->bindParam(":password", $hash);
$req->execute();

$result = $req->fetch(PDO::FETCH_ASSOC);

if (!$result) {
    header("Location: ../login.php?message=Login Error");
} else {
    $_SESSION['id'] = $result["id"];
    $_SESSION['nom'] = $result["nom"];
    $_SESSION['role'] = $result['role'];

    if ($result['role'] === "admin" || $result['role'] === "manager") {
        header("Location: ../vue/dashboard.php");
    } else {
        header("Location: ../index.php");
    }
}
