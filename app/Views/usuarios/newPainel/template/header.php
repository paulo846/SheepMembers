<!DOCTYPE html>
<html lang="en">

<head>
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
	<style>
		.whatsapp-button {
			position: fixed;
			bottom: 20px;
			right: 20px;
			z-index: 9999;
			width: 60px;
			height: 60px;
			border-radius: 50%;
			background-color: #25d366;
			color: #fff;
			text-align: center;
			font-size: 24px;
			box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
			cursor: pointer;
		}

		.whatsapp-button i {
			line-height: 60px;
		}

		.whatsapp-button:hover {
			background-color: #128c7e;
		}

		.alert {
			padding: 15px;
			text-align: center;
			font-weight: bold;
			width: 100%;
			margin-top: 10px;
			margin-bottom: 10px;
			border-radius: 10px;
			font-size: 12px;
		}

		.alert-danger {
			background-color: red;
			color: #ffffff;
		}

		.alert-success {
			background-color: green;
			color: #ffffff;
		}

		.catalog .container {
			background-color: rgba(0, 0, 0, 0) !important;
			background: rgba(0, 0, 0, 0) !important;
		}

		.text-danger {
			color: #ff4746 !important;
			transition: transform 0.6s !important;
		}

		.text-danger :hover {
			color: #ff0000 !important;
			transform: scale(1.5) !important;
		}

		/* Estilos para telas menores */
		@media only screen and (max-width: 600px) {

			/* Estilos para telas menores que 600px */
			/* Aqui você pode definir o layout, tamanhos de fonte, etc. para telas menores */
			h1 {
				font-size: large !important;
			}

			.article__content p {
				font-size: medium !important;
				margin-bottom: 10px;
			}
		}

		.section {
			padding: 30px 0 !important;
		}
	</style>
	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-CDSN5Q7JM1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());
		gtag('config', 'G-CDSN5Q7JM1');
	</script>
	<!-- Google tag (gtag.js) -->
	<?= $analytics ?>
	<!-- Meta Pixel Code-->
	<script>
		! function(f, b, e, v, n, t, s) {
			if (f.fbq) return;
			n = f.fbq = function() {
				n.callMethod ?
					n.callMethod.apply(n, arguments) : n.queue.push(arguments)
			};
			if (!f._fbq) f._fbq = n;
			n.push = n;
			n.loaded = !0;
			n.version = '2.0';
			n.queue = [];
			t = b.createElement(e);
			t.async = !0;
			t.src = v;
			s = b.getElementsByTagName(e)[0];
			s.parentNode.insertBefore(t, s)
		}(window, document, 'script',
			'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '588447679769578');
		fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=588447679769578&ev=PageView&noscript=1" /></noscript>
	<!-- End Meta Pixel Code -->
</head>

<body>