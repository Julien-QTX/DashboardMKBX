<?php

$page_title = "Dépôts";

ob_start();

include_once __DIR__ . '/../../partials/alert_errors.php';
include_once __DIR__ . '/../../partials/alert_success.php';

$stmh = $db->prepare('SELECT * FROM entrepot WHERE id_user = ?');
$stmh->execute([$_SESSION['user_id']]);
$usr_deposit = $stmh->fetch();

$stmhd = $db->prepare('SELECT * FROM produits');
$stmhd->execute();
$produits = $stmhd->fetchAll();

$stmhl = $db->prepare('SELECT * FROM entrepot');
$stmhl->execute();
$lieux = $stmhl->fetchAll();

$already_op = $operationManager->getByOperation('deposits', $usr_deposit['id']);
if ($already_op !== false) {
?>

    <h3>Vous avez déjà une demande de dépôt en cours</h3>

<?php
} else {
?>

    <form action="/actions/deposit.php" method="post">
        <label for="other">Nombre précis :</label>
        <input type="text" name="other">
        <br>
        <br>
        <div>
            <label for="product">Produit :</label>
            <select name="product" id="product">
                <option value="">Sélectionner un produit</option>
                <?php
                foreach ($produits as $produit) { ?>
                    <option value="<?= $produit['id'] ?>"><?= $produit['nom'] ?></option>
                <?php }
                ?>
            </select>
        </div>
        <br>
        <div>
            <label for="lieu">Choisissez le lieu d'entreposage :</label>
            <select name="lieu" id="lieu">
                <option value="">Sélectionner un lieu</option>
                <?php
                foreach ($lieux as $lieu) { ?>
                    <option value="<?= $lieu['id'] ?>"><?= $lieu['name'] ?></option>
                <?php }
                ?>
            </select>
        </div>
        <br>
        <button type="submit">Commander Produit(s)</button>
    </form>

<?php
}

$page_content = ob_get_clean();
