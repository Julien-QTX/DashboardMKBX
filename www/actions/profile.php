<?php

require_once __DIR__ . "/../../src/init.php";


$stmh = $db->prepare('SELECT lieu, id FROM entrepot WHERE id_user = ?');
$stmh->execute([$entrepot['id']]);
$actual_lieu = $stmh->fetch();

$stmh = $db->prepare('SELECT name FROM produits WHERE id_produits = ?');
$stmh->execute([$utilisateur['id']]);
$actual_produit = $stmh->fetch();

foreach ($actual_lieu as $actual_produit) {
    $money_produit = array_search($usr['role'], $config);
    echo 'Utilisateur : ' . $usr['email'] . ';    Role : ' . $config['roles'][$usr['role']] . '<br>';
}