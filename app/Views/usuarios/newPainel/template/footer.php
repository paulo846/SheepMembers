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
					<small class="footer__copyright">
						© 2023 Created by <a href="#" target="_blank">SheepMembers</a>. <br>
						Meu IP: <?php $request = service('request');
								echo $request->getIPAddress(); ?><br>
						<?php
						#$publicIp = file_get_contents("http://169.254.169.254/latest/meta-data/public-ipv4");

						#echo "Servidor: " . $publicIp;
						?>

						<?php
						// Obtém o endereço IP real do cliente, mesmo atrás de um proxy reverso
						function getRealIpAddr()
						{
							if (!empty($_SERVER['HTTP_X_REAL_IP'])) {
								// IP fornecido pelo proxy reverso
								return $_SERVER['HTTP_X_REAL_IP'];
							} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
								// Lista de IPs fornecidos pelo proxy reverso
								$ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
								return trim($ips[0]);
							} else {
								// IP direto, sem proxy reverso
								return $_SERVER['REMOTE_ADDR'];
							}
						}

						// Uso do método
						$clientIp = getRealIpAddr();
						echo "Endereço IP do cliente: " . $clientIp;
						?>

					</small>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- end footer -->
<?php if ($suporte) : ?>
	<a href="https://api.whatsapp.com/send?phone=<?= $suporte ?>" target="_blank" class="whatsapp-button">
		<i class="fab fa-whatsapp"></i>
	</a>
<?php endif; ?>

<!-- JS -->
<script src="<?= url_cloud_front() ?>assets/painel/js/jquery-3.5.1.min.js"></script>
<script src="<?= url_cloud_front() ?>assets/painel/js/bootstrap.bundle.min.js"></script>
<script src="<?= url_cloud_front() ?>assets/painel/js/owl.carousel.min.js"></script>
<script src="<?= url_cloud_front() ?>assets/painel/js/slider-radio.js"></script>
<script src="<?= url_cloud_front() ?>assets/painel/js/select2.min.js"></script>
<script src="<?= url_cloud_front() ?>assets/painel/js/smooth-scrollbar.js"></script>
<script src="<?= url_cloud_front() ?>assets/painel/js/jquery.magnific-popup.min.js"></script>
<script src="<?= url_cloud_front() ?>assets/painel/js/plyr.min.js"></script>
<script src="<?= url_cloud_front() ?>assets/painel/js/main.js"></script>


<script>
	const site = "<?= site_url() ?>";
	var client = "<?= session('idUser') ?>";

	/*function logIn() {
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
	}*/

	$(document).ready(function() {
		//logIn(), setInterval(logIn, 5e3)
		$(".aviso").click(function() {
			alert('Página em desenvolvimento...');
		})
	});
</script>
<?= $this->renderSection('js'); ?>
<?= $analyticsFooter ?>
</body>

</html>