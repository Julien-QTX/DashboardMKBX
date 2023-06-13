<?php

$page_title = "Dépôts";

ob_start();

include_once __DIR__ . '/../../partials/alert_errors.php';
include_once __DIR__ . '/../../partials/alert_success.php';

$stmh = $db->prepare('SELECT * FROM entrepot WHERE id_user = ?');
$stmh->execute([$_SESSION['user_id']]);
$usr_deposit = $stmh->fetch();

$already_op = $operationManager->getByOperation('deposits', $usr_deposit['id']);
if ($already_op !== false) {
?>

<h3>Vous avez déjà une demande de dépôt en cours</h3>

<?php
} else {
?>

<form action="/actions/deposit.php" method="post">
    <div>
        <label for="deposit">Nombres de la commande:</label>
        <select name="deposit" id="deposit">
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
    <label for="other">Nombre précis :</label>
    <input type="text" name="other">
    <br>
    <div>
        <label for="deposit">commande :</label>
        <select name="deposit" id="deposit">
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
    <button type="submit">Commander Produit(s)</button>
</form>

<?php
}

$page_content = ob_get_clean();