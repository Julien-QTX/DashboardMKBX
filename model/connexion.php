<?php

require_once(dirname(__FILE__) . "/config.php");
session_start();

try {
    $connexion = new PDO("mysql:host={$config['DB_HOST']};dbname={$config['DB_NAME']}", $config['DB_USER'], $config['DB_PASSWORD']);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $connexion;
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
