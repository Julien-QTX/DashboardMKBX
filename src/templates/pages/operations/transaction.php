<?php

$page_title = "Transactions";

ob_start();

?>

<h1>Envoyer de l'argent</h1>
<?php
include_once __DIR__ . '/../../partials/alert_errors.php';
include_once __DIR__ . '/../../partials/alert_success.php';

$stmhl = $db->prepare('SELECT * FROM entrepot');
$stmhl->execute();
$lieux = $stmhl->fetchAll();

?>

<form action="/actions/transaction.php" method="post">

    <div>
        <label for="value">Somme à envoyer : </label>
        <input type="text" name="sum">
    </div>

    <h3>Receveur</h3>

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

    <button type="submit">Envoyer</button>

</form>

<?php

$page_content = ob_get_clean();