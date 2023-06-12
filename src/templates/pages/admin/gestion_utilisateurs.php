<?php
// Inclure le fichier de configuration et les fonctions
require_once 'includes/config.php';
require_once 'includes/functions.php';

// Vérifier si l'utilisateur est connecté en tant qu'administrateur, sinon le rediriger vers la page de connexion
if ($user->role < 200) {
    header('Location: /?page=home');
}

// Récupérer la liste des utilisateurs depuis la base de données
$utilisateurs = getUtilisateurs();

// Traitement des actions (modifier le rôle de l'utilisateur)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier l'action à effectuer
    $action = $_POST['action'] ?? '';

    if ($action === 'modifier') {
        $utilisateurId = $_POST['utilisateurId'] ?? '';
        $nouveauRole = $_POST['nouveauRole'] ?? '';

        // Valider les données
        if (!empty($utilisateurId) && !empty($nouveauRole)) {
            // Mettre à jour le rôle de l'utilisateur dans la base de données
            modifierRoleUtilisateur($utilisateurId, $nouveauRole);
            header("Location: gestion_utilisateurs.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Gestion des utilisateurs</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <h1>Gestion des utilisateurs</h1>

    <h2>Liste des utilisateurs</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nom d'utilisateur</th>
            <th>Email</th>
            <th>Rôle</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($utilisateurs as $utilisateur) : ?>
            <tr>
                <td><?php echo $utilisateur['id']; ?></td>
                <td><?php echo $utilisateur['nom_utilisateur']; ?></td>
                <td><?php echo $utilisateur['email']; ?></td>
                <td>
                    <form method="post" action="">
                        <input type="hidden" name="action" value="modifier">
                        <input type="hidden" name="utilisateurId" value="<?php echo $utilisateur['id']; ?>">
                        <select name="nouveauRole">
                            <option value="utilisateur" <?php if ($utilisateur['role'] === 'utilisateur') echo 'selected'; ?>>Utilisateur</option>
                            <option value="administrateur" <?php if ($utilisateur['role'] === 'administrateur') echo 'selected'; ?>>Administrateur
                            </option>
                        </select>
                        <button type="submit">Modifier</button>
                    </form>
                </td>
                <td>
                    <a href="supprimer_utilisateur.php?id=<?php echo $utilisateur['id']; ?>">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <a href="index.php">Retour à l'accueil</a>
</body>

</html>