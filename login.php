<!DOCTYPE html>
<html>

<head>
    <title>Page de connexion</title>
</head>

<body>
    <?php if (isset($_GET["message"])) : ?>
        <div class="alert alert-danger">
            <?= $_GET["message"] ?>
        </div>
    <?php endif ?>
    <h1>Connexion</h1>
    <form method="POST" action="./model/login_process.php">

        <div>
            <label for="username">Nom d'utilisateur:</label>
            <input type="text" id="username" name="username">
        </div>

        <div>
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password">
        </div>
        <div>
            <input type="submit" value="Connexion" class="btn btn-primary">
        </div>
    </form>
    <p>Pas encore inscrit ? <a href="register.php" class="btn btn-warning">S'inscrire</a></p>
</body>

</html>