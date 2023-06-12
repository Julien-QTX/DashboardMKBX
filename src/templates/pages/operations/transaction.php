<?php 

$page_title = "Transactions";

ob_start();

?>

<h1>Envoyer de l'argent</h1>
<?php
include_once __DIR__ . '/../../partials/alert_errors.php';
include_once __DIR__ . '/../../partials/alert_success.php';
?>

<form action="/actions/transaction.php" method="post">

  <div>
      <label for="value">Somme à envoyer : </label>
      <input type="text" name="sum">
  </div>

    <h3>Receveur</h3>

  <div>
      <label for="email">Adresse mail : </label>
      <input type="text" name="email">
</div>

    <button type="submit">Envoyer</button>

</form>

<?php

$page_content = ob_get_clean();
