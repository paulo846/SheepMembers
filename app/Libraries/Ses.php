<?php

namespace App\Libraries;

use App\Models\ConfigModel;
use Aws\Ses\SesClient;

class Ses
{

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

        //html
        $html = "<div style='font-size: 14px;'><h3>Dados para acesso {$plataforma[0]['title_pt']}</h3>";
        $html .= "<p>{$dados['name']}, nesse email contém os dados de acesso a plataforma para você assistir ao seu evento!</p>";
        $html .= "Dados de acesso:
        <ul>
            <li><b>Link da plataforma:</b> {$plataforma[0]['slug']}</li>
            <li><b>Seu email:</b> {$dados['email']}</li>
            <li><b>Sua senha:</b> mudar123</li>
        </ul></div>";

        //envia email de boas vindas!
        $this->sendEmail([
            'sender'    => 'contato@conect.app',
            'recipient' => $dados['email'],
            'subject'   => 'Bem vindo!',
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
