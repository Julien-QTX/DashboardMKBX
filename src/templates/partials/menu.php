<ul>
    <li><a href="/?page=home">Home</a></li>

    <?php if ($user === false) { ?>

    <li><a href="/?page=signup">SignUp</a></li>
    <li><a href="/?page=login">Login</a></li>

    <?php } else if ($user->role >= 200) { ?>

    <li><a href="/?page=profile">Profil</a></li>
    <li><a href="/?page=account_verification">Vérifier compte</a></li>
    <li><a href="/?page=operation_verification">Vérifier opérations</a></li>
    <li><a href="/?page=operations/deposit">Ajouter des Stocks</a></li>
    <li><a href="/?page=operations/transaction">Envoi inter-entrepôt</a></li>
    <li><a href="/?page=operations/withdraw">Retrait Commande clients</a></li>
    <li><a href="/actions/logout.php">Logout</a></li>

    <?php } else if ($user->role > 1) { ?>

    <li><a href="/?page=profile">Profil</a></li>
    <li><a href="/?page=operations">Opérations</a></li>
    <li><a href="/actions/logout.php">Logout</a></li>

    <?php } else if ($user->role > 0) { ?>

    <li><a href="/?page=profile">Profil</a></li>
    <li><a href="/actions/logout.php">Logout</a></li>

    <?php } else { ?>

    <li><a href="/actions/logout.php">Logout</a></li>

    <?php    } ?>

</ul>