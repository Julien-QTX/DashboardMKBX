<?php

require './connexion.php';

$req = $connexion->prepare("SELECT * FROM user WHERE username = :username AND password = :password");
$req->bindParam(":username", $_POST["username"]);
$req->bindParam(":password", $_POST["password"]);
$req->execute();

$result = $req->fetch(PDO::FETCH_ASSOC);

if (!$result) {
    header("Location: ../login.php?message=Login Error");
} else {
    session_start();
    $_SESSION['username'] = $result["username"];
    header("Location: ../index.php");
}











//var_dump($result);