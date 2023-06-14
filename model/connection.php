<?php
session_start();

$nom_serveur = "localhost";
$nom_base_de_donnee = "dashboard";
$utilisateur = "root";
$mot_de_passe = "root";

try {
    $connexion = new PDO("mysql:host=$nom_serveur;dbname=$nom_base_de_donnee", $utilisateur, $mot_de_passe);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $connexion;
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
