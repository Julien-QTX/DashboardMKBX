<?php

$page_title = "Retraits";

ob_start();

$stmh = $db->prepare('SELECT * FROM bankaccounts WHERE id_user = ?');
$stmh->execute([$_SESSION['user_id']]);
$usr_deposit = $stmh->fetch();

$already_op = $operationManager->getByOperation('withdrawals', $usr_deposit['id']);
if ($already_op !== false) { ?>
    
    <h3>Vous avez déjà une demande de retrait en cours</h3>

<?php
} else {


include_once __DIR__ . '/../../partials/alert_errors.php';
include_once __DIR__ . '/../../partials/alert_success.php';
?>

<form action="/actions/withdrawal.php" method="post">
    <div>
        <label for="text">Retrait d'argent :</label>
        <select name="retrait" id="retire">
            <option value="0">--</option>
            <option value="20">20€</option>
            <option value="40">40€</option>
            <option value="50">50€</option>
            <option value="60">60€</option>
            <option value="80">80€</option>
            <option value="100">100€</option>
        </select>
    </div>
    <br>
    <button type="submit">Retirer l'argent</button>

</form>

<?php
}

$page_content = ob_get_clean();