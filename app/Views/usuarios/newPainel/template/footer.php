<!-- footer -->
<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="footer__content">
					<div class="footer__links">
						<a href="#" class="aviso"><?= lang('Panel.termos.privacidade') ?></a>
						<a href="#" class="aviso"><?= lang('Panel.termos.uso') ?></a>
					</div>
					<small class="footer__copyright">© 2023 Created by <a href="#" target="_blank">SheepMembers</a>. Meu IP: <?php $request = service('request'); echo $request->getIPAddress(); ?></small>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- end footer -->
<?= $this->include('includes/escolhaIdioma.php') ?>
<!-- JS -->
<script src="/assets/painel/js/jquery-3.5.1.min.js"></script>
<script src="/assets/painel/js/bootstrap.bundle.min.js"></script>
<script src="/assets/painel/js/owl.carousel.min.js"></script>
<script src="/assets/painel/js/slider-radio.js"></script>
<script src="/assets/painel/js/select2.min.js"></script>
<script src="/assets/painel/js/smooth-scrollbar.js"></script>
<script src="/assets/painel/js/jquery.magnific-popup.min.js"></script>
<script src="/assets/painel/js/plyr.min.js"></script>
<script src="/assets/painel/js/main.js"></script>


<script>
	const site = "<?= site_url() ?>";
	var client = "<?= session('idUser') ?>";

	function logIn() {
		$.ajax({
			type: "get",
			url: site + "client/api/verify/" + client,
			dataType: "json",
			success: function(res) {
				console.log(res);
			},
			error: function(xhr, status, error) {
				console.log("Ocorreu um erro na requisição: " + status + " - " + error);
				window.location.reload();
			}
		});
	}

	$(document).ready(function() {
		logIn(), setInterval(logIn, 5e3)
		$(".aviso").click(function() {
			alert('Página em desenvolvimento...');
		})
	});
</script>
<?= $this->renderSection('js'); ?>

<?= $analyticsFooter ?>
</body>

</html>