<?php

require_once __DIR__ . '/../../init.php';

$page_title = "Accueil";
$head_metas = "<link rel=stylesheet href=assets/CSS/home.css>";

ob_start();

?>

<h1>Page d'accueil</h1>

<?php

if ($user !== false) {
    if ($user->role == 0) { ?>

        <h2>Votre compte a été banni</h2>

<?php }
}

/*if (isset($_SESSION['user_id'])) {
    echo '<p>' . $_SESSION['user_id'] . '</p>';
}*/


// Nombre de produits à afficher par page
$produitsParPage = 10;

?>

<div class="Produits">
    <div class="rang">
        <div class="Produit" href="/?page=produit">
            <?php $produit ?>
        </div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
    </div>
    <div class="rang">
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
    </div>
    <div class="rang">
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
    </div>
    <div class="rang">
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
    </div>
    <div class="rang">
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
    </div>
    <div class="rang">
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
    </div>
    <div class="rang">
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
    </div>
    <div class="rang">
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
    </div>
    <div class="rang">
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
        <div class="Produit" href="/?page=produit"><?php $produit ?></div>
    </div>

</div>


<table>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prix</th>
        <th>Description</th>
    </tr>
    <?php foreach ($produits as $produit) : ?>
        <tr>
            <td><?php echo $produit['id']; ?></td>
            <td><?php echo $produit['nom']; ?></td>
            <td><?php echo $produit['prix']; ?></td>
            <td><?php echo $produit['description']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>



















<?php
$page_content = ob_get_clean();
