<?php

include './connexion.php';

// Vérification des informations d'inscription
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $role = $_POST["role"];

    // Vérifier si les mots de passe correspondent
    if ($password === $confirm_password) {
        // Requête SQL pour insérer l'utilisateur dans la base de données
        $sql = "INSERT INTO user (username, password, role) VALUES ('$username', '$password', '$role')";

        if ($connexion->query($sql) === TRUE) {
            // Informations d'inscription réussies
            header("Location: login.php");
            exit();
        }
    } else {
        // Les mots de passe ne correspondent pas, afficher un message d'erreur
        echo "Les mots de passe ne correspondent pas.";
    }
}

header('Location: ./login.php');
