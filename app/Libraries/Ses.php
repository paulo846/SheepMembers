<?php

namespace App\Libraries;

use App\Models\ConfigModel;
use App\Models\EmpresaModel;
use Aws\Ses\SesClient;

class Ses
{
    public function __construct()
    {
        helper('url');
    }

    public static function sendEmail(array $data)
    {
        $client = new SesClient([
            'version' => 'latest',
            'region'  => env('AWS_DEFAULT_REGION'),
            'credentials' => [
                'key'    => env('AWS_ACCESS_KEY_ID'),
                'secret' => env('AWS_SECRET_ACCESS_KEY'),
            ],
        ]);

        $sender    = $data['sender'];
        $senderName = $data['sender_name']; // Novo campo para o nome do remetente
        $recipient = $data['recipient'];
        $subject   = $data['subject'];
        $body      = $data['body'];

        $message = [
            'Subject' => [
                'Data' => $subject,
            ],
            'Body' => [
                'Html' => [
                    'Data' => $body,
                ],
            ],
        ];

        $result = $client->sendEmail([
            'Source' => "$senderName <$sender>", // Incluindo o nome do remetente
            'Destination' => [
                'ToAddresses' => [$recipient],
            ],
            'Message' => $message,
        ]);

        return $result;
    }


    public function acessoInicial(array $dados, int $empresa)
    {
        $mConfig = new ConfigModel();
        //busca dados da empresa
        $plataforma = $mConfig->where('id_empresa', $empresa)->findAll();

        $mEmpresa = new EmpresaModel();
        $empresaRow = $mEmpresa->select('evento')->find($empresa);

        //html
        $html = view('usuarios/emails/bem-vindo', [
            'plataforma' => ucfirst($empresaRow['evento']),
            'logo'       => ($plataforma[0]['logo']) ? url_cloud_front().$plataforma[0]['logo'] : url_cloud_front().'assets/admin/img/logo-1.png',
            'nome'       => $dados['name'],
            'link'       => $plataforma[0]['slug'],
            'email'      => strtolower($dados['email'])
        ]);

        //envia email de boas vindas!
        $this->sendEmail([
            'sender' => 'contato@sheepmembers.com',
            'sender_name' => utf8_encode(ucfirst($empresaRow['evento'])),
            'recipient' => strtolower($dados['email']),
            'subject' => 'Seu acesso chegou - ' . ucfirst($empresaRow['evento']),
            'body'      => $html
        ]);


    }

    public function acessoInicialGeral(array $dados)
    {
        $mConfig = new ConfigModel();


        //html
        $html = "<div style='font-size: 14px;'><h3>Você pediu uma recuperação de conta em https://{$_SERVER['HTTP_HOST']}</h3>";
        $html .= "<p>Nesse email contém os dados de recuperação de sua conta!</p>";
        $html .= "Dados de acesso:
        <ul>
            <li><b>Link da plataforma:</b> https://{$_SERVER['HTTP_HOST']}</li>
            <li><b>Seu email:</b> {$dados['email']}</li>
            <li><b>Senha padrão:</b> mudar123</li>
        </ul></div>";

        //envia email de boas vindas!
        $this->sendEmail([
            'sender'    => 'contato@conect.app',
            'recipient' => $dados['email'],
            'subject'   => 'Recuperação de conta!',
            'body'      => $html
        ]);
    }
}
