<?php 

require_once __DIR__ . '/../../init.php';

$page_title = "Opérations";

$head_metas = "<link rel=stylesheet href=assets/CSS/operations.css>";

ob_start();

?>

<h1>Liste des opérations</h1>

<li class="op"><a href="/?page=operations/deposit">Dépôt d'argent</a></li>
<li class="op"><a href="/?page=operations/withdraw">Retrait d'argent</a></li>
<li class="op"><a href="/?page=operations/transaction">Envoi d'argent</a></li>
<li class="op"><a href="/?page=operations/conversion">Conversion des devises</a></li>







<?php

$page_content = ob_get_clean();
