<?php

require_once __DIR__ . '/../../init.php';

$page_title = "Vérification";

ob_start();

?>

<h1>Vérifier une opération</h1>

<?php

include_once __DIR__ . '/../partials/alert_errors.php';
include_once __DIR__ . '/../partials/alert_success.php';

?>

<h2>Dépôts</h2>

<?php

$stmh = $db->prepare('SELECT deposits.id, deposits.id_entrepot, deposits.status, deposits.value, users.email, entrepot.id_user, produits.name 
                      FROM deposits INNER JOIN entrepot ON id_entrepot=entrepot.id
                      INNER JOIN users ON entrepot.id_user = users.id INNER JOIN produits ON entrepot.id_produits = produits.id
                      WHERE status=50');
$stmh->execute();
$operation = $stmh->fetchAll();

foreach ($operation as $op) {

    $user_role = array_search($op['status'], $config);
    echo '<p>';
    echo 'Demande de dépôt n°' . $op['id'] . ', demandée par ' . $op['email'] . ', d\'une valeur de ' . $op['value'] . ' ' . $op['name'] .
        '. Statut : ' . $config['status'][$op['status']];
    echo '</p>';
}
?>

<form action="/actions/verif_op.php" method="post">
    <select name="select_d" id="select">
        <option value="">Sélectionner une opération</option>
        <?php
        foreach ($operation as $op) { ?>

            <option value="<?= $op['id_user'] ?>,<?= $op['id'] ?>">Opération n°<?= $op['id'] ?></option>

        <?php }
        ?>
    </select>

    <button name="accept_d" class="accept">Autoriser</button>
    <button name="deny_d" class="deny">Refuser</button>

</form>

<h2>Retraits</h2>

<?php

$stmh = $db->prepare('SELECT withdrawals.id, withdrawals.id_entrepot, withdrawals.status, withdrawals.value, users.email, entrepot.id_user, produits.name 
                      FROM withdrawals INNER JOIN entrepot ON id_entrepot=entrepot.id
                      INNER JOIN users ON entrepot.id_user = users.id INNER JOIN produits ON entrepot.id_produits = produits.id
                      WHERE status=50');
$stmh->execute();
$operation = $stmh->fetchAll();

foreach ($operation as $op) {

    $user_role = array_search($op['status'], $config);
    echo '<p>';
    echo 'Demande de retrait n°' . $op['id'] . ', demandée par ' . $op['email'] . ', d\'une valeur de ' . $op['value'] . ' ' . $op['name'] .
        '. Statut : ' . $config['status'][$op['status']] . '<br>';
    echo '</p>';
}
?>

<form action="/actions/verif_op.php" method="post">
    <select name="select_w" id="select">
        <option value="">Sélectionner une opération</option>
        <?php
        foreach ($operation as $op) { ?>

            <option value="<?= $op['id_user'] ?>,<?= $op['id'] ?>">Opération n°<?= $op['id'] ?></option>

        <?php }
        ?>
    </select>

    <button name="accept_w" class="accept">Autoriser</button>
    <button name="deny_w" class="deny">Refuser</button>

</form>

<?php
$page_content = ob_get_clean();
