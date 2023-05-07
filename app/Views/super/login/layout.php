
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- CSS -->
	<link rel="stylesheet" href="/assets/admin/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="/assets/admin/css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="/assets/admin/css/magnific-popup.css">
	<link rel="stylesheet" href="/assets/admin/css/select2.min.css">
	<link rel="stylesheet" href="/assets/admin/css/admin.css">
	
    <!-- Favicons -->
	<link rel="icon" type="image/png" href="/assets/admin/icon/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon" href="/assets/admin/icon/favicon-32x32.png">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="IGR Sistemas">
	
    <title>Super ADM</title>

</head>
<body>
	<!-- sign in -->
	<div class="sign section--bg" data-bg="/assets/admin/img/bg.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sign__content">
						<!-- authorization form -->
						<?= form_open('superadmin/auth', 'class="sign__form"') ?>
							<a href="index.html" class="sign__logo">
								<img src="/assets/admin/img/logo-1.png" alt="">
							</a>
							<div class="sign__group">
								<input type="email" class="sign__input" placeholder="Email" required name="email">
							</div>
							<div class="sign__group">
								<input type="password" class="sign__input" placeholder="Password" required name="password">
							</div>
							<div class="sign__group sign__group--checkbox">
								<input id="remember" name="remember" type="checkbox" checked="checked">
								<label for="remember">Remember me</label>
							</div>
							<button class="sign__btn" type="submit">ENTRAR</button>
							<span class="sign__text"><a href="forgot.html">Forgot password?</a></span>
						</form>
						<!-- end authorization form -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end sign in -->
	<!-- JS -->
	<script src="/assets/admin/js/jquery-3.5.1.min.js"></script>
	<script src="/assets/admin/js/bootstrap.bundle.min.js"></script>
	<script src="/assets/admin/js/jquery.magnific-popup.min.js"></script>
	<script src="/assets/admin/js/smooth-scrollbar.js"></script>
	<script src="/assets/admin/js/select2.min.js"></script>
	<script src="/assets/admin/js/admin.js"></script>
</body>
</html>