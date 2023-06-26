<?php
// inclure la page de connexion
include "./entete.php";


// créer la session si elle n'existe pas
if (!isset($_SESSION['article'])) {
    $_SESSION['article'] = array();
}
?>
<br>
</div>
<!-- banner bg main end -->
<br>
<br>

<link rel="stylesheet" href="./public/css/produit.css">


<?php

// récupération de l'id dans le lien
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM article WHERE id = :id";
    $stmt = $connexion->prepare($query);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Utilisez les données récupérées
    foreach ($result as $row) { ?>

<div class="row section_produit">
    <div class="col-lg-6 col-sm-12">
        <div class="product_img">
            <img widht="100" height="100" src="<?= $row['images'] ?>" alt="<?= $row['nom_article'] ?>">
        </div>
    </div>
    <div class="col-lg-6 col-sm-12 table_produit">
        <div class="product_detail">
            <h2 class="product_title"><?= $row['nom_article'] ?>
            </h2>
            <p class="product_description"><?= $row['description'] ?></p>
            <p class="product_price"><?= $row['prix_unitaire'] ?> €</p>
            <div class="product_btns">
                <?php
                        if ($_SESSION === 'client') { ?>
                <div class="buy_bt"><a href="./model/ajouter_panier.php?id=<?= $value['id'] ?>">Acheter
                        maintenant</a></div>
                <?php } else { ?>
                <div class="buy_bt"><a href="./login.php">Acheter
                        maintenant</a></div>
                <?php }
                        ?>
            </div>
        </div>
    </div>
</div>
<?php
    }
}

include './pied.php';