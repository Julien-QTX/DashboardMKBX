<?php

require_once __DIR__ . "/../../src/init.php";

if ($_POST['retrait'] == "0") {
    error_die('Aucune somme n\'a été selectionnée' , '/?page=operations/withdraw');
}

$stmh = $db->prepare('SELECT * FROM bankaccounts WHERE id_user = ?');
$stmh->execute([$_SESSION['user_id']]);
$usr_withdrawal = $stmh->fetch();

//error_die((float)$_POST['retrait'], '/?page=operations/withdraw');

if ($usr_withdrawal['money']-(float)$_POST['retrait'] < -1000) {
    error_die('Vous avez atteint le maximum de découvert autorisé' , '/?page=operations/withdraw');
}

if ($user->role >= 200) {
    $operationManager->withdraw($_SESSION['user_id'], $_POST['retrait']);
    $operation_withdrawal = Operation::createBankOp($usr_withdrawal['id'], $_POST['retrait'], 100);
    $opId = $operationManager->insertBankOp($operation_withdrawal, 'withdrawals');

    $stmh = $db->prepare('SELECT id FROM withdrawals ORDER BY id DESC LIMIT 1');
    $stmh->execute();
    $last_id = $stmh->fetch();

    //error_die($last_id['id'] , '/?page=operations/deposit');

    $stmh = $db->prepare('UPDATE withdrawals SET admin_id=? WHERE id=?');
    $stmh->execute([
        $_SESSION['user_id'],
        $last_id['id']
    ]);

}
else {
    $operation_withdrawal = Operation::createBankOp($usr_withdrawal['id'], $_POST['retrait'], 50);
    $opId = $operationManager->insertBankOp($operation_withdrawal, 'withdrawals');
}

//$operation_deposit = Operation::createBankOp($usr_deposit['id'], $_POST['retrait'], 1, 50);
//$opId = $operationManager->insertBankOp($operation_deposit, 'withdrawals');

header('Location: /?page=operations/withdraw');