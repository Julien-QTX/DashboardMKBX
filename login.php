<?php
include './entete.php';
?>

<head>
    <link rel="stylesheet" href="./public/css/login.css">
</head>
<br>
</div>
<!-- banner bg main end -->
<br>
<br>
<?php
if (isset($_GET["message"])) : ?>
    <div class="alert alert-danger">
        <?= $_GET["message"] ?>
    </div>
<?php endif ?>



<form method="POST" class="form_login" action="./model/login_process.php">
    <h1>Connexion</h1>
    <div class="element_login">
        <label for="nom">Nom d'utilisateur:</label>
        <input type="text" id="nom" name="nom">
    </div>

    <div class="element_login">
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password">
    </div>
    <div class="button_login">
        <input type="submit" value="Connexion" class="btn btn-secondary">
    </div>
</form>
<p>Pas encore inscrit ? <a href="register.php">S'inscrire</a></p>
<?php
include './pied.php';

?>