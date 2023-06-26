<?php
include './header.php';

if (!empty($_GET['id'])) {
    $article = getArticle($_GET['id']);
}

?>
<div class="home-content">
    <div class="overview-boxes">
        <div class="box">
            <form action="<?= !empty($_GET['id']) ? "../model/modifArticle.php" : "../model/ajoutArticle.php" ?>" method="post" enctype="multipart/form-data">
                <label for="nom_article">Nom de l'article</label>
                <input value="<?= !empty($_GET['id']) ?  $article['nom_article'] : "" ?>" type="text" name="nom_article" id="nom_article" placeholder="Veuiller saisir le nom">
                <input value="<?= !empty($_GET['id']) ?  $article['id'] : "" ?>" type="hidden" name="id" id="id">

                <label for="id_categorie">Categorie</label>
                <select name="id_categorie" id="id_categorie">
                    <option value="">--Choisir une catégorie--</option>
                    <?php
                    $categories = getCategorie();

                    if (!empty($categories) && is_array($categories)) {
                        foreach ($categories as $key => $value) {

                    ?>
                            <option <?= !empty($_GET['id']) && $article['id_categorie'] == $value['id'] ? "selected" : "" ?> value="<?= $value['id'] ?>"><?= $value['libelle_categorie'] ?></option>
                    <?php
                        }
                    }

                    ?>
                </select>

                <label for="description">Description</label>
                <input value="<?= !empty($_GET['id']) ? $article['description'] : "" ?>" type="number" name="description" id="description" placeholder="Veuiller saisir la quantité">

                <label for="quantite">Quantité</label>
                <input value="<?= !empty($_GET['id']) ? $article['quantite'] : "" ?>" type="number" name="quantite" id="quantite" placeholder="Veuiller saisir la quantité">

                <label for="prix_unitaire">Prix unitaire</label>
                <input value="<?= !empty($_GET['id']) ? $article['prix_unitaire'] : "" ?>" type="number" name="prix_unitaire" id="prix_unitaire" placeholder="Veuiller saisir le prix">

                <label for="date_fabrication">Date de fabrication</label>
                <input value="<?= !empty($_GET['id']) ? $article['date_fabrication'] : "" ?>" type="datetime-local" name="date_fabrication" id="date_fabrication">

                <label for="images">Image</label>
                <input value="<?= !empty($_GET['id']) ? $article['images'] : "" ?>" type="file" name="images" id="images">

                <button type="submit">Valider</button>

                <?php
                if (!empty($_SESSION['message']['text'])) {
                ?>
                    <div class="alert <?= $_SESSION['message']['type'] ?>">
                        <?= $_SESSION['message']['text'] ?>
                    </div>
                <?php
                }
                ?>
            </form>
        </div>
        <div style="display: block;" class="box">
            <form action="" method="get">
                <table class="mtable">
                    <tr>
                        <th>Nom article</th>
                        <th>Catégorie</th>
                        <th>Quantité</th>
                        <th>Prix Unitaire</th>
                        <th>Date fabrication</th>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="nom_article" id="nom_article" placeholder="Veuiller saisir le nom">
                        </td>
                        <td>
                            <select name="id_categorie" id="id_categorie">
                                <option value="">--Choisir une catégorie--</option>
                                <?php
                                $categories = getCategorie();

                                if (!empty($categories) && is_array($categories)) {
                                    foreach ($categories as $key => $value) {
                                ?>
                                        <option <?= !empty($_GET['id']) && $article['id_categorie'] == $value['id'] ? "selected" : "" ?> value="<?= $value['id'] ?>"><?= $value['libelle_categorie'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </td>
                        <td>
                            <input type="number" name="quantite" id="quantite" placeholder="Veuiller saisir la quantité">
                        </td>
                        <td>
                            <input type="number" name="prix_unitaire" id="prix_unitaire" placeholder="Veuiller saisir le prix">
                        </td>
                        <td>
                            <input type="date" name="date_fabrication" id="date_fabrication">
                        </td>
                    </tr>
                </table>
                <br>
                <button type="submit">Valider</button>
            </form>
            <br>
            <table class="mtable">
                <tr>
                    <th>Nom article</th>
                    <th>Catégorie</th>
                    <th>Quantité</th>
                    <th>Prix Unitaire</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                <?php
                if (!empty($_GET)) {
                    $articles = getArticle(null, $_GET);
                } else {
                    $articles = getArticle();
                }

                if (!empty($articles) && is_array($articles)) {
                    foreach ($articles as $key => $value) { ?>
                        <tr>
                            <td><?= $value['nom_article'] ?></td>
                            <td><?= $value['libelle_categorie'] ?></td>
                            <td><?= $value['quantite'] ?></td>
                            <td><?= $value['prix_unitaire'] ?></td>
                            <td><?= $value['description'] ?></td>
                            <td><img width="100" height="100" src="<?= $value['images'] ?>" alt="<?= $value['nom_article'] ?>">
                            </td>
                            <td><a href="?id=<?= $value['id'] ?>"><i class='bx bx-edit-alt'></i></a></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </table>
            <br><br>
            <button onclick="downloadCSV()">Excel</button>
        </div>
    </div>
</div>

<?php
include './footer.php';

?>

<script>
    function downloadCSV() {
        var csv = 'Nom article,Catégorie,Quantité,Prix Unitaire,Date fabrication\n';

        <?php
        if (!empty($_GET)) {
            $articles = getArticle(null, $_GET);
        } else {
            $articles = getArticle();
        }

        if (!empty($articles) && is_array($articles)) {
            foreach ($articles as $key => $value) {
                echo "csv += '" . $value['nom_article'] . "," . $value['libelle_categorie'] . "," . $value['quantite'] . "," . $value['prix_unitaire'] . "," . date('d/m/Y H:i:s', strtotime($value['date_fabrication'])) . "\\n';\n";
            }
        }
        ?>

        var csvData = new Blob([csv], {
            type: 'text/csv'
        });
        var csvUrl = URL.createObjectURL(csvData);
        var link = document.createElement('a');
        link.href = csvUrl;
        link.download = 'articles_Dashboard.csv';
        link.click();
    }
</script>