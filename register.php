<!DOCTYPE html>
<html>

<head>
    <title>Page d'inscription</title>
</head>

<body>
    <h2>Inscription</h2>
    <form method="POST" action="register_process.php">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required><br><br>
        <label for="confirm_password">Confirmer le mot de passe:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>
        <label for="role">Rôle:</label>
        <select id="role" name="role">
            <option value="manager">Manager</option>
            <option value="client">Client</option>
        </select><br><br>
        <input type="submit" value="S'inscrire">
    </form>
    <p>Déjà inscrit ? <a href="login.php">Se connecter</a></p>
</body>

</html>