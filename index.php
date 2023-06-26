<?php
include './entete.php';

?>

<!-- banner section start -->
<div class="banner_section layout_padding">
    <div class="container">
        <div id="my_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                            <div class="buynow_bt"><a href="#">Buy Now</a></div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                            <div class="buynow_bt"><a href="#">Buy Now</a></div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                            <div class="buynow_bt"><a href="#">Buy Now</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
</div>
<!-- banner section end -->
</div>
<!-- banner bg main end -->
<!-- fashion section start -->
<div class="fashion_section">
    <?php
    $articles = (!empty($_GET)) ? getArticleIndex(null, $_GET) : getArticleIndex();

    if (!empty($articles) && is_array($articles)) {
        $categories = array_unique(array_column($articles, 'id_categorie')); // Récupère les catégories uniques

        foreach ($categories as $category) {
            $categoryArticles = array_filter($articles, function ($article) use ($category) {
                return $article['id_categorie'] == $category;
            });

            $chunks = array_chunk($categoryArticles, 3); // Divise les articles par catégorie en groupes de 3

            $activeClass = ($category === $categories[0]) ? /*'active'*/: ''; // Ajoute la classe active à la première catégorie
            $categoryInfo = null;

            foreach ($articles as $article) {
                if ($article['id_categorie'] == $category) {
                    $categoryInfo = $article;
                    break;
                }
            }

            if ($categoryInfo) {
    ?>
                <div class="category-carousel">
                    <h1 class="fashion_taital" id="<?= $categoryInfo['libelle_categorie'] ?>">
                        <?= $categoryInfo['libelle_categorie'] ?></h1>
                    <div id="electronic_main_slider_<?= $category ?>" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                            foreach ($chunks as $key => $chunk) {
                                $activeClass = ($key === 0) ? 'active' : ''; // Ajoute la classe active à la première diapositive
                            ?>
                                <div class="carousel-item <?= $activeClass ?>">
                                    <div class="container">
                                        <div class="fashion_section_2">
                                            <div class="row">
                                                <?php foreach ($chunk as $value) { ?>
                                                    <div class="col-lg-4 col-sm-4">
                                                        <div class="box_main">
                                                            <h4 class="shirt_text"><?= $value['nom_article'] ?></h4>
                                                            <p class="price_text"><span style="color: #262626;"><?= $value['prix_unitaire'] ?>
                                                                    €</span></p>
                                                            <div class="electronic_img"><img src="<?= $value['images'] ?>"></div>
                                                            <div class="btn_main">
                                                                <?php
                                                                if ($_SESSION === 'client') { ?>
                                                                    <div class="buy_bt"><a href="./model/ajouter_panier.php?id=<?= $value['id'] ?>">Acheter
                                                                            maintenant</a></div>
                                                                <?php } else { ?>
                                                                    <div class="buy_bt"><a href="./login.php">Acheter
                                                                            maintenant</a></div>
                                                                <?php }
                                                                ?>


                                                                <div class="seemore_bt" method="GET"><a href="./produit.php?id=<?= $value['id'] ?>">See More</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <a class="carousel-control-prev" href="#electronic_main_slider_<?= $category ?>" role="button" data-slide="prev" style="color:black">
                            <i class='bx bxs-chevrons-left'>
                                << Prev</i>

                        </a>

                        <a class="carousel-control-next" href="#electronic_main_slider_<?= $category ?>" role="button" data-slide="next" style="color:black">
                            <i class='bx bxs-chevrons-right'>Next >></i>

                        </a>
                    </div>
                </div>
                <div class="carousel-space"></div> <!-- Espace entre les carrousels -->
    <?php
            }
        }
    }
    ?>
</div>
<!-- fashion section end -->

<?php
include './pied.php';
?>