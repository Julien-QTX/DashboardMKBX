<?php
include "./entete.php";

//supprimer les produits
//si la variable del existe
if (isset($_GET['del'])) {
    $id_del = $_GET['del'];
    //suppression
    unset($_SESSION['article'][$id_del]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./public/css/panier.css">
</head>

<br>
</div>
<!-- banner bg main end -->
<br>
<br>
<div class="div_button_panier">
    <a href="index.php" class="button_panier btn btn-secondary">Boutique</a>
</div>
<section class="section_panier">
    <table class="table_panier">
        <tr>
            <th></th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Quantité</th>
            <th>Action</th>
        </tr>
        <?php
        $total = 0;
        // liste des produits
        //récupérer les clés du tableau session
        $ids = array_keys($_SESSION['article']);
        //s'il n'y a aucune clé dans le tableau
        if (empty($ids)) {
            echo "Votre panier est vide";
        } else {
            //si oui 
            $query = "SELECT * FROM article WHERE id IN (" . implode(',', $ids) . ")";
            $stmt = $connexion->prepare($query);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {

                $total = $total + $row['prix_unitaire'] * $_SESSION['article'][$row['id']]; ?>
        <tr>
            <td><img width="100" height="100" src="./public/<?= $row['images'] ?>"></td>
            <td><?= $row['nom_article'] ?></td>
            <td><?= $row['prix_unitaire'] ?>€</td>
            <td><?= $_SESSION['article'][$row['id']] ?></td>
            <td><a href="panier.php?del=<?= $row['id'] ?>"><img width="30" height="30"
                        src="./public/images/delete.png"></a></td>
        </tr>
        <?php

            }
        } ?>

        <tr class="total">
            <th>Total : <?= $total ?>€</th>
        </tr>
    </table>
</section>
<div class="div_button_panier">
    <a href="#" class="button_panier btn btn-secondary">Payement</a>
</div>

<?php
include "./pied.php";
?>