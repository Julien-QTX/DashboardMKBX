<?php
// Inclure le fichier de configuration et les fonctions
require_once '../../../config.php';
require_once 'includes/functions.php';

// Vérifier si l'utilisateur est connecté en tant qu'administrateur, sinon le rediriger vers la page de connexion
if ($user->role < 200) {
    header('Location: /?page=home');
}

// Récupérer la liste des produits depuis la base de données
$produits = getProduits();

// Traitement des actions (ajouter, modifier, supprimer)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier l'action à effectuer
    $action = $_POST['action'] ?? '';

    if ($action === 'ajouter') {
        $nom = $_POST['nom'] ?? '';
        $prix = $_POST['prix'] ?? '';
        $description = $_POST['description'] ?? '';

        // Valider les données
        if (!empty($nom) && !empty($prix)) {
            // Ajouter le produit à la base de données
            ajouterProduit($nom, $prix, $description);
            header("Location: gestion_produits.php");
            exit();
        }
    } elseif ($action === 'modifier') {
        $id = $_POST['id'] ?? '';
        $nom = $_POST['nom'] ?? '';
        $prix = $_POST['prix'] ?? '';
        $description = $_POST['description'] ?? '';

        // Valider les données
        if (!empty($id) && !empty($nom) && !empty($prix)) {
            // Mettre à jour le produit dans la base de données
            modifierProduit($id, $nom, $prix, $description);
            header("Location: gestion_produits.php");
            exit();
        }
    } elseif ($action === 'supprimer') {
        $id = $_POST['id'] ?? '';

        // Valider les données
        if (!empty($id)) {
            // Supprimer le produit de la base de données
            supprimerProduit($id);
            header("Location: gestion_produits.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Gestion des produits</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <h1>Gestion des produits</h1>

    <h2>Liste des produits</h2>

    <table>
        <tr>
            <th>Nom</th>
            <th>Prix</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($produits as $produit) : ?>
            <tr>
                <td><?php echo $produit['nom']; ?></td>
                <td><?php echo $produit['prix']; ?></td>
                <td><?php echo $produit['description']; ?></td>
                <td>
                    <a href="modifier_produit.php?id=<?php echo $produit['id']; ?>">Modifier</a>
                    <form method="post" action="">
                        <input type="hidden" name="action" value="supprimer">
                        <input type="hidden" name="id" value="<?php echo $produit['id']; ?>">
                        <button type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Ajouter un produit</h2>

    <form method="post" action="">
        <input type="hidden" name="action" value="ajouter">
        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom" required>
        <label for="prix">Prix:</label>
        <input type="number" name="prix" id="prix" required>
        <label for="description">Description:</label>
        <textarea name="description" id="description" rows="4"></textarea>
        <button type="submit">Ajouter</button>
    </form>

    <a href="index.php">Retour à l'accueil</a>
</body>

</html>