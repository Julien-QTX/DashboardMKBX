<?php

require_once __DIR__ . '/../../init.php';

$page_title = "Profil";

$head_metas = "<link rel=stylesheet href=assets/CSS/profil.css>";

ob_start();

$stmh = $db->prepare('SELECT fullname FROM users WHERE id = ?');
$stmh->execute([$_SESSION['user_id']]);
$user_name = $stmh->fetch();

?>

<h1><?= $user_name['fullname'] ?> </h1>

<?php

if ($user != false) {

    if ($user->role > 1) {

        $stmh = $db->prepare('SELECT lieu, id FROM entrepot WHERE id_user = ?');
        $stmh->execute([$_SESSION['user_id']]);
        $actual_lieu = $stmh->fetch();

        $stmh = $db->prepare('SELECT name FROM produits WHERE id = 1');
        $stmh->execute();
        $actual_produit = $stmh->fetch();

?>

        <h3>Vos articles en vente : </h3>

        <p>Vous avez <?= $actual_produit['name'] ?> à cet endroit <?= $actual_lieu['lieu'] ?></p>

        <?php

        $stmh = $db->prepare('SELECT * FROM entrepot WHERE id_user = ?');
        $stmh->execute([$_SESSION['user_id']]);
        $usr_profile = $stmh->fetch();

        ?>

        <h2>Dernières opérations</h2>

        <h3>Stocks ajoutés</h3>

        <?php

        $stmh = $db->prepare('SELECT * FROM deposits WHERE id_entrepot=? AND status=100 ORDER BY operation_date DESC LIMIT 10');
        $stmh->execute([$usr_profile['id']]);
        $last_deposits = $stmh->fetchAll();

        foreach ($last_deposits as $ld) {
            $date = new DateTime($ld['operation_date']);
            $formatted_date = $date->format('d/m/Y' .  ' à ' . 'H:i');
            echo '<span class="operation">Dépôt de ' . $ld['value'] . ' produit(s)';
            echo ' le ' . $formatted_date . '</span><br>';
        }

        ?>

        <h3>Commandes clients</h3>

        <?php

        $stmh = $db->prepare('SELECT * FROM withdrawals WHERE id_entrepot=? AND status=100 ORDER BY operation_date DESC LIMIT 10');
        $stmh->execute([$usr_profile['id']]);
        $last_withdrawals = $stmh->fetchAll();

        foreach ($last_withdrawals as $lw) {
            $date = new DateTime($lw['operation_date']);
            $formatted_date = $date->format('d/m/Y' .  ' à ' . 'H:i');
            echo '<span class="operation">Retrait de ' . $lw['value'] . ' produit(s)';
            echo ' le ' . $formatted_date . '</span><br>';
        }

        ?>

        <h3>Transactions</h3>

        <h4>Effectuées</h4>

        <?php

        $stmh = $db->prepare('SELECT * FROM transactions WHERE sender_local=? ORDER BY operation_date DESC LIMIT 10');
        $stmh->execute([$usr_profile['id']]);
        $last_transactions = $stmh->fetchAll();

        foreach ($last_transactions as $lt) {
            $stmh = $db->prepare('SELECT * FROM entrepot WHERE id=?');
            $stmh->execute([$lt['receiver_local']]);
            $receiver = $stmh->fetch();

            $stmh = $db->prepare('SELECT * FROM users WHERE id=?');
            $stmh->execute([$receiver['id_user']]);
            $receiver_name = $stmh->fetch();

            $date = new DateTime($lt['operation_date']);
            $formatted_date = $date->format('d/m/Y' .  ' à ' . 'H:i');

            echo '<span class="operation">Envoi de ' . $lt['value'] . ' Euros à ' . $receiver_name['fullname'];
            echo ' le ' . $formatted_date . '</span><br>';
        }

        ?>

        <h4>Reçues</h4>

<?php

        $stmh = $db->prepare('SELECT * FROM transactions WHERE receiver_local=? ORDER BY operation_date DESC LIMIT 10');
        $stmh->execute([$usr_profile['id']]);
        $last_transactions = $stmh->fetchAll();

        foreach ($last_transactions as $lt) {
            $stmh = $db->prepare('SELECT * FROM entrepot WHERE id=?');
            $stmh->execute([$lt['sender_local']]);
            $sender = $stmh->fetch();

            $stmh = $db->prepare('SELECT * FROM users WHERE id=?');
            $stmh->execute([$sender['id_user']]);
            $sender_name = $stmh->fetch();

            $date = new DateTime($lt['operation_date']);
            $formatted_date = $date->format('d/m/Y' .  ' à ' . 'H:i');

            echo '<span class="operation">Reçu ' . $lt['value'] . ' Euros de ' . $sender_name['fullname'];
            echo ' le ' . $formatted_date . '</span><br>';
        }
    }
}

$page_content = ob_get_clean();
