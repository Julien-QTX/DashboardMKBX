<?php
include './model/function.php';

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Eflyer</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo ucfirst(str_replace(".php", "", basename($_SERVER['PHP_SELF']))); ?></title>

    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="public/css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="public/images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="public/css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--  -->
    <!-- owl stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext"
        rel="stylesheet">
    <link rel="stylesheet" href="public/css/owl.carousel.min.css">
    <link rel="stylesoeet" href="public/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
</head>

<body>
    <!-- banner bg main start -->
    <div class="banner_bg_main">
        <!-- header top section start -->
        <div class="container">
            <div class="header_section_top">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="custom_menu">
                            <ul>
                                <li><a href="#">Best Sellers</a></li>
                                <li><a href="#">Gift Ideas</a></li>
                                <li><a href="#">New Releases</a></li>
                                <li><a href="#">Today's Deals</a></li>
                                <li><a href="#">Customer Service</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header top section start -->
        <!-- logo section start -->
        <div class="logo_section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="logo"><a href="./index.php"><img src="public/images/logo.png"></a></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- logo section end -->
        <!-- header section start -->
        <div class="header_section">
            <div class="container">
                <div class="containt_main">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <?php
                            $categories = getCategorie();

                            if (!empty($categories) && is_array($categories)) {
                                foreach ($categories as $key => $value) { ?>

                            <a class="dropdown-item"
                                href="/#<?= $value['libelle_categorie'] ?>"><?= $value['libelle_categorie'] ?></a>

                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="main">
                        <!-- Another variation with a button -->
                        <div class="input-group" method="get">
                            <input type="text" class="form-control" placeholder="Recherchez un article">
                            <div class="input-group-append" method="get">
                                <button class="btn btn-secondary" type="button"
                                    style="background-color: #f26522; border-color:#f26522 ">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="header_box">
                        <div class="login_menu main-nav">
                            <ul>
                                <li>
                                    <a href="./panier.php">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <span class="padding_10">Panier</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="./profil.php" class="cd-signup">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <span class="padding_10">Profil</span>
                                    </a>
                                </li>
                                <li>
                                    <?php
                                    if (!isset($_SESSION['nom'])) { ?>
                                    <button class="btn btn-secondary">
                                        <a href="./login.php">Connexion</a>
                                    </button>
                                    <?php
                                    } else { ?>
                                    <button class="btn btn-secondary">
                                        <a href="./model/disconnect.php">Déconnexion</a>
                                    </button>
                                    <?php

                                    }
                                    ?>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header section end -->