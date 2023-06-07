<style>
	html,
	body {
		padding: 0;
		margin: 0;
	}
</style>
<div style="font-family:Arial,Helvetica,sans-serif; line-height: 1.5; font-weight: normal; font-size: 15px; color: #2F3044; min-height: 100%; margin:0; padding:0; width:100%; background-color:#edf2f7">
	<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;margin:0 auto; padding:0; max-width:600px">
		<tbody>
			<tr>
				<td align="center" valign="center" style="text-align:center; padding: 40px">
					<a href="#" rel="noopener" target="_blank">
						<img alt="Logo" src="<?= $logo ?>" width="175px"/>
					</a>
				</td>
			</tr>
			<tr>
				<td align="left" valign="center">
					<div style="text-align:left; margin: 0 20px; padding: 40px; background-color:#ffffff; border-radius: 6px">
						<!--begin:Email content-->
						<div style="padding-bottom: 15px; font-size: 17px;">
							<strong>Graça e paz!</strong>
						</div>
						<div style="padding-bottom: 10px">
							<p><strong><?= $nome ?></strong><br>
								Aqui estão os dados de acesso para a <b><?= $plataforma ?></b>
							</p>
							<p>
								<b>Link da plataforma:</b> https://<?= $link ?><br>
								<b>Login:</b> <?= $email ?><br>
								<b>Senha:</b> mudar123<br>
							</p>
						</div>
						<div style="padding-bottom: 30px">
							<p><i>Atenção! Se você já recebeu esse e-mail anteriormente, favor desconsiderar.</i></p>
						</div>
						<!--end:Email content-->
						<div style="padding-bottom: 10px">
							<tr>
								<td align="center" valign="center" style="font-size: 13px; text-align:center;padding: 20px; color: #6d6e7c;">
									<p>Copyright ©<?= date('Y') ?> sheepmebers
										<a href="https://sheepmembers.com" rel="noopener" target="_blank">https://sheepmembers.com</a>.
									</p>
								</td>
							</tr>
						</div>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</div>