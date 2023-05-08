<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- CSS -->
	<?= $this->renderSection('css') ?>
	<link rel="stylesheet" href="<?= url_cloud_front() ?>assets/admin/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="<?= url_cloud_front() ?>assets/admin/css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="<?= url_cloud_front() ?>assets/admin/css/magnific-popup.css">
	<link rel="stylesheet" href="<?= url_cloud_front() ?>assets/admin/css/select2.min.css">
	<link rel="stylesheet" href="<?= url_cloud_front() ?>assets/admin/css/admin.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

	<!-- Favicons -->
	<link rel="icon" type="image/png" href="<?= url_cloud_front() ?>favicon.ico" sizes="32x32">

	<link rel="apple-touch-icon" href="<?= url_cloud_front() ?>favicon.ico">
	<meta name="description" content="Sistem de stream">
	<meta name="keywords" content="IGR Sistemas">
	<meta name="author" content="IGR Sistemas">
	<title><?= (isset($title)) ? $title : 'Stream' ?></title>
	
</head>

<body>
	<?= $this->include('super/header') ?>
	<?= $this->include('super/sidebar') ?>
	<!-- main content -->
	<main class="main">
		<div class="container-fluid">
			<div class="row">
				<!-- end main title -->
				<?= $this->renderSection('content') ?>
			</div>
		</div>
	</main>
	<!-- end main content -->
	<!-- JS -->
	<script src="<?= url_cloud_front() ?>assets/admin/js/jquery-3.5.1.min.js"></script>
	<script src="<?= url_cloud_front() ?>assets/admin/js/bootstrap.bundle.min.js"></script>
	<script src="<?= url_cloud_front() ?>assets/admin/js/jquery.magnific-popup.min.js"></script>
	<script src="<?= url_cloud_front() ?>assets/admin/js/smooth-scrollbar.js"></script>
	<script src="<?= url_cloud_front() ?>assets/admin/js/select2.min.js"></script>
	<script src="<?= url_cloud_front() ?>assets/admin/js/admin.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<script>
		var baseUrl = "<?= site_url() ?>";
		var currentUrl = window.location.href;
		var currentLink = document.querySelector('a[href="' + currentUrl + '"]');
		if (currentLink) {
			currentLink.classList.add('sidebar__nav-link--active');
		}
	</script>
	<?= $this->renderSection('script') ?>
</body>

</html>