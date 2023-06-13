<?php

$page_title = "Retraits";

ob_start();

include_once __DIR__ . '/../../partials/alert_errors.php';
include_once __DIR__ . '/../../partials/alert_success.php';

$stmh = $db->prepare('SELECT * FROM entrepot WHERE id_user = ?');
$stmh->execute([$_SESSION['user_id']]);
$usr_deposit = $stmh->fetch();

$stmhe = $db->prepare('SELECT * FROM produits');
$stmhe->execute();
$products = $stmhe->fetchAll();

$already_op = $operationManager->getByOperation('withdrawals', $usr_deposit['id']);
if ($already_op !== false) {
?>

<h3>Vous avez déjà une demande de retrait en cours</h3>

<?php
} else {

?>

<form action="/actions/withdrawal.php" method="post">

    <label for="other">Nombre précis :</label>
    <input type="text" name="other">
    <br>
    <br>
    <div>
        <label for="product">Produit :</label>
        <select name="product" id="product">
            <option value="">Sélectionner un produit</option>
            <?php
                foreach ($products as $product) { ?>
            <option value="<?= $product['id'] ?>"><?= $product['name'] ?></option>
            <?php }
                ?>
        </select>
    </div>
    <br>
    <button type="submit">Retirer Produit</button>
</form>

<?php
}

$page_content = ob_get_clean();