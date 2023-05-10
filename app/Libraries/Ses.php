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
            'Source' => $sender,
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
}
