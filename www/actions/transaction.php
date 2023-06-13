<?php

require_once __DIR__ . "/../../src/init.php";

if (empty($_POST['sum']) || empty($_POST['email'])) {
    error_die('Veuillez remplir tous les champs', '/?page=operations/transaction');
}

$userExists = $userManager->getByEmail($_POST['email']);
if ($userExists === false) {
    error_die('Cet entrepôt n\'existe pas', '/?page=operations/transaction');
}

$stmh = $db->prepare('SELECT * FROM users WHERE email=?');
$stmh->execute([$_POST['email']]);
$entrepot = $stmh->fetch();

if ($entrepot['role'] < 10) {
    error_die('Vous ne pouvez pas envoyer d\'articles à cet entrepot', '/?page=operations/transaction');
}

$operationManager->transaction($_SESSION['user_id'], $entrepot['id'], $_POST['sum']);

$stmh = $db->prepare('SELECT * FROM entrepot WHERE id_user = ?');
$stmh->execute([$_SESSION['user_id']]);
$usr_transaction = $stmh->fetch();

$stmh = $db->prepare('SELECT * FROM entrepot WHERE id_user = ?');
$stmh->execute([$entrepot['id']]);
$receiver_transaction = $stmh->fetch();

//$operationManager->createUserOp($sender_local, $receiver_local, $value, $id_produits);
$operation_transaction = Operation::createUserOp($usr_transaction['id'], $receiver_transaction['id'], $_POST['sum'], 1);
$opId = $operationManager->insertUserOp($operation_transaction);

header('Location: /?page=operations/transaction');