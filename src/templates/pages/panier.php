<?php
session_start();

// Vérifier si le panier existe dans la session, sinon le créer
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
}

// Ajouter un produit au panier
function ajouterAuPanier($produit)
{
    $_SESSION['panier'][] = $produit;
}

// Retirer un produit du panier
function retirerDuPanier($index)
{
    if (isset($_SESSION['panier'][$index])) {
        unset($_SESSION['panier'][$index]);
        $_SESSION['panier'] = array_values($_SESSION['panier']);
    }
}

// Afficher le panier
function afficherPanier()
{
    if (empty($_SESSION['panier'])) {
        echo "Votre panier est vide.";
    } else {
        foreach ($_SESSION['panier'] as $index => $produit) {
            echo "Produit #" . ($index + 1) . ": " . $produit . "<br>";
        }
    }
}

// Exemples d'utilisation
ajouterAuPanier("Produit 1");
ajouterAuPanier("Produit 2");
ajouterAuPanier("Produit 3");

retirerDuPanier(1);

afficherPanier();
