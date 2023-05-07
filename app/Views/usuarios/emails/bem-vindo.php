<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
</head>

<body id="kt_body" class="app-blank app-blank">
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <div class="d-flex flex-column flex-column-fluid">
            <div class="scroll-y flex-column-fluid px-10 py-10" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_header_nav" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true" style="background-color:#ededed; --kt-scrollbar-color: #ededed; --kt-scrollbar-hover-color: #ededed">
                <!--begin::Email template-->
                <style>
                    html,
                    body {
                        padding: 0;
                        margin: 0;
                        font-family: Inter, Helvetica, "sans-serif";
                    }

                    a:hover {
                        color: #009ef7;
                    }
                </style>
                <div id="#kt_app_body_content" style="background-color:#ededed; font-family:Arial,Helvetica,sans-serif; line-height: 1.5; min-height: 100%; font-weight: normal; font-size: 15px; color: #2F3044; margin:0; padding:0; width:100%;">
                    <div style="background-color:#ffffff; padding: 45px 0 34px 0; border-radius: 24px; margin:40px auto; max-width: 600px;">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" height="auto" style="border-collapse:collapse;">
                            <tbody>
                                <tr>
                                    <td align="center" valign="center" style="text-align:center; padding-bottom: 10px">
                                        <!--begin:Email content-->
                                        <div style="text-align:center; margin:0 15px 34px 15px">
                                            <!--begin:Logo-->
                                            <div style="margin-bottom: 10px">
                                                <a href="<?= site_url() ?>" rel="noopener" target="_blank">
                                                    <img alt="Logo" src="https://conect.app/assets/admin/img/logo-1.png" style="height: 60px" />
                                                </a>
                                            </div>
                                            <div style="font-size: 14px; font-weight: 500; margin-bottom: 27px; font-family:Arial,Helvetica,sans-serif;">
                                                <p style="margin-bottom:9px; color:#181C32; font-size: 22px; font-weight:700">Olá {NAME}, sua conta foi criada com sucesso!</p>
                                                <p style="margin-bottom:2px; color:#7E8299">Clique no botão a baixo para ativar sua conta.</p>
                                                <p style="margin-bottom:2px; color:#7E8299; text-align: left;">
                                                    Dados de acesso:
                                                <ul style="list-style: none; text-align: left;">
                                                    <li>Login: {SEU EMAIL}</li>
                                                    <li>Senha: {SENHA}</li>
                                                    <li>Acesso: <a href="#"><?= site_url('login') ?></a></li>
                                                </ul>
                                                </p>
                                            </div>
                                        </div>
                                        <!--end:Email content-->
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" valign="center" style="font-size: 13px; text-align:center; padding: 0 10px 10px 10px; font-weight: 500; color: #A1A5B7; font-family:Arial,Helvetica,sans-serif">
                                        <p style="color:#181C32; font-size: 16px; font-weight: 600; margin-bottom:9px">It’s all about customers!</p>
                                        <p style="margin-bottom:2px">Call our customer care number: +31 6 3344 55 56</p>
                                        <p style="margin-bottom:4px">You may reach us at
                                            <a href="https://keenthemes.com" rel="noopener" target="_blank" style="font-weight: 600">suporte@sheepmembers.com</a>.
                                        </p>
                                        <?php

                                        use CodeIgniter\I18n\Time;

                                        $myTime = new Time('now');
                                        $formatted = $myTime->toLocalizedString('dd/MM/yyyy HH:mm:ss'); ?>
                                        <p>Data: <?= $formatted ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" valign="center" style="font-size: 13px; padding:0 15px; text-align:center; font-weight: 500; color: #A1A5B7;font-family:Arial,Helvetica,sans-serif">
                                        <p>&copy; Copyright KeenThemes.
                                            <a href="https://keenthemes.com" rel="noopener" target="_blank" style="font-weight: 600;font-family:Arial,Helvetica,sans-serif">Unsubscribe</a>&nbsp; from newsletter.
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>