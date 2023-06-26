<?php
include './entete.php';
if (!empty($_GET['id'])) {
    $user = getClient($_GET['id']);
} ?>
<link rel="stylesheet" href="./public/css/profil.css">
<br>
</div>
<!-- banner bg main end -->
<br>
<br>
<div class="home-content">
    <div class="overview-boxes">
        <div class="section_profil">
            <table class="table_profil">
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Téléphone</th>
                    <th>Adresse</th>
                </tr>
                <?php
                $users = getClient();
                if (!empty($users) && is_array($users)) {
                    foreach ($users as $key => $value) {

                        if ($key == $user) { // Vérifier si l'utilisateur correspond à l'ID


                ?>
                            <tr>
                                <td><?= $value['nom'] ?></td>
                                <td><?= $value['prenom'] ?></td>
                                <td><?= $value['telephone'] ?></td>
                                <td><?= $value['adresse'] ?></td>
                            </tr>
                <?php
                            break; // Sortie de la boucle après avoir affiché les informations de l'utilisateur connecté
                        }
                    }
                }
                ?>
            </table>
        </div>
    </div>
</div> <?php include './pied.php'; ?>