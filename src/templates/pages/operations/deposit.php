<?php

$page_title = "Dépôts";

ob_start();

include_once __DIR__ . '/../../partials/alert_errors.php';
include_once __DIR__ . '/../../partials/alert_success.php';

/*$alreadyUser = $userManager->getByEmail($_POST['email']);
if ($alreadyUser !== false) {
    error_die('Déjà inscrit', '/?page=signup');
}*/

$stmh = $db->prepare('SELECT * FROM bankaccounts WHERE id_user = ?');
$stmh->execute([$_SESSION['user_id']]);
$usr_deposit = $stmh->fetch();

$already_op = $operationManager->getByOperation('deposits', $usr_deposit['id']);
if ($already_op !== false) { ?>
    
    <h3>Vous avez déjà une demande de dépôt en cours</h3>

<?php
} else {
?>

<form action="/actions/deposit.php" method="post" >
    <div>
        <label for="text">Déposer de l'argent :</label>
        <select name="deposit" id="depot">
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
    <label for="other">Déposer une autre somme</label>
    <input type="text" name="other">
    <br>
    <br>
    <button type="submit">Déposer l'argent</button>

</form>

<?php

}

$page_content = ob_get_clean();
