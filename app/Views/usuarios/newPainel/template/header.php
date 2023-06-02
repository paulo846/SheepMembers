<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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

		.catalog .container{
			background-color: rgba(0, 0, 0, 0) !important;
			background: rgba(0, 0, 0, 0) !important;
		}

		.text-danger{
			color: #ff4746 !important;
			transition: transform 0.6s !important; 
		}
		.text-danger :hover{
			color: #ff0000 !important;
			transform: scale(1.5) !important; 
		}
	</style>
	<?= $analytics ?>
	<!-- Meta Pixel Code
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
	<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=588447679769578&ev=PageView&noscript=1" /></noscript> -->
	<!-- End Meta Pixel Code -->
</head>

<body>