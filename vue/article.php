<?php
include_once './header.php';

?>
<div class="home-content">
    <div class="overview-boxes">
        <div class="box">
            <form action="../model/ajoutArticle.php" method="post">
                <label for="nom_article">Nom de l'article</label>
                <input type="text" name="nom_article" id="nom_article" placeholder="Veuiller saisir le nom">

                <label for="categorie">Categorie</label>
                <select name="categorie" id="categorie">
                    <option value="Ordinateur">Ordinateur</option>
                    <option value="Imprimante">Imprimante</option>
                    <option value="Accessoire">Accessoire</option>
                </select>

                <label for="quantite">Quantité</label>
                <input type="number" name="quantite" id="quantite" placeholder="Veuiller saisir la quantité">

                <label for="prix_unitaire">Prix unitaire</label>
                <input type="number" name="prix_unitaire" id="prix_unitaire" placeholder="Veuiller saisir le prix">

                <label for="date_fabrication">Date de fabrication</label>
                <input type="datetime-local" name="date_fabrication" id="date_fabrication">

                <label for="date_expiration">Date d'éxpiration</label>
                <input type="datetime-local" name="date_expiration" id="date_expiration">

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
        <div class="box">
            <table class="mtable">
                <tr>
                    <th>Nom article</th>
                    <th>Catégorie</th>
                    <th>Quantité</th>
                    <th>Prix Unitaire</th>
                    <th>Date fabrication</th>
                    <th>Date expiration</th>
                </tr>
            </table>
        </div>
    </div>
</div>

<?php
include './footer.php';

?>