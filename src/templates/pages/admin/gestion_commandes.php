<?php
// Inclure le fichier de configuration et les fonctions
require_once 'includes/config.php';
require_once 'includes/functions.php';

// Vérifier si l'utilisateur est connecté en tant qu'administrateur, sinon le rediriger vers la page de connexion
if ($user->role < 200) {
    header('Location: /?page=home');
}

// Récupérer la liste des commandes depuis la base de données
$commandes = getCommandes();

// Traitement des actions (modifier l'état de la commande)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier l'action à effectuer
    $action = $_POST['action'] ?? '';

    if ($action === 'modifier') {
        $commandeId = $_POST['commandeId'] ?? '';
        $nouvelEtat = $_POST['nouvelEtat'] ?? '';

        // Valider les données
        if (!empty($commandeId) && !empty($nouvelEtat)) {
            // Mettre à jour l'état de la commande dans la base de données
            modifierEtatCommande($commandeId, $nouvelEtat);
            header("Location: gestion_commandes.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Gestion des commandes</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <h1>Gestion des commandes</h1>

    <h2>Liste des commandes</h2>

    <table>
        <tr>
            <th>Numéro de commande</th>
            <th>Date</th>
            <th>Client</th>
            <th>Total</th>
            <th>État</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($commandes as $commande) : ?>
            <tr>
                <td><?php echo $commande['numero_commande']; ?></td>
                <td><?php echo $commande['date']; ?></td>
                <td><?php echo $commande['client']; ?></td>
                <td><?php echo $commande['total']; ?></td>
                <td>
                    <form method="post" action="">
                        <input type="hidden" name="action" value="modifier">
                        <input type="hidden" name="commandeId" value="<?php echo $commande['id']; ?>">
                        <select name="nouvelEtat">
                            <option value="En cours" <?php if ($commande['etat'] === 'En cours') echo 'selected'; ?>>En
                                cours</option>
                            <option value="En attente de paiement" <?php if ($commande['etat'] === 'En attente de paiement') echo 'selected'; ?>>En attente de
                                paiement</option>
                            <option value="Expédiée" <?php if ($commande['etat'] === 'Expédiée') echo 'selected'; ?>>
                                Expédiée</option>
                            <option value="Livré" <?php if ($commande['etat'] === 'Livré') echo 'selected'; ?>>Livré
                            </option>
                        </select>
                        <button type="submit">Modifier</button>
                    </form>
                </td>
                <td>
                    <a href="details_commande.php?id=<?php echo $commande['id']; ?>">Détails</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <a href="index.php">Retour à l'accueil</a>
</body>

</html>