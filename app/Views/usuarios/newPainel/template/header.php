<!DOCTYPE html>
<html lang="<?= service('language')->getLocale() ?>">

<head>
	<script>
		document.addEventListener("keydown", function(event) {
			if (event.keyCode === 123) {
				console.log("Tecla bloqueada!");
				event.preventDefault(); // Isso impede o comportamento padrão da tecla F12 no navegador.
				bloquearTecla();
			}
		});

		function bloquearTecla() {
			// Implemente aqui a lógica de bloqueio da tecla 123.
		}

		document.addEventListener('contextmenu', function(e) {
			e.preventDefault();
		});
	</script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<!-- CSS -->
	<link rel="stylesheet" href="<?= url_cloud_front() ?>assets/painel/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="<?= url_cloud_front() ?>assets/painel/css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="<?= url_cloud_front() ?>assets/painel/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?= url_cloud_front() ?>assets/painel/css/slider-radio.css">
	<link rel="stylesheet" href="<?= url_cloud_front() ?>assets/painel/css/select2.min.css">
	<link rel="stylesheet" href="<?= url_cloud_front() ?>assets/painel/css/magnific-popup.css">
	<link rel="stylesheet" href="<?= url_cloud_front() ?>assets/painel/css/plyr.css">
	<link rel="stylesheet" href="<?= url_cloud_front() ?>assets/painel/css/main.css">


	<!-- Favicons -->
	<link rel="icon" type="image/png" href="<?= $favicon ?>" sizes="32x32">
	<link rel="apple-touch-icon" href="<?= $favicon ?>">

	<meta name="description" content="<?= $description ?>">
	<meta name="keywords" content="">
	<meta name="author" content="SheepMembers">
	<title><?= $title ?></title>

	<link rel="stylesheet" href="/assets/css/custom/backend.min.css">
	<?= $analytics ?>
</head>

<body>