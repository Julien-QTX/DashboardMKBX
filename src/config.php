<?php

$config = [];
$config['db'] = [
    'host' => 'localhost',
    'name' => 'dashboard',
    'user' => 'root',
    'pass' => 'root',
    'port' => 8888
];

$config['roles'] = [
    0 => "Utilisateur Banni",
    1 => "Client Non-Vérifié",
    10 => "Client",
    200 => "Manager",
    1000 => "Admin"
];

$config['status'] = [
    0 => "Opération refusée",
    50 => "Opération en cours d'analyse",
    100 => "Opération effectuée"
];