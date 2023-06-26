<?php
include './entete.php';
?>

<head>
    <link rel="stylesheet" href="./public/css/register.css">
</head>
<br>
</div>
<!-- banner bg main end -->
<br>
<br>
<?php if (isset($_GET["message"])) : ?>
    <div class="alert alert-danger">
        <h2><?= $_GET["message"] ?></h2>
    </div>
<?php endif ?>

<form method="POST" class="form_register" action="./model/register_process.php">
    <h2>Inscription</h2>
    <div class="element_register">
        <label for="nom">Nom d'utilisateur:</label>
        <input type="text" id="nom" name="nom">
    </div>
    <div class="element_register">
        <label for="prenom">Prénom d'utilisateur:</label>
        <input type="text" id="prenom" name="prenom">
    </div>
    <div class="element_register">
        <label for="telephone">Telephone:</label>
        <input type="text" id="telephone" name="telephone">
    </div>
    <div class="element_register">
        <label for="adresse">Adresse e-mail:</label>
        <input type="text" id="adresse" name="adresse">
    </div>
    <div class="element_register">
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password">
    </div>
    <div class="element_register">
        <label for="confirm_password">Confirmer le mot de passe:</label>
        <input type="password" id="confirm_password" name="confirm_password">
    </div>
    <div class="button_register">
        <input type="submit" class="btn btn-secondary" value="S'inscrire">
    </div>
</form>
<p>Déjà inscrit ? <a href="login.php">Se connecter</a></p>

<?php
include './pied.php';
?>