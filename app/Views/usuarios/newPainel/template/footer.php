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
					<small class="footer__copyright">© 2023 Created by <a href="#" target="_blank">SheepMembers</a>.</small>
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

	$(document).ready(function() {
		$(".aviso").click(function() {
			alert('Página em desenvolvimento...');
		})
	});
</script>
<?= $this->renderSection('js'); ?>

<?= $analyticsFooter ?>
</body>

</html>