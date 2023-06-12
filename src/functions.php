<?php
// Fonction de connexion à la base de données
function getConnection()
{
    $host = 'localhost'; // Hôte de la base de données
    $username = 'votre_nom_d_utilisateur'; // Nom d'utilisateur de la base de données
    $password = 'votre_mot_de_passe'; // Mot de passe de la base de données
    $database = 'votre_base_de_donnees'; // Nom de la base de données

    try {
        $connection = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    } catch (PDOException $e) {
        die('Erreur de connexion à la base de données : ' . $e->getMessage());
    }
}

// Fonction pour récupérer la liste des produits depuis la base de données
function getProduits()
{
    $connection = getConnection();
    $query = "SELECT * FROM produits";
    $result = $connection->query($query);
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

// Fonction pour ajouter un produit à la base de données
function ajouterProduit($nom, $prix, $description)
{
    $connection = getConnection();
    $query = "INSERT INTO produits (nom, prix, description) VALUES (?, ?, ?)";
    $statement = $connection->prepare($query);
    $statement->execute([$nom, $prix, $description]);
}

// Fonction pour modifier un produit dans la base de données
function modifierProduit($id, $nom, $prix, $description)
{
    $connection = getConnection();
    $query = "UPDATE produits SET nom = ?, prix = ?, description = ? WHERE id = ?";
    $statement = $connection->prepare($query);
    $statement->execute([$nom, $prix, $description, $id]);
}

// Fonction pour supprimer un produit de la base de données
function supprimerProduit($id)
{
    $connection = getConnection();
    $query = "DELETE FROM produits WHERE id = ?";
    $statement = $connection->prepare($query);
    $statement->execute([$id]);
}

// Fonction pour récupérer la liste des commandes depuis la base de données
function getCommandes()
{
    $connection = getConnection();
    $query = "SELECT * FROM commandes";
    $result = $connection->query($query);
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

// Fonction pour modifier l'état d'une commande dans la base de données
function modifierEtatCommande($commandeId, $nouvelEtat)
{
    $connection = getConnection();
    $query = "UPDATE commandes SET etat = ? WHERE id = ?";
    $statement = $connection->prepare($query);
    $statement->execute([$nouvelEtat, $commandeId]);
}

// Fonction pour récupérer la liste des utilisateurs depuis la base de données
function getUtilisateurs()
{
    $connection = getConnection();
    $query = "SELECT * FROM utilisateurs";
    $result = $connection->query($query);
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

// Fonction pour modifier le rôle d'un utilisateur dans la base de données
function modifierRoleUtilisateur($utilisateurId, $nouveauRole)
{
    $connection = getConnection();
    $query = "UPDATE utilisateurs SET role = ? WHERE id = ?";
    $statement = $connection->prepare($query);
    $statement->execute([$nouveauRole, $utilisateurId]);
}
