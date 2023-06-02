<?php

namespace App\Controllers;

use App\Libraries\S3;
use App\Models\ClientModel;
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

use Config\Aws;


class Teste extends BaseController
{
    public function index()
    {
        echo 'Loop infinito';
        while (true) {
            // Executa um loop infinito
        }

    }
    public function upload()
    {
        $image = new S3();

        $file = $this->request->getFile('imagem');

        try {
            return $image->uploadImage($file, uniqid());
        } catch (\Exception $e) {
            echo "<pre>";
            print_r($e->getMessage());
        }
    }
    public function upload1()
    {

        /* $image = $this->request->getFile('imagem');
        $awsConfig = new Aws();

        $s3 = new S3Client([
            'credentials' => $awsConfig->credentials,
            'region'      => $awsConfig->region,
            'version'     => 'latest',
        ]);


        try {

            $result = $s3->putObject([
                'Bucket' => $awsConfig->bucket,
                'Key'    => '12/' . $image->getName(),
                'Body'   => fopen($image->getPathname(), 'r'),
                'ACL'    => 'private',
                //'ACL'    => 'public-read',
            ]);

            echo 'A imagem foi enviada para o S3 com sucesso!';
        } catch (S3Exception $e) {

            echo 'Ocorreu um erro ao enviar a imagem para o S3: 
            <pre>' . $e->getMessage() . '</pre>';
        }*/
    }


    public function mostrar()
    {
        $image = new S3();

        echo '<img src="' . $image->getImageUrl("clients/644fcec825933.jpg") . '" style="width: 300px;"/>';
        echo '<img src="' . $image->getImageUrl("clients/644fcf201d804.png") . '" style="width: 300px;"/>';
    }
}
