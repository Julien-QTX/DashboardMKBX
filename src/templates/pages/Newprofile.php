<?php 

require_once __DIR__ . '/../../init.php';

$page_title = "Profil";

$head_metas = "<link rel=stylesheet href=assets/CSS/profil.css>";

ob_start();

$stmh = $db->prepare('SELECT fullname FROM users WHERE id = ?');
        $stmh->execute([$_SESSION['user_id']]);
        $user_name = $stmh->fetch();

?>

<h1><?=$user_name['fullname']?> </h1>

<?php