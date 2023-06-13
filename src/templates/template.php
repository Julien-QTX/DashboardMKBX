<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $page_title; ?></title>
	<?= $head_metas; ?>
	<link rel="stylesheet" href="assets/CSS/header.css">
</head>

<body>

	<div>
		<?php require_once __DIR__ . '/partials/menu.php'; ?>
	</div>

	<?= $page_content; ?>
	<?= $page_scripts; ?>

	<div>
		<?php require_once __DIR__ . '/partials/footer.php'; ?>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
	</script>
</body>

</html>