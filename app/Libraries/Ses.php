<?php

namespace App\Libraries;

use Aws\Ses\SesClient;

class Ses {

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

}
